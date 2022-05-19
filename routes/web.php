<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\AgensiController;
use App\Http\Controllers\AturcaraController;
use App\Http\Controllers\AuditTrailController;
use App\Http\Controllers\BangsaController;
use App\Http\Controllers\BidangKursusController;
use App\Http\Controllers\CetakKodQRController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DunController;
use App\Http\Controllers\ElaunCutiController;
use App\Http\Controllers\GredPegawaiController;
use App\Http\Controllers\JadualKursusController;
use App\Http\Controllers\JawabPostTestController;
use App\Http\Controllers\JulatTahunanController;
use App\Http\Controllers\KampungController;
use App\Http\Controllers\KategoriAgensiController;
use App\Http\Controllers\KategoriKursusController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KelayakanElauncutiController;
use App\Http\Controllers\KodKursusController;
use App\Http\Controllers\LaporanLainController;
use App\Http\Controllers\MatlamatBilanganKursusController;
use App\Http\Controllers\MatlamatTahunanPesertaController;
use App\Http\Controllers\MukimController;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\NotaRujukanController;
use App\Http\Controllers\ObjekController;
use App\Http\Controllers\ParlimenController;
use App\Http\Controllers\PegawaiAgensiController;
use App\Http\Controllers\PencalonanPesertaController;
use App\Http\Controllers\PenceramahKonsultanController;
use App\Http\Controllers\PengajianLanjutanController;
use App\Http\Controllers\PengurusanPenggunaController;
use App\Http\Controllers\PenilaianPesertaController;
use App\Http\Controllers\KursusPenilaianController;
use App\Http\Controllers\MatlamatTahunanPanggilanPesertaController;
use App\Http\Controllers\MatlamatTahunanPerbelanjaanController;
use App\Http\Controllers\PerananController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PeruntukanPesertaController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\PrePostTestController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PusatTanggungjawabController;
use App\Http\Controllers\SeksyenController;
use App\Http\Controllers\SemakanController;
use App\Http\Controllers\SemakPermohonanController;
use App\Http\Controllers\StatusPelaksanaanController;
use App\Http\Controllers\StesenController;
use App\Http\Controllers\SumberController;
use App\Http\Controllers\UtilitiController;
use App\Http\Controllers\PenilaianKeberkesananController;
use App\Http\Controllers\PenilaianEjenPelaksanaController;
use App\Http\Controllers\PelajarPraktikalController;
use App\Models\JadualKursus;
use App\Models\Agensi;
use App\Models\KategoriAgensi;
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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth']);
Route::get('/falcon', function () {
    return view('falcon');
});

Route::get('/sidebar', function () {
    return view('sidebar-new');
});

