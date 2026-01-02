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
        Config::$serverKey    = config('services.midtrans.serverKey');
        Config::$isProduction = false; // sandbox
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }

    /**
     * ======================================================
     * CREATE SNAP TOKEN
     * ======================================================
     */
    public function createSnapToken($bookingId)
    {
        $booking = Booking::with('details')->findOrFail($bookingId);

        // =========================
        // GENERATE UNIQUE ORDER ID
        // =========================
        if ($booking->payment_status !== 'paid') {
            $booking->order_id = 'BOOK-' . $booking->id . '-' . uniqid();
            $booking->save();
        }

        $itemDetails = [];
        $grossAmount = 0;

        // =========================
        // BUILD ITEM DETAILS
        // =========================
        foreach ($booking->details as $detail) {

            if ($detail->quantity <= 0 || $detail->price <= 0) {
                continue;
            }

            $itemDetails[] = [
                'id'       => 'ITEM-' . $detail->id,
                'price'    => (int) $detail->price,
                'quantity' => (int) $detail->quantity,
                'name'     => substr($detail->item_name, 0, 50),
            ];

            $grossAmount += $detail->price * $detail->quantity;
        }

        // =========================
        // VALIDATION
        // =========================
        if (count($itemDetails) === 0) {
            return response()->json([
                'error' => 'Item booking kosong'
            ], 422);
        }

        if ($grossAmount < 1) {
            return response()->json([
                'error' => 'Total pembayaran tidak valid'
            ], 422);
        }

        $params = [
            'transaction_details' => [
                'order_id'     => $booking->order_id,
                'gross_amount' => (int) $grossAmount,
            ],
            'item_details' => $itemDetails,
            'customer_details' => [
                'first_name' => $booking->name,
                'email'      => $booking->email ?? 'guest@example.com',
                'phone'      => $booking->telephone,
            ],
        ];

        // =========================
        // DEBUG LOG (WAJIB ADA)
        // =========================
        Log::info('MIDTRANS PAYLOAD', $params);

        // =========================
        // CREATE SNAP TOKEN
        // =========================
        try {
            $snapToken = Snap::getSnapToken($params);
        } catch (\Exception $e) {

            Log::error('MIDTRANS SNAP ERROR', [
                'message' => $e->getMessage(),
                'params'  => $params,
            ]);

            return response()->json([
                'error'   => 'Gagal membuat transaksi',
                'message' => $e->getMessage(),
            ], 500);
        }

        // =========================
        // SAVE RESULT
        // =========================
        $booking->update([
            'snap_token'  => $snapToken,
            'total_price' => $grossAmount,
        ]);

        return response()->json([
            'snap_token' => $snapToken
        ]);
    }

    /**
     * ======================================================
     * MIDTRANS WEBHOOK
     * ======================================================
     */
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
                default => null,
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

    /**
     * ======================================================
     * RETRY PAYMENT
     * ======================================================
     */
    public function retry(Booking $booking)
    {
        return $this->createSnapToken($booking->id);
    }
}
