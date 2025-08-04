<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'), // <- ini di-hash secara aman
            'id_role' => 1          // admin
        ]);
         User::create([
            'username' => 'Rini',
            'email' => 'rini@gmail.com',
            'password' => Hash::make('123456'),
            'id_role' => 2      // guru
        ]);
         User::create([
            'username' => 'Restu',
            'email' => 'restu@gmail.com',
            'password' => Hash::make('123456'),
            'id_role' => 3    // siswa
        ]);
    }
}
