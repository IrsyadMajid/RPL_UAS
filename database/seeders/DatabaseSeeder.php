<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * PUSAT PENGISIAN DATABASE (Database Seeder Orchestrator).
     * Mengeksekusi seeder kustom secara berurutan saat menjalankan perintah 'php artisan db:seed'.
     */
    public function run(): void
    {
        // Memanggil seeder kustom untuk mengisi data awal mahasiswa (UserSeeder) dan dosen pembimbing (AdminSeeder)
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
