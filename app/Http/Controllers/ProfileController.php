<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil mahasiswa yang sedang aktif.
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * Memproses pembaruan data profil mahasiswa.
     * Mengatur validasi, pengunggahan foto baru, penghapusan foto lama di disk, serta pengubahan password.
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // 1. Validasi input formulir profil
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id, // Abaikan pengecekan unik email milik user itu sendiri
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Laki-Laki,Perempuan',
            'password' => 'nullable|string|min:8|confirmed', // Password opsional, tetapi jika diisi wajib di-confirm
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Batas ukuran gambar maksimal 2MB
        ]);

        // 2. Petakan masukan tervalidasi ke dalam model mahasiswa
        $user->fullname = $validatedData['fullname'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'] ?? $user->phone;
        $user->gender = $validatedData['gender'] ?? $user->gender;

        // 3. LOGIKA UPDATE PASSWORD: Hanya diubah jika diisi di formulir
        if ($request->filled('password')) {
            $user->password = $validatedData['password']; // Enkripsi otomatis ditangani oleh casting 'hashed' di User.php
        }

        // 4. LOGIKA PENGUNGGAHAN FOTO PROFIL:
        if ($request->hasFile('profile_photo')) {
            // Hapus berkas foto lama dari disk penyimpanan jika sebelumnya sudah ada
            if ($user->profile_photo) {
                Storage::delete('public/profile_photos/'.$user->profile_photo);
            }

            // Generate nama berkas unik menggunakan timestamp agar tidak bentrok
            $filename = time().'_'.$request->profile_photo->getClientOriginalName();
            
            // Simpan berkas baru ke direktori /storage/app/public/profile_photos/
            $request->profile_photo->storeAs('public/profile_photos', $filename);
            
            // Simpan nama file terbaru ke database
            $user->profile_photo = $filename;
        }

        // 5. Simpan seluruh pembaruan model ke database
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile berhasil diperbarui!');
    }
}
