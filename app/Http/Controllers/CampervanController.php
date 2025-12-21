<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Addon;
use App\Models\PackageAvailability;
use App\Models\Image;

class CampervanController extends Controller
{
    public function index()
    {
        $package = Package::where('slug', 'campervan')->firstOrFail();
        $images = Image::where('page', 'camperVan')->get();

        return view('user.campervan', compact('package', 'images'));
    }
    public function bookingForm(Request $request)
    {
        $package = Package::where('slug', 'campervan')->firstOrFail();
        $addons  = Addon::where('is_active', true)->get();

        return view('user.booking_campervan', compact('package','addons'));
    }
}
