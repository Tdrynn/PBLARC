<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Halaman payment (Snap Button)
     */
    public function page(Booking $booking)
    {
        // proteksi
        if ($booking->total_price <= 0) {
            abort(404);
        }

        $checkin  = Carbon::parse($booking->checkin);
        $checkout = Carbon::parse($booking->checkout);

        return view('user.payment', [
            'booking'  => $booking,
            'package'  => $booking->package,
            'details'  => $booking->bookingDetails,
            'addons'   => $booking->addons,
            'duration' => max(1, $checkin->diffInDays($checkout)),
        ]);
    }

    /**
     * Redirect setelah sukses
     */
    public function success(Booking $booking)
    {
        return view('user.payment_success', compact('booking'));
    }

    /**
     * Redirect jika pending
     */
    public function pending(Booking $booking)
    {
        return view('user.payment_pending', compact('booking'));
    }
}
