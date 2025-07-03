<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentoring;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $totalMahasiswaBimbingan = Mentoring::where('status', 'Diterima')->distinct('user_id')->count();
        $prosesBimbingan = Mentoring::where('status', 'Menunggu')->count();
        $sudahSidang = 0;

        $stats = [
            'total_students'      => $totalMahasiswaBimbingan,
            'ongoing_guidances'   => $prosesBimbingan,
            'completed_defenses'  => $sudahSidang,
            'pending_titles'      => Mentoring::where('status', 'Menunggu')->count(),
            'pending_guidance'    => Mentoring::where('status', 'Menunggu')->count(),
            'pending_sempro'      => 0,
            'pending_semhas'      => 0,
        ];

        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY);
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $bimbinganPerHari = array_fill_keys($days, 0);

        $approvedThisWeek = Mentoring::where('status', 'Diterima')
            ->whereBetween('proposed_date', [$startOfWeek, $endOfWeek])
            ->get();

        foreach ($approvedThisWeek as $mentoring) {
            $dayName = Carbon::parse($mentoring->proposed_date)->locale('id')->isoFormat('dddd');
            $dayName = ucfirst($dayName);
            if (isset($bimbinganPerHari[$dayName])) {
                $bimbinganPerHari[$dayName]++;
            }
        }

        $barChartData = [
            'labels' => array_keys($bimbinganPerHari),
            'data'   => array_values($bimbinganPerHari),
        ];

        $totalForPie = $totalMahasiswaBimbingan + $sudahSidang;
        $prosesPercentage = ($totalForPie > 0) ? round(($totalMahasiswaBimbingan / $totalForPie) * 100) : 0;
        $sidangPercentage = ($totalForPie > 0) ? round(($sudahSidang / $totalForPie) * 100) : 0;

        $pieChartData = [
            'data'              => [$totalMahasiswaBimbingan, $sudahSidang],
            'proses_percentage' => $prosesPercentage,
            'sidang_percentage' => $sidangPercentage,
        ];

        $upcoming_guidances = Mentoring::with('user')
            ->where('status', 'Menunggu')
            ->where('proposed_date', '>=', Carbon::today())
            ->orderBy('proposed_date', 'asc')
            ->get();

        return view('admin-dashboard.a-dashboard', [
            'admin'               => $admin,
            'stats'               => $stats,
            'upcoming_guidances'  => $upcoming_guidances,
            'barChartData'        => $barChartData,
            'pieChartData'        => $pieChartData,
        ]);
    }
}
