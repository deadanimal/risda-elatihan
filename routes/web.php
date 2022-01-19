<?php

use App\Http\Controllers\CetakKodQRController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\PengajianLanjutanController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SemakanController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/profil', ProfilController::class);
Route::resource('/utiliti/negeri', NegeriController::class);
Route::resource('/utiliti/daerah', DaerahController::class);

//Peserta ULS
Route::prefix('/uls')->group(function () {
    //Permohonan Peserta
    Route::group(['prefix' => '/permohonan', 'middleware' => 'UlsPeserta'], function () {
        Route::get('statuspermohonan', [PermohonanController::class, 'indexULS']);
        Route::get('kehadiran/{kod_kursus}', [KehadiranController::class, 'indexULS']);
    });

    //rekod kehadiran
    Route::group(['prefix' => '/kehadiran'], function () {
        Route::get('/', [KehadiranController::class, 'fromUlsQR']);
    });

});

//Peserta ULPK
Route::prefix('/ulpk')->group(function () {
    //Permohonan Peserta
    Route::group(['prefix' => '/permohonan', 'middleware' => 'UlpkPeserta'], function () {
        Route::get('statuspermohonan', [PermohonanController::class, 'indexULPK']);
        Route::get('kehadiran/{kod_kursus}', [KehadiranController::class, 'indexULPK']);
    });

    //rekod kehadiran
    Route::group(['prefix' => '/kehadiran'], function () {
        Route::get('/', [KehadiranController::class, 'fromUlpkQR']);
    });

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
// Route::post('/utiliti/daerah/{id}/delete', [DaerahController::class, 'destroy']);

Route::post('/semak_nric', [SemakanController::class, 'check_espek']);
Route::post('/daftar_pengguna', [SemakanController::class, 'daftar_pengguna']);

require __DIR__ . '/auth.php';
