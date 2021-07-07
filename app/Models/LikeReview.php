<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'account_id',
        'like_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'account_id', 'id');
    }
    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }
}
