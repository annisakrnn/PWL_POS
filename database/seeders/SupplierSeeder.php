<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_kode' => 'SUP001',
                'supplier_nama' => 'PT. Sumber Berkah',
                'kontak' => '08123456789',
                'alamat' => 'Jl. Raya No. 123, Jakarta',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'supplier_kode' => 'SUP002',
                'supplier_nama' => 'CV. Jaya Abadi',
                'kontak' => '08234567890',
                'alamat' => 'Jl. Merdeka No. 456, Bandung',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'supplier_kode' => 'SUP003',
                'supplier_nama' => 'UD. Makmur Sentosa',
                'kontak' => '08345678901',
                'alamat' => 'Jl. Pahlawan No. 789, Surabaya',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
