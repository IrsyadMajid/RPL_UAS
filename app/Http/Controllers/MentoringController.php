<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentoring;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MentoringController extends Controller
{
    public function mentoring1()
    {
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $upcoming = Mentoring::where('user_id', $userId)
                             ->where('status', 'Diterima')
                             ->latest()
                             ->get();

        $history = Mentoring::where('user_id', $userId)
                            ->where('status', '!=', 'Diterima')
                            ->latest()
                            ->get();

        return view('mentoring.mentoring1', compact('upcoming', 'history'));
    }

    public function mentoring2()
    {
        return view('mentoring.mentoring2');
    }

    public function mentoringC()
    {
        return view('mentoring.mentoringC');
    }

    public function mentoringD($id)
    {
        $mentoring = Mentoring::where('user_id', Auth::id())->findOrFail($id);
        return view('mentoring.mentoringD', compact('mentoring'));
    }

    public function mentoringDraft()
    {
        return view('mentoring.mentoringDraft');
    }

    public function mentoringDraft1($id)
    {
        $mentoring = Mentoring::where('user_id', Auth::id())->findOrFail($id);
        return view('mentoring.mentoringDraft1', compact('mentoring'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'topic' => 'required|string|min:5|max:255',
            'proposed_date' => 'required|date',
            'proposed_time' => 'required',
            'jenis_bimbingan' => 'required|string',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'jenis_bimbingan' => 'required|string',
        ]);

        $filePath = null;
        if ($request->hasFile('file_upload')) {
            $filePath = $request->file('file_upload')->store('mentoring_files', 'public');
        }

        $proposedDateTime = $validatedData['proposed_date'] . ' ' . $validatedData['proposed_time'];

        $newMentoring = Mentoring::create([
            'user_id' => Auth::id(),
            'topic' => $validatedData['topic'],
            'proposed_date' => $proposedDateTime,
            'jenis_bimbingan' => $validatedData['jenis_bimbingan'],
            'file_path' => $filePath,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('mentoring.D', ['id' => $newMentoring->id])
            ->with('success', 'Jadwal bimbingan berhasil diajukan!');
    }

    public function destroy($id)
    {
        $mentoring = Mentoring::where('user_id', Auth::id())->findOrFail($id);
        if ($mentoring->file_path) {
            Storage::disk('public')->delete($mentoring->file_path);
        }

        $mentoring->delete();

        return redirect()->route('mentoring.1')->with('success', 'Jadwal mentoring berhasil dihapus.');
    }
}
