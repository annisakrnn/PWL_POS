<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = BarangModel::with('kategori')->get();
        return response()->json([
            'success' => true,
            'data' => $barangs
        ], 200);
    }
    public function store(Request $request)
    {
        // Set validator
        $validator = Validator::make($request->all(), [
            'barang_kode' => 'required|unique:m_barang,barang_kode',
            'barang_nama' => 'required',
            'harga_jual' => 'required|numeric|min:0',
            'harga_beli' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required|exists:m_kategori,kategori_id'
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('barang', 'public');
        }
        // Create barang
        $barang = BarangModel::create([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'image' => $imagePath,
            'kategori_id' => $request->kategori_id
        ]);

        // Return response JSON if barang is created
        if ($barang) {
            return response()->json([
                'success' => true,
                'data' => $barang->load('kategori')
            ], 201);
        }

        // Return JSON if process insert failed
        return response()->json([
            'success' => false
        ], 409);
    }
    public function update(Request $request, BarangModel $barang)
    {
        // Set validator
        $validator = Validator::make($request->all(), [
            'barang_kode' => 'required|unique:m_barang,barang_kode,' . $barang->barang_id . ',barang_id',
            'barang_nama' => 'required',
            'harga_jual' => 'required|numeric|min:0',
            'harga_beli' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required|exists:m_kategori,kategori_id'
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Handle file upload
        $imagePath = $barang->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('barang', 'public');
        }
        // Update barang
        $barang->update([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'image' => $imagePath,
            'kategori_id' => $request->kategori_id
        ]);

        return response()->json([
            'success' => true,
            'data' => $barang->load('kategori')
        ], 200);
    }

    /**
     * Menghapus barang
     */
    public function destroy(BarangModel $barang)
    {
        // Hapus gambar jika ada
        if ($barang->image) {
            Storage::disk('public')->delete($barang->image);
        }
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Barang deleted successfully'
        ], 200);
    }
    public function show(BarangModel $barang)
    {
        return BarangModel::find($barang);
    }
}