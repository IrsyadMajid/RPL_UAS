<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentoring;

class AdminMahasiswaController extends Controller
{
    /**
     * Menampilkan daftar seluruh mahasiswa yang status bimbingannya telah disetujui ('Diterima').
     * Berfungsi untuk melihat daftar bimbingan aktif di bawah bimbingan dosen pembimbing saat ini.
     */
    public function index()
    {
        // 1. Dapatkan data admin saat ini
        $admin = Auth::guard('admin')->user();

        // 2. Ambil seluruh bimbingan berstatus 'Diterima' beserta detail data profil mahasiswa (User)
        $approvedMentorings = Mentoring::where('status', 'Diterima')->with('user')->get();

        // 3. Render view admin dengan membawa data admin dan data bimbingan yang aktif
        return view('admin-mahasiswa.a-mahasiswa', [
            'admin' => $admin,
            'approvedRequests' => $approvedMentorings
        ]);
    }
}
