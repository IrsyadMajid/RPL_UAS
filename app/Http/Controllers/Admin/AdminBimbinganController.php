<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBimbinganController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $bimbingan = [
            [
                'npm' => '2308100306',
                'nama' => 'Berlian Ika Isabela',
                'jenis_bimbingan' => 'Skripsi',
                'tanggal' => '2025-07-02',
                'status' => 'Pending'
            ],
        ];

        return view('admin-bimbingan.a-bimbingan', [
            'admin' => $admin,
            'bimbingan' => $bimbingan
        ]);
    }
}
