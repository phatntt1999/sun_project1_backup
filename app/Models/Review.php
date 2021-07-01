<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content1',
        'content2',
        'content3',
        'status-public',
        'account-id',
        'category_review_id',
    ];
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function category_review()
    {
        return $this->belongsTo(Category_review::class, 'id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'account-id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'review-id', 'id');
    }
}
