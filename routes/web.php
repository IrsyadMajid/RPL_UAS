<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/homepage', function () {
    return view('homepage');
})->middleware(['auth', 'user']);

Route::get('/adminpage', function () {
    return view('adminpage');
})->middleware(['auth', 'admin']);

Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');

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
