<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'detail_id' => 1,
                'penjualan_id' => 1,
                'barang_id' => 1,
                'harga' => 7.000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 2,
                'penjualan_id' => 2,
                'barang_id' => 2,
                'harga' => 15.000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 3,
                'penjualan_id' => 3,
                'barang_id' => 3,
                'harga' => 5.000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 4,
                'penjualan_id' => 4,
                'barang_id' => 4,
                'harga' => 19.000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 5,
                'penjualan_id' => 5,
                'barang_id' => 5,
                'harga' => 7.000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 6,
                'penjualan_id' => 6,
                'barang_id' => 6,
                'harga' => 12.000,
                'jumlah' => 4,
            ],
            [
                'detail_id' => 7,
                'penjualan_id' => 7,
                'barang_id' => 7,
                'harga' => 6.000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 8,
                'penjualan_id' => 8,
                'barang_id' => 8,
                'harga' => 25.000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 9,
                'penjualan_id' => 9,
                'barang_id' => 9,
                'harga' => 700.000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 10,
                'penjualan_id' => 10,
                'barang_id' => 10,
                'harga' => 700.000,
                'jumlah' => 1,
            ],
        ];
        DB::table('t_penjualan_detail_ta')->insert($data);
    }
}
