<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\PembelianDetailController;
use App\Http\Controllers\PenjualanDetailController;

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

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {

    Route::name('admin.')->prefix('admin')->group(function () {

        Route::get('/index', [DashboardController::class, 'index'])->name('index');
        Route::resource('user', UserController::class)->except('destroy');
        Route::name('user.')->prefix('user')->group(function(){
            Route::delete('{user}/destroy', [UserController::class, 'destroy'])->name('destroy');
        });
        Route::resource('sparepart', SparepartController::class);
        Route::resource('rak', RakController::class);
        Route::resource('pembelian', PembelianController::class);
        Route::resource('pembelianDetail', PembelianDetailController::class)->except('index','create');
        Route::name('pembelianDetail.')->prefix('pembelianDetail')->group(function(){
            Route::get('/create/{id}', [PembelianDetailController::class, 'create'])->name('create');
        });
        Route::resource('stok', StokController::class);
        Route::resource('penjualan', PenjualanController::class);
        Route::resource('penjualanDetail', PenjualanDetailController::class)->except('index','create');
        Route::name('penjualanDetail.')->prefix('penjualanDetail')->group(function(){
            Route::get('/create/{id}', [PenjualanDetailController::class, 'create'])->name('create');
        });
        // Route::resource('desa', DesaController::class);
        // Route::resource('camat', CamatController::class);
        // Route::resource('kasi', KasiController::class);
        // Route::resource('petugas', PetugasController::class);
        // Route::resource('kegiatan', KegiatanController::class);
        // Route::resource('konflik', KonflikController::class);
        // Route::resource('gangguan', GangguanController::class);
        // Route::resource('kriminal', KriminalController::class);
        // Route::resource('jadwal', JadwalController::class);
        // Route::resource('jabatan', JabatanController::class);
        // Route::resource('pegawai', PegawaiController::class);
        // Route::name('detail_gangguan.')->prefix('detail-gangguan')->group(function () {
        //     Route::get('/create/{id}', [GangguanController::class, 'createDetail'])->name('create');
        //     Route::post('/create/', [GangguanController::class, 'storeDetail'])->name('store');
        // });
        // Route::name('detail_konflik.')->prefix('detail-konflik')->group(function () {
        //     Route::get('/create/{id}', [KonflikController::class, 'createDetail'])->name('create');
        //     Route::post('/create/', [KonflikController::class, 'storeDetail'])->name('store');
        // });

        Route::name('report.')->prefix('laporan')->group(function () {
            // Route::get('kegiatan', [ReportController::class, 'kegiatanIndex'])->name('kegiatanIndex');
            Route::get('/cetak/user', [ReportController::class, 'userAll'])->name('userAll');
            Route::get('/cetak/sparepart', [ReportController::class, 'sparepartAll'])->name('sparepartAll');
            Route::get('/cetak/rak', [ReportController::class, 'rakAll'])->name('rakAll');
            Route::get('/cetak/stok', [ReportController::class, 'stokAll'])->name('stokAll');
            Route::get('/cetak/stok-hampir-habis', [ReportController::class, 'stokLow'])->name('stokLow');

            Route::get('/cetak/pembelian', [ReportController::class, 'pembelianAll'])->name('pembelianAll');
            Route::get('/cetak/penjualan', [ReportController::class, 'penjualanAll'])->name('penjualanAll');
            // Route::post('/cetak/kegiatan-tahun', [ReportController::class, 'kegiatanYear'])->name('kegiatanYear');
            // Route::post('/cetak/kegiatan-bulan', [ReportController::class, 'kegiatanMonth'])->name('kegiatanMonth');

        //     Route::get('konflik', [ReportController::class, 'konflikIndex'])->name('konflikIndex');
        //     Route::get('/cetak/konflik', [ReportController::class, 'konflikAll'])->name('konflikAll');
        //     Route::post('/cetak/konflik-tahun', [ReportController::class, 'konflikYear'])->name('konflikYear');
        //     Route::post('/cetak/konflik-bulan', [ReportController::class, 'konflikMonth'])->name('konflikMonth');

        //     Route::get('gangguan', [ReportController::class, 'gangguanIndex'])->name('gangguanIndex');
        //     Route::get('/cetak/gangguan', [ReportController::class, 'gangguanAll'])->name('gangguanAll');
        //     Route::post('/cetak/gangguan-tahun', [ReportController::class, 'gangguanYear'])->name('gangguanYear');
        //     Route::post('/cetak/gangguan-bulan', [ReportController::class, 'gangguanMonth'])->name('gangguanMonth');

        //     Route::get('kriminal', [ReportController::class, 'kriminalIndex'])->name('kriminalIndex');
        //     Route::get('/cetak/kriminal', [ReportController::class, 'kriminalAll'])->name('kriminalAll');
        //     Route::post('/cetak/kriminal-tahun', [ReportController::class, 'kriminalYear'])->name('kriminalYear');
        //     Route::post('/cetak/kriminal-bulan', [ReportController::class, 'kriminalMonth'])->name('kriminalMonth');

        //     Route::get('/cetak/grafik-kejadian', [ReportController::class, 'grafik'])->name('grafik');
        //     Route::get('/cetak/petugas', [ReportController::class, 'petugas'])->name('petugas');
        //     Route::get('/cetak/kasi', [ReportController::class, 'kasi'])->name('kasi');
        //     Route::get('/cetak/camat', [ReportController::class, 'camat'])->name('camat');
        //     Route::get('/cetak/jadwal-petugas', [ReportController::class, 'jadwal'])->name('jadwal');
        //     Route::get('surat-petugas', [ReportController::class, 'suratIndex'])->name('suratIndex');
        //     Route::post('/cetak/surat-petugas/', [ReportController::class, 'surat'])->name('surat');
        //     Route::get('/cetak/pegawai', [ReportController::class, 'pegawai'])->name('pegawai');
        //     Route::get('/cetak/BA-kegiatan/{id}', [ReportController::class, 'baKegiatan'])->name('baKegiatan');
        //     Route::get('/cetak/BA-gangguan/{id}', [ReportController::class, 'baGangguan'])->name('baGangguan');
        //     Route::get('/cetak/BA-konflik/{id}', [ReportController::class, 'baKonflik'])->name('baKonflik');
        // Route::get('/cetak/BA-kriminal/{id}', [ReportController::class, 'baKriminal'])->name('baKriminal');
        });
    });
});
