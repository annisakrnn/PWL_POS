<?php

use App\Http\Controllers\BarangController;
use App\Models\Barang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WelcomeController;

//Jobsheet 5
// Route::get('/', [WelcomeController::class, 'index']);

// Route::group(['prefix' => 'user'], function () {
//     Route::get('/', [UserController::class, 'index']);
//     Route::get('/user/list', [UserController::class, 'list'])->name('user.list');
//     Route::get('/create', [UserController::class, 'create']);
//     Route::post('/', [UserController::class, 'store']);
//     Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
//     Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
//     Route::put('/{id}', [UserController::class, 'update']);
//     Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //Tugas Jobsheet 5
//m_level
// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/level/list', [LevelController::class, 'list'])->name('level.list');
// Route::get('/level/create', [LevelController::class, 'create']);
// Route::get('/level/{id}/edit', [LevelController::class, 'edit']);
// Route::delete('/level/{id}', [LevelController::class, 'destroy']);

//m_kategori
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/kategori/list', [KategoriController::class, 'list'])->name('kategori.list');
// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
// Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

//m_barang
// Route::get('/barang', [BarangController::class, 'index']);
// Route::get('/barang/list', [BarangController::class, 'list'])->name('barang.list');
// Route::get('/barang/create', [BarangController::class, 'create']);
// Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
// Route::delete('/barang/{id}', [BarangController::class, 'destroy']);

//m_supplier
Route::get('/supplier', [SupplierController::class, 'index']);
Route::get('/supplier/list', [SupplierController::class, 'list'])->name('supplier.list');
Route::get('/supplier/create', [SupplierController::class, 'create']);
Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit']);
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy']);
// Route::get('/', function() {
//     return view('welcome');
// });

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::get('/', [WelcomeController::class, 'index']);