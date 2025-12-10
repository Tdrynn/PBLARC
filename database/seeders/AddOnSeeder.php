<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AddOn;

class AddOnSeeder extends Seeder
{
    public function run()
    {
        $addons = [
            ['name' => 'Flysheet 3x3', 'price' => 25000, 'stock' => 10],
            ['name' => 'Small Stove', 'price' => 10000, 'stock' => 5],
            ['name' => 'Regular Mat', 'price' => 10000, 'stock' => 5],
            ['name' => 'Portable Stove', 'price' => 15000, 'stock' => 4],
            ['name' => 'Sleeping Bag', 'price' => 15000, 'stock' => 10],
            ['name' => 'Grill Pan', 'price' => 15000, 'stock' => 7],
            ['name' => 'Folding Chair', 'price' => 15000, 'stock' => 10],
            ['name' => 'Nesting', 'price' => 15000, 'stock' => 3],
            ['name' => 'Folding Table', 'price' => 20000, 'stock' => 5],
            ['name' => 'Tent Lamp', 'price' => 10000, 'stock' => 6],
            ['name' => 'Hammock', 'price' => 15000, 'stock' => 5],
            ['name' => 'Portable Gas', 'price' => 30000, 'stock' => 10],
        ];

        foreach ($addons as $addon) {
            AddOn::create($addon);
        }
    }
}
