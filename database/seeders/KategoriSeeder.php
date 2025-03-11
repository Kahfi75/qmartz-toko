<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategoriList = [
            'Makanan', 'Minuman', 'Elektronik', 'Peralatan Dapur', 'Kosmetik',
            'Fashion Pria', 'Fashion Wanita', 'Kesehatan', 'Mainan', 'Buku'
        ];

        foreach ($kategoriList as $nama) {
            DB::table('kategori')->insert([
                'nama_kategori' => $nama
            ]);
        }
    }
}
