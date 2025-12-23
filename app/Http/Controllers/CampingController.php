<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Addon;
use App\Models\PackageAvailability;
use App\Models\Image;

class CampingController extends Controller
{
    public function index()
    {
        $package = Package::where('slug', 'camping')->firstOrFail();
        $images = Image::where('page', 'camping')->get();

        return view('user.camping', compact('package', 'images'));
    }

    public function bookingForm(Request $request)
    {
        $package = Package::where('slug', 'camping')->firstOrFail();
        $addons  = Addon::where('is_active', true)->get();

        return view('user.booking_camping', compact('package', 'addons'));
    }
}
