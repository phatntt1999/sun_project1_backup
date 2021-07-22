<?php

namespace App\Console\Commands;

use App\Models\BookingTour;
use App\Models\User;
use App\Notifications\NotifyInprogressBooking;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class InprocessBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:ConfirmationInprocess';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notification about inprocessing comfirm to Admin at 17:00 everyday.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $admins = User::where('role', '=', 'admin')->get();
        // foreach ($admins as $admin) {
        //     $admin->notify(new NotifyInprogressBooking());
        // }

        $getInprocessBooking = BookingTour::where('status', config('app.pending'))->get();
        $amount = count($getInprocessBooking);

        if ($amount == 0) {
            $data = ["All orders have been processed."];
        } else {
            $data = ["There are $amount inprocessing bookings left. Please confirm them!"];
        }

        $user = User::where('role', 'admin')->get();

        Notification::send($user, new NotifyInprogressBooking($data));
    }
}
