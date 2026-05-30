<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentoring;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Menampilkan Dashboard Utama Admin (Dosen Pembimbing/Koordinator).
     * Mengumpulkan statistik makro, menghitung sebaran frekuensi bimbingan per hari,
     * serta menyiapkan format data chart (grafik) mingguan.
     */
    public function index()
    {
        // 1. Dapatkan objek admin yang saat ini login
        $admin = Auth::guard('admin')->user();
        
        // 2. KELOLA STATISTIK MAKRO:
        // Hitung total mahasiswa bimbingan unik yang telah memiliki status 'Diterima'
        $totalMahasiswaBimbingan = Mentoring::where('status', 'Diterima')->distinct('user_id')->count();
        
        // Hitung antrean pengajuan yang berstatus 'Menunggu'
        $prosesBimbingan = Mentoring::where('status', 'Menunggu')->count();
        $sudahSidang = 0; // Default awal untuk mahasiswa lulus sidang

        $stats = [
            'total_students'      => $totalMahasiswaBimbingan,
            'ongoing_guidances'   => $prosesBimbingan,
            'completed_defenses'  => $sudahSidang,
            'pending_titles'      => Mentoring::where('status', 'Menunggu')->count(),
            'pending_guidance'    => Mentoring::where('status', 'Menunggu')->count(),
            'pending_sempro'      => 0,
            'pending_semhas'      => 0,
        ];

        // 3. LOGIKA GRAFIK BATANG (BAR CHART) MINGGUAN:
        // Cari rentang waktu Senin s/d Minggu pada minggu berjalan menggunakan Carbon
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY);
        
        // Inisialisasi array hari lokal Indonesia dengan nilai dasar 0
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $bimbinganPerHari = array_fill_keys($days, 0);

        // Ambil bimbingan disetujui dalam rentang senin - minggu ini
        $approvedThisWeek = Mentoring::where('status', 'Diterima')
            ->whereBetween('proposed_date', [$startOfWeek, $endOfWeek])
            ->get();

        // Loop data bimbingan minggu ini untuk dikelompokkan ke masing-masing nama hari
        foreach ($approvedThisWeek as $mentoring) {
            // Dapatkan nama hari dalam bahasa Indonesia (e.g., 'Senin', 'Selasa')
            $dayName = Carbon::parse($mentoring->proposed_date)->locale('id')->isoFormat('dddd');
            $dayName = ucfirst($dayName); // Format huruf depan kapital
            
            if (isset($bimbinganPerHari[$dayName])) {
                $bimbinganPerHari[$dayName]++;
            }
        }

        // Format data yang siap dibaca oleh pustaka ChartJS di frontend
        $barChartData = [
            'labels' => array_keys($bimbinganPerHari),
            'data'   => array_values($bimbinganPerHari),
        ];

        // 4. LOGIKA GRAFIK LINGKARAN (PIE CHART):
        // Mengukur rasio antara bimbingan aktif dengan mahasiswa yang sudah lulus
        $totalForPie = $totalMahasiswaBimbingan + $sudahSidang;
        $prosesPercentage = ($totalForPie > 0) ? round(($totalMahasiswaBimbingan / $totalForPie) * 100) : 0;
        $sidangPercentage = ($totalForPie > 0) ? round(($sudahSidang / $totalForPie) * 100) : 0;

        $pieChartData = [
            'data'              => [$totalMahasiswaBimbingan, $sudahSidang],
            'proses_percentage' => $prosesPercentage,
            'sidang_percentage' => $sidangPercentage,
        ];

        // 5. ANTREAN MENDATANG: Mengambil jadwal bimbingan berstatus menunggu mulai hari ini ke depan
        $upcoming_guidances = Mentoring::with('user')
            ->where('status', 'Menunggu')
            ->where('proposed_date', '>=', Carbon::today())
            ->orderBy('proposed_date', 'asc')
            ->get();

        // 6. Render view dasbor dengan membawa seluruh variabel statistik
        return view('admin-dashboard.a-dashboard', [
            'admin'               => $admin,
            'stats'               => $stats,
            'upcoming_guidances'  => $upcoming_guidances,
            'barChartData'        => $barChartData,
            'pieChartData'        => $pieChartData,
        ]);
    }
}
