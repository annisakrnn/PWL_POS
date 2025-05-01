<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('t_penjualan_detail_ta', function (Blueprint $table) {
            // Hapus foreign key constraint
            $table->dropForeign(['barang_id']);
            // Hapus indeks unik
            $table->dropUnique(['barang_id']);
            // Tambahkan kembali foreign key tanpa unik
            $table->foreign('barang_id')->references('barang_id')->on('m_barang')->onDelete('restrict');
            // Ubah kolom harga menjadi decimal
            $table->decimal('harga', 15, 2)->change();
            // Tambahkan kolom subtotal hanya jika belum ada
            if (!Schema::hasColumn('t_penjualan_detail_ta', 'subtotal')) {
                $table->decimal('subtotal', 15, 2)->after('jumlah');
            }
        });
    }

    public function down(): void
    {
        Schema::table('t_penjualan_detail_ta', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['barang_id']);
            // Kembalikan harga ke integer
            $table->integer('harga')->change();
            // Tambahkan kembali indeks unik
            $table->unique('barang_id');
            // Tambahkan kembali foreign key dengan unik
            $table->foreign('barang_id')->references('barang_id')->on('m_barang');
            // Hapus kolom subtotal jika ada
            if (Schema::hasColumn('t_penjualan_detail_ta', 'subtotal')) {
                $table->dropColumn('subtotal');
            }
        });
    }
};