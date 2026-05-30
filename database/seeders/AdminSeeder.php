<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Menjalankan proses pengisian data awal (seeding) untuk tabel 'admins'.
     */
    public function run(): void
    {
        // Membuat data akun Admin Pembimbing utama
        Admin::create([
            'nama' => 'admin',                                             // Nama tampilan admin
            'email' => 'admin@lecturer.upnjatim.ac.id',                    // Kredensial email login resmi admin
            'password' => Hash::make('123123'),                            // Mengenkripsi password '123123' secara manual untuk database
            'email_verified_at' => now(),                                  // Tanggal verifikasi instan
        ]);
    }
}
