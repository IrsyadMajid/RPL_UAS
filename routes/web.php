<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MentoringController;

Route::middleware('web')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'handleForgotPassword'])->name('submitLupaPassword');
    Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('lupaPassword');
    Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('resetPasswordForm');
    Route::post('/reset-password', [AuthController::class, 'resetPasswordManual'])->name('password.manual.reset');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

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

        Route::prefix('mentoring')->group(function () {
            Route::get('/1', [MentoringController::class, 'mentoring1'])->name('mentoring.1');
            Route::get('/2', [MentoringController::class, 'mentoring2'])->name('mentoring.2');
            Route::get('/C', [MentoringController::class, 'mentoringC'])->name('mentoring.C');
            Route::get('/D', [MentoringController::class, 'mentoringD'])->name('mentoring.D');
            Route::get('/draft', [MentoringController::class, 'mentoringDraft'])->name('mentoring.draft');
            Route::get('/draft1', [MentoringController::class, 'mentoringDraft1'])->name('mentoring.draft1');
            Route::get('/', function () {
                return redirect()->route('mentoring.1');
            })->name('mentoring');
        });

        Route::get('/peringkat', function () { return view('peringkat'); })->name('peringkat');
        Route::get('/library', function () { return view('library'); })->name('library');

        Route::get('/adminpage', function () { return view('adminpage'); })->middleware('admin');
    });

});
