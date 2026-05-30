<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentoring;

class DashboardController extends Controller
{
    /**
     * Menampilkan Halaman Beranda (Homepage) utama Mahasiswa.
     * Mengatur penyelarasan tingkat (level), data peringkat (leaderboard), serta histori bimbingan terbaru.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        // 1. Dapatkan instansi user mahasiswa yang sedang login saat ini
        $user = Auth::user();

        // 2. Proteksi otentikasi
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        // 3. Inisialisasi data aman untuk mencegah nilai kosong (null) di interface
        $user->level = $user->level ?? 1;
        $user->xp = $user->xp ?? 0;
        $user->fullname = $user->fullname ?? $user->name;

        // 4. LOGIKA SINKRONISASI LEVEL: Memperbarui level mahasiswa berdasarkan XP terbarunya
        $user->updateLevel();
        $user->save(); // Simpan pembaruan level jika ada perubahan

        // 5. DATA LEADERBOARD: Data peringkat tiruan untuk stimulasi persaingan sehat antar mahasiswa
        $rankingData = [
            ['rank' => '🥇', 'name' => 'M. Irsyad Majid', 'level' => 10, 'consistency' => '98%'],
            ['rank' => '🥈', 'name' => 'Lucky Fitrianda', 'level' => 10, 'consistency' => '96%'],
            ['rank' => '🥉', 'name' => 'M. Rafathar A.', 'level' => 10, 'consistency' => '92%'],
        ];

        // 6. HISTORI BIMBINGAN: Mengambil 3 riwayat bimbingan terakhir mahasiswa yang berstatus final
        $mentoringHistory = Mentoring::where('user_id', Auth::id())
                                ->whereIn('status', ['Selesai', 'Ditolak', 'Dibatalkan'])
                                ->latest()
                                ->take(3)
                                ->get();

        // 7. Kirim seluruh data ke view 'homepage' untuk dirender
        return view('homepage', [
            'user' => $user,
            'rankingData' => $rankingData,
            'userRank' => 156, // Peringkat default mahasiswa
            'mentoringHistory' => $mentoringHistory,
        ]);
    }

    /**
     * Memproses aksi ketika mahasiswa mengklik "Selesaikan Quest" untuk klaim XP.
     */
    public function completeQuest(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        // Keamanan otentikasi
        if (!$user || !$user instanceof \App\Models\User) {
            return redirect()->back()->with('error', 'Anda harus login');
        }

        // 1. Tentukan jumlah XP hadiah dari Quest (default +10 XP)
        $xpEarned = 10;
        $oldLevel = $user->level ?? 1; // Rekam level lama untuk deteksi level-up

        // 2. LOGIKA PENAMBAHAN XP: Memanggil method di model User untuk menambah XP & update level otomatis
        $user->addXp($xpEarned);

        // 3. DETEKSI LEVEL UP: Berikan ucapan selamat spesifik jika mahasiswa naik tingkat
        if ($user->level > $oldLevel) {
            return redirect()->back()->with('success', "Quest selesai! Kamu mendapatkan {$xpEarned} XP dan naik ke Level {$user->level}!");
        }

        // Jika hanya bertambah XP tanpa naik level
        return redirect()->back()->with('success', "Quest selesai! Kamu mendapatkan {$xpEarned} XP!");
    }
}
