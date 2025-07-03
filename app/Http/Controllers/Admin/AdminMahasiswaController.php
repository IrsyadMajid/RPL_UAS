<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentoring;

class AdminMahasiswaController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        $approvedMentorings = Mentoring::where('status', 'Diterima')->with('user')->get();

        return view('admin-mahasiswa.a-mahasiswa', [
            'admin' => $admin,
            'approvedRequests' => $approvedMentorings
        ]);
    }
}
