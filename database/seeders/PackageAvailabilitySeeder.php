<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\PackageAvailability;
use Carbon\Carbon;

class PackageAvailabilitySeeder extends Seeder
{
    public function run(): void
    {
        $packages = Package::whereIn('slug', [
            'picnic',
            'camping',
            'campervan',
            'groupevent'
        ])->get();

        foreach ($packages as $package) {

            foreach (range(0, 30) as $i) {

                $capacity = match ($package->slug) {
                    'picnic', 'camping', 'campervan' => 10,
                    'groupevent' => 1, // eksklusif
                };

                PackageAvailability::create([
                    'package_id' => $package->id,
                    'date'       => Carbon::now()->addDays($i)->toDateString(),
                    'capacity'   => $capacity,
                ]);
            }
        }
    }
}
