<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageAvailability extends Model
{
    protected $fillable = ['package_id', 'date', 'capacity'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