Route::get('/sample', function () {
    return view('sample');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

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

Route::middleware('auth')->group(function () {

    Route::resource('/', DashboardController::class);

    Route::resources([
        // '/profil' => ProfilController::class,

        '/utiliti/lokasi/negeri' => NegeriController::class,
        '/utiliti/lokasi/daerah' => DaerahController::class,
        '/utiliti/lokasi/mukim' => MukimController::class,
        '/utiliti/lokasi/parlimen' => ParlimenController::class,
        '/utiliti/lokasi/dun' => DunController::class,
        '/utiliti/lokasi/kampung' => KampungController::class,
        '/utiliti/lokasi/seksyen' => SeksyenController::class,
        '/utiliti/lokasi/stesen' => StesenController::class,
        '/utiliti/lokasi/pusat_tanggungjawab' => PusatTanggungjawabController::class,

        '/utiliti/kumpulan/kategori_agensi' => KategoriAgensiController::class,
        '/utiliti/kumpulan/agensi' => AgensiController::class,
        '/utiliti/kumpulan/pegawai_agensi' => PegawaiAgensiController::class,

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

        '/utiliti/matlamat_tahunan/kursus' => MatlamatBilanganKursusController::class,
        '/utiliti/matlamat_tahunan/peserta' => MatlamatTahunanPesertaController::class,
        '/utiliti/matlamat_tahunan/perbelanjaan' => MatlamatTahunanPerbelanjaanController::class,
        '/utiliti/matlamat_tahunan/panggilan_peserta' => MatlamatTahunanPanggilanPesertaController::class,

        '/pengurusan_kursus/semak_jadual' => JadualKursusController::class,
        '/pengurusan_kursus/peruntukan_peserta' => PeruntukanPesertaController::class,
        '/pengurusan_kursus/aturcara' => AturcaraController::class,
        '/pengurusan_kursus/nota_rujukan' => NotaRujukanController::class,
        '/pengurusan_kursus/penceramah_konsultan' => PenceramahKonsultanController::class,
        '/pengurusan_kursus/kelayakan_elaun_cuti' => KelayakanElauncutiController::class,
        '/permohonan_kursus/semakan_permohonan' => SemakPermohonanController::class,

        '/audit_trail' => AuditTrailController::class,
        // '/pengurusan_pengguna/pengguna' => PengurusanPenggunaController::class,
    ]);

    Route::get('/pengurusan_kursus/filter-jadual-kursus/{search}', [JadualKursusController::class, 'filter']);

    // Route::resource('/pengurusan_pengguna/pengguna', PengurusanPenggunaController::class);
    Route::post('/utiliti/matlamat_tahunan/kursus/carian', [MatlamatBilanganKursusController::class, 'carian']);
    Route::get('/utiliti/matlamat_tahunan/kursus/{title}/{year}', [MatlamatBilanganKursusController::class, 'kemaskini']);
    Route::put('/utiliti/matlamat_tahunan/kursus', [MatlamatBilanganKursusController::class, 'update_table']);

    Route::post('/utiliti/matlamat_tahunan/peserta/carian', [MatlamatTahunanPesertaController::class, 'carian']);
    Route::get('/utiliti/matlamat_tahunan/peserta/{title}/{year}', [MatlamatTahunanPesertaController::class, 'kemaskini']);
    Route::put('/utiliti/matlamat_tahunan/peserta', [MatlamatTahunanPesertaController::class, 'update_table']);

    Route::post('/utiliti/matlamat_tahunan/perbelanjaan/carian', [MatlamatTahunanPerbelanjaanController::class, 'carian']);
    Route::get('/utiliti/matlamat_tahunan/perbelanjaan/{title}/{year}', [MatlamatTahunanPerbelanjaanController::class, 'kemaskini']);
    Route::put('/utiliti/matlamat_tahunan/perbelanjaan', [MatlamatTahunanPerbelanjaanController::class, 'update_table']);

    Route::post('/utiliti/matlamat_tahunan/panggilan_peserta/carian', [MatlamatTahunanPanggilanPesertaController::class, 'carian']);
    Route::get('/utiliti/matlamat_tahunan/panggilan_peserta/{title}/{year}', [MatlamatTahunanPanggilanPesertaController::class, 'kemaskini']);
    Route::put('/utiliti/matlamat_tahunan/panggilan_peserta', [MatlamatTahunanPanggilanPesertaController::class, 'update_table']);

    Route::get('/pengurusan_pengguna/pengguna/staf', [PengurusanPenggunaController::class, 'staf']);
    Route::get('/pengurusan_pengguna/pengguna/staf/create', [PengurusanPenggunaController::class, 'create']);
    Route::post('/pengurusan_pengguna/pengguna/staf/semak', [PengurusanPenggunaController::class, 'semak_nric_staf']);

    Route::get('/pengurusan_pengguna/pengguna/pekebun_kecil', [PengurusanPenggunaController::class, 'pekebun_kecil']);
    Route::get('/pengurusan_pengguna/pengguna/pekebun_kecil/create', [PengurusanPenggunaController::class, 'create']);
    Route::post('/pengurusan_pengguna/pengguna/pekebun_kecil/semak', [PengurusanPenggunaController::class, 'semak_nric']);

    Route::get('/pengurusan_pengguna/pengguna/ejen_pelaksana', [PengurusanPenggunaController::class, 'ejen_pelaksana']);
    Route::get('/pengurusan_pengguna/pengguna/ejen_pelaksana/create', [PengurusanPenggunaController::class, 'create']);

    Route::post('/pengurusan_pengguna/pengguna', [PengurusanPenggunaController::class, 'store']);
    Route::delete('/pengurusan_pengguna/pengguna/{id}', [PengurusanPenggunaController::class, 'destroy']);
    Route::put('/pengurusan_pengguna/pengguna/{id}', [PengurusanPenggunaController::class, 'update']);
    Route::post('/pengurusan_pengguna/pengguna/pengaktifan/{id}', [PengurusanPenggunaController::class, 'pengaktifan']);

    //Peserta ULS
    Route::group(['prefix' => '/uls', 'middleware' => ['can:permohonan kursus']], function () {
        //Permohonan Peserta
        Route::group(['prefix' => '/permohonan', 'middleware' => 'can:katelog kursus'], function () {
            Route::get('statuspermohonan', [PermohonanController::class, 'indexULS']);
            Route::get('katelog-kursus', [PermohonanController::class, 'katalog_uls']);
            Route::get('kehadiran/{kod_kursus}', [KehadiranController::class, 'indexULS']);
        });

        //rekod kehadiran
        Route::group(['prefix' => '/kehadiran'], function () {
            Route::get('{kehadiran}', [KehadiranController::class, 'fromUlsQR']);
            Route::post('update/{kehadiran}', [KehadiranController::class, 'storeQR']);
        });

        //from scan qrcode
        Route::resource('/permohonan/kehadiran', KehadiranController::class);
        Route::post('/pengesahan_kehadiran', [KehadiranController::class, 'store']);
    });

    //Peserta ULPK
    Route::prefix('/ulpk')->group(function () {
        //Permohonan Peserta
        Route::group(['prefix' => '/permohonan', 'middleware' => 'can:katelog kursus'], function () {
            Route::get('statuspermohonan', [PermohonanController::class, 'indexULPK']);
            Route::get('statuspermohonan/nota_rujukan/{id}', [PermohonanController::class, 'nota_rujukan']);
            Route::get('katelog-kursus', [PermohonanController::class, 'katalog_ulpk']);
            Route::get('kehadiran/{kod_kursus}', [KehadiranController::class, 'indexULPK']);
        });

        //rekod kehadiran
        // Route::group(['prefix' => '/kehadiran'], function () {
        //     Route::get('/', [KehadiranController::class, 'fromUlpkQR']);
        // });

    });


    //Urus Setia ULS
    Route::group(['prefix' => 'us-uls'], function () {

        Route::resource('PelajarPraktikal',PelajarPraktikalController::class);



        Route::group(['prefix' => 'kehadiran', 'middleware' => 'can:kehadiran'], function () {
            //dari QR  - merekod kehadiran
            Route::resource('cetakkodQR', CetakKodQRController::class);


            Route::get('/senarai-pl', function () {
                $agensi=Agensi::where('Kategori_Agensi','2')->get();
                // $kategori = KategoriAgensi::where('Kategori_Agensi','Penceramah')->get();

                return view('ulpk.urus_setia.kehadiran.kehadiran-pl.index',[
                    'agensi'=>$agensi,

                ]);
            });

            Route::get('/kehadiran-pl', function () {
                $agensi=Agensi::all();
                return view('ulpk.urus_setia.kehadiran.kehadiran-pl.kehadiran-pl',[
                    'agensi'=>$agensi
                ]);
            });
            Route::get('/kehadiran-pl/{id}',[KehadiranController::class,'kehadiran_pl']);
            Route::get('/cetak-pl/{id}',[KehadiranController::class,'cetak_qr_pl']);

            Route::get('printQR/{id}', [CetakKodQRController::class, 'printQR'])->name('printQR');




            Route::prefix('ke-kursus')->group(function () {
                //kehadiran
                Route::get('merekod-kehadiran', [KehadiranController::class, 'rekod']);

                Route::get('rekod-kehadiran-peserta/{jadual_kursus}', [KehadiranController::class, 'admin_rekod_kehadiran_peserta_UsUls'])
                    ->name('rekod-kehadiran-peserta');

                Route::put('update-rekod-kehadiran-peserta/{kehadiran}', [KehadiranController::class, 'update_kehadiran_peserta_UsUls']);
                Route::put('update-rekod-kehadiran-peserta2/{kehadiran}', [KehadiranController::class, 'update_kehadiran_peserta_UsUls2']);

                //pengesahan
                Route::get('mengesahkan-kehadiran', function () {
                    return view('uls.urus_setia.kehadiran.kehadiran-ke-kursus.mengesahkan-kehadiran', [
                        'jadual_kursus' => JadualKursus::all(),
                    ]);
                });

                Route::get('rekod-pengesahan-peserta/{jadual_kursus}', [KehadiranController::class, 'admin_mengesahkan_kehadiran_peserta_UsUls'])
                    ->name('mengesah-kehadiran-peserta');
                Route::post('update-rekod-pengesahan-peserta', [KehadiranController::class, 'update_pengesahan_peserta_UsUls'])
                    ->name('update-rekod-pengesahan-peserta');




            });
        });

        //pengajian lanjutan
        Route::group(['middleware' => 'can:pengajian lanjutan'], function () {
            Route::get('/pengajian-lanjutan', [PengajianLanjutanController::class, 'indexUls']);
            Route::get('/pengajian-lanjutan-yuran', [PengajianLanjutanController::class, 'yuranUls']);
        });
    });

    //penilaian
    Route::group(['prefix' => 'penilaian', 'middleware' => 'can:penilaian'], function () {

        Route::middleware(['role:Admin BTM|Urus Setia ULS|Urus Setia ULPK'])->group(function () {
            Route::resource('/pre-post-test', PrePostTestController::class);
            Route::get('/pre-post-test/create/{jadual_kursus}', [PrePostTestController::class, 'createPrePost'])->name('createPrePost');
            Route::post('/pre-post-test/{jadual_kursus}/save', [JadualKursusController::class, 'tambah_masa_mula_tamat_pre_post_test']);

            //Post
            Route::resource('/post-test', PostTestController::class)->only(['store', 'destroy', 'edit', 'update']);
            Route::get('/post-test/{jadualKursus}', [PostTestController::class, 'index'])->name('post-test.index');
            Route::get('/post-test/create/{jadualKursus}', [PostTestController::class, 'create'])->name('post-test.create');
            Route::post('/post-test/{jadual_kursus}/save', [JadualKursusController::class, 'tambah_masa_mula_tamat_post_test']);

            Route::resource('/penilaian-kursus/uls',KursusPenilaianController::class);
            Route::get('/penilaian-kursus/bahagianA/create/{id}',[KursusPenilaianController::class,'create']);
            Route::get('/penilaian-kursus/bahagianB/{id}',[KursusPenilaianController::class,'bahagianB']);
            Route::get('/penilaian-kursus/bahagianC/{id}',[KursusPenilaianController::class,'bahagianC']);
            Route::resource('/keberkesanan-kursus',PenilaianKeberkesananController::class);
            Route::resource('/ejen-pelaksana',PenilaianEjenPelaksanaController::class);
            Route::get('/penilaian-ejen-pelaksana/{id}',[PenilaianEjenPelaksanaController::class,'create']);
            Route::get('/penilaian-keberkesanan-kursus/{id}',[PenilaianKeberkesananController::class,'create']);





            Route::get('/cetakQr', [PenilaianPesertaController::class, 'cetakQr']);
            Route::get('/cetakQr2/{jadual_kursus}', [PenilaianPesertaController::class, 'cetakQr2']);
        });

        Route::group(['middleware' => 'role:Peserta ULS|Peserta ULPK'], function () {

            // Route::resource('/jawab-post', JawabPostTestController::class);

            Route::resource('/penilaian-kursus', PenilaianPesertaController::class);
            Route::get('/penilaian-kursus-ulpk', [PenilaianPesertaController::class, 'show_jawab_penilaian_ulpk']);
            Route::get('/penilaian-kursus-ulpk/{permohonanjadualid}', [PenilaianPesertaController::class, 'jawab_penilaian_ulpk']);

            Route::get('/jawab-pre-post-test', [PrePostTestController::class, 'jawabPrePost'])->name('jawabPrePost');
            Route::get('/mula-penilaian-pre-test/{jadual_kursus}', [PrePostTestController::class, 'mulaPenilaian']);
            Route::POST('/mula-penilaian-pre-test', [PrePostTestController::class, 'simpanPenilaian'])->name('simpanPenilaian');

            Route::get('/jawab-post-test', [PostTestController::class, 'jawabPost'])->name('jawabPost');
            Route::get('/mula-penilaian-post-test/{jadual_kursus}', [PostTestController::class, 'mulaPenilaianPost']);
            Route::POST('/mula-penilaian-post-test', [PostTestController::class, 'simpanPenilaianPost'])->name('simpanPenilaianPost');



        });
    });

    //laporan
    Route::group(['prefix' => 'laporan', 'middleware' => 'can:laporan'], function () {
        Route::prefix('laporan-lain')->group(function () {
            Route::get('laporan-pencapaian-matlamat-kehadiran', [LaporanLainController::class, 'pencapaian_matlamat_kehadiran']);
            Route::get('laporan-perbelanjaan-mengikut-pusat-tanggungjawab', [LaporanLainController::class, 'perbelanjaan_mengikut_pusat_tanggungjawab']);
            Route::get('laporan-perbelanjaan-mengikut-lokaliti', [LaporanLainController::class, 'perbelanjaan_mengikut_lokaliti']);
            Route::get('laporan-prestasi-kehadiran-peserta', [LaporanLainController::class, 'laporan_prestasi_kehadiran_peserta']);
            Route::get('laporan-kehadiran-7-hari-setahun', [LaporanLainController::class, 'laporan_kehadiran_7_hari_setahun']);
            Route::get('laporan-ringkasan-penceramah-kursus', [LaporanLainController::class, 'laporan_ringkasan_penceramah_kursus']);
            Route::get('laporan-pencapaian-latihan-mengikut-negeri', [LaporanLainController::class, 'laporan_pencapaian_latihan_mengikut_negeri']);
            Route::get('laporan-kehadiran-peserta', [LaporanLainController::class, 'laporan_kehadiran_peserta']);
            Route::get('laporan-pelaksanaan-latihan-staf', [LaporanLainController::class, 'laporan_pelaksanaan_latihan_staf']);
            Route::get('laporan-kewangan-terperinci', [LaporanLainController::class, 'laporan_kewangan_terperinci']);
            Route::get('laporan-ringkasan-jenis-kursus', [LaporanLainController::class, 'laporan_ringkasan_jenis_kursus']);
            Route::get('laporan-ringkasan-bidang-kursus', [LaporanLainController::class, 'laporan_ringkasan_bidang_kursus']);
            Route::get('laporan-penilaian-peserta', [LaporanLainController::class, 'laporan_penilaian_peserta']);

            //download excel
            Route::get('/pmk', [LaporanLainController::class, 'pmk'])->name('pmk');
            Route::get('/pmpt', [LaporanLainController::class, 'pmpt'])->name('pmpt');
            Route::get('/pml', [LaporanLainController::class, 'pml'])->name('pml');
            Route::get('/pkp', [LaporanLainController::class, 'pkp'])->name('pkp');
            Route::get('/rp', [LaporanLainController::class, 'rp'])->name('rp');
        });
    });

    //Urus Setia ULPK
    Route::group(['prefix' => 'us-ulpk', 'middleware' => ['UlpkUrusSetia', 'AdminBTM']], function () {

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

    Route::delete('/delete/{id}', [UtilitiController::class, 'test_user_delete']);

    Route::get('/testing', [UtilitiController::class, 'test_user_list']);
    Route::get('/add_staf', [UtilitiController::class, 'r_espek']);
    Route::delete('/delete/{id}', [UtilitiController::class, 'test_user_delete']);
    Route::put('/update_role/{id}', [UtilitiController::class, 'test_user_update_role']);
    Route::get('/delete_staf', [UtilitiController::class, 'remove_user_uls']);
    Route::get('/change_role_uls', [UtilitiController::class, 'change_role_uls']);

    Route::get('testjap', [PermohonanController::class, 'katelog']);

    Route::get('/permohonan_kursus/katalog_kursus/pendaftaran/{id}', [PermohonanController::class, 'permohonan']);
    Route::resource('/pengurusan_pengguna/peranan', PerananController::class);
    Route::post('/pengurusan_pengguna/peranan/kebenaran', [PerananController::class, 'tambah_kebenaran']);

    Route::resource('/pengurusan_peserta/pencalonan', PencalonanPesertaController::class);
    Route::get('/pengurusan_peserta/pencalonan/{id}/{id_peserta}', [PencalonanPesertaController::class, 'maklumat_peserta']);
    Route::post('/pengurusan_peserta/pencalonan/senarai_peserta/{id}', [PencalonanPesertaController::class, 'senarai_peserta']);

    Route::resource('/pengurusan_peserta/semakan_pemohon', SemakPermohonanController::class);
    Route::post('/pengurusan_peserta/semakan_pemohon/pengesahan_pukal', [SemakPermohonanController::class, 'pengesahan_pukal']);
    Route::post('/pengurusan_peserta/semakan_pemohon/sokongan_pukal', [SemakPermohonanController::class, 'sokongan_pukal']);
    Route::resource('/profil', ProfilController::class);

    Route::resource('/permohonan_kursus/katalog_kursus', PermohonanController::class);
    Route::get('ulpk/permohonan/katelog-kursus', [PermohonanController::class, 'katalog_ulpk']);


    Route::get('/janjan/{kehadiran}', [KehadiranController::class, 'janjan']);
});

require __DIR__ . '/auth.php';
