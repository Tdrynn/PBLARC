<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Halaman payment (Snap Button)
     */
    public function page(Booking $booking)
    {
        // cegah bayar ulang
        if ($booking->payment_status === 'paid') {
            return redirect()
                ->route('booking.success', $booking->id);
        }

        return view('user.booking_payment', compact('booking'));
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
