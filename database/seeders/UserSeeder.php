<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Menjalankan proses pengisian data awal (seeding) untuk tabel 'users' (Mahasiswa).
     */
    public function run(): void
    {
        // Menyisipkan data mahasiswa awal (RPL) langsung ke tabel 'users'
        DB::table('users')->insert([
            'name' => 'RPL',                                             // Nama tampilan
            'username' => 'RPL',                                         // Username
            'fullname' => 'RPL',                                         // Nama Lengkap
            'email' => 'RPL@student.upnjatim.ac.id',                     // Kredensial email login mahasiswa
            'email_verified_at' => now(),                                // Status verifikasi email instan
            'password' => Hash::make('123456'),                          // Mengenkripsi password '123456' untuk disimpan di database
            'phone' => '081234567890',                                   // Nomor HP mahasiswa
            'gender' => 'Laki-Laki',                                     // Jenis Kelamin
            'level' => 1,                                                // Memulai RPG dari Level 1 (Gerbang Arcana)
            'xp' => 0,                                                   // Nilai Experience Points awal
            'profile_photo' => null,                                     // Tidak ada foto profil default
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
