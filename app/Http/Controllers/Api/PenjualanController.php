<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use App\Models\PenjualanDetailModel;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = PenjualanModel::with(['user', 'details.barang'])->get();
        return response()->json([
            'success' => true,
            'data' => $penjualans
        ], 200);
    }

    public function store(Request $request)
    {
        // Validasi input, termasuk file gambar
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:m_user,user_id',
            'pembeli' => 'required|string|max:50',
            'penjualan_kode' => 'required|string|max:20|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date',
            'details' => 'required|array',
            'details.*.barang_id' => 'required|exists:m_barang,barang_id',
            'details.*.jumlah' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi gambar (opsional, maks 2MB)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            // Simpan file gambar jika ada
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('penjualan_images', $imageName, 'public'); // Simpan di storage/public/penjualan_images
            }

            // Buat data penjualan
            $penjualan = PenjualanModel::create([
                'user_id' => $request->user_id,
                'pembeli' => $request->pembeli,
                'penjualan_kode' => $request->penjualan_kode,
                'penjualan_tanggal' => $request->penjualan_tanggal,
                'image' => $imagePath // Simpan path gambar ke database
            ]);

            // Proses detail penjualan
            foreach ($request->details as $detail) {
                $barang = BarangModel::find($detail['barang_id']);
                if (!$barang) {
                    throw new \Exception('Barang tidak ditemukan');
                }

                PenjualanDetailModel::create([
                    'penjualan_id' => $penjualan->penjualan_id,
                    'barang_id' => $detail['barang_id'],
                    'harga' => $barang->harga_jual,
                    'jumlah' => $detail['jumlah'],
                    'subtotal' => $detail['jumlah'] * $barang->harga_jual
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'data' => $penjualan->load(['user', 'details.barang'])
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat penjualan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show(PenjualanModel $penjualan)
    {
        return response()->json([
            'success' => true,
            'data' => $penjualan->load(['user', 'details.barang'])
        ], 200);
    }
}