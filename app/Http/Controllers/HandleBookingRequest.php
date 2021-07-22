<?php

namespace App\Http\Controllers;

use App\Events\BookingEvent;
use App\Repositories\BookingTour\BookingRepositoryInterface;
use Illuminate\Http\Request;

class HandleBookingRequest extends Controller
{
    protected $bookingRepo;
    public function __construct(BookingRepositoryInterface $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function getBookingRequest()
    {
        $bookingReqs = $this->bookingRepo->getNotApprovedBookingRequest();
        // dd($bookingReqs);
        return view('admin.processBooking', [
            'bookingReqs' => $bookingReqs,
        ]);
    }

    public function approveBookingRequest($id)
    {
        $this->bookingRepo->approved($id);

        $title = "Your booking notification";
        $content = 'Your booking was approved by admin. Have a nice day!';

        // $data = [
        //     'title' => $title,
        //     'content' => $content,
        // ];
        $data = $content;

        event(new BookingEvent($data));

        return redirect()->back()->with('msg_success', trans('messages.approved_booking_request'));
    }
    public function rejectBookingRequest($id)
    {
        $booking = $this->bookingRepo->reject($id);

        return redirect()->back()->with('msg_reject', trans('messages.rejected_booking_request'));
    }
}
