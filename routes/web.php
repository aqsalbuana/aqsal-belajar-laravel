<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    $totalProduct = DB::table('products')->count();
    return view('dashboard', ['totalProduct' => $totalProduct]);
});
Route::get('data-produk', [ProductController::class, 'index'])->name('produk');
Route::get('tambah-produk', [ProductController::class, 'create'])->name('tambah-produk');
Route::get('edit-produk/{produk}', [ProductController::class, 'edit'])->name('edit-produk');
Route::post('simpan-produk', [ProductController::class, 'store'])->name('simpan-produk');
Route::put('update-produk/{produk}', [ProductController::class, 'update'])->name('update-produk');
Route::delete('hapus-produk/{produk}', [ProductController::class, 'destroy'])->name('hapus-produk');
