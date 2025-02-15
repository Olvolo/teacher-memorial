<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'olvolo',
            'email' => 'olvolo2021@gmail.com',
            'password' => Hash::make('4762131'),
            'is_admin' => true
        ]);
    }
}
