<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            1 => 'Picnic',
            2 => 'Camping',
            3 => 'Campervan',
            4 => 'Group Event',
        ];

        $statuses = ['pending', 'confirmed', 'cancelled'];

        for ($i = 1; $i <= 20; $i++) {
            $packageId = array_rand($packages);

            // random tanggal dalam 7 hari terakhir
            $createdAt = Carbon::now()->subDays(rand(0, 6));

            Booking::create([
                'package_id'   => $packageId,
                'name'         => 'Customer ' . $i,
                'telephone'    => '08' . rand(1111111111, 9999999999),
                'email'        => 'customer' . $i . '@example.com',
                'checkin'      => $createdAt->copy()->addDays(rand(1, 3)),
                'checkout'     => $createdAt->copy()->addDays(rand(4, 6)),
                'participants' => rand(2, 20),
                'total_price'  => rand(500000, 5000000),
                'status'       => $statuses[array_rand($statuses)],
                'created_at'   => $createdAt,
                'updated_at'   => $createdAt,
            ]);
        }
    }
}
