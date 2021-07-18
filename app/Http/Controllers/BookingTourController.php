<?php

namespace App\Http\Controllers;

use App\Models\BookingTour;
use App\Models\Tour;
use App\Repositories\BookingTour\BookingRepositoryInterface;
use App\Repositories\Tour\TourRepositoryInterface;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class BookingTourController extends Controller
{
    protected $tourRepo;
    protected $bookingRepo;

    public function __construct(TourRepositoryInterface $tourRepo, BookingRepositoryInterface $bookingRepo)
    {
        $this->tourRepo = $tourRepo;
        $this->bookingRepo = $bookingRepo;
    }

    public function showBookingTour(Request $request)
    {
        $user = $this->tourRepo->getCurrentUser();
        // $selectedTour = Tour::find($request->tour);
        $selectedTour = $this->tourRepo->find($request->tour);

        return view('booking.booking_form', [
            'user' => $user,
            'selectedTour' => $selectedTour,
        ]);
    }
    public function storeBookingTour(Request $request)
    {
        $accountId = $this->tourRepo->getCurrentUser()->id;
        $inputDateStart = strtotime($request->dateStart);
        $dateStart = date('Y-m-d', $inputDateStart);
        $status = 0;

        $dataBooking = [
            'tour_id' => $request->tourId,
            'account_id' => $accountId,
            'duration' => $request->duration,
            'total_price' => $request->totalPrice,
            'booking_start_date' => $dateStart,
            'status' => $status,
            'quantity' => $request->quantity,
        ];

        $bookingResult = $this->bookingRepo->create($dataBooking);

        return view('booking.vnp_payment', [
            'totalPrice' => $bookingResult->total_price,
            'bookingId' => $bookingResult->id,
        ]);
    }
}
