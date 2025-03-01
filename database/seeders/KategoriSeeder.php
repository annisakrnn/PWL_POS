<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'kategori_kode' => 'makanan', 'kategori_nama' => 'Makanan'],
            ['kategori_id' => 2, 'kategori_kode' => 'minuman', 'kategori_nama' => 'Minuman'],
            ['kategori_id' => 3, 'kategori_kode' => 'elektronik', 'kategori_nama' => 'Elektronik'],
            ['kategori_id' => 4, 'kategori_kode' => 'kesehatan', 'kategori_nama' => 'Kesehatan'],
            ['kategori_id' => 5, 'kategori_kode' => 'skincare', 'kategori_nama' => 'Skincare'],
        ];
        DB::table('m_kategori')->insert($data);
}
}