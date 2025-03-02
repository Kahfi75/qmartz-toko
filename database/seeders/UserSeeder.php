<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel users.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Qmartz',
                'email' => 'admin@qmartz.com',
                'password' => Hash::make('admin123'),
                'foto' => null,
                'level' => 1, // Level 1 = Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kasir Qmartz',
                'email' => 'kasir@qmartz.com',
                'password' => Hash::make('kasir123'),
                'foto' => null,
                'level' => 2, // Level 2 = Kasir
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
