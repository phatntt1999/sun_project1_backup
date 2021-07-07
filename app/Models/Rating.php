<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'status',
        'tour_id',
        'account_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function getAverageRating($id)
    {
        $Avg = Rating::all()->where('tour_id', $id)->where('status', 1);
        $average = 0;
        if ($Avg) {
            $ArrRating = [];
            foreach ($Avg as $ad) {

                $ArrRating[] = $ad->rating;
            }
            return $average = collect($ArrRating)->avg();
        }
        return $average = 0;
    }
}
