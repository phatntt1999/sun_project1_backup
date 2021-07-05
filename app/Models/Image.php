<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'object_type',
        'object_id',
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'object_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'object_id', 'id');
    }
    public function review()
    {
        return $this->belongsTo(Review::class, 'object_id', 'id');
    }
}
