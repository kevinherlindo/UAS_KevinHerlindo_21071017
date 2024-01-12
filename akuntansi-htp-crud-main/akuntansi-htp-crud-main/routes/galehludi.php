<?php

use App\Http\Controllers\GalehLudi\JadwalController;
use App\Http\Controllers\GalehLudi\MatakuliahController;
use Illuminate\Support\Facades\Route;

/*
    |--------------------------------------------------------------------------
    | Galeh Ludi Routes
    |--------------------------------------------------------------------------
    |
    | Custom routes yang dibuat untuk prefix galeh-ludi
    |
 */

Route::prefix('galehludi')->group(function () {
    Route::get('matakuliah', [MatakuliahController::class, 'index'])->name('galehludi.matakuliah');
    Route::get('jadwal', [JadwalController::class, 'index'])->name('galehludi.jadwal');
    Route::get('routes', fn () => view('galehludi.routes'));
});
