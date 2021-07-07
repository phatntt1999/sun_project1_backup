<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::with('images')->oldest()->paginate(config('app.default_paginate_tour'));
        return view('destinations', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function search(Request $request)
    {
        $destination = $request->input('destination');
        $duration = $request->input('duration');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $tours = Tour::with('images')->where('name', 'LIKE', '%' . $destination . '%')
            ->where('duration', 'LIKE', '%' . $duration . '%')
            ->paginate(config('app.default_paginate_tour'));

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
        $tour = Tour::find($id);
        if (!$tour) {
            return redirect()->route('tours.index')->with('error', trans('messages.not_found_tour'));
        }
        $images = $tour->images->all();

        $rating = new Rating();
        $avgRating = $tour->avgRate;

        return view('tour', compact('tour', 'images', 'avgRating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
