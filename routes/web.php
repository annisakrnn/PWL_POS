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
Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
    //Tugas Jobsheet 5
// m_level
Route::group(['prefix' => 'level'], function () {
Route::get('/', [LevelController::class, 'index']);
Route::post('/list', [LevelController::class, 'list']);
Route::get('/create', [LevelController::class, 'create']);
Route::get('/{id}/edit', [LevelController::class, 'edit']);
Route::delete('/{id}', [LevelController::class, 'destroy']);
});
//m_kategori
Route::group(['prefix' => 'kategori'], function () {
Route::get('/', [KategoriController::class, 'index']);
Route::post('/list', [KategoriController::class, 'list']);
Route::get('/create', [KategoriController::class, 'create']);
Route::get('/{id}/edit', [KategoriController::class, 'edit']);
Route::delete('/{id}', [KategoriController::class, 'destroy']);
});
//m_barang
Route::group(['prefix' => 'barang'], function () {
Route::get('/', [BarangController::class, 'index']);
Route::get('/list', [BarangController::class, 'list'])->name('barang.list');
Route::get('/create', [BarangController::class, 'create']);
Route::get('/{id}/edit', [BarangController::class, 'edit']);
Route::delete('/{id}', [BarangController::class, 'destroy']);
});
//m_supplier
Route::group(['prefix' => 'supplier'], function () {
Route::get('/', [SupplierController::class, 'index']);
Route::post('/list', [SupplierController::class, 'list']);
Route::get('/create', [SupplierController::class, 'create']);
Route::get('/{id}/edit', [SupplierController::class, 'edit']);
Route::delete('/{id}', [SupplierController::class, 'destroy']);
});
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
// Route::get('/', [WelcomeController::class, 'index']); -->