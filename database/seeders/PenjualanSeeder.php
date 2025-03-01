<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Rina',
                'penjualan_kode' => 'A1',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Dani',
                'penjualan_kode' => 'A2',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'April',
                'penjualan_kode' => 'A3',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Noe',
                'penjualan_kode' => 'A4',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Annisa',
                'penjualan_kode' => 'A5',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Fara',
                'penjualan_kode' => 'A6',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Eca',
                'penjualan_kode' => 'A7',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Nova',
                'penjualan_kode' => 'A8',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Nia',
                'penjualan_kode' => 'A9',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Nanda',
                'penjualan_kode' => 'A10',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
