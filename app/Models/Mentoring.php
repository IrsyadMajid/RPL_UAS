<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentoring extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     * Mencakup data mahasiswa pengaju, topik bimbingan, jenis, status, dan teks isi draf.
     */
    protected $fillable = [
        'user_id',         // Relasi ke tabel users
        'topic',           // Topik/Judul bimbingan
        'proposed_date',   // Waktu pelaksanaan bimbingan yang diajukan
        'status',          // Status bimbingan ('Menunggu', 'Diterima', 'Ditolak', dsb)
        'jenis_bimbingan', // Jenis: 'Tatap Muka' atau 'Draft Online'
        'file_content',    // Isi draf skripsi bertipe teks
    ];

    /**
     * RELASI MODEL: Setiap bimbingan (mentoring) dimiliki oleh satu orang mahasiswa (User).
     * Relasi Many-to-One (Inverse Relationship).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
