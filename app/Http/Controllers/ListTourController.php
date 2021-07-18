<?php

namespace App\Http\Controllers;

use App\Models\CategoryTour;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Tour\TourRepositoryInterface;
use App\Repositories\TourCategory\CatTourRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ListTourController extends Controller
{
    protected $tourRepo;
    protected $catTourRepo;
    protected $imageRepo;
    public function __construct(
        TourRepositoryInterface $tourRepo,
        CatTourRepositoryInterface $catTourRepo,
        ImageRepositoryInterface $imageRepo
    ) {
        $this->tourRepo = $tourRepo;
        $this->catTourRepo = $catTourRepo;
        $this->imageRepo = $imageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = $this->tourRepo->sortAndPaginate('created_at', 'asc', config('app.default_paginate_tour'));
        return view('admin.listTour', [
            'tours' => $tours,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_tour = $this->catTourRepo->getAll();

        return view('admin.createTour', [
            'cat_tour' => $cat_tour,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = [
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'num_of_participants' => $request->numOfParticipants,
            'cat_tour_id' => $request->cat_tour_id,
            'price' => $request->price,
        ];
        $createTour = $this->tourRepo->create($attributes);


        if ($request->has('thumbnailTour')) {
            $thumbnail = $request->file('thumbnailTour');
            $path = 'assets/images/destinations/';
            $name = $thumbnail->getClientOriginalName();
            $storedPath = $thumbnail->move($path, $name);

            $imageAttributes = [
                'imageable_id' => $createTour->id,
                'imageable_type' => 'tours',
                'url' => $path . $name,
            ];
            $this->imageRepo->create($imageAttributes);
        }

        if ($createTour) {
            return redirect()->route('admintours.index')->with('msg_success', trans('messages.save_sucess'));
        }

        return redirect()->route('admintours.index')->with('msg_fail', trans('messages.save_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = $this->tourRepo->find($id);
        $cat_tour = $this->catTourRepo->getAll();

        return view('admin.editTour', [
            'tour' => $tour,
            'cat_tour' => $cat_tour,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tourAttributes = [
            'name' => $request->name,
            'description' =>  $request->description,
            'num_of_participants' => $request->numOfParticipants,
            'duration' => $request->duration,
            'cat_tour_id' => $request->cat_tour_id,
            'price' => $request->price,
        ];

        $updateTour = $this->tourRepo->update($id, $tourAttributes);
        if ($updateTour) {
            return redirect()->route('admintours.index')->with('msg_success', trans('messages.save_sucess'));
        }

        return redirect()->route('admintours.index')->with('msg_fail', trans('messages.save_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTour = false;
        $tourImages = $this->tourRepo->find($id)->images->all();
        $deleteTourImages = $this->imageRepo->deleteImage($tourImages);
        if ($deleteTourImages) {
            $deleteTour = $this->tourRepo->delete($id);
        }
        if ($deleteTour) {
            return redirect()->route('admintours.index')->with('msg_success', trans('messages.delete_sucess'));
        }

        return redirect()->route('admintours.index')->with('msg_failed', trans('messages.delete_fail'));
    }
}
