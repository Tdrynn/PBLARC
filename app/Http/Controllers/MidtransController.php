<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = false; // sandbox
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // ============================
    // CREATE SNAP TOKEN
    // ============================
    public function createSnapToken($bookingId)
    {
        $booking = Booking::with('details')->findOrFail($bookingId);

        if ($booking->payment_status !== 'paid') {
            $booking->order_id = 'BOOK-' . $booking->id . '-' . time();
            $booking->save();
        }

        $itemDetails = [];
        $grossAmount = 0;

        foreach ($booking->details as $i => $item) {

            $price = (int) $item->price;
            $qty   = (int) $item->quantity;

            $itemDetails[] = [
                'id'       => 'ITEM-' . $booking->id . '-' . $i,
                'price'    => $price,
                'quantity' => $qty,
                'name'     => substr($item->item_name, 0, 50),
                'category' => $item->item_type,
            ];

            $grossAmount += $price * $qty;
        }

        $params = [
            'transaction_details' => [
                'order_id'     => $booking->order_id,
                'gross_amount' => $grossAmount,
            ],
            'item_details' => $itemDetails,
            'customer_details' => [
                'first_name' => $booking->name,
                'email'      => $booking->email ?? 'guest@example.com',
                'phone'      => $booking->telephone,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $booking->update([
            'snap_token' => $snapToken,
            'total_price' => $grossAmount, // sinkronkan
        ]);

        return response()->json([
            'snap_token' => $snapToken
        ]);
    }





    // ============================
    // MIDTRANS WEBHOOK
    // ============================
    public function notification(Request $request)
    {
        try {
            $notif = new Notification();

            $orderId = $notif->order_id;
            $status  = $notif->transaction_status;

            $booking = Booking::where('order_id', $orderId)->first();

            if (!$booking) {
                return response()->json(['error' => 'Booking not found'], 404);
            }

            match ($status) {
                'capture', 'settlement' => $booking->update([
                    'payment_status' => 'paid',
                    'status' => 'confirmed',
                ]),
                'pending' => $booking->update([
                    'payment_status' => 'pending',
                ]),
                'deny', 'expire', 'cancel' => $booking->update([
                    'payment_status' => 'failed',
                    'status' => 'cancelled',
                ]),
            };

            return response()->json(['status' => 'ok']);

        } catch (\Throwable $e) {
            Log::error('MIDTRANS WEBHOOK ERROR', [
                'message' => $e->getMessage(),
                'payload' => $request->all(),
            ]);

            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function retry(Booking $booking)
    {
        // 🚨 WAJIB order_id BARU
        $booking->order_id = 'BOOK-' . $booking->id . '-' . time();
        $booking->payment_status = 'pending';
        $booking->save();

        $params = [
            'transaction_details' => [
                'order_id' => $booking->order_id,
                'gross_amount' => $booking->total_price,
            ],
            'customer_details' => [
                'first_name' => $booking->name,
                'email' => $booking->email,
                'phone' => $booking->telephone,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $booking->update([
            'snap_token' => $snapToken
        ]);

        return response()->json([
            'snap_token' => $snapToken
        ]);
    }
}
