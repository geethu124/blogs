<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegularUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'john',
            'email' => 'johnt@blogs.com',
            'password' => Hash::make('john123'),
            'role' => 'user',
        ]);
    }
}
