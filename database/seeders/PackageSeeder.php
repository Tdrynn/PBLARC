<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            Package::insert([
                [
                    'name' => 'Picnic',
                    'slug' => 'picnic',
                    'type' => 'picnic',
                    'capacity' => 10,
                    'block_other_packages' => false,
                    'is_active' => true,
                ],
                [
                    'name' => 'Camping',
                    'slug' => 'camping',
                    'type' => 'camping',
                    'capacity' => 10,
                    'block_other_packages' => false,
                    'is_active' => true,
                ],
                [
                    'name' => 'Campervan',
                    'slug' => 'campervan',
                    'type' => 'campervan',
                    'capacity' => 10,
                    'block_other_packages' => false,
                    'is_active' => true,
                ],
                [
                    'name' => 'Group Event',
                    'slug' => 'groupevent',
                    'type' => 'groupevent',
                    'capacity' => 1,
                    'block_other_packages' => true,
                    'is_active' => true,
                ],
            ]);
        }
}
