<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignaturePadController;

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
Route::get('signaturepad', [SignaturePadController::class, 'index']);
Route::post('signaturepad', [SignaturePadController::class, 'upload'])->name('signaturepad.upload');

Route::get('/ttd', function () {
    return view('ttd');
});
Route::get('/berita', [UjianController::class, 'berita']);
Route::get('/cetak_berita/{nomer_ruangan}/{no_sesi}', [UjianController::class, 'cetak_berita']);
Route::get('/cetakberita/{nomer_ruangan}/{no_sesi}', [UjianController::class, 'cetak_berita2']);
Route::get('/berita_acara/{nomer_ruangan}/{no_sesi}', [UjianController::class, 'berita_acara']);
Route::get('/daftar_hadir', [UjianController::class, 'absen']);
Route::get('/cetak/{nomer_ruangan}/{no_sesi}', [UjianController::class, 'cetak']);
Route::get('/kartu', [UjianController::class, 'kartu']);

Route::get('/peserta', [PesertaController::class, 'index']);
Route::get('/peserta/tambah', [PesertaController::class, 'tambah']);
Route::post('/peserta/store', [PesertaController::class, 'store']);
Route::get('/peserta/edit/{id_peserta}', [PesertaController::class, 'edit']);
Route::post('/peserta/update', [PesertaController::class, 'update']);
Route::get('/peserta/hapus/{id_peserta}', [PesertaController::class, 'hapus']);
//halaman Ruangan
Route::get('/ruangan', [RuanganController::class, 'index']);
Route::get('/ruangan/tambah', [RuanganController::class, 'create']);
Route::post('/ruangan/store', [RuanganController::class, 'store']);
Route::get('/ruangan/edit/{id}', [RuanganController::class, 'edit']);
Route::post('/ruangan/update', [RuanganController::class, 'update']);
Route::get('/ruangan/hapus/{id}', [RuanganController::class, 'hapus']);
//halaman sesi
Route::get('/sesi', [SesiController::class, 'index']);
Route::get('/sesi/tambah', [SesiController::class, 'create']);
Route::post('/sesi/store', [SesiController::class, 'store']);
Route::get('/sesi/edit/{id_sesi}', [SesiController::class, 'edit']);
Route::post('/sesi/update', [SesiController::class, 'update']);
Route::get('/sesi/hapus/{id_sesi}', [SesiController::class, 'hapus']);
//halaman Ujian
Route::get('/pembagian', [UjianController::class, 'index']);
Route::get('/pembagian/tambah', [UjianController::class, 'create']);
Route::post('/pembagian/store', [UjianController::class, 'store']);
Route::get('/pembagian/edit/{id_ujian}', [UjianController::class, 'edit']);
Route::post('/pembagian/update', [UjianController::class, 'update']);
Route::get('/pembagian/hapus/{id_ujian}', [UjianController::class, 'hapus']);
Route::get('/kartu_satuan/{id_ujian}', [UjianController::class, 'print']);
Route::get('/kartu_detail/{id_ujian}', [UjianController::class, 'detail']);
Route::get('/pembagian/generate', [UjianController::class, 'generate']);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
//setting
Route::get('/pengaturan', [SettingController::class, 'index']);
Route::get('/pengaturan_edit/{id_setting}', [SettingController::class, 'edit']);
Route::post('/pengaturan/update', [SettingController::class, 'update']);
?>
