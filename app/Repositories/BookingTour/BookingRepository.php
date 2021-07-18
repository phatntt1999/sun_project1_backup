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
}
