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
    /**
     * ======================================================
     * CHECK AVAILABILITY (AJAX)
     * ======================================================
     */
    public function checkAvailability(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'checkin'    => 'required|date',
            'checkout'   => 'nullable|date|after_or_equal:checkin',
        ]);

        $package  = Package::findOrFail($request->package_id);
        $checkin  = Carbon::parse($request->checkin);
        $checkout = $request->checkout
            ? Carbon::parse($request->checkout)
            : $checkin;

        $result = $this->isAvailable($package, $checkin, $checkout);

        // ✅ SIMPAN KE SESSION JIKA AVAILABLE
        if ($result['available'] === true) {
            session([
                'booking.package_id' => $package->id,
                'booking.checkin'    => $checkin->toDateString(),
                'booking.checkout'   => $checkout->toDateString(),
            ]);
        }

        return response()->json($result);
    }

    /**
     * ======================================================
     * STORE BOOKING
     * ======================================================
     */
    public function store(Request $request)
    {
        /**
         * =========================
         * SESSION GUARD
         * =========================
         */
        if (!session()->has('booking.checkin')) {
            throw ValidationException::withMessages([
                'checkin' => 'Silakan cek availability terlebih dahulu'
            ]);
        }

        /**
         * =========================
         * BASE VALIDATION
         * =========================
         */
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'name'       => 'required|string|max:255',
            'telephone'  => 'required|string|max:20',
            'email'      => 'nullable|email',

            // picnic
            'adult_qty'  => 'nullable|integer|min:0',
            'child_qty'  => 'nullable|integer|min:0',

            // camping
            'tent_type'  => 'nullable|string',
            'tent_qty'   => 'nullable|integer|min:1',

            // campervan & group
            'van_qty'      => 'nullable|integer|min:1',
            'participants' => 'nullable|integer|min:1',

            // addons
            'addons'     => 'nullable|array',
            'addons.*'   => 'integer|min:0',
        ]);

        /**
         * =========================
         * GET TRUSTED DATA
         * =========================
         */
        $package  = Package::findOrFail(session('booking.package_id'));
        $checkin  = Carbon::parse(session('booking.checkin'));
        $checkout = Carbon::parse(session('booking.checkout'));

        /**
         * =========================
         * AVAILABILITY RE-CHECK
         * =========================
         */
        $availability = $this->isAvailable($package, $checkin, $checkout);

        if ($availability['available'] === false) {
            throw ValidationException::withMessages([
                'checkin' => $availability['message']
            ]);
        }

        /**
         * =========================
         * DATABASE TRANSACTION
         * =========================
         */
        DB::transaction(function () use ($request, $package, $checkin, $checkout) {

            /**
             * =========================
             * PARTICIPANTS LOGIC
             * =========================
             */
            $participants = $this->resolveParticipants($package, $request);

            if ($package->slug === 'camping') {

                $capacityPerTent = match ($request->tent_type) {
                    'tent_2p' => 2,
                    'tent_4p' => 4,
                    'bring_own' => 2, // asumsi default
                    default => 0,
                };

                $maxCapacity = $capacityPerTent * $request->tent_qty;

                if ($participants > $maxCapacity) {
                    throw ValidationException::withMessages([
                        'participants' => 'Jumlah peserta melebihi kapasitas tenda. Silakan tambah jumlah tenda.'
                    ]);
                }
            }

            /**
             * =========================
             * CREATE BOOKING
             * =========================
             */
            $booking = Booking::create([
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

            /**
             * =========================
             * CALCULATE PACKAGE PRICE
             * =========================
             */
            $totalPrice = $this->calculatePackagePrice(
                $booking,
                $package,
                $request,
                $checkin,
                $checkout,
                $participants
            );

            /**
             * =========================
             * ADDONS
             * =========================
             */
            $totalPrice += $this->handleAddons($booking, $request);

            /**
             * =========================
             * UPDATE TOTAL PRICE
             * =========================
             */
            $booking->update([
                'total_price' => $totalPrice
            ]);
        });

        // ✅ BERSIHKAN SESSION
        session()->forget('booking');

        return redirect()
            ->route('package')
            ->with('success', 'Booking berhasil dibuat');
    }

    /**
     * ======================================================
     * CHECK AVAILABILITY LOGIC
     * ======================================================
     */
    private function isAvailable(
        Package $package,
        Carbon $checkin,
        Carbon $checkout
    ): array {

        // ❌ Group Event bentrok paket lain
        if ($package->slug === 'groupevent') {

            $conflict = Booking::whereHas('package', function ($q) {
                    $q->where('slug', '!=', 'groupevent');
                })
                ->where(function ($q) use ($checkin, $checkout) {
                    $q->whereBetween('checkin', [$checkin, $checkout])
                      ->orWhereBetween('checkout', [$checkin, $checkout])
                      ->orWhere(function ($sub) use ($checkin, $checkout) {
                          $sub->where('checkin', '<=', $checkin)
                              ->where('checkout', '>=', $checkout);
                      });
                })
                ->exists();

            if ($conflict) {
                return [
                    'available' => false,
                    'message'   => 'Tanggal ini sudah ada booking paket lain.'
                ];
            }
        }

        // ❌ Paket lain bentrok Group Event
        if ($package->slug !== 'groupevent') {

            $conflict = Booking::whereHas('package', function ($q) {
                    $q->where('slug', 'groupevent');
                })
                ->where(function ($q) use ($checkin, $checkout) {
                    $q->whereBetween('checkin', [$checkin, $checkout])
                      ->orWhereBetween('checkout', [$checkin, $checkout])
                      ->orWhere(function ($sub) use ($checkin, $checkout) {
                          $sub->where('checkin', '<=', $checkin)
                              ->where('checkout', '>=', $checkout);
                      });
                })
                ->exists();

            if ($conflict) {
                return [
                    'available' => false,
                    'message'   => 'Tanggal ini sudah dibooking untuk Group Event.'
                ];
            }
        }

        return ['available' => true];
    }

    /**
     * ======================================================
     * PARTICIPANTS RESOLVER
     * ======================================================
     */
    private function resolveParticipants(Package $package, Request $request): int
    {
        if ($package->slug === 'picnic') {
            $total = ($request->adult_qty ?? 0) + ($request->child_qty ?? 0);

            if ($total < 1) {
                throw ValidationException::withMessages([
                    'adult_qty' => 'Minimal 1 peserta picnic'
                ]);
            }

            return $total;
        }

        if (in_array($package->slug, ['campervan', 'groupevent', 'camping'])) {
            if (!$request->participants) {
                throw ValidationException::withMessages([
                    'participants' => 'Participants wajib diisi'
                ]);
            }
            return $request->participants;
        }

        return 1;
    }

    /**
     * ======================================================
     * PACKAGE PRICE CALCULATOR
     * ======================================================
     */
    private function calculatePackagePrice(
        Booking $booking,
        Package $package,
        Request $request,
        Carbon $checkin,
        Carbon $checkout,
        int $participants
    ): int {

        $total = 0;

        switch ($package->slug) {
            case 'picnic':

            $adultQty = (int) $request->adult_qty;
            $childQty = (int) $request->child_qty;

            if ($adultQty < 1 && $childQty < 1) {
                throw ValidationException::withMessages([
                    'adult_qty' => 'Minimal 1 peserta picnic'
                ]);
            }

            if ($adultQty > 0) {
                $adultPrice = 15000;
                $total += $adultQty * $adultPrice;

                BookingDetail::create([
                    'booking_id' => $booking->id,
                    'item_type'  => 'picnic',
                    'item_name'  => 'Adult',
                    'quantity'   => $adultQty,
                    'price'      => $adultPrice,
                ]);
            }

            if ($childQty > 0) {
                $childPrice = 10000;
                $total += $childQty * $childPrice;

                BookingDetail::create([
                    'booking_id' => $booking->id,
                    'item_type'  => 'picnic',
                    'item_name'  => 'Child',
                    'quantity'   => $childQty,
                    'price'      => $childPrice,
                ]);
            }

            case 'camping':
                if ($request->tent_type && $request->tent_qty) {

                    $tentPrice = match ($request->tent_type) {
                        'bring_own' => 0,
                        'tent_2p'   => 150000,
                        'tent_4p'   => 250000,
                        default     => 0,
                    };

                    $days = max(1, $checkin->diffInDays($checkout));

                    $total += $tentPrice * $request->tent_qty * $days;

                    BookingDetail::create([
                        'booking_id' => $booking->id,
                        'item_type'  => 'tent',
                        'item_name'  => 'Tent - ' . $request->tent_type,
                        'quantity'   => $request->tent_qty,
                        'price'      => $tentPrice,
                    ]);
                }
                break;

            case 'campervan':

    $days = max(1, $checkin->diffInDays($checkout));
    $vans = (int) $request->van_qty;

    if ($vans < 1) {
        throw ValidationException::withMessages([
            'van_qty' => 'Minimal 1 campervan'
        ]);
    }

    // ambil harga dari DB
    $prices = $package->prices->keyBy('name');

    $vanPrice         = $prices['van']->price ?? 0;
    $extraPersonPrice = $prices['extra_person']->price ?? 0;

    if ($vanPrice === 0) {
        throw new \Exception('Harga van belum diset di package_prices');
    }

    $capacityPerVan = 4;
    $maxCapacity    = $vans * $capacityPerVan;
    $extraPeople    = max(0, $participants - $maxCapacity);

    // harga van
    $total += $vans * $vanPrice * $days;

    BookingDetail::create([
        'booking_id' => $booking->id,
        'item_type'  => 'campervan',
        'item_name'  => 'Campervan',
        'quantity'   => $vans,
        'price'      => $vanPrice,
    ]);

    // harga extra person
    if ($extraPeople > 0 && $extraPersonPrice > 0) {

        $total += $extraPeople * $extraPersonPrice * $days;

        BookingDetail::create([
            'booking_id' => $booking->id,
            'item_type'  => 'campervan',
            'item_name'  => 'Extra Person',
            'quantity'   => $extraPeople,
            'price'      => $extraPersonPrice,
        ]);
    }

    break;

            case 'groupevent':
                $total += 2500000;
                break;
        }

        return $total;
    }

    /**
     * ======================================================
     * ADDONS HANDLER
     * ======================================================
     */
    private function handleAddons(Booking $booking, Request $request): int
    {
        $total = 0;

        if (!$request->filled('addons')) {
            return 0;
        }

        foreach ($request->addons as $addonId => $qty) {

            if (!$qty || $qty <= 0) {
                continue;
            }

            $addon = Addon::lockForUpdate()->findOrFail($addonId);

            /**
             * =========================
             * STOCK VALIDATION
             * =========================
             */
            if ($qty > $addon->stock) {
                throw ValidationException::withMessages([
                    "addons.$addonId" => "Stok {$addon->name} tidak mencukupi"
                ]);
            }

            /**
             * =========================
             * SAVE TO PIVOT TABLE
             * =========================
             */
            $booking->addons()->attach($addon->id, [
                'quantity' => $qty,
                'price'    => $addon->price,
            ]);

            /**
             * =========================
             * SAVE TO BOOKING DETAILS
             * =========================
             */
            BookingDetail::create([
                'booking_id' => $booking->id,
                'item_type'  => 'addon',
                'item_name'  => $addon->name,
                'quantity'   => $qty,
                'price'      => $addon->price,
            ]);

            $addon->decrement('stock', $qty);

            $total += $addon->price * $qty;
        }

        return $total;
    }

    public function calculatePrice(Request $request)
    {
        $package = Package::findOrFail($request->package_id);
        $total = 0;

        /* ===== PICNIC ===== */
        if ($package->slug === 'picnic') {

            $adultQty = (int) $request->adult_qty;
            $childQty = (int) $request->child_qty;

            $total += $adultQty * 15000; // adult
            $total += $childQty * 10000; // child
        }

        /* ===== CAMPING ===== */
        if ($package->slug === 'camping') {

            if ($request->tent_type && $request->tent_qty) {

                $pricePerTent = match ($request->tent_type) {
                    'tent_2p' => 150000,
                    'tent_4p' => 250000,
                    default => 0,
                };

                $total += $pricePerTent * $request->tent_qty;
            }
        }

        /* ===== ADDONS ===== */
        if ($request->addons) {
            foreach ($request->addons as $addonId => $qty) {

                if ($qty <= 0) continue;

                $addon = Addon::find($addonId);
                if (!$addon) continue;

                $total += $addon->price * $qty;
            }
        }

        return response()->json([
            'total' => $total
        ]);
    }

}
