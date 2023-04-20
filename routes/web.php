<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\KelasController;

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

Route::get('/ttd', function () {
    return view('ttd');
});
//backup
Route::get('/backup', [BackupController::class, 'index']);
Route::get('/backup-database', [BackupController::class, 'backup']);
//berita acara
Route::get('/berita', [UjianController::class, 'berita']);
Route::get('/berita_acara/{nama_ruangan}/{nama_sesi}', [UjianController::class, 'berita_acara']);
Route::post('/berita/store', [UjianController::class, 'store_ba']);
Route::get('/edit_berita_acara/{nama_ruangan}/{nama_sesi}', [UjianController::class, 'edit_berita_acara']);
Route::post('/berita/update', [UjianController::class, 'update_ba']);
Route::get('/berita/hapus_digital/{nama_ruangan}/{nama_sesi}', [UjianController::class, 'hapus_digital']);

Route::get('/cetak_berita/{nama_ruangan}/{nama_sesi}', [UjianController::class, 'cetak_berita']);
Route::get('/cetakberita/{nama_ruangan}/{nama_sesi}', [UjianController::class, 'cetak_berita2']);
Route::get('/daftar_hadir', [UjianController::class, 'absen']);
Route::get('/cetak/{nama_ruangan}/{nama_sesi}', [UjianController::class, 'cetak']);
Route::get('/kartu', [UjianController::class, 'kartu']);
//halaman peserta
Route::get('/peserta', [PesertaController::class, 'index']);
Route::get('/peserta/tambah', [PesertaController::class, 'tambah']);
Route::post('/peserta/store', [PesertaController::class, 'store']);
Route::get('/peserta/edit/{id_peserta}', [PesertaController::class, 'edit']);
Route::post('/peserta/update', [PesertaController::class, 'update']);
Route::get('/peserta/hapus/{id_peserta}', [PesertaController::class, 'hapus']);
Route::get('/peserta/hapus_semua', [PesertaController::class, 'hapus_s']);
Route::post('/peserta/import', [PesertaController::class, 'import'])->name('peserta.import');
Route::get('/peserta/export', [PesertaController::class, 'export'])->name('peserta.export');
//halaman Akun Peserta
Route::get('/akun_peserta', [PesertaController::class, 'upas']);
// Route::get('/akun_peserta/tambah', [PesertaController::class, 'tambah_up']);
Route::post('/akun_peserta/store', [PesertaController::class, 'store_up']);
Route::get('/akun_peserta/generate', [PesertaController::class, 'generate']);
Route::get('/akun_peserta/edit/{id_kartu}', [PesertaController::class, 'edit_up']);
Route::post('/akun_peserta/update', [PesertaController::class, 'update_up']);
Route::get('/akun_peserta/hapus_semua', [PesertaController::class, 'hapus_all']);
Route::get('/akun_peserta/hapus/{id_kartu}', [PesertaController::class, 'hapus_up']);
//halaman Ruangan
Route::get('/ruangan', [RuanganController::class, 'index']);
Route::get('/ruangan/tambah', [RuanganController::class, 'create']);
Route::post('/ruangan/store', [RuanganController::class, 'store']);
Route::get('/ruangan/edit/{id}', [RuanganController::class, 'edit']);
Route::post('/ruangan/update', [RuanganController::class, 'update']);
Route::get('/ruangan/hapus/{id}', [RuanganController::class, 'hapus']);

Route::get('/cetak_ruangan', [RuanganController::class, 'cetak_ruangan']);
Route::get('/cetak_ruangan/pengawas', [RuanganController::class, 'pengawas']);
Route::get('/cetak_ruangan/panitia', [RuanganController::class, 'panitia']);
Route::get('/cetakruangan/{id_ruangan}', [RuanganController::class, 'cetakruangan']);
Route::get('/cetak_amplop/{id_ruangan}', [RuanganController::class, 'cetak_amplop']);
//halaman kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/tambah', [KelasController::class, 'create']);
Route::post('/kelas/store', [KelasController::class, 'store']);
Route::get('/kelas/edit/{id_kelas}', [KelasController::class, 'edit']);
Route::post('/kelas/update', [KelasController::class, 'update']);
Route::get('/kelas/hapus/{id_kelas}', [KelasController::class, 'hapus']);
//halaman sesi
Route::get('/sesi', [SesiController::class, 'index']);
Route::get('/sesi/tambah', [SesiController::class, 'create']);
Route::post('/sesi/store', [SesiController::class, 'store']);
Route::get('/sesi/edit/{id_sesi}', [SesiController::class, 'edit']);
Route::post('/sesi/update', [SesiController::class, 'update']);
Route::get('/sesi/hapus/{id_sesi}', [SesiController::class, 'hapus']);
//halaman Ujian
Route::get('/kartu_peserta', [UjianController::class, 'index']);
Route::get('/kartu_peserta/tambah', [UjianController::class, 'create']);
Route::post('/kartu_peserta/store', [UjianController::class, 'store']);
Route::get('/kartu_peserta/edit/{id_ujian}', [UjianController::class, 'edit']);
Route::post('/kartu_peserta/update', [UjianController::class, 'update']);
Route::get('/kartu_peserta/hapus/{id_ujian}', [UjianController::class, 'hapus']);
Route::get('/kartu_satuan/{id_ujian}', [UjianController::class, 'print']);
Route::get('/kartu_detail/{id_ujian}', [UjianController::class, 'detail']);
Route::get('/kartu_peserta/generate', [UjianController::class, 'generate']);
Route::get('/kartu_peserta/hapus_semua', [UjianController::class, 'hapus_all']);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
//setting
Route::get('/pengaturan', [SettingController::class, 'index']);
Route::get('/pengaturan_tambah', [SettingController::class, 'create']);
Route::post('/pengaturan/store', [SettingController::class, 'store']);
Route::get('/pengaturan_edit/{id_setting}', [SettingController::class, 'edit']);
Route::post('/pengaturan/update', [SettingController::class, 'update']);
?>
