<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Menampilkan form login untuk Mahasiswa dan Admin.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses logika login dengan sistem Multi-Guard.
     * Mengotentikasi apakah kredensial milik Dosen/Prodi (Admin) atau Mahasiswa.
     */
    public function login(Request $request)
    {
        // 1. Validasi input email dan password dari user
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // 2. LOGIKA LOGIN ADMIN: Mencoba login menggunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate(); // Mencegah serangan Session Fixation
                return redirect()->route('admin.a-dashboard'); // Arahkan ke dashboard admin
            }

        // 3. LOGIKA LOGIN MAHASISWA: Mencoba login menggunakan guard default ('web')
        if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate(); // Mencegah serangan Session Fixation
                // Inisialisasi tahapan storyline login pertama (login2) di dalam session
                Session::put('login_step', 'login2');
                return redirect()->route('login2'); // Arahkan ke transisi alur cerita halaman kedua
            }

        // 4. JIKA GAGAL: Mengembalikan user dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    /**
     * Memperbarui tahapan storyline login mahasiswa di dalam session secara dinamis.
     * Biasanya dipanggil melalui AJAX ketika mahasiswa menekan tombol lanjut di halaman alur cerita.
     */
    public function updateLoginStep(Request $request)
    {
        $request->validate([
            'next_step' => 'required|string',
        ]);

        // Simpan tahapan storyline terbaru ke session
        $request->session()->put('login_step', $request->next_step);

        return response()->json(['status' => 'success', 'step' => $request->next_step]);
    }

    /**
     * Menampilkan halaman transisi storyline login langkah 2.
     * Dilindungi dengan pengecekan session agar tidak bisa diakses langsung via URL.
     */
    public function showLogin2Form()
    {
        if (Session::get('login_step') !== 'login2' && !Auth::check()) {
            return redirect()->route('login');
        }
        return view('auth.login2');
    }

    /**
     * Menampilkan halaman transisi storyline login langkah 3.
     */
    public function showLogin3Form()
    {
        if (Session::get('login_step') !== 'login3' && !Auth::check()) {
            return redirect()->route('login');
        }
        return view('auth.login3');
    }

    /**
     * Menampilkan halaman transisi storyline login langkah 4.
     */
    public function showLogin4Form()
    {
        if (Session::get('login_step') !== 'login4' && !Auth::check()) {
            return redirect()->route('login');
        }
        return view('auth.login4');
    }

    /**
     * Menampilkan formulir pendaftaran akun mahasiswa baru.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Memproses registrasi mahasiswa baru.
     */
    public function register(Request $request)
    {
        // Validasi input data pendaftaran
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Membuat data mahasiswa baru di database
        // Enkripsi password ditangani secara otomatis oleh mutator/cast 'hashed' pada model User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // 'hashed' cast in User model handles hashing
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    /**
     * Menampilkan formulir lupa password.
     */
    public function showForgotForm()
    {
        return view('auth.lupaPassword');
    }

    /**
     * Memproses permintaan pemulihan password dengan menyimpan email tujuan ke session.
     */
    public function handleForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Simpan email yang ingin direset ke dalam session untuk proses langkah berikutnya
        $request->session()->put('reset_email', $request->email);

        return redirect()->route('resetPasswordForm');
    }

    /**
     * Menampilkan halaman pengisian password baru secara manual.
     */
    public function showResetPasswordForm(Request $request)
    {
        $email = $request->session()->get('reset_email');

        // Pastikan ada email di session, jika tidak kembalikan ke form lupa password
        if (!$email) {
            return redirect()->route('lupaPassword')->withErrors('Email tidak ditemukan. Silakan coba lagi.');
        }

        return view('auth.lupaPassword1', compact('email'));
    }

    /**
     * Memproses pengubahan password baru mahasiswa secara manual di database.
     */
    public function resetPasswordManual(Request $request)
    {
        $email = $request->session()->get('reset_email');

        // Validasi keamanan sesi pencocokan email
        if (!$email || $email !== $request->email) {
            return redirect()->route('lupaPassword')->withErrors('Sesi tidak valid. Silakan coba lagi.');
        }

        // Validasi kekuatan password baru
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Cari user berdasarkan email dan simpan password baru
        $user = \App\Models\User::where('email', $request->email)->first();
        $user->password = $request->new_password; // 'hashed' cast in User model handles hashing
        $user->save();

        // Bersihkan session email pemulihan
        $request->session()->forget('reset_email');

        return redirect()->route('login')->with('success', 'Password berhasil diubah.');
    }

    /**
     * Memproses fungsi keluar (logout) sistem untuk Multi-Guard.
     */
    public function logout(Request $request)
    {
        // Keluar dari guard admin jika aktif
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        // Keluar dari guard mahasiswa jika aktif
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        // Hancurkan session dan buat ulang token CSRF demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
