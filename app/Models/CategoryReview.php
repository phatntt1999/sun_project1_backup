<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'name-rv-cat',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'category_review_id', 'id');
    }
}
