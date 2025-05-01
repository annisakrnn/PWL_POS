<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('t_penjualan', function (Blueprint $table) {
            // Ganti nama kolom penjualan_tnggal menjadi penjualan_tanggal
            $table->renameColumn('penjualan_tnggal', 'penjualan_tanggal');
            // Hapus constraint unique pada pembeli
            $table->dropUnique(['pembeli']);
            // Tambahkan kolom pembeli tanpa unique
            $table->string('pembeli', 50)->change();
        });
    }

    public function down(): void
    {
        Schema::table('t_penjualan', function (Blueprint $table) {
            // Kembalikan nama kolom
            $table->renameColumn('penjualan_tanggal', 'penjualan_tnggal');
            // Kembalikan constraint unique
            $table->string('pembeli', 50)->unique()->change();
        });
    }
};