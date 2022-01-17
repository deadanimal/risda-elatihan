<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemakanController;
use App\Http\Controllers\ProfilController;

use App\Http\Controllers\NegeriController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\MukimController;
use App\Http\Controllers\ParlimenController;
use App\Http\Controllers\DunController;
use App\Http\Controllers\KampungController;
use App\Http\Controllers\SeksyenController;
use App\Http\Controllers\StesenController;

use App\Http\Controllers\KategoriAgensiController;
use App\Http\Controllers\AgensiController;
use App\Http\Controllers\PegawaiAgensiController;
use App\Http\Controllers\PusatTanggungjawabController;
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

    '/utiliti/negeri' => NegeriController::class,
    '/utiliti/daerah' => DaerahController::class,
    '/utiliti/mukim' => MukimController::class,
    '/utiliti/parlimen' => ParlimenController::class,
    '/utiliti/dun' => DunController::class,
    '/utiliti/kampung' => KampungController::class,
    '/utiliti/seksyen' => SeksyenController::class,
    '/utiliti/stesen' => StesenController::class,

    '/utiliti/kategori_agensi' => KategoriAgensiController::class,
    '/agensi' => AgensiController::class,
    '/pegawai_agensi' => PegawaiAgensiController::class,
    '/utiliti/pusat_tanggungjawab' => PusatTanggungjawabController::class,
]);

require __DIR__ . '/auth.php';
