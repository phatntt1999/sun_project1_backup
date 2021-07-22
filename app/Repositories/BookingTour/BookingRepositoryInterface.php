<?php

namespace App\Repositories\BookingTour;

use \App\Repositories\RepositoryInterface;

interface BookingRepositoryInterface extends RepositoryInterface
{
    public function getNotApprovedBookingRequest();

    public function approved($id);

    public function reject($id);
}
