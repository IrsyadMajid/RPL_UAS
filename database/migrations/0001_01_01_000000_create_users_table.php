<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan proses pembuatan skema tabel-tabel data otentikasi mahasiswa.
     */
    public function up(): void
    {
        // 1. MEMBUAT TABEL UTAMA MAHASISWA ('users')
        Schema::create('users', function (Blueprint $table) {
            $table->id();                                    // Primary Key (ID Mahasiswa)
            $table->string('name');                          // Nama tampilan/Akun singkat
            $table->string('username')->unique()->nullable(); // Username unik mahasiswa
            $table->string('fullname')->nullable();          // Nama lengkap beserta gelar akademik
            $table->string('email')->unique();               // Email resmi (sebagai kredensial login)
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');                      // Password terenkripsi
            $table->string('phone')->nullable();             // Nomor telepon mahasiswa
            $table->string('gender')->nullable();            // Jenis Kelamin
            $table->string('profile_photo')->nullable();     // Nama file foto profil yang terunggah
            $table->rememberToken();
            $table->timestamps();                            // Menghasilkan kolom created_at dan updated_at

            // KOLOM GAMIFIKASI RPG:
            $table->integer('level')->default(1);            // Level saat ini (Default level 1)
            $table->integer('xp')->default(0);               // Akumulasi Experience Points (Default 0 XP)
        });

        // 2. MEMBUAT TABEL TOKEN RESET PASSWORD
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 3. MEMBUAT TABEL MANAGEMENT SESI PENGGUNA (SESSION STORE)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index(); // Relasi opsional ke user yang login
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus seluruh tabel yang telah dibuat.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
