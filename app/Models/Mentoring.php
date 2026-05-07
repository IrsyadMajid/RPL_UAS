<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topic',
        'proposed_date',
        'status',
        'jenis_bimbingan',
        'file_content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
