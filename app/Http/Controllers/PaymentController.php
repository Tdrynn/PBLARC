<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Midtrans\Snap;

class PaymentController extends Controller
{
    /**
     * Helper: data yang selalu dibutuhkan halaman payment
     */
    private function paymentViewData(Booking $booking)
    {
        $booking->load(['package', 'addons', 'details']);

        $checkin  = Carbon::parse($booking->checkin);
        $checkout = Carbon::parse($booking->checkout);

        return [
            'booking'  => $booking,
            'package'  => $booking->package,
            'addons'   => $booking->addons,
            'details'  => $booking->details,
            'duration' => max(1, $checkin->diffInDays($checkout)),
        ];
    }

    /**
     * Halaman payment (Snap pertama kali)
     */
    public function page(Booking $booking)
    {
        if ($booking->total_price <= 0) {
            abort(404);
        }

        return view('user.payment', $this->paymentViewData($booking));
    }

    /**
     * Payment success
     */
    public function success(Booking $booking)
    {
        if ($booking->payment_status === 'paid') {
            return view('user.payment_success', $this->paymentViewData($booking));
        }

        return redirect()->route('payment.pending', $booking->id);
    }

    /**
     * Payment pending
     */
    public function pending(Booking $booking)
    {
        return view('user.payment_pending', $this->paymentViewData($booking));
    }

    /**
     * Payment failed
     */
    public function failed(Booking $booking)
    {
        return view('user.payment_failed', $this->paymentViewData($booking));
    }
}
