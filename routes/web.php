<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CollectiveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MenuController::class, 'index'])->name('pilih-menu');
Route::get('/getPesanan', [MenuController::class, 'getPesanan'])->name('getPesanan');
Route::get('/checkOut', [MenuController::class, 'checkOut'])->name('checkOut');
Route::post('/keranjang', [MenuController::class, 'keranjang'])->name('keranjang');
Route::put('/pesanan/{id}', [MenuController::class, 'updatePesanan'])->name('updatePesanan');
Route::get('/beli/{id}', [MenuController::class, 'beli'])->name('beli');

Route::get('/collective', [CollectiveController::class, 'index'])->name('collective');
Route::post('/pilihMenuCollective', [CollectiveController::class, 'pilihMenuCollective'])->name('pilih-menu-collective');
Route::get('/getCollectiveDetailMenu', [CollectiveController::class, 'getCollectiveDetailMenu'])->name('getCollectiveDetailMenu');
Route::get('/checkOut-collective/{id}', [CollectiveController::class, 'checkOutCollective'])->name('checkOut-collective');
Route::post('/keranjangCollective', [CollectiveController::class, 'keranjangCollective'])->name('keranjang-collective');
Route::put('/CollectiveDetailMenu', [CollectiveController::class, 'updateCollectiveDetailMenu'])->name('updateCollectiveDetailMenu');
Route::post('/beliCollective/{id}', [CollectiveController::class, 'beliCollective'])->name('beliCollective');
Route::get('/pesanSekarang/{id}', [CollectiveController::class, 'pesanSekarang'])->name('pesanSekarang');
