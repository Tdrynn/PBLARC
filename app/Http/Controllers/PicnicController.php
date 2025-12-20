<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Addon;
use App\Models\PackageAvailability;

class PicnicController extends Controller
{
    
    public function index()
    {
        $package = Package::where('slug', 'picnic')->firstOrFail();
        $addons  = Addon::where('is_active', true)->get();

        return view('user.picnic', compact('package', 'addons'));
    }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'checkin' => 'required|date',
        ]);

        $package = Package::where('slug', 'picnic')->firstOrFail();

        $available = PackageAvailability::where('package_id', $package->id)
            ->where('date', $request->checkin)
            ->where('capacity', '>', 0)
            ->exists();

        return back()->with('available', $available);
    }

    public function bookingForm(Request $request)
    {
        $package = Package::where('slug', 'picnic')->firstOrFail();
        $addons  = Addon::where('is_active', true)->get();

        return view('user.booking_picnic', compact('package','addons'));
    }
}
