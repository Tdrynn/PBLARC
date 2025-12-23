<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('images')->insert([
            [
                'title' => 'Camping Area1',
                'image' => 'images/CP1.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camping Area2',
                'image' => 'images/CP2.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camping Area3',
                'image' => 'images/CP3.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camping Area4',
                'image' => 'images/CP4.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camping Area5',
                'image' => 'images/CP5.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Picnic1',
                'image' => 'images/PN1.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Picnic2',
                'image' => 'images/PN2.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Picnic3',
                'image' => 'images/PN3.png',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Picnic4',
                'image' => 'images/PN4.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Picnic5',
                'image' => 'images/PN5.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camper Van 1',
                'image' => 'images/CV1.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camper Van 2',
                'image' => 'images/CV2.png',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camper Van 3',
                'image' => 'images/CV3.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camper Van 4',
                'image' => 'images/CV4.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Camper Van 5',
                'image' => 'images/CV5.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Group Event1',
                'image' => 'images/GE1.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Group Event2',
                'image' => 'images/GE2.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Group Event3',
                'image' => 'images/GE3.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Group Event4',
                'image' => 'images/GE4.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Group Event5',
                'image' => 'images/GE5.jpeg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gallery1',
                'image' => 'images/Gallery1.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gallery2',
                'image' => 'images/Gallery2.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gallery3',
                'image' => 'images/Gallery3.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gallery4',
                'image' => 'images/Gallery4.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gallery5',
                'image' => 'images/Gallery5.jpg',
                'page'  => 'camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
