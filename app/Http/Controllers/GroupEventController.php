<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Addon;
use App\Models\Image;

class GroupEventController extends Controller
{
    public function index()
    {
        $package = Package::where('slug', 'groupevent')->firstOrFail();
        $images = Image::where('page', 'camperVan')->get();

        return view('user.groupEvent', compact('package', 'images'));
    }
    public function bookingForm(Request $request)
    {
        $package = Package::where('slug', 'groupevent')->firstOrFail();
        $addons  = Addon::where('is_active', true)->get();

        return view('user.booking_groupEvent', compact('package','addons'));
    }
}
