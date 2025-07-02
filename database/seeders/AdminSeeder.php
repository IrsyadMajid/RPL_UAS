<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama' => 'admin',
            'email' => 'admin@lecturer.upnjatim.ac.id',
            'password' => Hash::make('123123'),
            'email_verified_at' => now(),
        ]);
    }
}
