<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Tour;
use App\Repositories\Tour\TourRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    protected $tourRepo;

    public function __construct(TourRepositoryInterface $tourRepo)
    {
        $this->tourRepo = $tourRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = $this->tourRepo->sortAndPaginate('created_at', 'asc', config('app.default_paginate_tour'));
        return view('destinations', [
            'tours' => $tours,
        ]);
    }

    public function search(Request $request)
    {
        $destination = $request->input('destination');
        $duration = $request->input('duration');
        $tours = $this->tourRepo->search($destination, $duration);

        return view('destinations', compact('tours'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = $this->tourRepo->find($id);

        if (!$tour) {
            return redirect()->route('tours.index')->with('error', trans('messages.not_found_tour'));
        }
        $images = $tour->images->all();
        $avgRating = $tour->avgRate;

        return view('tour', compact('tour', 'images', 'avgRating'));
    }
}
