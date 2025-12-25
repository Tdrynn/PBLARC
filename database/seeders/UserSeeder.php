<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name'              => 'Admin',
            'phone'             => '08' . str_pad(99, 10, '0', STR_PAD_LEFT),
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('12345678'),
            'role'              => 'admin',
        ]);

        // Users
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name'              => 'User ' . $i,
                'phone'             => '08' . str_pad($i + 1, 10, '0', STR_PAD_LEFT),
                'email'             => 'user' . $i . '@example.com',
                'email_verified_at' => now()->subDays(rand(0, 30)),
                'password'          => Hash::make('password'),
                'role'              => 'pengunjung',
                'created_at'        => now()->subDays(rand(0, 30)),
                'updated_at'        => now(),
            ]);
        }
    }
}
