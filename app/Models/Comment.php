<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'account_id',
        'content',
        'comment_parent_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'account_id', 'id');
    }

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_parent_id', 'id');
    }
}
