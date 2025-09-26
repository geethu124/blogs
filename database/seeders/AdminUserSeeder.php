<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (!User::where('role', 'admin')->exists()) {
         User::create([
            'name' => 'Admin',
            'email' => 'admin@blogs.com',
            'password' => Hash::make('admin@123'),
            'role' => 'admin',
        ]);
    }
    }
}
