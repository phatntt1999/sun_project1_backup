<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function images()
    {
        return $this->hasMany(Image::class, 'object_id', 'id');
    }
    public function tours()
    {
        return $this->belongsToMany(Tours::class, 'Booking_tour', 'id', 'id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'account_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'account_id', 'id');
    }
}
