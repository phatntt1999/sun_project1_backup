<?php

namespace App\Http\Controllers;

use App\Models\CategoryTour;
use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;

class ListTourController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('role');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authId = Auth::user()->name;
        $tours = Tour::orderBy('created_at', 'asc')->get();

        return view('admin.listTour', [
            'tours' => $tours,
            'authId' => $authId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_tour = CategoryTour::all();

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
        $name = $request->name;
        $description = $request->description;
        $duration = $request->duration;
        $numOfParticipants = $request->numOfParticipants;
        $catTourId = $request->cat_tour_id;
        $price = $request->price;

        Tour::create([
            'name' => $name,
            'description' => $description,
            'duration' => $duration,
            'num_of_participants' => $numOfParticipants,
            'cat_tour_id' => $catTourId,
            'price' => $price,
        ]);

        return redirect()->route('tours.index')->with('createSuccess', 'Create successfull');
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
        $tour = Tour::find($id);
        $cat_tour = CategoryTour::all();

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
        $name = $request->name;
        $description = $request->description;
        $duration = $request->duration;
        $numOfParticipants = $request->numOfParticipants;
        $catTourId = $request->cat_tour_id;
        $price = $request->price;

        $tour = Tour::find($id);
        $tour->name = $name;
        $tour->description =  $description;
        $tour->num_of_participants = $numOfParticipants;
        $tour->duration = $duration;
        $tour->cat_tour_id = $catTourId;
        $tour->price = $price;
        $tour->save();

        return redirect()->route('tours.index')->with('Success', 'Action successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $tour = new Tour();
        $id_tour = $id;
        Tour::find($id_tour)->delete();
        // $tour->find($id_tour)->delete();

        return redirect()->route('tours.index');
    }
}
