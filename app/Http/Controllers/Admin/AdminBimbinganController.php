<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentoring;
use Illuminate\Support\Facades\Auth;

class AdminBimbinganController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $requests = Mentoring::with('user')->latest()->paginate(15);
        return view('admin-bimbingan.a-bimbingan', compact('requests'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $mentoring = Mentoring::findOrFail($id);
        $mentoring->update(['status' => 'Diterima']);
        return back()->with('success', 'Permintaan bimbingan telah disetujui.');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject($id)
    {
        $mentoring = Mentoring::findOrFail($id);
        $mentoring->update(['status' => 'Ditolak']);
        return back()->with('success', 'Permintaan bimbingan telah ditolak.');
    }
}
