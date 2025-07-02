<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMahasiswaController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        $mahasiswa = [
            [
                'npm' => '2308100306',
                'nama' => 'Berlian Ika Isabela',
                'prodi' => 'Teknik Informatika',
                'semester' => 7,
                'status' => 'Aktif'
            ],
        ];

        return view('admin-mahasiswa.a-mahasiswa', [
            'admin' => $admin,
            'mahasiswa' => $mahasiswa
        ]);
    }
}
