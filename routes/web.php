<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('lupaPassword');
Route::post('/forgot-password', [AuthController::class, 'handleForgotPassword'])->name('submitLupaPassword');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/halaman{num}', function ($num) {
    return view("storylogin.halaman{$num}");
})->where('num', '[1-9]|10')->name('halaman');

Route::middleware(['auth'])->group(function () {
    Route::get('/login2', [AuthController::class, 'showLogin2Form'])->name('login2');
    Route::get('/login3', [AuthController::class, 'showLogin3Form'])->name('login3');
    Route::get('/login4', [AuthController::class, 'showLogin4Form'])->name('login4');

    Route::get('/homepage', [App\Http\Controllers\DashboardController::class, 'index'])->name('homepage');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/complete-quest', [DashboardController::class, 'completeQuest'])->name('dashboard.completeQuest');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/peta1', function () { return view('peta.peta1'); })->name('peta.peta1');
    Route::get('/peta2', function () { return view('peta.peta2'); })->name('peta.peta2');
    Route::get('/mentoring', function () { return view('mentoring'); })->name('mentoring');
    Route::get('/peringkat', function () { return view('peringkat'); })->name('peringkat');
    Route::get('/library', function () { return view('library'); })->name('library');

    Route::get('/adminpage', function () { return view('adminpage'); })->middleware('admin');
});
