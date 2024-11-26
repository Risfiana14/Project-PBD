<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\KartuStokController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\SatuanController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('master')->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('vendor', VendorController::class);
    Route::resource('user', UserController::class);
    Route::resource('satuan', SatuanController::class);
});
Route::prefix('transaksi')->group(function () {
    Route::resource('penerimaan', PenerimaanController::class);
    Route::resource('pengadaan', PengadaanController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('retur', ReturController::class);
});
Route::prefix('stok')->group(function () {
    Route::get('kartu', [KartuStokController::class, 'index']);
});
Route::prefix('laporan')->group(function () {
    Route::get('penjualan', [LaporanController::class, 'penjualan']);
    Route::get('penerimaan', [LaporanController::class, 'penerimaan']);
    Route::get('margin', [LaporanController::class, 'margin']);
});
Route::prefix('pengaturan')->group(function () {
    Route::get('konfigurasi', [KonfigurasiController::class, 'index']);
});
