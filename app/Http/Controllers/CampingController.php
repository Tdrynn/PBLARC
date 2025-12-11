<?php

    namespace App\Http\Controllers;

    use App\Models\Booking;
    use App\Models\Package;
    use App\Models\Addon;
    use Illuminate\Http\Request;
    use Carbon\Carbon;
    use Carbon\CarbonPeriod;

    class CampingController extends Controller
    {
        /**
         * Cek ketersediaan tanggal berdasarkan package_id
         */
        public function checkAvailability(Request $request, $package_id)
        {
            $request->validate([
                'checkin'   => 'required|date',
                'checkout'  => 'required|date|after_or_equal:checkin',
            ]);

            $package = Package::findOrFail($package_id);

            // Jika paket single-day, paksa checkout = checkin
            if ($package->is_single_day) {
                $request->merge(['checkout' => $request->checkin]);
            }

            $period = CarbonPeriod::create($request->checkin, $request->checkout);

            foreach ($period as $date) {
                $d = $date->format('Y-m-d');

                // 1️⃣ Jika ada group event di tanggal tersebut → semua paket penuh
                $groupBooked = Booking::whereHas('package', function ($q) {
                    $q->where('block_other_packages', true);
                })
                ->whereDate('checkin', '<=', $d)
                ->whereDate('checkout', '>=', $d)
                ->exists();

                if ($groupBooked && !$package->block_other_packages) {
                    return response()->json([
                        'available' => false,
                        'message'   => "Tanggal $d tidak tersedia karena ada booking Group Event."
                    ]);
                }

                // 2️⃣ Hitung total booking yang bentrok untuk paket ini
                $bookedCount = Booking::where('package_id', $package_id)
                    ->whereDate('checkin', '<=', $d)
                    ->whereDate('checkout', '>=', $d)
                    ->count();

                // 3️⃣ Cek kapasitas
                if ($bookedCount >= $package->capacity) {
                    return response()->json([
                        'available' => false,
                        'message'   => "Tanggal $d penuh."
                    ]);
                }
            }

            return response()->json([
                'available' => true,
                'message'   => "Tanggal tersedia."
            ]);
        }

        /**
         * Simpan Booking
         */
        public function store(Request $request, $package_id)
        {
            $package = Package::findOrFail($package_id);

            $request->validate([
                'name'          => 'required|string|max:255',
                'telephone'     => 'required|string|max:20',
                'email'         => 'nullable|email',
                'participants'  => 'required|integer|min:1',
                'tent'          => 'nullable|string|max:255',
                'checkin'       => 'required|date',
                'checkout'      => 'required|date|after_or_equal:checkin',
            ]);

            // PICNIC: hanya 1 hari
            if ($package->is_single_day) {
                $request->merge(['checkout' => $request->checkin]);
            }

            // Simpan booking
            $booking = Booking::create([
                'package_id'    => $package_id,
                'name'          => $request->name,
                'telephone'     => $request->telephone,
                'email'         => $request->email,
                'participants'  => $request->participants,
                'tent'          => $request->tent,
                'checkin'       => $request->checkin,
                'checkout'      => $request->checkout,
            ]);

            // Handle addons (sama seperti sebelumnya)
            $addons = $request->addons ?? [];
            $totalAddons = 0;

            foreach ($addons as $addonId => $qty) {
                if ($qty > 0) {

                    $addon = Addon::find($addonId);
                    if (!$addon) continue;

                    if ($addon->stock < $qty) {
                        return redirect()->back()->with('error', "Stok addon {$addon->name} tidak cukup!");
                    }

                    $booking->addons()->attach($addonId, [
                        'quantity' => $qty
                    ]);

                    $addon->stock -= $qty;
                    $addon->save();

                    $totalAddons += $addon->price * $qty;
                }
            }

            // hitung total
            $booking->update([
                'total_price' => $package->price + $totalAddons
            ]);

            return redirect()->back()->with('success', 'Booking berhasil dibuat!');
        }

        public function bookingForm($package_id)
        {
            $package = Package::findOrFail($package_id);
            return view('user.booking_camping', compact('package'));
        }
    }
