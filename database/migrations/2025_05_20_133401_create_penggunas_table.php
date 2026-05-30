<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan proses pembuatan skema tabel 'penggunas'.
     * Catatan: Tabel ini awalnya dirancang untuk profil pengguna umum sebelum dialihkan menggunakan tabel default 'users'.
     */
    public function up(): void
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();                                    // Primary Key unik
            $table->string('username')->unique();            // Username unik untuk login
            $table->string('fullname');                      // Nama Lengkap Pengguna
            $table->string('email')->unique();               // Email unik
            $table->string('phone')->nullable();             // Nomor HP (opsional)
            $table->string('password');                      // Password terenkripsi
            $table->string('gender')->nullable();            // Jenis Kelamin
            $table->string('profile_photo')->nullable();     // Foto profil (opsional)
            $table->rememberToken();
            $table->timestamps();                            // Waktu pembuatan data (created_at, updated_at)
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel 'penggunas'.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
