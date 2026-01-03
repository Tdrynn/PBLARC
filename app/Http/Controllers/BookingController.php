<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\Package;
use App\Models\Booking;
use App\Models\Addon;
use App\Models\BookingDetail;
use Carbon\Carbon;

class BookingController extends Controller
{
    /* ======================================================
     * CHECK AVAILABILITY
     * ====================================================== */
    public function checkAvailability(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'checkin'    => 'required|date',
            'checkout'   => 'nullable|date|after_or_equal:checkin',
        ]);

        session([
            'booking.package_id' => $request->package_id,
            'booking.checkin'    => $request->checkin,
            'booking.checkout'   => $request->checkout ?? $request->checkin,
        ]);

        return response()->json(['available' => true]);
    }

    /* ======================================================
     * STORE BOOKING
     * ====================================================== */
    public function store(Request $request)
    {
        if (!session()->has('booking.checkin')) {
            throw ValidationException::withMessages([
                'checkin' => 'Silakan cek availability terlebih dahulu'
            ]);
        }

        $request->validate([
            'package_id'   => 'required|exists:packages,id',
            'name'         => 'required|string|max:255',
            'telephone'    => 'required|string|max:20',
            'email'        => 'nullable|email',

            'participants' => 'nullable|integer|min:1',

            'tent_type'    => 'nullable|string',
            'tent_qty'     => 'nullable|integer|min:1',

            'van_qty'      => 'nullable|integer|min:1',

            'addons'       => 'nullable|array',
            'addons.*'     => 'integer|min:0',
        ]);

        $package  = Package::findOrFail(session('booking.package_id'));
        $checkin  = Carbon::parse(session('booking.checkin'));
        $checkout = Carbon::parse(session('booking.checkout'));
        $days     = max(1, $checkin->diffInDays($checkout));

        $booking = DB::transaction(function () use ($request, $package, $checkin, $checkout, $days) {

            $participants = $this->resolveParticipants($package, $request);

            $booking = Booking::create([
                'user_id'      => auth()->id(),
                'package_id'   => $package->id,
                'name'         => $request->name,
                'telephone'    => $request->telephone,
                'email'        => $request->email,
                'checkin'      => $checkin,
                'checkout'     => $checkout,
                'participants' => $participants,
                'total_price'  => 0,
                'status'       => 'pending',
            ]);

            $total = 0;

            /* ================= GROUP EVENT ================= */
            if ($package->slug === 'groupevent') {

                $price = $package->prices
                    ->where('name', 'Private Event')
                    ->first()
                    ?->price;

                if (!$price) {
                    throw ValidationException::withMessages([
                        'price' => 'Harga Group Event belum diset'
                    ]);
                }

                $subtotal = $price * $days;

                BookingDetail::create([
                    'booking_id' => $booking->id,
                    'item_type'  => 'package',
                    'item_name'  => "Private Event ({$days} night)",
                    'quantity'   => $days,
                    'price'      => $price,
                ]);

                $total += $subtotal;
            }
            
            /* ================= CAMPING ================= */
            if ($package->slug === 'camping') {

                $tentPrice = match ($request->tent_type) {
                    'tent_2p'   => 150000,
                    'tent_4p'   => 250000,
                    'bring_own' => 0,
                    default     => 0,
                };

                $tentName = match ($request->tent_type) {
                    'tent_2p' => 'Tent 2 Person',
                    'tent_4p' => 'Tent 4 Person',
                    default   => 'Bring Own Tent',
                };

                $qty = (int) $request->tent_qty;

                if ($tentPrice > 0 && $qty > 0) {

                    $total += $tentPrice * $qty * $days;

                    BookingDetail::create([
                        'booking_id' => $booking->id,
                        'item_type'  => 'tent',
                        'item_name'  => "{$tentName} ({$days} night)",
                        'quantity'   => $qty * $days,
                        'price'      => $tentPrice,
                    ]);
                }
            }

            /* ================= CAMPERVAN ================= */
            if ($package->slug === 'campervan') {

                $vans = (int) $request->van_qty;
                if ($vans < 1) {
                    throw ValidationException::withMessages([
                        'van_qty' => 'Minimal 1 campervan'
                    ]);
                }

                $prices = $package->prices->keyBy('name');
                $vanPrice         = $prices['van']->price ?? 0;
                $extraPersonPrice = $prices['extra_person']->price ?? 0;

                $capacityPerVan = 4;
                $extraPeople = max(0, $participants - ($vans * $capacityPerVan));

                $total += $vans * $vanPrice * $days;

                BookingDetail::create([
                    'booking_id' => $booking->id,
                    'item_type'  => 'campervan',
                    'item_name'  => "Campervan ({$days} night)",
                    'quantity'   => $vans * $days,
                    'price'      => $vanPrice,
                ]);

                if ($extraPeople > 0) {
                    $total += $extraPeople * $extraPersonPrice * $days;

                    BookingDetail::create([
                        'booking_id' => $booking->id,
                        'item_type'  => 'campervan',
                        'item_name'  => "Extra Person ({$days} night)",
                        'quantity'   => $extraPeople * $days,
                        'price'      => $extraPersonPrice,
                    ]);
                }
            }

            /* ================= ADDONS ================= */
            if ($request->filled('addons')) {
                foreach ($request->addons as $addonId => $qty) {

                    if ($qty <= 0) continue;

                    $addon = Addon::lockForUpdate()->findOrFail($addonId);

                    if ($qty > $addon->stock) {
                        throw ValidationException::withMessages([
                            "addons.$addonId" => "Stok {$addon->name} tidak mencukupi"
                        ]);
                    }

                    $total += $addon->price * $qty * $days;

                    BookingDetail::create([
                        'booking_id' => $booking->id,
                        'item_type'  => 'addon',
                        'item_name'  => "{$addon->name} ({$days} night)",
                        'quantity'   => $qty * $days,
                        'price'      => $addon->price,
                    ]);

                    $addon->decrement('stock', $qty);
                }
            }

            $booking->update(['total_price' => $total]);

            return $booking;
        });

        session()->forget('booking');

        return redirect()
            ->route('payment.page', $booking->id)
            ->with('success', 'Booking berhasil dibuat');
    }

    /* ======================================================
     * PARTICIPANTS
     * ====================================================== */
    private function resolveParticipants(Package $package, Request $request): int
    {
        // Campervan wajib participants
        if ($package->slug === 'campervan') {
            if (!$request->participants || $request->participants < 1) {
                throw ValidationException::withMessages([
                    'participants' => 'Participants wajib diisi'
                ]);
            }
            return (int) $request->participants;
        }

        // Camping & Group Event
        return (int) ($request->participants ?? 1);
    }

}
