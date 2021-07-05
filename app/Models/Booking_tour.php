<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'booking_start_date',
        'status',
        'quantity',
        'tour_id',
        'account_id',
    ];
}
