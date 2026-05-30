<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Memproses filter keamanan untuk rute Mahasiswa.
     * Memeriksa apakah pengguna memiliki sesi login yang sah menggunakan guard default ('web').
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika mahasiswa TIDAK sedang login, arahkan ke form masuk dengan pesan kesalahan
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        // Izinkan request melaju ke tahap berikutnya
        return $next($request);
    }
}
