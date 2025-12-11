<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $table = 'addons';

    protected $fillable = ['name', 'price', 'stock'];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_addons')
                    ->withPivot('quantity');
    }
}
