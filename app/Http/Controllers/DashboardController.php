<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentoring;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user->level = $user->level ?? 1;
        $user->xp = $user->xp ?? 0;
        $user->fullname = $user->fullname ?? $user->name;

        $user->updateLevel();

        $rankingData = [
            ['rank' => '🥇', 'name' => 'M. Irsyad Majid', 'level' => 10, 'consistency' => '98%'],
            ['rank' => '🥈', 'name' => 'Lucky Fitrianda', 'level' => 10, 'consistency' => '96%'],
            ['rank' => '🥉', 'name' => 'M. Rafathar A.', 'level' => 10, 'consistency' => '92%'],
        ];

        $mentoringHistory = Mentoring::where('user_id', Auth::id())
                                ->whereIn('status', ['Selesai', 'Ditolak', 'Dibatalkan'])
                                ->latest()
                                ->take(3)
                                ->get();

        return view('homepage', [
            'user' => $user,
            'rankingData' => $rankingData,
            'userRank' => 156,
            'mentoringHistory' => $mentoringHistory,
        ]);
    }

    public function completeQuest(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user || !$user instanceof \App\Models\User) {
            return redirect()->back()->with('error', 'Anda harus login');
        }

        $xpEarned = 10;
        $oldLevel = $user->level ?? 1;

        $user->addXp($xpEarned);

        if ($user->level > $oldLevel) {
            return redirect()->back()->with('success', "Quest selesai! Kamu mendapatkan {$xpEarned} XP dan naik ke Level {$user->level}!");
        }

        return redirect()->back()->with('success', "Quest selesai! Kamu mendapatkan {$xpEarned} XP!");
    }
}
