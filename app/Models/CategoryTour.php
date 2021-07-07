<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name',
    ];
    public function tours()
    {
        return $this->hasMany(Tour::class, 'cat_tour_id', 'id');
    }
}
