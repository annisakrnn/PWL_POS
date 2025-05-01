<?php
use App\Http\Controllers\Api\KetegoriController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\PenjualanController;
use App\Http\Controllers\Api\RegisterController;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Jobsheet 10
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('levels', [LevelController::class, 'index']);
Route::post('levels', [LevelController::class, 'store']);
Route::get('levels/{level}', [LevelController::class, 'show']);
Route::put('levels/{level}', [LevelController::class, 'update']);
Route::delete('levels/{level}', [LevelController::class, 'destroy']);

Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::put('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);

Route::get('kategoris', [KetegoriController::class, 'index']);
Route::post('kategoris', [KetegoriController::class, 'store']);
Route::get('kategoris/{kategori}', [KetegoriController::class, 'show']);
Route::put('kategoris/{kategori}', [KetegoriController::class, 'update']);
Route::delete('kategoris/{kategori}', [KetegoriController::class, 'destroy']);

Route::get('barangs', [BarangController::class, 'index']);
Route::post('barangs', [BarangController::class, 'store']);
Route::get('barangs/{barang}', [BarangController::class, 'show']);
Route::put('barangs/{barang}', [BarangController::class, 'update']);
Route::delete('barangs/{barang}', [BarangController::class, 'destroy']);

Route::post('/register1', App\Http\Controllers\Api\RegisterController::class)->name('register1');
Route::post('/register2', [App\Http\Controllers\Api\BarangController::class, 'store'])->name('register2');

Route::get('penjualans', [PenjualanController::class, 'index']);
Route::post('penjualans', [PenjualanController::class, 'store']);
Route::get('penjualans/{penjualan}', [PenjualanController::class, 'show']);
