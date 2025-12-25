<?php

namespace Database\Seeders;


use Database\Seeders\UserSeeder;
use Database\Seeders\BookingSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AddonSeeder::class,
            PackageSeeder::class,
            PackagePriceSeeder::class,
            PackageAvailabilitySeeder::class,
            ReviewSeeder::class,
            BookingSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
