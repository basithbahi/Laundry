<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TipeLaundryController;
use App\Http\Controllers\JenisCucianController;
use App\Http\Controllers\JenisPencuciController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayatTransaksiController;

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

Route::controller(MetodePembayaranController::class)->prefix('metode_pembayaran')->group(function () {
    Route::get('', 'index')->name('metode_pembayaran');
    Route::get('tambah', 'tambah')->name('metode_pembayaran.tambah');
    Route::post('tambah', 'simpan')->name('metode_pembayaran.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('metode_pembayaran.edit');
    Route::post('edit/{id}', 'update')->name('metode_pembayaran.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('metode_pembayaran.hapus');
    Route::get('search', 'search')->name('metode_pembayaran.search');
});

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('', 'index')->name('user');
    Route::get('tambah', 'tambah')->name('user.tambah');
    Route::post('tambah', 'simpan')->name('user.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('user.edit');
    Route::post('edit/{id}', 'update')->name('user.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('user.hapus');
    Route::get('search', 'search')->name('user.search');
});

Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('', 'index')->name('admin');
    Route::get('tambah', 'tambah')->name('admin.tambah');
    Route::post('tambah', 'simpan')->name('admin.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('admin.edit');
    Route::post('edit/{id}', 'update')->name('admin.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('admin.hapus');
    Route::get('search', 'search')->name('admin.search');
});

Route::controller(TransaksiController::class)->prefix('transaksi')->group(function () {
    Route::get('', 'index')->name('transaksi');
    Route::get('tambah', 'tambah')->name('transaksi.tambah');
    Route::post('tambah', 'simpan')->name('transaksi.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('transaksi.edit');
    Route::post('edit/{id}', 'update')->name('transaksi.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('transaksi.hapus');
    Route::get('bayar/{id}', 'bayar')->name('transaksi.bayar');
    Route::post('bayar/{id}', 'upload')->name('transaksi.bayar.upload');
    Route::get('search', 'search')->name('transaksi.search');
    Route::get('/riwayat_transaksi', [RiwayatTransaksiController::class, 'index'])->name('riwayat_transaksi.index');
});

Route::controller(RiwayatTransaksiController::class)->prefix('riwayat_transaksi')->group(function () {
    Route::get('', 'index')->name('riwayat_transaksi');
    Route::get('tambah', 'tambah')->name('riwayat_transaksi.tambah');
    Route::post('tambah', 'simpan')->name('riwayat_transaksi.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('riwayat_transaksi.edit');
    Route::post('edit/{id}', 'update')->name('riwayat_transaksi.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('riwayat_transaksi.hapus');
    Route::get('search', 'search')->name('riwayat_transaksi.search');
});

Route::middleware('auth')->group(function () {
    Route::get('home', function () {
        return view('home');
    })->name('home');
});