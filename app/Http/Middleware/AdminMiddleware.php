<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Memproses filter keamanan untuk rute Admin.
     * Memeriksa apakah pengguna memiliki sesi login yang sah menggunakan guard 'admin'.
     */
    public function handle($request, Closure $next)
    {
        // Jika admin TIDAK sedang login, paksa arahkan ke form login disertai pesan error
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        // Jika berhasil terotentikasi, izinkan request untuk melanjutkan ke controller terkait
        return $next($request);
    }
}
