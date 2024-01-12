<?php

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

Route::get('akun', 'App\Http\Controllers\AkunController@index');
Route::get('akun/tambah', 'App\Http\Controllers\AkunController@tambah');
Route::post('akun/tambah_proses', 'App\Http\Controllers\AkunController@tambah_proses');
Route::get('akun/edit/{id}', 'App\Http\Controllers\AkunController@edit');
Route::post('akun/edit_proses', 'App\Http\Controllers\AkunController@edit_proses');
Route::get('akun/delete/{id}', 'App\Http\Controllers\AkunController@delete');

Route::get('jadwal', 'App\Http\Controllers\JadwalController@index');

require('galehludi.php');
