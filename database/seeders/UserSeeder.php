<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Agus',
            'email' => 'admin@tokosayur.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Kasir Burhan',
            'email' => 'kasir@tokosayur.com',
            'role' => 'kasir',
            'password' => Hash::make('kasir123'),
        ]);

        User::create([
            'name' => 'User Dewi',
            'email' => 'user@tokosayur.com',
            'role' => 'pengguna',
            'password' => Hash::make('user123'),
        ]);
    }
}

