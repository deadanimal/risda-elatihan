<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemakanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\DaerahController;
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

// Route::put('/test/{id}', [DaerahController::class, 'update']);
// Route::post('/utiliti/daerah/{id}/delete', [DaerahController::class, 'destroy']);

Route::post('/semak_nric', [SemakanController::class, 'check_espek']);
Route::post('/daftar_pengguna', [SemakanController::class, 'daftar_pengguna']);

require __DIR__.'/auth.php';
