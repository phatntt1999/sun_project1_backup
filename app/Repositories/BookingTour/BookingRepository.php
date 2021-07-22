<?php

namespace App\Repositories\BookingTour;

use App\Models\BookingTour;
use App\Repositories\BookingTour\BookingRepositoryInterface;
use App\Repositories\BaseRepository;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{
    public function __construct(BookingTour $booking)
    {
        parent::__construct($booking);
    }

    public function getNotApprovedBookingRequest()
    {
        $results = $this->model::with('user')->with('tour')
            ->where('status', -1)
            ->paginate(config('app.default_paginate_tour'));
        return $results;
    }

    public function approved($id)
    {
        parent::update($id, ['status' => 0]);
    }

    public function reject($id)
    {
        parent::update($id, ['status' => 1]);
    }
}
