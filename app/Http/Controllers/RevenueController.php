<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Repositories\Tour\TourRepositoryInterface;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    protected $tourRepo;
    public function __construct(TourRepositoryInterface $tourRepo)
    {
        $this->tourRepo = $tourRepo;
    }

    public function revenue()
    {
        $total = null;
        $count = null;
        $cancel_count = null;
        $tours = $this->tourRepo->sortAndPaginate('name', 'asc', config('app.default_paginate_tour'));
        foreach ($tours as $tour) {
            foreach ($tour->users as $booking) {
                $tour->revenue = $booking->pivot->where('status', '=', 0)->where('tour_id', '=', $tour->id)->sum('total_price');
                $total = $booking->pivot->where('status', '=', 0)->sum('total_price');
                $count = $booking->pivot->where('status', '=', 0)->count();
                $cancel_count = $booking->pivot->where('status', '<>', 0)->count();
            }
        }

        return view('admin.booking_revenue', compact('tours', 'total', 'count', 'cancel_count'));
    }
}
