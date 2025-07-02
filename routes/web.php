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

Route::middleware('web')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::post('/forgot-password', [AuthController::class, 'handleForgotPassword'])->name('submitLupaPassword');
    Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('lupaPassword');
    Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('resetPasswordForm');
    Route::post('/reset-password', [AuthController::class, 'resetPasswordManual'])->name('password.manual.reset');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::prefix('admin')->name('admin.')->group(function() {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('/a-dashboard', [AdminDashboardController::class, 'index'])->name('a-dashboard');
            Route::get('/a-mahasiswa', [AdminMahasiswaController::class, 'index'])->name('a-mahasiswa');
            Route::get('/a-bimbingan', [AdminBimbinganController::class, 'index'])->name('a-bimbingan');

            Route::patch('/bimbingan/{id}/approve', [AdminBimbinganController::class, 'approve'])->name('bimbingan.approve');
            Route::patch('/bimbingan/{id}/reject', [AdminBimbinganController::class, 'reject'])->name('bimbingan.reject');
        });
    });

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

    Route::middleware(['auth'])->group(function () {
        Route::get('/login2', [AuthController::class, 'showLogin2Form'])->name('login2');
        Route::get('/login3', [AuthController::class, 'showLogin3Form'])->name('login3');
        Route::get('/login4', [AuthController::class, 'showLogin4Form'])->name('login4');
        Route::post('/update-login-step', [AuthController::class, 'updateLoginStep'])->name('updateLoginStep');

        Route::get('/homepage', [DashboardController::class, 'index'])->name('homepage');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/complete-quest', [DashboardController::class, 'completeQuest'])->name('dashboard.completeQuest');

        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/peta1', function () { return view('peta.peta1'); })->name('peta.peta1');
        Route::get('/peta2', function () { return view('peta.peta2'); })->name('peta.peta2');

        Route::prefix('mentoring')->name('mentoring.')->group(function () {
            Route::get('/', [MentoringController::class, 'mentoring1'])->name('index');
            Route::get('/list', [MentoringController::class, 'mentoring1'])->name('1');
            Route::get('/pilih-jenis', [MentoringController::class, 'mentoring2'])->name('2');
            Route::get('/ajukan-meet', [MentoringController::class, 'mentoringC'])->name('C');
            Route::get('/ajukan-draft', [MentoringController::class, 'mentoringDraft'])->name('draft');
            Route::post('/store', [MentoringController::class, 'store'])->name('store');
            Route::get('/detail/{id}', [MentoringController::class, 'mentoringD'])->name('D');
            Route::get('/draft-detail/{id}', [MentoringController::class, 'mentoringDraft1'])->name('draft1');
            Route::delete('/delete/{id}', [MentoringController::class, 'destroy'])->name('destroy');
        });

        Route::get('/peringkat', [PeringkatController::class, 'index'])->name('peringkat');
        Route::get('/library', [LibraryController::class, 'index'])->name('library');

        Route::get('/adminpage', function () { return view('adminpage'); })->middleware('admin');
    });

});
