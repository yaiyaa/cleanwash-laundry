<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});


/*
|--------------------------------------------------------------------------
| Semua Halaman CleanWash
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/laporan-transaksi', [LaporanController::class, 'transaksi'])
    ->name('laporan.transaksi');

Route::get('/laporan-transaksi/export/pdf', [
    LaporanController::class,
    'exportPdf'
])->name('laporan.export.pdf');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('verified')
        ->name('dashboard');


    // Pelanggan
    Route::resource('pelanggan', PelangganController::class);


    // Paket Laundry
    Route::resource('paket', PaketController::class);


    // Transaksi Laundry
    Route::resource('transaksi', TransaksiController::class);
    Route::get('/riwayat-transaksi', [TransaksiController::class, 'riwayat'])
    ->name('transaksi.riwayat');



    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
