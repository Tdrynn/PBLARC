<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            'Tempatnya enak banget buat santai, suasananya dapet.',
            'Pelayanannya ramah, proses booking juga gampang.',
            'Cocok buat liburan bareng keluarga atau temen-temen.',
            'Pengalaman pertama camping di sini, nagih sih.',
            'Tempatnya bersih dan tertata rapi.',
            'View-nya cakep banget, apalagi pas pagi.',
            'Anak-anak suka banget, nggak bosen.',
            'Harga masih masuk akal dengan fasilitasnya.',
            'Campervannya nyaman, nggak nyangka senyaman ini.',
            'Staff-nya helpful banget, fast response.',
            'Datang pas weekend agak rame, tapi masih oke.',
            'Malemnya adem dan tenang, tidur nyenyak.',
            'Cocok buat healing tipis-tipis.',
            'Fasilitas cukup lengkap dan terawat.',
            'Rekomendasi buat yang pengen liburan tanpa ribet.',
            'Booking online-nya simple, nggak bikin pusing.',
            'Tempatnya instagramable, banyak spot foto.',
            'Group event kantor di sini sukses, semua puas.',
            'Lokasinya gampang dicari.',
            'Worth it sih buat pengalaman kaya gini.',
            'Makanannya enak dan harganya standar.',
            'Toiletnya bersih, poin plus banget.',
            'Pengalaman camping paling nyaman sejauh ini.',
            'Datang pas hujan tapi tetap seru.',
            'Pelayanannya konsisten dari awal sampai akhir.',
            'Anak-anak betah, orang tua juga happy.',
            'Bakal balik lagi sih ke sini.',
            'Sesuai ekspektasi, nggak zonk.',
            'Cocok buat acara rame-rame.',
            'Overall puas, recommended.',
        ];

        $users = User::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            Review::create([
                'user_id' => rand(0, 1) ? $users[array_rand($users)] : null,
                'name'    => 'Reviewer ' . ($i + 1),
                'rating'  => rand(3, 5),
                'review'  => $reviews[array_rand($reviews)],
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}
