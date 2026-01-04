<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['pending', 'confirmed', 'cancelled'];
        $paymentStatuses = ['pending', 'paid', 'failed'];

        for ($i = 1; $i <= 20; $i++) {

            $createdAt = Carbon::now()->subDays(rand(0, 6));

            Booking::create([
                'user_id'        => 1, // pastikan user id 1 ada
                'package_id'     => rand(1, 4),

                'name'           => 'Customer ' . $i,
                'telephone'      => '08' . rand(1000000000, 9999999999),
                'email'          => 'customer' . $i . '@example.com',

                'checkin'        => $createdAt->copy()->addDays(rand(1, 3)),
                'checkout'       => $createdAt->copy()->addDays(rand(4, 6)),

                'participants'   => rand(1, 20),
                'total_price'    => rand(500000, 5000000),

                // MIDTRANS
                'order_id'       => 'ORDER-' . uniqid(),
                'snap_token'     => null,
                'payment_status' => $paymentStatuses[array_rand($paymentStatuses)],

                // BUSINESS STATUS
                'status'         => $statuses[array_rand($statuses)],

                'created_at'     => $createdAt,
                'updated_at'     => $createdAt,
            ]);
        }
    }
}
