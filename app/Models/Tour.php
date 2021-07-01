<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'num-of-participants',
        'cat_tour_id',
        'avgRate',
        'comment',
        'price',
    ];
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function category_tour()
    {
        return $this->belongsTo(Category_tour::class, 'id', 'id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'Booking_tour', 'id', 'id');
    }
}
