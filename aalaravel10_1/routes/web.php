<?php

use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\SiswaController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('/admin/siswa', [SiswaController::class, 'index']);
Route::get('/admin/siswa/add', [SiswaController::class, 'add'])->name('siswa_add');
Route::post('/admin/siswa/store', [SiswaController::class, 'store'])->name('siswa_store');
Route::get('/admin/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa_edit');
Route::post('/admin/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa_update');
Route::get('/admin/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa_delete');

Route::get('/admin/guru', [GuruController::class,'index']);
Route::get('/admin/guru/add', [GuruController::class, 'add'])->name('guru_add');
Route::post('/admin/guru/store', [GuruController::class, 'store'])->name('guru_store');
Route::get('/admin/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru_edit');
Route::post('/admin/guru/update/{id}', [GuruController::class, 'update'])->name('guru_update');
Route::get('/admin/guru/delete/{id}', [GuruController::class, 'delete'])->name('guru_delete');