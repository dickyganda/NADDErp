<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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
