<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagePrice extends Model
{
    protected $fillable = ['package_id','name','day_type','price'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}

