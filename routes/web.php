<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\PeringkatController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminBimbinganController;

/*
|--------------------------------------------------------------------------
| Web Routes (Rute Web Utama)
|--------------------------------------------------------------------------
| Di sinilah Anda mendaftarkan rute-rute web untuk aplikasi BIMA.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| diberikan grup middleware "web" yang menyediakan sesi state, CSRF, dll.
|
*/

// 1. PENGALIHAN UTAMA: Mengarahkan halaman root '/' langsung ke halaman masuk (/login)
Route::get('/', function () {
    return redirect('/login');
});

// 2. RUTE TAMU (GUEST ROUTES): Dapat diakses oleh siapa saja tanpa perlu masuk sistem
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login']);                      // Memproses otentikasi login
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Menampilkan form daftar
Route::post('/register', [AuthController::class, 'register']);                          // Memproses pembuatan user baru

// Rute Pemulihan Password Secara Manual (Custom Reset Password)
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('lupaPassword'); // Form input email
Route::post('/forgot-password', [AuthController::class, 'handleForgotPassword'])->name('submitLupaPassword'); // Simpan email ke session
Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('resetPasswordForm'); // Form input password baru
Route::post('/reset-password', [AuthController::class, 'resetPasswordManual'])->name('password.manual.reset'); // Simpan password baru ke DB

// 3. RUTE ALUR CERITA (INTRO STORYLINE): Halaman narasi RPG pembuka sebelum login pertama kali (tanpa proteksi auth)
Route::get('/halaman1', function () { return view('storylogin.halaman1'); })->name('halaman1');
Route::get('/halaman2', function () { return view('storylogin.halaman2'); })->name('halaman2');
Route::get('/halaman3', function () { return view('storylogin.halaman3'); })->name('halaman3');
Route::get('/halaman4', function () { return view('storylogin.halaman4'); })->name('halaman4');
Route::get('/halaman5', function () { return view('storylogin.halaman5'); })->name('halaman5');
Route::get('/halaman6', function () { return view('storylogin.halaman6'); })->name('halaman6');
Route::get('/halaman7', function () { return view('storylogin.halaman7'); })->name('halaman7');
Route::get('/halaman8', function () { return view('storylogin.halaman8'); })->name('halaman8');
Route::get('/halaman9', function () { return view('storylogin.halaman9'); })->name('halaman9');
Route::get('/halaman10', function () { return view('storylogin.halaman10'); })->name('halaman10');

// Rute Keluar (Logout) - Dapat diakses oleh Admin maupun Mahasiswa
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 4. GRUP RUTE ADMIN (ADMIN ROUTES):
// Diproteksi oleh middleware 'auth:admin' (menggunakan guard admin).
// Semua rute di dalam grup ini memiliki prefix '/admin/' dan nama rute berawalan 'admin.'
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('/a-dashboard', [AdminDashboardController::class, 'index'])->name('a-dashboard');   // Dashboard analitik admin
    Route::get('/a-mahasiswa', [AdminMahasiswaController::class, 'index'])->name('a-mahasiswa');   // Tampilkan daftar terbimbing
    Route::get('/a-bimbingan', [AdminBimbinganController::class, 'index'])->name('a-bimbingan');   // Antrean persetujuan bimbingan

    // Aksi Persetujuan / Penolakan Pengajuan Bimbingan Mahasiswa
    Route::patch('/bimbingan/{id}/approve', [AdminBimbinganController::class, 'approve'])->name('bimbingan.approve'); // Setujui
    Route::patch('/bimbingan/{id}/reject', [AdminBimbinganController::class, 'reject'])->name('bimbingan.reject');   // Tolak
});

// 5. GRUP RUTE MAHASISWA TERAUTENTIKASI (AUTHENTICATED STUDENT ROUTES):
// Diproteksi oleh middleware default 'auth' (mengharuskan mahasiswa login terlebih dahulu).
Route::middleware(['auth'])->group(function () {
    
    // Rute Langkah Login Bertahap (Multi-step Login Transition) untuk transisi narasi cerita
    Route::get('/login2', [AuthController::class, 'showLogin2Form'])->name('login2');
    Route::get('/login3', [AuthController::class, 'showLogin3Form'])->name('login3');
    Route::get('/login4', [AuthController::class, 'showLogin4Form'])->name('login4');
    Route::post('/update-login-step', [AuthController::class, 'updateLoginStep'])->name('updateLoginStep'); // AJAX perbarui tahapan sesi cerita

    // Beranda Utama (Dasbor Mahasiswa RPG)
    Route::get('/homepage', [DashboardController::class, 'index'])->name('homepage');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/complete-quest', [DashboardController::class, 'completeQuest'])->name('dashboard.completeQuest'); // Klaim hadiah XP

    // Pengaturan Akun & Profil Mahasiswa
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Visual Peta Petualangan Skripsi
    Route::get('/peta1', function () { return view('peta.peta1'); })->name('peta.peta1');
    Route::get('/peta2', function () { return view('peta.peta2'); })->name('peta.peta2');

    // CRUD & Manajemen Pengajuan Mentoring / Bimbingan
    Route::prefix('mentoring')->name('mentoring.')->group(function () {
        Route::get('/', [MentoringController::class, 'mentoring1'])->name('index');             // List mentoring aktif & riwayat
        Route::get('/list', [MentoringController::class, 'mentoring1'])->name('1');
        Route::get('/pilih-jenis', [MentoringController::class, 'mentoring2'])->name('2');     // Form pilih tatap muka / online draft
        Route::get('/ajukan-meet', [MentoringController::class, 'mentoringC'])->name('C');     // Form input meet pertemuan
        Route::get('/ajukan-draft', [MentoringController::class, 'mentoringDraft'])->name('draft'); // Form input isi draf
        Route::post('/store', [MentoringController::class, 'store'])->name('store');           // Simpan bimbingan ke DB
        Route::get('/detail/{id}', [MentoringController::class, 'mentoringD'])->name('D');     // Detail info pertemuan
        Route::get('/draft-detail/{id}', [MentoringController::class, 'mentoringDraft1'])->name('draft1'); // Detail info draf
        Route::delete('/delete/{id}', [MentoringController::class, 'destroy'])->name('destroy'); // Batalkan/hapus ajuan
    });

    // Fitur Tambahan: Papan Peringkat XP & Pustaka Rujukan Materi
    Route::get('/peringkat', [PeringkatController::class, 'index'])->name('peringkat');
    Route::get('/library', [LibraryController::class, 'index'])->name('library');
});
