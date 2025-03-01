<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_barang')->delete();
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'mie_instan',
                'barang_nama' => 'Indomie Goreng',
                'harga_beli' => 3.000,
                'harga_jual' => 3.500,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 2,
                'barang_kode' => 'minuman_sehat',
                'barang_nama' => 'Pocari Sweet',
                'harga_beli' => 4.000,
                'harga_jual' => 5.000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 4,
                'barang_kode' => 'obat',
                'barang_nama' => 'Antangin',
                'harga_beli' => 2.000,
                'harga_jual' => 2.500,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 5,
                'barang_kode' => 'bedak',
                'barang_nama' => 'Wardah Liquid Foundation',
                'harga_beli' => 15.000,
                'harga_jual' => 19.000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 1,
                'barang_kode' => 'kecap',
                'barang_nama' => 'Kecap Sedap',
                'harga_beli' => 3.000,
                'harga_jual' => 3.500,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 2,
                'barang_kode' => 'minuman_teh',
                'barang_nama' => 'Teh Pucuk Harum',
                'harga_beli' => 2.000,
                'harga_jual' => 3.000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'vitamin',
                'barang_nama' => 'Vitamin c IPI',
                'harga_beli' => 5.000,
                'harga_jual' => 6.000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 5,
                'barang_kode' => 'sunscreen',
                'barang_nama' => 'Emina Sunscreen',
                'harga_beli' => 20.000,
                'harga_jual' => 25.000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 3,
                'barang_kode' => 'TV',
                'barang_nama' => 'Panasonic TV',
                'harga_beli' => 700.000,
                'harga_jual' => 800.000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 3,
                'barang_kode' => 'AC',
                'barang_nama' => 'LG Air Conditioner',
                'harga_beli' => 800.000,
                'harga_jual' => 900.000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }

}
