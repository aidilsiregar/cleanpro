<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create Admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@cleanpro.com',
            'password' => Hash::make('password'),
            'employee_id' => 'ADM001',
            'phone' => '081234567890',
            'address' => 'Jakarta, Indonesia'
        ]);
        $admin->assignRole('admin');

        // Create Petugas
        $petugas = User::create([
            'name' => 'Petugas Cleaning',
            'email' => 'petugas@cleanpro.com',
            'password' => Hash::make('password'),
            'employee_id' => 'PTG001',
            'phone' => '081298765432',
            'address' => 'Jakarta, Indonesia'
        ]);
        $petugas->assignRole('petugas');

        // Create User
        $user = User::create([
            'name' => 'Customer User',
            'email' => 'user@cleanpro.com',
            'password' => Hash::make('password'),
            'phone' => '081255566677',
            'address' => 'Jakarta, Indonesia'
        ]);
        $user->assignRole('user');
    }
}