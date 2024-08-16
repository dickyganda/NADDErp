<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\StokController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard/index');
});

Route::get('/barang/index', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barangcreate');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barangstore');
Route::get('/barang/edit/{IdBarang}', [BarangController::class, 'edit'])->name('barangedit');
Route::put('/barang/update/{IdBarang}', [BarangController::class, 'update'])->name('barang.update');
Route::put('barang/delete/{IdBarang}', [BarangController::class, 'delete'])->name('barangdelete');

Route::get('/harga/index', [HargaController::class, 'index'])->name('harga.index');
Route::get('/harga/create', [HargaController::class, 'create'])->name('harga.create');
Route::post('/harga/store', [HargaController::class, 'store'])->name('harga.store');
Route::get('/harga/edit/{IdHarga}', [HargaController::class, 'edit'])->name('harga.edit');
Route::put('/harga/update/{IdHarga}', [HargaController::class, 'update'])->name('harga.update');
Route::put('harga/delete/{IdHarga}', [HargaController::class, 'delete'])->name('harga.delete');

Route::get('/stok/index', [StokController::class, 'index'])->name('stok.index');
Route::get('/stok/create', [StokController::class, 'create'])->name('stok.create');
Route::post('/stok/store', [StokController::class, 'store'])->name('stok.store');
Route::get('/stok/edit/{IdStok}', [StokController::class, 'edit'])->name('stok.edit');
Route::put('/stok/update/{IdStok}', [StokController::class, 'update'])->name('stok.update');
Route::put('stok/delete/{IdStok}', [StokController::class, 'delete'])->name('stok.delete');
