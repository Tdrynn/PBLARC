<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Notification;
use App\Models\Booking;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createSnapToken($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        if ($booking->total_price <= 0) {
            abort(400, 'Invalid amount');
        }

        $params = [
            'transaction_details' => [
                'order_id'     => 'BOOK-' . $booking->id . '-' . time(),
                'gross_amount' => $booking->total_price,
            ],
            'customer_details' => [
                'first_name' => $booking->name,
                'email'      => $booking->email,
                'phone'      => $booking->telephone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $booking->update([
            'snap_token' => $snapToken,
        ]);

        return response()->json([
            'snap_token' => $snapToken
        ]);
    }

    private function createMidtransTransaction(Booking $booking)
    {
        $params = [
            'transaction_details' => [
                'order_id' => 'BOOK-' . $booking->id . '-' . time(),
                'gross_amount' => $booking->total_price,
            ],
            'customer_details' => [
                'first_name' => $booking->name,
                'email' => $booking->email,
                'phone' => $booking->telephone,
            ],
        ];

        return Snap::getSnapToken($params);
    }

    public function handle(Request $request)
    {
        $notif = new Notification();

        $orderId = $notif->order_id;
        $transactionStatus = $notif->transaction_status;
        $paymentType = $notif->payment_type;

        $bookingId = explode('-', $orderId)[1];
        $booking = Booking::findOrFail($bookingId);

        if (in_array($transactionStatus, ['settlement', 'capture'])) {
            $booking->update([
                'payment_status' => 'paid'
            ]);
        } elseif ($transactionStatus === 'pending') {
            $booking->update([
                'payment_status' => 'pending'
            ]);
        } else {
            $booking->update([
                'payment_status' => 'failed'
            ]);
        }

        return response()->json(['status' => 'ok']);
    }

}
