<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom database yang diperbolehkan untuk diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'name',
        'fullname',
        'email',
        'phone',
        'password',
        'gender',
        'profile_photo',
        'level', // Menyimpan level saat ini (Integer)
        'xp',    // Menyimpan akumulasi Experience Points mahasiswa (Integer)
    ];

    /**
     * Menyembunyikan atribut ketika data model diubah menjadi format JSON/Array.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data kolom database ke dalam tipe objek PHP secara otomatis.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // LOGIKA ENKRIPSI OTOMATIS: Mengenkripsi string password menjadi Hash bcrypt saat disimpan
        'level' => 'integer',
        'xp' => 'integer',
    ];

    /**
     * ELOQUENT ACCESSOR: Menentukan julukan kasta/nama wilayah RPG berdasarkan level mahasiswa saat ini.
     * Mengakses properti ini secara dinamis melalui `$user->level_name` pada Controller atau View.
     */
    public function getLevelNameAttribute()
    {
        // Peta visual petualangan skripsi
        $levelNames = [
            1 => 'Gerbang Arcana',        // Awal mendaftar dan melengkapi profile
            2 => 'Mencari Mentor',        // Mencari & mencocokkan Dosen Pembimbing
            3 => 'Ritual Judul',          // Tahap pengajuan proposal judul skripsi
            4 => 'Awal Perjalanan',       // Penulisan Bab 1 (Pendahuluan)
            5 => 'Duel Proposal',         // Menghadapi Ujian Seminar Proposal (Sempro)
            6 => 'Lembah Revisi Abadi',   // Proses revisi Sempro dan penulisan Bab 2
            7 => 'Lembah Revisi Abadi',   // Penulisan Bab 3 (Metodologi) & revisi
            8 => 'Lembah Revisi Abadi',   // Tahap implementasi/Bab 4 & revisi
            9 => 'Lembah Revisi Abadi',   // Penyusunan kesimpulan Bab 5 & draf akhir
            10 => 'Sidang Suci Arcana',   // Pertempuran puncak: Sidang Skripsi (Pendadaran)!
        ];

        return $levelNames[$this->level] ?? 'Transcendent'; // Julukan jika melebihi level 10
    }

    /**
     * Menghitung target XP yang dibutuhkan mahasiswa untuk naik ke tingkat berikutnya.
     */
    public function getXpForNextLevelAttribute()
    {
        return $this->getXpForLevel($this->level + 1);
    }

    /**
     * Menghitung ambang batas XP kumulatif untuk level target tertentu.
     * * Level 1-10: Kenaikan linear sederhana (butuh +10 XP per naik level).
     * * Level 11 ke atas: Menggunakan kelipatan tambahan yang semakin besar (+10 XP ekstra per level tambahan).
     */
    public function getXpForLevel($targetLevel)
    {
        if ($targetLevel <= 1) return 10;

        // Level 2-10: membutuhkan akumulasi XP = level * 10 (10, 20, 30, ..., 100 XP)
        if ($targetLevel <= 10) {
            return $targetLevel * 10;
        }

        // Level 11+: Kenaikan progresif kuadratis
        $xpRequired = 100;
        $increment = 10;

        for ($level = 10; $level < $targetLevel; $level++) {
            $xpRequired += $increment;
            $increment += 10;
        }

        return $xpRequired;
    }

    /**
     * Menghitung konversi level secara terbalik berdasarkan total XP kumulatif yang dipunyai.
     * Berguna untuk menentukan level aktual mahasiswa saat terjadi penambahan XP baru.
     */
    public function calculateLevelFromXp($totalXp)
    {
        // Cek linear cepat untuk level awal 1 sampai 10
        if ($totalXp < 10) return 1;
        if ($totalXp < 20) return 2;
        if ($totalXp < 30) return 3;
        if ($totalXp < 40) return 4;
        if ($totalXp < 50) return 5;
        if ($totalXp < 60) return 6;
        if ($totalXp < 70) return 7;
        if ($totalXp < 80) return 8;
        if ($totalXp < 90) return 9;
        if ($totalXp < 100) return 10;

        // Perhitungan iteratif dinamis untuk level di atas 10
        $level = 10;
        $xpRequired = 100;
        $increment = 10;

        while ($totalXp >= $xpRequired) {
            $level++;
            $xpRequired += $increment;
            $increment += 10;
        }

        return $level;
    }

    /**
     * Memperbarui level mahasiswa saat ini di database dengan mencocokkan total XP-nya.
     */
    public function updateLevel()
    {
        $this->level = $this->calculateLevelFromXp($this->xp ?? 0);
    }

    /**
     * Method utama untuk menambahkan XP mahasiswa dan menyinkronkan level serta menyimpannya.
     * Pemicu kenaikan tingkat ini biasanya bersumber dari penyelesaian quest atau aktivitas bimbingan.
     */
    public function addXp(int $amount): void
    {
        // 1. Tambahkan jumlah XP baru ke akumulasi yang sudah ada
        $this->xp = ($this->xp ?? 0) + $amount;
        
        // 2. LOGIKA LEVELING: Hitung ulang level berdasarkan total XP yang baru
        $this->updateLevel();
        
        // 3. Simpan perubahan ke database secara atomik
        $this->save();
    }
}
