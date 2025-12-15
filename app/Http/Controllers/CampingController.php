<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Addon;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class CampingController extends Controller
{
    public function checkAvailability(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'checkin'    => 'required|date',
            'checkout'   => 'required|date|after_or_equal:checkin',
            'tent'       => 'required|integer|min:1',
        ]);

        $package_id = $request->package_id;
        $package = Package::findOrFail($package_id);

        $period = CarbonPeriod::create($request->checkin, $request->checkout);

        foreach ($period as $date) {
            $d = $date->format('Y-m-d');

            $usedTent = Booking::where('package_id', $package_id)
                ->whereDate('checkin', '<=', $d)
                ->whereDate('checkout', '>', $d) // 🔥 PERBAIKAN
                ->sum('tent');

            if (($usedTent + $request->tent) > $package->capacity) {
                return response()->json([
                    'available' => false,
                    'message'   => "Tanggal $d penuh"
                ]);
            }
        }

        return response()->json([
            'available' => true,
            'message'   => 'Tanggal tersedia'
        ]);
    }

    public function store(Request $request, $package_id)
    {
        // 1️⃣ Ambil package dari URL param
        $package = Package::findOrFail($package_id);

        // 2️⃣ VALIDASI FORM (JANGAN VALIDASI package_id)
        $request->validate([
            'name'         => 'required|string|max:255',
            'telephone'    => 'required|string|max:20',
            'email'        => 'nullable|email',
            'participants' => 'required|integer|min:1',
            'tent'         => 'required|integer|min:1',
            'checkin'      => 'required|date',
            'checkout'     => 'required|date|after:checkin',
        ]);

        // 3️⃣ CEK AVAILABILITY ULANG (ANTI RACE CONDITION)
        $period = CarbonPeriod::create($request->checkin, $request->checkout);

        foreach ($period as $date) {
            $d = $date->format('Y-m-d');

            $usedTent = Booking::where('package_id', $package_id)
                ->whereDate('checkin', '<=', $d)
                ->whereDate('checkout', '>', $d) // ✅ FIX OVERLAP
                ->sum('tent');

            if (($usedTent + $request->tent) > $package->capacity) {
                return back()->with('error',
                    "Tanggal $d tidak tersedia. Sisa kapasitas: " . ($package->capacity - $usedTent)
                );
            }
        }

        // 4️⃣ SIMPAN KE DATABASE
        DB::beginTransaction();

        try {
            $booking = Booking::create([
                'package_id'   => $package_id,
                'name'         => $request->name,
                'telephone'    => $request->telephone,
                'email'        => $request->email,
                'participants' => $request->participants,
                'tent'         => $request->tent,
                'checkin'      => $request->checkin,
                'checkout'     => $request->checkout,
                'total_price'  => $package->price, // sementara
            ]);

            DB::commit();

            return redirect()
                ->route('booking.camping', $package_id)
                ->with('success', 'Booking berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }


    public function bookingForm($package_id)
    {
        $package = Package::findOrFail($package_id);
        return view('user.booking_camping', compact('package'));
    }
}
