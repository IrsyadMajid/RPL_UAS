<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Memproses penyaringan request berdasarkan jenis otentikasi aktif.
     * Mengamankan agar Admin dan Mahasiswa diarahkan secara konsisten setelah terotentikasi.
     */
    public function handle($request, Closure $next)
    {
        // 1. Jika terotentikasi sebagai Admin, izinkan akses langsung
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // 2. Jika terotentikasi sebagai Mahasiswa (Web), paksa selesaikan storyline login
        if (Auth::guard('web')->check()) {
            return redirect()->route('login2');
        }

        // 3. Jika tidak terotentikasi di guard manapun, paksa login ulang
        return redirect('/login');
    }
}
