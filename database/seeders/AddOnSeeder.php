<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Addon;

class AddonSeeder extends Seeder
{
    public function run(): void
    {
        $addons = [
            ['name' => 'Flysheet 3x3',      'price' => 25000, 'stock' => 10],
            ['name' => 'Small Stove',       'price' => 10000, 'stock' => 5],
            ['name' => 'Regular Mat',       'price' => 10000, 'stock' => 5],
            ['name' => 'Portable Stove',    'price' => 15000, 'stock' => 4],
            ['name' => 'Sleeping Bag',      'price' => 15000, 'stock' => 10],
            ['name' => 'Grill Pan',          'price' => 15000, 'stock' => 7],
            ['name' => 'Folding Chair',      'price' => 15000, 'stock' => 10],
            ['name' => 'Nesting',            'price' => 15000, 'stock' => 3],
            ['name' => 'Folding Table',      'price' => 20000, 'stock' => 5],
            ['name' => 'Tent Lamp',          'price' => 10000, 'stock' => 6],
            ['name' => 'Hammock',            'price' => 15000, 'stock' => 5],
            ['name' => 'Portable Gas',       'price' => 30000, 'stock' => 10],
        ];

        foreach ($addons as $addon) {
            Addon::create([
                'name'      => $addon['name'],
                'price'     => $addon['price'],
                'stock'     => $addon['stock'],
                'is_active' => true, // sesuai migration
            ]);
        }
    }
}
