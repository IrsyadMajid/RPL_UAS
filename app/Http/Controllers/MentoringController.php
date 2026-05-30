<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentoring;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MentoringController extends Controller
{
    /**
     * Menampilkan daftar bimbingan (mentoring) milik mahasiswa yang login.
     * Memisahkan data antrean aktif (Disetujui/Diterima) dengan riwayat bimbingan lama.
     */
    public function mentoring1()
    {
        $userId = Auth::id();
        
        // Proteksi otentikasi
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        // 1. Ambil data bimbingan mendatang yang statusnya telah "Diterima" oleh dosen
        $upcoming = Mentoring::where('user_id', $userId)
                                ->where('status', 'Diterima')
                                ->latest()
                                ->get();

        // 2. Ambil data bimbingan lainnya (Menunggu, Ditolak, Selesai) sebagai riwayat
        $history = Mentoring::where('user_id', $userId)
                                ->where('status', '!=', 'Diterima')
                                ->latest()
                                ->get();

        return view('mentoring.mentoring1', compact('upcoming', 'history'));
    }

    /**
     * Menampilkan halaman pemilihan jenis bimbingan (Tatap Muka / Online Draft).
     */
    public function mentoring2()
    {
        return view('mentoring.mentoring2');
    }

    /**
     * Menampilkan form pengajuan jadwal pertemuan bimbingan (Meet).
     */
    public function mentoringC()
    {
        return view('mentoring.mentoringC');
    }

    /**
     * Menampilkan detail informasi bimbingan tertentu milik mahasiswa bersangkutan.
     */
    public function mentoringD($id)
    {
        // Temukan bimbingan dengan id tersebut, pastikan kepemilikannya sesuai dengan user saat ini
        $mentoring = Mentoring::where('user_id', Auth::id())->findOrFail($id);
        return view('mentoring.mentoringD', compact('mentoring'));
    }

    /**
     * Menampilkan halaman pengisian draf skripsi (Draft Online).
     */
    public function mentoringDraft()
    {
        return view('mentoring.mentoringDraft');
    }

    /**
     * Menampilkan detail informasi pengajuan draft online tertentu.
     */
    public function mentoringDraft1($id)
    {
        $mentoring = Mentoring::where('user_id', Auth::id())->findOrFail($id);
        return view('mentoring.mentoringDraft1', compact('mentoring'));
    }

    /**
     * Memproses penyimpanan pengajuan bimbingan baru ke database.
     * Menggabungkan data tanggal dan jam menjadi format waktu gabungan.
     */
    public function store(Request $request)
    {
        // 1. Validasi seluruh input formulir
        $validatedData = $request->validate([
            'topic' => 'required|string|min:5|max:255',
            'proposed_date' => 'required|date',
            'proposed_time' => 'required',
            'jenis_bimbingan' => 'required|string',
            'file_content' => 'nullable|string',
        ]);

        // 2. LOGIKA PENGGABUNGAN TANGGAL & JAM: Merekonstruksi input formulir terpisah menjadi DateTime standar
        $proposedDateTime = $validatedData['proposed_date'] . ' ' . $validatedData['proposed_time'];

        // 3. Simpan data bimbingan baru ke dalam tabel 'mentorings' dengan status awal 'Menunggu'
        $newMentoring = Mentoring::create([
            'user_id' => Auth::id(),
            'topic' => $validatedData['topic'],
            'proposed_date' => $proposedDateTime,
            'jenis_bimbingan' => $validatedData['jenis_bimbingan'],
            'file_content' => $validatedData['file_content'],
            'status' => 'Menunggu',
        ]);

        // 4. Arahkan ke halaman rincian detail bimbingan yang baru dibuat disertai notifikasi sukses
        return redirect()->route('mentoring.D', ['id' => $newMentoring->id])
            ->with('success', 'Jadwal bimbingan berhasil diajukan!');
    }

    /**
     * Membatalkan atau menghapus pengajuan bimbingan tertentu.
     */
    public function destroy($id)
    {
        // Temukan bimbingan, pastikan hanya bisa menghapus miliknya sendiri
        $mentoring = Mentoring::where('user_id', Auth::id())->findOrFail($id);

        $mentoring->delete();

        return redirect()->route('mentoring.1')->with('success', 'Jadwal mentoring berhasil dihapus.');
    }
}
