<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('penduduk');
// });

// Route::get('/kk', function () {
//     return view('kk');
// });
//Penduduk
route::get('/', [PendudukController::class, 'index'])->name('penduduk.index');
route::get('/penduduk/create', [PendudukController::class, 'create'])->name('penduduk.create');
route::post('/penduduk', [PendudukController::class, 'store'])->name('penduduk.store');
route::get('/penduduk/{penduduk}', [PendudukController::class, 'show'])->name('penduduk.show');
route::get('/penduduk/{penduduk}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
route::patch('/penduduk/{penduduk}', [PendudukController::class, 'update'])->name('penduduk.update');
route::delete('/penduduk/{id}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');

//Kartu Keluarga
route::get('/kartukeluarga', [kartukeluargaController::class, 'index'])->name('kartukeluarga.index');
route::get('/kartukeluarga/create', [kartukeluargaController::class, 'create'])->name('kartukeluarga.create');
route::post('/kartukeluarga', [kartukeluargaController::class, 'store'])->name('kartukeluarga.store');
route::get('/kartukeluarga/{id}', [KartuKeluargaController::class, 'show'])->name('kartukeluarga.show');
route::get('/kartukeluarga/{kartukeluarga}/edit', [KartuKeluargaController::class, 'edit'])->name('kartukeluarga.edit');
route::patch('/kartukeluarga/{kartukeluarga}', [KartuKeluargaController::class, 'update'])->name('kartukeluarga.update');

//Anggota Keluarga
// route::get('/kartukeluarga/tambah', [anggotakeluargaController::class, 'create'])->name('kartukeluarga.tambah');
// route::post('/kartukeluarga', [anggotakeluargaController::class, 'store'])->name('kartukeluarga.store');

Route::post('anggotakeluarga', [AnggotaKeluargaController::class, 'store'])->name('anggotakeluarga.store'); //routing simpan data anggota keluarga
Route::get('anggotakeluarga/{id}', [AnggotaKeluargaController::class, 'index'])->name('anggotakeluarga.tambah'); //routing tampilkan anggota keluarga
route::delete('anggotakeluarga/{id}', [AnggotaKeluargaController::class, 'destroy'])->name('anggotakeluarga.destroy');

//Laporan
Route::get('/laporan', [LaporanController::class], 'index')->name('laporan.index'); 

