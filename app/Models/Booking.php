<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'name',
        'telephone',
        'email',
        'checkin',
        'checkout',
        'participants',
        'total_price',
        'order_id',
        'snap_token',
        'payment_status',
        'status',
    ];

    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function details()
    {
        return $this->hasMany(BookingDetail::class);
    }

    public function addons()
    {
        return $this->belongsToMany(Addon::class, 'booking_addons')
                    ->withPivot('quantity','price')
                    ->withTimestamps();
    }

    protected $casts = [
        'checkin'  => 'date',
        'checkout' => 'date',
    ];

}

