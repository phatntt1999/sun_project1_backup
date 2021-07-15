<?php

namespace App\Http\Controllers;

use App\Models\BookingTour;
use App\Models\Tour;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class BookingTourController extends Controller
{
    public function showBookingTour(Request $request)
    {
        $user = Auth::user();
        $selectedTour = Tour::find($request->tour);
        return view('booking.booking_form', [
            'user' => $user,
            'selectedTour' => $selectedTour,
        ]);
    }
    public function storeBookingTour(Request $request)
    {
        $accountId = Auth::user()->id;
        $inputDateStart = strtotime($request->dateStart);
        $dateStart = date('Y-m-d', $inputDateStart);
        $status = 0;

        $storeDataBooking = BookingTour::create([
            'tour_id' => $request->tourId,
            'account_id' => $accountId,
            'duration' => $request->duration,
            'total_price' => $request->totalPrice,
            'booking_start_date' => $dateStart,
            'status' => $status,
            'quantity' => $request->quantity,
        ]);

        return view('booking.vnp_payment', [
            'totalPrice' => $storeDataBooking->total_price,
            'bookingId' => $storeDataBooking->id,
        ]);
    }
}
