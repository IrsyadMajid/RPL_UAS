<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Penting untuk hashing password

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'RPL',
            'username' => 'RPL',
            'fullname' => 'RPL',
            'email' => 'RPL@student.upnjatim.ac.id',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'phone' => '081234567890',
            'gender' => 'male',
            'profile_photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
