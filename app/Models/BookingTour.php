<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTour extends Model
{
    use HasFactory;

    protected $table = 'booking_tours';

    protected $fillable = [
        'total_price',
        'booking_start_date',
        'status',
        'quantity',
        'duration',
        'tour_id',
        'account_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'account_id', 'id');
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
