<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PackagePrice;
use App\Models\Package;

class PackagePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $camping = Package::where('slug','camping')->first();

        PackagePrice::insert([
            [
                'package_id' => $camping->id,
                'name' => 'Own Tent',
                'day_type' => 'weekday',
                'price' => 25000,
            ],
            [
                'package_id' => $camping->id,
                'name' => 'Own Tent',
                'day_type' => 'weekend',
                'price' => 35000,
            ],
            [
                'package_id' => $camping->id,
                'name' => 'Rent Tent 2',
                'day_type' => 'all',
                'price' => 150000,
            ],
            [
                'package_id' => $camping->id,
                'name' => 'Rent Tent 4',
                'day_type' => 'all',
                'price' => 250000,
            ],
        ]);

        $campervan = Package::where('slug','campervan')->first();
        PackagePrice::insert([
            [
                'package_id' => $campervan->id,
                'name' => 'van',
                'day_type' => 'all',
                'price' => 150000,
            ],
            [
                'package_id' => $campervan->id,
                'name' => 'extra_person',
                'day_type' => 'all',
                'price' => 25000,
            ],
        ]);

    }
}
