<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'fullname',
        'email',
        'phone',
        'password',
        'gender',
        'profile_photo',
        'level',
        'xp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'level' => 'integer',
        'xp' => 'integer',
    ];

    /**
     * Get level name based on current level.
     */
    public function getLevelNameAttribute()
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
            10 => 'Sidang Suci Arcana',
        ];

        return $levelNames[$this->level] ?? 'Transcendent';
    }

    /**
     * Calculate XP needed for the next level.
     */
    public function getXpForNextLevelAttribute()
    {
        return $this->getXpForLevel($this->level + 1);
    }

    /**
     * Get XP threshold for a specific target level.
     */
    public function getXpForLevel($targetLevel)
    {
        if ($targetLevel <= 1) return 10;

        // Level 2-10: 10 XP per level (10, 20, 30, ..., 100)
        if ($targetLevel <= 10) {
            return $targetLevel * 10;
        }

        // Level 11+: incremental XP
        $xpRequired = 100;
        $increment = 10;

        for ($level = 10; $level < $targetLevel; $level++) {
            $xpRequired += $increment;
            $increment += 10;
        }

        return $xpRequired;
    }

    /**
     * Calculate level from total XP.
     */
    public function calculateLevelFromXp($totalXp)
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

    /**
     * Update the user's level based on their current XP.
     */
    public function updateLevel()
    {
        $this->level = $this->calculateLevelFromXp($this->xp ?? 0);
    }

    /**
     * Add XP to this user and recalculate their level.
     */
    public function addXp(int $amount): void
    {
        $this->xp = ($this->xp ?? 0) + $amount;
        $this->updateLevel();
        $this->save();
    }
}
