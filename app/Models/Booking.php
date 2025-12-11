<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'package_id',
        'name',
        'telephone',
        'email',
        'participants',
        'tent',
        'checkin',
        'checkout',
        'total_price',
    ];

    public function addons()
    {
        return $this->belongsToMany(Addon::class, 'booking_addons', 'booking_id', 'addon_id')
                    ->withPivot('quantity');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
