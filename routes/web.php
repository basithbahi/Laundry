<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisPencuciController;
use App\Http\Controllers\JenisCucianController;
use App\Http\Controllers\TipeLaundryController;

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


Route::controller(JenisPencuciController::class)->prefix('jenis_pencuci')->group(function () {
    Route::get('', 'index')->name('jenis_pencuci');
    Route::get('tambah', 'tambah')->name('jenis_pencuci.tambah');
    Route::post('tambah', 'simpan')->name('jenis_pencuci.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('jenis_pencuci.edit');
    Route::post('edit/{id}', 'update')->name('jenis_pencuci.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('jenis_pencuci.hapus');
    Route::get('search', 'search')->name('jenis_pencuci.search');
});

Route::controller(JenisCucianController::class)->prefix('jenis_cucian')->group(function () {
    Route::get('', 'index')->name('jenis_cucian');
    Route::get('tambah', 'tambah')->name('jenis_cucian.tambah');
    Route::post('tambah', 'simpan')->name('jenis_cucian.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('jenis_cucian.edit');
    Route::post('edit/{id}', 'update')->name('jenis_cucian.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('jenis_cucian.hapus');
    Route::get('search', 'search')->name('jenis_cucian.search');
});

Route::controller(TipeLaundryController::class)->prefix('tipe_laundry')->group(function () {
    Route::get('', 'index')->name('tipe_laundry');
    Route::get('tambah', 'tambah')->name('tipe_laundry.tambah');
    Route::post('tambah', 'simpan')->name('tipe_laundry.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('tipe_laundry.edit');
    Route::post('edit/{id}', 'update')->name('tipe_laundry.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('tipe_laundry.hapus');
    Route::get('search', 'search')->name('tipe_laundry.search');
});
