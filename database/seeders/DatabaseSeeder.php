<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil UserSeeder untuk membuat akun Admin & Kasir
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(PemasokSeeder::class);
    }
}
