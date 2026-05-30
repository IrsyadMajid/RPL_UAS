<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan proses pembuatan skema tabel 'mentorings'.
     * Menyimpan transaksi antrean pengajuan bimbingan/mentoring mahasiswa.
     */
    public function up(): void
    {
        Schema::create('mentorings', function (Blueprint $table) {
            $table->id();                                    // Primary Key (ID Mentoring)
            
            // KUNCI TAMU (FOREIGN KEY): Menghubungkan bimbingan dengan id mahasiswa di tabel users
            // Jika akun mahasiswa dihapus, seluruh data mentoring miliknya ikut terhapus (Cascade)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('topic');                         // Topik utama atau pokok bahasan bimbingan
            $table->dateTime('proposed_date');               // Jadwal waktu pertemuan yang diajukan
            $table->string('jenis_bimbingan');               // Kategori bimbingan ('Tatap Muka' / 'Draft Online')
            $table->string('file_path')->nullable();         // Jalur berkas (Direkayasa ulang di migrasi setelah ini)
            $table->string('status')->default('Menunggu');   // Status awal antrean bimbingan
            $table->timestamps();                            // created_at dan updated_at
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel 'mentorings'.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorings');
    }
};
