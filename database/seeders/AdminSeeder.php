<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Zainab',
            'email' => 'zainab2@mail.com',
            'password' => Hash::make('zainab1234'),
            'role' => 'super_admin',
            'isVerified' => 1,
        ]);
    }
}
