<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MetodePembayaranController;


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

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('/', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::controller(MetodePembayaranController::class)->prefix('metode_pembayaran')->group(function () {
    Route::get('', 'index')->name('metode_pembayaran');
    Route::get('tambah', 'tambah')->name('metode_pembayaran.tambah');
    Route::post('tambah', 'simpan')->name('metode_pembayaran.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('metode_pembayaran.edit');
    Route::post('edit/{id}', 'update')->name('metode_pembayaran.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('metode_pembayaran.hapus');
    Route::get('search', 'search')->name('metode_pembayaran.search');
});
