<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan proses pembuatan skema tabel 'admins'.
     * Digunakan untuk menampung data kredensial dosen pembimbing dan koordinator skripsi.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();                                    // Primary Key (ID Admin)
            $table->string('nama');                          // Nama Dosen / Koordinator
            $table->string('email')->unique();               // Email resmi sebagai ID otentikasi login
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');                      // Password terenkripsi
            $table->rememberToken();
            $table->timestamps();                            // created_at dan updated_at
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel 'admins'.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
