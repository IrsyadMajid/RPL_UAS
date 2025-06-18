<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user->level = $user->level ?? 1;
        $user->xp = $user->xp ?? 0;
        $user->fullname = $user->fullname ?? $user->name;

        $this->updateUserLevel($user);

        $user->xp_for_next_level = $this->getXpForLevel($user->level + 1);
        $user->level_name = $this->getLevelName($user->level);

        $rankingData = [
            ['rank' => '🥇', 'name' => 'M. Irsyad Majid', 'level' => 10, 'consistency' => '98%'],
            ['rank' => '🥈', 'name' => 'Lucky Fitrianda', 'level' => 10, 'consistency' => '96%'],
            ['rank' => '🥉', 'name' => 'M. Rafathar A.', 'level' => 10, 'consistency' => '92%'],
        ];

        return view('homepage', [
            'user' => $user,
            'rankingData' => $rankingData,
            'userRank' => 156
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

        $user->xp = ($user->xp ?? 0) + $xpEarned;

        $oldLevel = $user->level ?? 1;
        $this->updateUserLevel($user);

        $user->save();

        if ($user->level > $oldLevel) {
            return redirect()->back()->with('success', "Quest selesai! Kamu mendapatkan {$xpEarned} XP dan naik ke Level {$user->level}!");
        }

        return redirect()->back()->with('success', "Quest selesai! Kamu mendapatkan {$xpEarned} XP!");
    }

    private function updateUserLevel($user)
    {
        $currentXp = $user->xp ?? 0;
        $newLevel = $this->calculateLevelFromXp($currentXp);

        $user->level = $newLevel;
    }

    private function calculateLevelFromXp($totalXp)
    {
        if ($totalXp < 10) return 1;
        if ($totalXp < 20) return 2;
        if ($totalXp < 30) return 3;
        if ($totalXp < 40) return 4;
        if ($totalXp < 50) return 5;
        if ($totalXp < 60) return 6;
        if ($totalXp < 70) return 7;
        if ($totalXp < 80) return 8;
        if ($totalXp < 90) return 9;
        if ($totalXp < 100) return 10;

        $level = 10;
        $xpRequired = 100;
        $increment = 10;

        while ($totalXp >= $xpRequired) {
            $level++;
            $xpRequired += $increment;
            $increment += 10;
        }

        return $level;
    }

    private function getXpForLevel($targetLevel)
    {
        if ($targetLevel <= 1) return 10;
        if ($targetLevel == 2) return 20;
        if ($targetLevel == 3) return 30;
        if ($targetLevel == 4) return 40;
        if ($targetLevel == 5) return 50;
        if ($targetLevel == 6) return 60;
        if ($targetLevel == 7) return 70;
        if ($targetLevel == 8) return 80;
        if ($targetLevel == 9) return 90;
        if ($targetLevel == 10) return 100;

        $xpRequired = 100;
        $increment = 10;

        for ($level = 10; $level <= $targetLevel; $level++) {
            $xpRequired += $increment;
            $increment += 10;
        }

        return $xpRequired;
    }

    private function getLevelName($level)
    {
        $levelNames = [
            1 => 'Gerbang Arcana',
            2 => 'Mencari Mentor',
            3 => 'Ritual Judul',
            4 => 'Awal Perjalanan',
            5 => 'Duel Proposal',
            6 => 'Lembah Revisi Abadi',
            7 => 'Lembah Revisi Abadi',
            8 => 'Lembah Revisi Abadi',
            9 => 'Lembah Revisi Abadi',
            10 => 'Sidang Suci Arcana'
        ];

        if ($level <= 10) {
            return $levelNames[$level];
        }

        return 'Transcendent';
    }
}
