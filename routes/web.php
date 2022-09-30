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
use App\Http\Controllers\JulatTahunanController;
use App\Http\Controllers\KampungController;
use App\Http\Controllers\KategoriAgensiController;
use App\Http\Controllers\KategoriKursusController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KelayakanElauncutiController;
use App\Http\Controllers\KodKursusController;
use App\Http\Controllers\KursusPenilaianController;
use App\Http\Controllers\LaporanLainController;
use App\Http\Controllers\MaklumatKeputusanPeperiksaanController;
use App\Http\Controllers\MatlamatBilanganKursusController;
use App\Http\Controllers\MatlamatTahunanPanggilanPesertaController;
use App\Http\Controllers\MatlamatTahunanPerbelanjaanController;
use App\Http\Controllers\MatlamatTahunanPesertaController;
use App\Http\Controllers\MukimController;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\NotaRujukanController;
use App\Http\Controllers\ObjekController;
use App\Http\Controllers\ParlimenController;
use App\Http\Controllers\PegawaiAgensiController;
use App\Http\Controllers\PelajarPraktikalController;
use App\Http\Controllers\PencalonanPesertaController;
use App\Http\Controllers\PenceramahKonsultanController;
use App\Http\Controllers\PengajianLanjutanController;
use App\Http\Controllers\PengurusanPenggunaController;
use App\Http\Controllers\PenilaianEjenPelaksanaController;
use App\Http\Controllers\PenilaianKeberkesananController;
use App\Http\Controllers\PenilaianPesertaController;
use App\Http\Controllers\PerananController;
use App\Http\Controllers\PerbelanjaanKursusController;
use App\Http\Controllers\PerbelanjaanPelajarPraktikalController;
use App\Http\Controllers\PerbelanjaanPengajianLanjutanController;
use App\Http\Controllers\PerbelanjaanYuranController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PeruntukanPesertaController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\PrePostTestController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PusatTanggungjawabController;
use App\Http\Controllers\SeksyenController;
use App\Http\Controllers\SemakanController;
use App\Http\Controllers\SemakPermohonanController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StatusPelaksanaanController;
use App\Http\Controllers\StesenController;
use App\Http\Controllers\SumberController;
use App\Http\Controllers\UtilitiController;
use App\Http\Controllers\KehadiranPusatLatihanController;
use App\Models\Agensi;
use App\Models\JadualKursus;
use App\Models\KehadiranPusatLatihan;
use Illuminate\Support\Facades\DB;
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




