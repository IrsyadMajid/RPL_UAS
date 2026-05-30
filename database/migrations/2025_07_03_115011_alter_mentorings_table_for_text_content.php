<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan proses modifikasi skema tabel 'mentorings'.
     * Menghapus penyimpanan file_path (jalur file fisik) dan menggantinya dengan kolom file_content bertipe TEXT
     * agar mahasiswa dapat menginput isi/abstrak draf tulisan skripsi secara langsung pada form editor teks web.
     */
    public function up(): void
    {
        Schema::table('mentorings', function (Blueprint $table) {
            $table->dropColumn('file_path'); // Hapus kolom jalur berkas lama
            
            // Tambahkan kolom teks isi draf baru di belakang kolom jenis_bimbingan
            $table->text('file_content')->nullable()->after('jenis_bimbingan');
        });
    }

    /**
     * Mengembalikan modifikasi skema ke rancangan semula.
     */
    public function down(): void
    {
        Schema::table('mentorings', function (Blueprint $table) {
            $table->dropColumn('file_content'); // Hapus kolom teks isi draf baru
            
            // Kembalikan kolom jalur berkas lama
            $table->string('file_path')->nullable()->after('jenis_bimbingan');
        });
    }
};
