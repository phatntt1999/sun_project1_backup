<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'count_like',
        'account_id',
        'category_review_id',
    ];
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function category_review()
    {
        return $this->belongsTo(CategoryReview::class, 'category_review_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'account_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'review_id', 'id');
    }
}
