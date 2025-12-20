<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name','slug','type','capacity','block_other_packages','is_active'
    ];

    public function prices()
    {
        return $this->hasMany(PackagePrice::class);
    }

    public function availabilities()
    {
        return $this->hasMany(PackageAvailability::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

