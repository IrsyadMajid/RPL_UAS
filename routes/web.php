<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    Route::get('/login2', [AuthController::class, 'showLogin2Form'])->name('login2');
    Route::get('/login3', [AuthController::class, 'showLogin3Form'])->name('login3');
    Route::get('/login4', [AuthController::class, 'showLogin4Form'])->name('login4');
});
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('lupaPassword');
Route::post('/forgot-password', [AuthController::class, 'handleForgotPassword'])->name('submitLupaPassword');
Route::get('/reset-password-form', [AuthController::class, 'showResetPasswordForm'])->name('resetPasswordForm');
Route::post('/reset-password-manual', [AuthController::class, 'resetPasswordManual'])->name('password.manual.reset');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');
Route::get('/halaman1', function () {
    return view('storylogin.halaman1');
})->name('halaman1');
Route::get('/halaman2', function () {
    return view('storylogin.halaman2');
})->name('halaman2');
Route::get('/halaman3', function () {
    return view('storylogin.halaman3');
})->name('halaman3');
Route::get('/halaman4', function () {
    return view('storylogin.halaman4');
})->name('halaman4');
Route::get('/halaman5', function () {
    return view('storylogin.halaman5');
})->name('halaman5');
Route::get('/halaman6', function () {
    return view('storylogin.halaman6');
})->name('halaman6');
Route::get('/halaman7', function () {
    return view('storylogin.halaman7');
})->name('halaman7');
Route::get('/halaman8', function () {
    return view('storylogin.halaman8');
})->name('halaman8');
Route::get('/halaman9', function () {
    return view('storylogin.halaman9');
})->name('halaman9');
Route::get('/halaman10', function () {
    return view('storylogin.halaman10');
})->name('halaman10');

Route::get('/adminpage', function () {
    return view('adminpage');
})->middleware(['auth', 'admin']);

Route::get('/peta', function () {
    return view('peta');
})->name('peta');

Route::get('/mentoring', function () {
    return view('mentoring');
})->name('mentoring');

Route::get('/peringkat', function () {
    return view('peringkat');
})->name('peringkat');

Route::get('/library', function () {
    return view('library');
})->name('library');
