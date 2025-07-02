<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        $stats = [
            'total_students' => 23,
            'ongoing_guidances' => 20,
            'completed_defenses' => 3,
            'pending_titles' => 12,
            'pending_guidance' => 12,
            'pending_sempro' => 12,
            'pending_semhas' => 12
        ];

        $upcoming_guidances = [
            [
                'npm' => '2308100306',
                'name' => 'Berlian Ika Isabela',
                'request_type' => 'ACC Bimbingan',
                'date' => '1 Juni 2025'
            ],
        ];

        return view('admin-dashboard.a-dashboard', [
            'admin' => $admin,
            'stats' => $stats,
            'upcoming_guidances' => $upcoming_guidances
        ]);
    }
}