Route::get('/auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('/auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::get('/auth/google', [SocialController::class, 'googleRedirect']);
Route::get('/auth/google/callback', [SocialController::class, 'loginWithGoogle']);

Route::get('findtable/{tablename}', function ($table) {
    return DB::getSchemaBuilder()->getColumnListing($table);
});

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

Route::get('/selamat-datang', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::resource('/', DashboardController::class);
    Route::resource('kehadiran_pl', KehadiranPusatLatihanController::class);
    Route::get('/senarai-pl', [KehadiranPusatLatihanController::class, 'indexPl']);
    // Route::get('/kehadiran_pl/{id}', [KehadiranPusatLatihanController::class, 'index_kehadiran']);
    // Route::get('/kehadiran-pl/{id}', [KehadiranController::class, 'kehadiran_pl']);
    Route::get('/kehadiran_ke_pl/{id}', [KehadiranPusatLatihanController::class, 'index_kehadiran']);
    Route::get('/kehadiran_ke_pl/create/{id}', [KehadiranPusatLatihanController::class, 'create']);
    // Route::post('/kehadiran-pl/pengesahan', [KehadiranPusatLatihan::class, 'pengesahan_kehadiran']);



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

    Route::get('/cetak_jadual', [JadualKursusController::class, 'cetakjadualkursus']);
    Route::get('/cetak_surat_tawaran/{id}', [PermohonanController::class, 'cetaksurattawaran']);
    Route::get('/cetak_sijilkursus/{id}', [KehadiranController::class, 'cetaksijilkursus']);
    Route::get('/cetak_QR_post_test/{kursus}', [CetakKodQRController::class, 'cetakQrpost_test']);
    Route::get('/cetak_QR_pre_test/{kursus}', [CetakKodQRController::class, 'cetakQrpre_test']);
    Route::get('/cetak_QR_penilaian_kursus/{kursus}', [CetakKodQRController::class, 'cetakQr_penilaian_kursus']);



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
    Route::post('/pengurusan_pengguna/pengguna/staf', [PengurusanPenggunaController::class, 'filter_staf']);
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
        Route::group(['prefix' => '/permohonan', 'middleware' => 'can:katalog kursus'], function () {
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
        Route::group(['prefix' => '/permohonan', 'middleware' => 'can:katalog kursus'], function () {
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

        Route::resource('PelajarPraktikal', PelajarPraktikalController::class);
        Route::get('PelajarPraktikal/filter', [PelajarPraktikalController::class, 'filter']);

        Route::group(['prefix' => 'kehadiran', 'middleware' => 'can:kehadiran'], function () {
            //dari QR  - merekod kehadiran
            Route::resource('cetakkodQR', CetakKodQRController::class);

            Route::get('/senarai_qr_pl', [KehadiranPusatLatihanController::class, 'senarai_qr_pl']);
            Route::get('/cetak-pl/{id}', [KehadiranPusatLatihanController::class, 'cetak_qr_pl']);

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

        //pengajian lanjutan ULS
        Route::group(['middleware' => 'can:pengajian lanjutan'], function () {
            Route::get('/pengajian-lanjutan', [PengajianLanjutanController::class, 'indexUls']);
            Route::get('/pengajian-lanjutan/create', [PengajianLanjutanController::class, 'createUls']);
            Route::get('/pengajian-lanjutan/{staf_pl}', [PengajianLanjutanController::class, 'editUls']);
            Route::post('/pengajian-lanjutan', [PengajianLanjutanController::class, 'storeUls']);
            Route::post('/pengajian-lanjutan/{staf_pl}', [PengajianLanjutanController::class, 'updateUls']);
            Route::get('/pengajian-lanjutan/{id_pengajian_lanjutan}/perbelanjaan', [PengajianLanjutanController::class, 'showUls']);
            Route::delete('/pengajian-lanjutan/{staf_pl}', [PengajianLanjutanController::class, 'destroyUls']);
            Route::get('/pengajian-lanjutan-yuran', [PengajianLanjutanController::class, 'yuranUls']);

            // Route::resource('/pengajian-lanjutan/perbelanjaan-yuran', PerbelanjaanYuranController::class);
            Route::post('/tambah-yuran', [PerbelanjaanYuranController::class, 'store']);
            Route::get('/pengajian-lanjutan/perbelanjaan-yuran/{id_pengajian_lanjutan}', [PerbelanjaanYuranController::class, 'show']);
            Route::delete('/pengajian-lanjutan/perbelanjaan-yuran/{perbelanjaanYuran}', [PerbelanjaanYuranController::class, 'destroy']);

            // Route::resource('/pengajian-lanjutan/maklumat-keputusan-peperiksaan', MaklumatKeputusanPeperiksaanController::class);
            Route::post('/tambah-keputusan', [MaklumatKeputusanPeperiksaanController::class, 'store']);
            Route::get('/pengajian-lanjutan/maklumat-keputusan-peperiksaan/{id_pengajian_lanjutan}', [MaklumatKeputusanPeperiksaanController::class, 'show']);
            Route::delete('/pengajian-lanjutan/maklumat-keputusan-peperiksaan/{maklumatKeputusanPeperiksaan}', [MaklumatKeputusanPeperiksaanController::class, 'destroy']);
        });
    });

    //penilaian
    Route::group(['prefix' => 'penilaian'], function () {
        // 'middleware' => 'can:jawab penilaian'
        Route::middleware(['role:Superadmin BTM|Urus Setia ULS|Urus Setia ULPK'])->group(function () {
            Route::resource('/pre-post-test', PrePostTestController::class);
            Route::get('/pre-post-test/create/{jadual_kursus}', [PrePostTestController::class, 'createPrePost'])->name('createPrePost');
            Route::post('/pre-post-test/{jadual_kursus}/save', [JadualKursusController::class, 'tambah_masa_mula_tamat_pre_post_test']);

            //Post
            Route::resource('/post-test', PostTestController::class)->only(['store', 'destroy', 'edit', 'update']);
            Route::get('/post-test/{jadualKursus}', [PostTestController::class, 'index'])->name('post-test.index');
            Route::get('/post-test/create/{jadualKursus}', [PostTestController::class, 'create'])->name('post-test.create');
            Route::post('/post-test/{jadual_kursus}/save', [JadualKursusController::class, 'tambah_masa_mula_tamat_post_test']);

            //penilaian-kursus
            Route::resource('/penilaian-kursus-us', KursusPenilaianController::class);
            Route::get('/penilaian-kursus/bahagianA/create/{id}', [KursusPenilaianController::class, 'create']);
            Route::get('/penilaian-kursus/bahagianB/{id}', [KursusPenilaianController::class, 'bahagianB']);
            Route::get('/penilaian-kursus/bahagianC/{id}', [KursusPenilaianController::class, 'bahagianC']);
            Route::post('/penilaian-kursus/{jadual_kursus}/save', [JadualKursusController::class, 'tambah_masa_mula_tamat_penilaian_kursus']);



            Route::resource('/keberkesanan-kursus', PenilaianKeberkesananController::class);
            Route::resource('/ejen-pelaksana', PenilaianEjenPelaksanaController::class);
            Route::get('/penilaian-ejen-pelaksana/{id}', [PenilaianEjenPelaksanaController::class, 'create']);
            Route::get('/penilaian-keberkesanan-kursus/{id}', [PenilaianKeberkesananController::class, 'create']);

            Route::get('/cetakQr', [PenilaianPesertaController::class, 'cetakQr']);
            Route::get('/cetakQr2/{jadual_kursus}', [PenilaianPesertaController::class, 'cetakQr2']);
            Route::get('/cetakQrPenilaian/{kursus}', [PenilaianPesertaController::class, 'cetakQr2']);
        });

        Route::group(['middleware' => 'role:Peserta ULS|Peserta ULPK'], function () {

            // Route::resource('/jawab-post', JawabPostTestController::class);

            Route::resource('/penilaian-kursus', PenilaianPesertaController::class);
            Route::get('/penilaian-kursus-ulpk', [PenilaianPesertaController::class, 'show_jawab_penilaian_ulpk']);
            Route::get('/penilaian-kursus-ulpk/permohonanjadual{id}', [PenilaianPesertaController::class, 'jawab_penilaian_ulpk']);

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

    });


    Route::group(['prefix' => 'laporan', 'middleware' => 'can:laporan'], function () {

        // Route::prefix('uls')->group(function () {
        // Route::group(['prefix' => 'uls', 'middleware' => ['Urus Setia ULS', 'Superadmin BTM','Superadmin ULS']], function () {

        Route::prefix('uls')->group(function () {

            Route::prefix('laporan-lain')->group(function () {

                Route::get('laporan-pencapaian-matlamat-kehadiran', [LaporanLainController::class, 'pencapaian_matlamat_kehadiran']);
                Route::get('laporan-pencapaian-matlamat-kehadiran-pdf', [LaporanLainController::class, 'pdf_pencapaian_matlamat_kehadiran'])->name('pdf_pmk');
                Route::get('/pmk', [LaporanLainController::class, 'pmk'])->name('pmk');

                Route::get('laporan-perbelanjaan-mengikut-pusat-tanggungjawab', [LaporanLainController::class, 'perbelanjaan_mengikut_pusat_tanggungjawab']);
                Route::get('pdf-laporan-perbelanjaan-mengikut-pusat-tanggungjawab', [LaporanLainController::class, 'pdf_perbelanjaan_mengikut_pusat_tanggungjawab']);

                Route::get('laporan-perbelanjaan-mengikut-lokaliti', [LaporanLainController::class, 'perbelanjaan_mengikut_lokaliti']);
                Route::get('laporan-perbelanjaan-mengikut-lokaliti-pdf', [LaporanLainController::class, 'pdf_perbelanjaan_mengikut_lokaliti'])->name('pdf_perbelanjaan_lokaliti');
                Route::get('laporan-perbelanjaan-mengikut-lokaliti-excel', [LaporanLainController::class, 'excel_perbelanjaan_mengikut_lokaliti'])->name('excel_perbelanjaan_lokaliti');

                Route::get('laporan-perbelanjaan-pusat-latihan', [LaporanLainController::class, 'laporan_perbelanjaan_pusatlatihan']);
                // Route::get('laporan-perbelanjaan-pl', [LaporanLainController::class, 'laporan_perbelanjaan_pusatlatihan']);
                Route::get('laporan-perbelanjaan-pusat-latihan-pdf', [LaporanLainController::class, 'pdf_laporan_perbelanjaan_pusatlatihan'])->name('pdf-perbelanjaan-pl');
                Route::get('laporan-perbelanjaan-pusat-latihan-excel', [LaporanLainController::class, 'excel_laporan_perbelanjaan_pusatlatihan'])->name('excel-perbelanjaan-pl');

                Route::get('laporan-prestasi-kehadiran-peserta', [LaporanLainController::class, 'laporan_prestasi_kehadiran_peserta']);
                Route::get('pdf-laporan-prestasi-kehadiran-peserta', [LaporanLainController::class, 'pdf_prestasi_kehadiran']);

                Route::get('laporan-kehadiran-7-hari-setahun', [LaporanLainController::class, 'laporan_kehadiran_7_hari_setahun']);
                Route::get('laporan-kehadiran-7-hari-setahun-pdf', [LaporanLainController::class, 'pdf_laporan_kehadiran_7_hari_setahun'])->name('pdf_kehadiran_7_setahun');
                Route::get('laporan-kehadiran-7-hari-setahun-excel', [LaporanLainController::class, 'excel_laporan_kehadiran_7_hari_setahun'])->name('excel_kehadiran_7_setahun');

                Route::get('laporan-ringkasan-penceramah-kursus', [LaporanLainController::class, 'laporan_ringkasan_penceramah_kursus']);
                Route::get('pdf-ringkasan-penceramah-kursus', [LaporanLainController::class, 'pdf_laporan_ringkasan_penceramah_kursus']);

                Route::get('laporan-pencapaian-latihan-kategori', [LaporanLainController::class, 'laporan_pencapaian_latihan_mengikut_kategori']);
                Route::get('laporan-pencapaian-latihan-kategori-pdf', [LaporanLainController::class, 'pdf_laporan_pencapaian_latihan_mengikut_kategori'])->name('pdf_pl_kategori');
                Route::get('laporan-pencapaian-latihan-kategori-excel', [LaporanLainController::class, 'excel_laporan_pencapaian_latihan_mengikut_kategori'])->name('excel_pl_kategori');

                Route::get('senarai-kursus', [LaporanLainController::class, 'senarai_kursus']);
                Route::get('laporan-penilaian-prepost/{id}', [LaporanLainController::class, 'laporan_penilaian_prepost_show']);
                Route::get('laporan-penilaian-prepost-pdf/{id}', [LaporanLainController::class, 'pdf_laporan_penilaian_prepost_show'])->name('pdf_pretest');
                Route::get('laporan-penilaian-prepost-excel/{id}', [LaporanLainController::class, 'excel_laporan_penilaian_prepost_show'])->name('excel_pretest');
                // Route::get('laporan-penilaian-kursus', [LaporanLainController::class, 'laporan_penilaian_kursus_uls']);
                Route::get('laporan-penilaian-kursus/{id}', [LaporanLainController::class, 'laporan_penilaian_kursus_uls']);
                Route::get('laporan-penilaian-kursus-pdf/{id}', [LaporanLainController::class, 'pdf_laporan_penilaian_kursus_uls'])->name('pdf_penilaian_kursus');
                Route::get('laporan-penilaian-kursus-excel/{id}', [LaporanLainController::class, 'excel_laporan_penilaian_kursus_uls'])->name('excel_penilaian_kursus');

            });

            Route::prefix('laporan-am')->group(function () {

                Route::get('laporan-kehadiran-peserta', [LaporanLainController::class, 'laporan_kehadiran_peserta']);
                Route::get('laporan-kehadiran-peserta-pdf', [LaporanLainController::class, 'pdf_laporan_kehadiran_peserta'])->name('pdf_kehadiran_peserta');
                Route::get('laporan-kehadiran-peserta-excel', [LaporanLainController::class, 'excel_kehadiran_peserta'])->name('excel_kehadiran_peserta');

                Route::get('laporan-pelaksanaan-latihan-staf', [LaporanLainController::class, 'laporan_pelaksanaan_latihan_staf']);
                Route::get('laporan-pelaksanaan-latihan-staf-excel', [LaporanLainController::class, 'excel_laporan_pelaksanaan_latihan_staf'])->name('excel_pl_staf');
                Route::get('laporan-pelaksanaan-latihan-staf-pdf', [LaporanLainController::class, 'pdf_laporan_pelaksanaan_latihan_staf'])->name('pdf_pl_staf');

                Route::get('laporan-kewangan-terperinci', [LaporanLainController::class, 'laporan_kewangan_terperinci']);
                Route::get('laporan-kewangan-terperinci-pdf', [LaporanLainController::class, 'pdf_laporan_kewangan_terperinci'])->name('pdf_kewangan_terperinci');
                Route::get('laporan-kewangan-terperinci-excel', [LaporanLainController::class, 'excel_laporan_kewangan_terperinci'])->name('excel_kewangan_terperinci');

                Route::get('laporan-ringkasan-jenis-kursus', [LaporanLainController::class, 'laporan_ringkasan_jenis_kursus']);
                Route::get('laporan-ringkasan-jenis-kursus-pdf', [LaporanLainController::class, 'pdf_laporan_ringkasan_jenis_kursus'])->name('pdf_ringkasan_jk');
                Route::get('laporan-ringkasan-jenis-kursus-excel', [LaporanLainController::class, 'excel_laporan_ringkasan_jenis_kursus'])->name('excel_ringkasan_jk');

                Route::get('laporan-ringkasan-bidang-kursus', [LaporanLainController::class, 'laporan_ringkasan_bidang_kursus']);
                Route::get('laporan-ringkasan-bidang-kursus-pdf', [LaporanLainController::class, 'pdf_laporan_ringkasan_bidang_kursus'])->name('pdf_ringkasan_bk');
                Route::get('laporan-ringkasan-bidang-kursus-excel', [LaporanLainController::class, 'pdf_laporan_ringkasan_bidang_kursus'])->name('excel_ringkasan_bk');

                Route::get('laporan-penilaian-peserta', [LaporanLainController::class, 'laporan_penilaian_peserta']);
                Route::get('penilaian-peserta-pdf', [LaporanLainController::class, 'pdf_laporan_penilaian_peserta']);
                Route::get('penilaian-peserta-excel', [LaporanLainController::class, 'excel_laporan_penilaian_peserta']);




            });

            Route::get('laporan-pencapaian-latihan-mengikut-negeri', [LaporanLainController::class, 'laporan_pencapaian_latihan_mengikut_negeri']);
            Route::get('laporan-pencapaian-latihan-mengikut-negeri-pdf', [LaporanLainController::class, 'pdf_laporan_pencapaian_latihan_mengikut_negeri'])->name('pdf_pencapaian_latihan_negeri');
            Route::get('laporan-pencapaian-latihan-mengikut-negeri-excel', [LaporanLainController::class, 'excel_laporan_pencapaian_latihan_mengikut_negeri'])->name('excel_pencapaian_latihan_negeri');



        });

        Route::prefix('laporan-lain')->group(function () {

            // Route::get('laporan-pencapaian-matlamat-kehadiran', [LaporanLainController::class, 'pencapaian_matlamat_kehadiran']);
            // Route::get('pdf-laporan-pencapaian-matlamat-kehadiran', [LaporanLainController::class, 'pdf_pencapaian_matlamat_kehadiran']);

            Route::get('laporan-ringkasan-penceramah-kursus', [LaporanLainController::class, 'laporan_ringkasan_penceramah_kursus']);
            Route::get('pdf-ringkasan-penceramah-kursus', [LaporanLainController::class, 'pdf_laporan_ringkasan_penceramah_kursus']);

            // Route::get('laporan-pencapaian-latihan-mengikut-negeri', [LaporanLainController::class, 'laporan_pencapaian_latihan_mengikut_negeri']);
            // Route::get('laporan-pencapaian-latihan-mengikut-negeri-pdf', [LaporanLainController::class, 'pdf_laporan_pencapaian_latihan_mengikut_negeri'])->name('pdf_pencapaian_latihan_negeri');
            // Route::get('laporan-pencapaian-latihan-mengikut-negeri-excel', [LaporanLainController::class, 'excel_laporan_pencapaian_latihan_mengikut_negeri'])->name('excel_pencapaian_latihan_negeri');

            Route::get('laporan-penilaian-ejen-pelaksana', [LaporanLainController::class, 'laporan_penilaian_ejen']);
            Route::get('excel-penilaian-ejen-pelaksana', [LaporanLainController::class, 'excel_laporan_penilaian_ejen'])->name('excel_penilaian_ejen');
            Route::get('pdf-penilaian-ejen-pelaksana', [LaporanLainController::class, 'pdf_laporan_penilaian_ejen'])->name('pdf_penilaian_ejen');

            Route::get('laporan-penilaian-keberkesanan/{id}', [LaporanLainController::class, 'laporan_penilaian_keberkesanan']);
            Route::get('laporan-penilaian-keberkesanan-pdf', [LaporanLainController::class, 'pdf_laporan_penilaian_keberkesanan'])->name('pdf-pk');
            Route::get('laporan-penilaian-keberkesanan-excel', [LaporanLainController::class, 'excel_laporan_penilaian_keberkesanan'])->name('excel-pk');


            Route::get('laporan-penilaian-prepost-ulpk', [LaporanLainController::class, 'laporan_penilaian_prepost_ulpk_show']);

            Route::get('laporan-penilaian-penyelia', [LaporanLainController::class, 'laporan_penilaian_penyelia']);
            Route::get('excel-penilaian-penyelia', [LaporanLainController::class, 'excel_laporan_penilaian_penyelia']);
            Route::get('pdf-penilaian-penyelia', [LaporanLainController::class, 'pdf_laporan_penilaian_penyelia']);

            // Route::get('laporan-prestasi-kehadiran', [LaporanLainController::class, 'laporan_prestasi_kehadiran']);

            // Route::get('laporan-pencapaian-latihan-kategori', [LaporanLainController::class, 'laporan_pencapaian_latihan_mengikut_kategori']);
            // Route::get('laporan-pencapaian-latihan-kategori-pdf', [LaporanLainController::class, 'pdf_laporan_pencapaian_latihan_mengikut_kategori'])->name('pdf_pl_kategori');
            // Route::get('laporan-pencapaian-latihan-kategori-excel', [LaporanLainController::class, 'excel_laporan_pencapaian_latihan_mengikut_kategori'])->name('excel_pl_kategori');



            //download excel
            // Route::get('/pmk', [LaporanLainController::class, 'pmk'])->name('pmk');
            Route::get('/pmpt', [LaporanLainController::class, 'pmpt'])->name('pmpt');
            Route::get('/pml', [LaporanLainController::class, 'pml'])->name('pml');
            Route::get('/pkp', [LaporanLainController::class, 'pkp'])->name('pkp');
            Route::get('/rp', [LaporanLainController::class, 'rp'])->name('rp');
        });

        Route::prefix('ulpk')->group(function () {

            // kemajuan_latihan
            Route::prefix('laporan-kemajuan-latihan')->group(function () {
                Route::get('mengikut-bidang', [LaporanLainController::class, 'laporan_kemajuan_latihan_bidang']);
                Route::get('mengikut-bidang-pdf', [LaporanLainController::class, 'pdf_laporan_kemajuan_latihan_bidang'])->name('pdf-kl-bidang');
                Route::get('mengikut-bidang-excel', [LaporanLainController::class, 'excel_laporan_kemajuan_latihan_bidang'])->name('excel-kl-bidang');

                Route::get('mengikut-kategori', [LaporanLainController::class, 'laporan_kemajuan_latihan_kategori']);
                Route::get('mengikut-kategori-pdf', [LaporanLainController::class, 'pdf_laporan_kemajuan_latihan_kategori'])->name('pdf-kl-kategori');
                Route::get('mengikut-kategori-excel', [LaporanLainController::class, 'excel_laporan_kemajuan_latihan_kategori'])->name('excel-kl-kategori');

                Route::get('mengikut-pusat-latihan', [LaporanLainController::class, 'laporan_kemajuan_latihan_pusatlatihan']);
                Route::get('mengikut-pusat-latihan-pdf', [LaporanLainController::class, 'pdf_laporan_kemajuan_latihan_pusatlatihan'])->name('pdf-kl-pl');
                Route::get('mengikut-pusat-latihan-excel', [LaporanLainController::class, 'excel_laporan_kemajuan_latihan_pusatlatihan'])->name('excel-kl-pl');

                Route::get('mengikut-negeri', [LaporanLainController::class, 'laporan_kemajuan_latihan_negeri']);
                Route::get('mengikut-negeri-pdf', [LaporanLainController::class, 'pdf_laporan_kemajuan_latihan_negeri'])->name('pdf-kl-negeri');
                Route::get('mengikut-negeri-excel', [LaporanLainController::class, 'excel_laporan_kemajuan_latihan_negeri'])->name('excel-kl-negeri');


                Route::get('mengikut-daerah', [LaporanLainController::class, 'laporan_kemajuan_latihan_daerah']);
                Route::get('mengikut-daerah-pdf', [LaporanLainController::class, 'pdf_laporan_kemajuan_latihan_daerah'])->name('pdf-kl-daerah');
                Route::get('mengikut-daerah-excel', [LaporanLainController::class, 'excel_laporan_kemajuan_latihan_daerah'])->name('excel-kl-daerah');
            });

            //kehadiran
            Route::prefix('laporan-kehadiran')->group(function () {
                Route::get('mengikut-umur-jantina', [LaporanLainController::class, 'laporan_kehadiran_umur_jantina']);
                Route::get('mengikut-umur-jantina-pdf', [LaporanLainController::class, 'pdf_laporan_kehadiran_umur_jantina']);
                Route::get('mengikut-umur-jantina-excel', [LaporanLainController::class, 'excel_laporan_kehadiran_umur_jantina']);


                Route::get('mengikut-pusat-latihan-pusat-tanggungjawab', [LaporanLainController::class, 'laporan_kehadiran_pusat_latihan']);
                Route::get('mengikut-pusat-latihan-pusat-tanggungjawab-pdf', [LaporanLainController::class, 'pdf_kehadiran_pusat_latihan'])->name('pdf-kehadiran-pl');
                Route::get('mengikut-pusat-latihan-pusat-tanggungjawab-excel', [LaporanLainController::class, 'excel_kehadiran_pusat_latihan'])->name('excel-kehadiran-pl');

                Route::get('mengikut-negeri-parlimen-dun', [LaporanLainController::class, 'laporan_kehadiran_negeri']);
                Route::get('mengikut-negeri-parlimen-dun-pdf', [LaporanLainController::class, 'pdf_kehadiran_negeri']);
                Route::get('mengikut-negeri-parlimen-dun-excel', [LaporanLainController::class, 'excel_kehadiran_negeri']);
            });

            // perbelanjaan
            Route::prefix('laporan-perbelanjaan')->group(function () {
                Route::get('mengikut-bidang', [LaporanLainController::class, 'laporan_perbelanjaan_bidang']);
                Route::get('mengikut-bidang-pdf', [LaporanLainController::class, 'pdf_laporan_perbelanjaan_bidang'])->name('pdf-perbelanjaan-bidang');
                Route::get('mengikut-bidang-excel', [LaporanLainController::class, 'excel_laporan_perbelanjaan_bidang'])->name('excel-perbelanjaan-bidang');

                Route::get('mengikut-kategori', [LaporanLainController::class, 'laporan_perbelanjaan_kategori']);
                Route::get('mengikut-kategori-pdf', [LaporanLainController::class, 'pdf_laporan_perbelanjaan_kategori'])->name('pdf-perbelanjaan-kategori');
                Route::get('mengikut-kategori-excel', [LaporanLainController::class, 'excel_laporan_perbelanjaan_kategori'])->name('excel-perbelanjaan-kategori');

                Route::get('mengikut-kursus', [LaporanLainController::class, 'laporan_perbelanjaan_kursus']);
                Route::get('mengikut-kursus-pdf', [LaporanLainController::class, 'pdf_laporan_perbelanjaan_kursus'])->name('pdf-perbelanjaan-kursus');
                Route::get('mengikut-kursus-excel', [LaporanLainController::class, 'excel_laporan_perbelanjaan_kursus'])->name('excel-perbelanjaan-kursus');


                // Route::get('mengikut-pusat-latihan', [LaporanLainController::class, 'laporan_perbelanjaan_pusatlatihan']);
                // // Route::get('mengikut-pl', [LaporanLainController::class, 'laporan_perbelanjaan_pusatlatihan']);
                // Route::get('mengikut-pusat-latihan-pdf', [LaporanLainController::class, 'pdf_laporan_perbelanjaan_pusatlatihan'])->name('pdf-perbelanjaan-pl');
                // Route::get('mengikut-pusat-latihan-excel', [LaporanLainController::class, 'excel_laporan_perbelanjaan_pusatlatihan'])->name('excel-perbelanjaan-pl');
            });
        });
    });

    //Urus Setia ULPK
    Route::group(['prefix' => 'us-ulpk', 'middleware' => ['UlpkUrusSetia', 'Superadmin BTM']], function () {

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

    Route::get('/testing', [UtilitiControhller::class, 'test_user_list']);
    Route::get('/add_staf', [UtilitiController::class, 'r_espek']);
    Route::delete('/delete/{id}', [UtilitiController::class, 'test_user_delete']);
    Route::put('/update_role/{id}', [UtilitiController::class, 'test_user_update_role']);
    Route::get('/delete_staf', [UtilitiController::class, 'remove_user_uls']);
    Route::get('/change_role_uls', [UtilitiController::class, 'change_role_uls']);
    Route::get('/change_role_superadmin', [UtilitiController::class, 'change_role_sabtm']);

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

    // perbelanjaan
    Route::group(['prefix' => 'perbelanjaan'], function () {

        // perbelanjaan kursus
        Route::resource('perbelanjaan-kursus', PerbelanjaanKursusController::class);
        Route::post('perbelanjaan-kursus/carian', [PerbelanjaanKursusController::class, 'carian']);
        Route::get('perbelanjaan-kursus/butiran/{tahun}/{kod_pa}/{kod_objek}/{no_pesanan}', [PerbelanjaanKursusController::class, 'butiran_rekod']);

        // perbelanjaan pengajian lanjutan
        Route::resource('pengajian-lanjutan', PerbelanjaanPengajianLanjutanController::class);
        Route::post('pengajian-lanjutan/carian', [PerbelanjaanPengajianLanjutanController::class, 'carian']);
        Route::get('pengajian-lanjutan/butiran/{tahun}/{kod_pa}/{kod_objek}/{no_dbil}', [PerbelanjaanPengajianLanjutanController::class, 'butiran_rekod']);

        // perbelanjaan pelajar praktikal
        Route::resource('pelajar-praktikal', PerbelanjaanPelajarPraktikalController::class);
        Route::post('pelajar-praktikal/carian', [PerbelanjaanPelajarPraktikalController::class, 'carian']);
        Route::get('pelajar-praktikal/butiran/{tahun}/{kod_pa}/{kod_objek}/{no_dbil}', [PerbelanjaanPelajarPraktikalController::class, 'butiran_rekod']);
    });

    Route::get('/jadual_tahunan', [DashboardController::class, 'jadual_tahunan']);
    Route::post('/pengurusan_pengguna/peranan/tukar_nama/{id}', [PerananController::class, 'tukar_nama']);

    // filetr route
    Route::get('/pengurusan_kursus/filter-daerah/{search}', [DaerahController::class, 'filter']);
    // Route::get('/pengurusan_kursus/filter-stesen/{data}', [StesenController::class, 'filter']);
    Route::get('/pengurusan_kursus/filter-jadual', [JadualKursusController::class, 'filter_jadual']);
    Route::get('/pengurusan_peserta/permohonan/filter', [SemakPermohonanController::class, 'filter']);
    Route::get('/dashboard/filter_tahun', [DashboardController::class, 'filter']);
    Route::get('/utiliti/parlimen/filter', [ParlimenController::class, 'filter']);
    Route::get('/utiliti/mukim/filter', [MukimController::class, 'filter']);
    Route::get('/utiliti/dun/filter', [DunController::class, 'filter']);
    Route::get('/utiliti/kampung/filter', [KampungController::class, 'filter']);
    Route::get('/utiliti/seksyen/filter', [SeksyenController::class, 'filter']);
    Route::get('/utiliti/stesen/filter', [StesenController::class, 'filter']);
});

require __DIR__ . '/auth.php';
