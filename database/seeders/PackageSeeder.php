<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'name'                  => 'Picnic',
            'capacity'              => 10,      // kapasitas per hari
            'is_single_day'         => true,    // hanya bisa 1 hari
            'block_other_packages'  => false,   // tidak memblokir yang lain
            'price'                 => 50000
        ]);

        Package::create([
            'name'                  => 'Camping',
            'capacity'              => 10,
            'is_single_day'         => false,
            'block_other_packages'  => false,
            'price'                 => 150000
        ]);

        Package::create([
            'name'                  => 'Campervan',
            'capacity'              => 10,
            'is_single_day'         => false,
            'block_other_packages'  => false,
            'price'                 => 250000
        ]);

        Package::create([
            'name'                  => 'Group Event',
            'capacity'              => 1,        // biasanya 1 event per hari
            'is_single_day'         => false,
            'block_other_packages'  => true,     // memblokir paket lain
            'price'                 => 1000000
        ]);
    }
}
