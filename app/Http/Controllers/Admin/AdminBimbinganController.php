<?php

namespace App\Http\Controllers; // Controller berada di folder Admin, tetapi mewarisi controller dasar

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentoring;
use Illuminate\Support\Facades\Auth;

class AdminBimbinganController extends Controller
{
    /**
     * Menampilkan seluruh antrean pengajuan bimbingan dari semua mahasiswa.
     * Menggunakan Eager Loading ('with') untuk mengurangi query database (N+1 Problem) dan membatasi tampilan halaman sebanyak 15 baris.
     */
    public function index()
    {
        // Ambil data mentoring terbaru beserta data user (mahasiswa) yang mengajukannya
        $requests = Mentoring::with('user')->latest()->paginate(15);
        
        return view('admin-bimbingan.a-bimbingan', compact('requests'));
    }

    /**
     * LOGIKA PENYETUJUAN BIMBINGAN: Mengubah status bimbingan menjadi 'Diterima'.
     * @param  int  $id
     */
    public function approve($id)
    {
        // 1. Temukan data mentoring berdasarkan ID
        $mentoring = Mentoring::findOrFail($id);
        
        // 2. Perbarui kolom status menjadi 'Diterima'
        $mentoring->update(['status' => 'Diterima']);
        
        // 3. Kembali ke halaman sebelumnya dengan feedback sukses
        return back()->with('success', 'Permintaan bimbingan telah disetujui.');
    }

    /**
     * LOGIKA PENOLAKAN BIMBINGAN: Mengubah status bimbingan menjadi 'Ditolak'.
     * @param  int  $id
     */
    public function reject($id)
    {
        // 1. Temukan data mentoring berdasarkan ID
        $mentoring = Mentoring::findOrFail($id);
        
        // 2. Perbarui kolom status menjadi 'Ditolak'
        $mentoring->update(['status' => 'Ditolak']);
        
        // 3. Kembali ke halaman sebelumnya dengan feedback sukses
        return back()->with('success', 'Permintaan bimbingan telah ditolak.');
    }
}
