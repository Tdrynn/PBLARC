<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Addon;

class GroupEventController extends Controller
{
    public function index()
    {
        $package = Package::where('slug', 'groupevent')->firstOrFail();

        return view('user.groupEvent', compact('package'));
    }
    public function bookingForm(Request $request)
    {
        $package = Package::where('slug', 'groupevent')->firstOrFail();
        $addons  = Addon::where('is_active', true)->get();

        return view('user.booking_groupEvent', compact('package','addons'));
    }
}
