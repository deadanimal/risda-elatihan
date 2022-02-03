<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AgensiController;
use App\Http\Controllers\BangsaController;
use App\Http\Controllers\BidangKursusController;
use App\Http\Controllers\CetakKodQRController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\DunController;
use App\Http\Controllers\JulatTahunanController;
use App\Http\Controllers\KampungController;
use App\Http\Controllers\KategoriAgensiController;
use App\Http\Controllers\KategoriKursusController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KodKursusController;
use App\Http\Controllers\MukimController;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\ParlimenController;
use App\Http\Controllers\PegawaiAgensiController;
use App\Http\Controllers\PengajianLanjutanController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PusatTanggungjawabController;
use App\Http\Controllers\SeksyenController;
use App\Http\Controllers\SemakanController;
use App\Http\Controllers\StatusPelaksanaanController;
use App\Http\Controllers\StesenController;
use App\Http\Controllers\SumberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GredPegawaiController;
use App\Http\Controllers\ElaunCutiController;
use App\Http\Controllers\JadualKursusController;
use App\Http\Controllers\ObjekController;
use App\Http\Controllers\PeruntukanPesertaController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/login', function () {
    return view('login');
});

Route::get('/lupa_katalaluan', function () {
    return view('auth.forgot-password');
});

Route::get('/test', function () {
    return view('test');
});

Route::post('/semak_nric', [SemakanController::class, 'check_espek']);
Route::post('/daftar_pengguna', [SemakanController::class, 'daftar_pengguna']);

Route::resources([
    '/profil' => ProfilController::class,

    '/utiliti/lokasi/negeri' => NegeriController::class,
    '/utiliti/lokasi/daerah' => DaerahController::class,
    '/utiliti/lokasi/mukim' => MukimController::class,
    '/utiliti/lokasi/parlimen' => ParlimenController::class,
    '/utiliti/lokasi/dun' => DunController::class,
    '/utiliti/lokasi/kampung' => KampungController::class,
    '/utiliti/lokasi/seksyen' => SeksyenController::class,
    '/utiliti/lokasi/stesen' => StesenController::class,

    '/utiliti/kumpulan/kategori_agensi' => KategoriAgensiController::class,
    '/utiliti/kumpulan/agensi' => AgensiController::class,
    '/utiliti/kumpulan/pegawai_agensi' => PegawaiAgensiController::class,
    '/utiliti/kumpulan/pusat_tanggungjawab' => PusatTanggungjawabController::class,

    '/utiliti/julat/julat_tahunan' => JulatTahunanController::class,

    '/utiliti/status/status_pelaksanaan' => StatusPelaksanaanController::class,

    '/utiliti/generik/agama' => AgamaController::class,
    '/utiliti/generik/bangsa' => BangsaController::class,
    '/utiliti/generik/sumber' => SumberController::class,

    '/utiliti/kursus/bidang_kursus' => BidangKursusController::class,
    '/utiliti/kursus/kategori_kursus' => KategoriKursusController::class,
    '/utiliti/kursus/kod_kursus' => KodKursusController::class,
    '/utiliti/kursus/gred_pegawai' => GredPegawaiController::class,
    '/utiliti/kursus/elaun_cuti_kursus' => ElaunCutiController::class,
    '/utiliti/kursus/kod_objek' => ObjekController::class,

    '/pengurusan_kursus/semak_jadual' => JadualKursusController::class,
    '/pengurusan_kursus/peruntukan_peserta'=> PeruntukanPesertaController::class,
]);


//Peserta ULS
Route::group(['prefix' => '/uls', 'middleware' => ['UlsPeserta', 'auth']], function () {
    //Permohonan Peserta
    Route::prefix('/permohonan')->group(function () {
        Route::get('statuspermohonan', [PermohonanController::class, 'indexULS']);
        Route::get('kehadiran/{kod_kursus}', [KehadiranController::class, 'indexULS']);
    });

    //rekod kehadiran
    Route::prefix('kehadiran/')->group(function () {
        Route::get('{kehadiran}', [KehadiranController::class, 'fromUlsQR']);
        Route::post('update/{kehadiran}', [KehadiranController::class, 'storeQR']);
    });

});

Route::resource('/permohonan/kehadiran', KehadiranController::class);

//Peserta ULPK
Route::prefix('/ulpk')->group(function () {
    //Permohonan Peserta
    Route::group(['prefix' => '/permohonan', 'middleware' => 'UlpkPeserta'], function () {
        Route::get('statuspermohonan', [PermohonanController::class, 'indexULPK']);
        Route::get('kehadiran/{kod_kursus}', [KehadiranController::class, 'indexULPK']);
    });

    //rekod kehadiran
    // Route::group(['prefix' => '/kehadiran'], function () {
    //     Route::get('/', [KehadiranController::class, 'fromUlpkQR']);
    // });

});

//Urus Setia ULS
Route::group(['prefix' => 'us-uls', 'middleware' => 'UlsUrusSetia'], function () {

    Route::prefix('kehadiran')->group(function () {
        //dari QR  - merekod kehadiran
        Route::resource('cetakkodQR', CetakKodQRController::class);
        Route::prefix('ke-kursus')->group(function () {
            //kehadiran
            Route::get('merekod-kehadiran', [KehadiranController::class, 'admin_kehadiran_peserta_UsUls']);
            Route::get('rekod-kehadiran-peserta', [KehadiranController::class, 'admin_rekod_kehadiran_peserta_UsUls']);

            //pengesahan
            Route::get('mengesahkan-kehadiran', [KehadiranController::class, 'admin_mengesahkan_peserta_UsUls']);
            Route::get('rekod-pengesahan-peserta', [KehadiranController::class, 'admin_mengesahkan_kehadiran_peserta_UsUls']);
        });
    });

    //pengajian lanjutan
    Route::get('/pengajian-lanjutan', [PengajianLanjutanController::class, 'indexUls']);
    Route::get('/pengajian-lanjutan-yuran', [PengajianLanjutanController::class, 'yuranUls']);

});

//Urus Setia ULPK
Route::group(['prefix' => 'us-ulpk', 'middleware' => 'UlpkUrusSetia'], function () {

    Route::prefix('kehadiran')->group(function () {
        //dari QR  - merekod kehadiran

        Route::prefix('ke-kursus')->group(function () {
            //kehadiran
            Route::get('merekod-kehadiran', [KehadiranController::class, 'admin_kehadiran_peserta_UsUlpk']);
            Route::get('rekod-kehadiran-peserta', [KehadiranController::class, 'admin_rekod_kehadiran_peserta_UsUlpk']);

            //pengesahan
            Route::get('mengesahkan-kehadiran', [KehadiranController::class, 'admin_mengesahkan_peserta_UsUlpk']);
            Route::get('rekod-pengesahan-peserta', [KehadiranController::class, 'admin_mengesahkan_kehadiran_peserta_UsUlpk']);
        });
    });

    //pengajian lanjutan
    Route::get('/pengajian-lanjutan', [PengajianLanjutanController::class, 'indexUlpk']);
    Route::get('/pengajian-lanjutan-yuran', [PengajianLanjutanController::class, 'yuranUlpk']);

});

// Route::put('/test/{id}', [DaerahController::class, 'update']);
// Route::post('/utiliti/lokasi/daerah/{id}/delete', [DaerahController::class, 'destroy']);

require __DIR__ . '/auth.php';
