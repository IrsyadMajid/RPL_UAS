<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
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

        return $levelNames[$this->level] ?? 'Level ' . $this->level;
    }

    public function getXpForNextLevelAttribute()
    {
        if ($this->level === 1) {
            return 10;
        }

        return 10;
    }

    public function addXp(int $amount): void
    {
        $this->xp += $amount;
        $xpNeededForNextLevel = $this->getXpForNextLevelAttribute();

        while ($this->xp >= $xpNeededForNextLevel) {
            $this->xp -= $xpNeededForNextLevel;
            $this->level++;
            $xpNeededForNextLevel = $this->getXpForNextLevelAttribute();
        }
        $this->save();
    }
}
