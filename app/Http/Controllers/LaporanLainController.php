<?php

namespace App\Http\Controllers;
use App\Exports\KemajuanLatihanNegeriExport;
use App\Exports\PerbelanjaanPlExport;
use App\Exports\PencapaianLatihanNegeriExport;
use App\Exports\KehadiranNegeriExport;
use App\Exports\KemajuanLatihanBidangExport;
use App\Exports\KemajuanLatihanKategoriExport;
use App\Exports\Kehadiran7HariSetahunExport;
use App\Exports\PerlaksanaanLatihanStafExport;
use App\Exports\KewanganTerperinciExport;
use App\Exports\RingkasanJenisKursusExport;
use App\Exports\RingkasanBidangKursusExport;
use App\Exports\PenilaianEjenPelaksanaExport;
use App\Exports\PenilaianPesertaExport;
use App\Exports\KehadiranPesertaExport;
use App\Exports\KehadiranPlExport;
use App\Exports\KehadiranUmurJantinaExport;
use App\Exports\KemajuanLatihanDaerahExport;
use App\Exports\KemajuanLatihanPlExport;
use App\Exports\PencapaianMatlamatExport;
use App\Exports\PerbelanjaanKategoriExport;
use App\Exports\PerbelanjaanMengikutLExport;
use App\Exports\PerbelanjaanMengikutPTExport;
use App\Exports\PrestasiKehadiranExport;
use App\Exports\RingkasanPenceramahExport;
use App\Models\Agensi;
use App\Models\BidangKursus;
use App\Models\KategoriAgensi;
use App\Models\Kehadiran;
use App\Models\JadualKursus;
use App\Models\KehadiranPusatLatihan;
use App\Models\PenceramahKonsultan;
use App\Models\PenilaianEjenPelaksana;
use App\Models\PusatTanggungjawab;
use App\Models\PerbelanjaanKursus;
use App\Models\PeruntukanPeserta;
use App\Models\PenilaianPeserta;
use App\Models\Staf;
use App\Models\User;
use App\Models\PrePostTest;
use App\Policies\PreTestPolicy;

use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Database\Seeders\PusatTanggungjawabSeeder;

class LaporanLainController extends Controller
{
    public function pencapaian_matlamat_kehadiran()
    {
        $bidang_kursus = BidangKursus::with('kodkursus')->get();
        $j_pencapaian = 0;
        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);
        }

        $bidang = new BidangKursus();
        $bidang['j_pencapaian'] = $j_pencapaian;
        $bidang['data'] = $bidang_kursus;

        $response = Http::post('https://libreoffice.prototype.com.my/cetak/LaporanPMK', [$bidang]);

        $res = $response->getBody()->getContents();

        $url = "data:application/pdf;base64," . $res;

        return view('laporan.laporan_lain.laporan_pencapaian_matlamat_kehadiran', [
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
            'url' => $url,
        ]);
    }
    public function pmk()
    {
        // return (new PencapaianMatlamatExport)->download('PencapaianMatlamat.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return (new PencapaianMatlamatExport())->download('PencapaianMatlamat.xlsx');
    }

    public function pdf_pencapaian_matlamat_kehadiran()
    {
        $bidang_kursus = BidangKursus::with('kodkursus')->get();
        $j_pencapaian = 0;
        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);
        }

        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_pencapaian_matlamat_kehadiran', [
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Pencapaian Matlamat Kehadiran.' . 'pdf');
    }

    public function perbelanjaan_mengikut_pusat_tanggungjawab()
    {
        // $pt = new PusatTanggungjawab();
        // $response = Http::post('https://libreoffice.prototype.com.my/cetak/LaporanPMPT', [$pt]);
        // $res = $response->getBody()->getContents();
        // $url = "data:application/pdf;base64," . $res;

        // return view('laporan.laporan_lain.perbelanjaan_mengikut_pusat_tanggungjawab', [
        //     'pusat_tanggungjawab' => $pt,
        //     'url' => $url,
        // ]);
        // $pt=PusatTanggungjawab::all();
        $perbelanjaan = PerbelanjaanKursus::with(['jadual_kursus', 'pt']);
        return view('laporan.laporan_lain.perbelanjaan_mengikut_pusat_tanggungjawab', [
            'perbelanjaan' => $perbelanjaan


        ]);
    }

    public function pdf_perbelanjaan_mengikut_pusat_tanggungjawab()
    {
        $perbelanjaan = PerbelanjaanKursus::with(['jadual_kursus', 'pt']);

        $pdf = PDF::loadView('laporan.laporan_lain.excel.perbelanjaan_mengikut_pusat_tanggungjawab', [
            'perbelanjaan' => $perbelanjaan
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Pembelanjaan Mengikut Pusat Tanggungjawab.' . 'pdf');
    }


    public function pmpt()
    {
        $perbelanjaan = PerbelanjaanKursus::with(['jadual_kursus', 'pt']);

        return (new PerbelanjaanMengikutPTExport())->download('PerbelanjaanMengikutPusatTanggungjawab.xlsx');
    }

    public function perbelanjaan_mengikut_lokaliti()
    {
        $pt = PusatTanggungjawab::all();
        $response = Http::post('https://libreoffice.prototype.com.my/cetak/LaporanPML', [$pt]);
        $res = $response->getBody()->getContents();
        $url = "data:application/pdf;base64," . $res;

        return view('laporan.laporan_lain.perbelanjaan_mengikut_lokaliti', [
            'pt' => $pt,
        ]);
    }

    public function pdf_perbelanjaan_mengikut_lokaliti()
    {
        $pt = PusatTanggungjawab::all();

        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_perbelanjaan_mengikut_lokaliti', [
            'pt' => $pt,
        ]);

        return $pdf->stream('Pembelanjaan Mengikut Lokaliti.' . 'pdf');
    }

    public function pml()
    {
        return (new PerbelanjaanMengikutLExport())->download('PerbelanjaanMengikutLokaliti.xlsx');
    }

    public function bk()
    {
        $bidang_kursus = BidangKursus::with('jadual_kursus')->get();

        $hadir = 0;
        $tidak_hadir = 0;
        $bil_pengganti = 0;
        foreach ($bidang_kursus as $bk) {
            foreach ($bk->jadual_kursus as $jk) {
                $jk['tarikh'] = date('d/m/Y', strtotime($jk->tarikh_mula));
                $kehadiran = Kehadiran::where('jadual_kursus_id', $jk->id)->get();
                $jk['kehadiran'] = $kehadiran;
                // if (!$kehadiran->isEmpty()) {
                //     foreach ($kehadiran as $k) {
                //         if ($k->status_kehadiran_ke_kursus == "HADIR" && $k->pengesahan == "DISAHKAN") {
                //             $hadir++;
                //         }
                //         if ($k->status_kehadiran_ke_kursus == "TIDAK HADIR" && $k->pengesahan == "DISAHKAN") {
                //             $tidak_hadir++;
                //         }
                //         if ($k->nama_pengganti != null) {
                //             $bil_pengganti++;
                //         }
                //     }

                //     $jk['peratusan'] = ($hadir / ($hadir + $tidak_hadir) * 100);
                // } else {
                //     $jk['peratusan'] = 0;
                // }
                $jk['bil_hadir'] = $hadir;
                $jk['bil_tidak_hadir'] = $tidak_hadir;
                $jk['bil_pengganti'] = $bil_pengganti;
            }
        }

        return $bidang_kursus;
    }
    public function laporan_prestasi_kehadiran_peserta()
    {
        $bidang_kursus = $this->bk();
        return view('laporan.laporan_lain.laporan_prestasi_kehadiran_peserta', [
            'bidang_kursus' => $bidang_kursus,
        ]);
    }

    public function pdf_prestasi_kehadiran()
    {
        $bidang_kursus = BidangKursus::with('kodkursus')->get();
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_prestasi_kehadiran_peserta', [
            'bidang_kursus' => $bidang_kursus
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Prestasi Kehadiran Peserta.' . 'pdf');
    }

    public function pkp()
    {
        return (new PrestasiKehadiranExport())->download('Laporan Prestasi Kehadiran Peserta.xlsx');
    }

    public function laporan_kehadiran_7_hari_setahun()
    {
        return view('laporan.laporan_lain.laporan_kehadiran_7_hari_setahun');
    }

    public function pdf_laporan_kehadiran_7_hari_setahun()
    {
        // return view('laporan.laporan_lain.laporan_kehadiran_7_hari_setahun');
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_kehadiran_7_hari_setahun')
        ->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Prestasi Kehadiran 7 Hari Setahun.' . 'pdf');
    }

    public function excel_laporan_kehadiran_7_hari_setahun()
    {
        // return view('laporan.laporan_lain.laporan_kehadiran_7_hari_setahun');
        return (new Kehadiran7HariSetahunExport())->download('LaporanKehadiran7HariSetahun.xlsx');
        // return (new Kehadiran7HariSetahunExport)->download('Kehadiran7.xls', \Maatwebsite\Excel\Excel::XLS);


    }

    public function laporan_ringkasan_penceramah_kursus()
    {
        $id_penceramah = KategoriAgensi::where('Kategori_Agensi', 'Penceramah')->first()->id;

        $penceramah = Agensi::where('kategori_agensi', $id_penceramah)->with('penceramahKonsultan')->get();

        // foreach ($penceramah as $p) {
        //     foreach ($p->penceramahKonsultan as $pk) {
        //         $pk['tahun'] = date('Y', strtotime($pk->jadual_kursus->tarikh_mula));
        //         $pk['mula'] = date('d/m/Y', strtotime($pk->jadual_kursus->tarikh_mula));
        //         $pk['tamat'] = date('d/m/Y', strtotime($pk->jadual_kursus->tarikh_mula));
        //         $pk['tempat'] = Agensi::find($pk->jadual_kursus->kursus_tempat)->nama_Agensi;
        //     }
        // }
        return view('laporan.laporan_lain.laporan_ringkasan_penceramah_kursus', [
            'penceramah' => $penceramah,
        ]);
    }

    public function rp()
    {
        return (new RingkasanPenceramahExport())->download('RingkasanPenceramahKursus.xlsx');
    }

    public function pdf_laporan_ringkasan_penceramah_kursus()
    {
        $id_penceramah = KategoriAgensi::where('Kategori_Agensi', 'Penceramah')->first()->id;

        $penceramah = Agensi::where('kategori_agensi', $id_penceramah)->with('penceramahKonsultan')->get();

        foreach ($penceramah as $p) {
            foreach ($p->penceramahKonsultan as $pk) {
                $pk['tahun'] = date('Y', strtotime($pk->jadual_kursus->tarikh_mula));
                $pk['mula'] = date('d/m/Y', strtotime($pk->jadual_kursus->tarikh_mula));
                $pk['tamat'] = date('d/m/Y', strtotime($pk->jadual_kursus->tarikh_mula));
                $pk['tempat'] = Agensi::find($pk->jadual_kursus->kursus_tempat)->nama_Agensi;
            }
        }

        $pdf = PDF::loadView('laporan.laporan_lain.excel.laporan_ringkasan_penceramah_kursus', [
            'penceramah' => $penceramah,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Ringkasan Penceramah.' . 'pdf');
    }

    public function laporan_pencapaian_latihan_mengikut_negeri()
    {
        $pusat_tanggungjawab = PusatTanggungjawab::all();

        // dd($pusat_tanggungjawab);
        return view('laporan.laporan_lain.pencapaian_latihan_mengikut_negeri', [
            'pusat_tanggungjawab' => $pusat_tanggungjawab,
        ]);
    }

    public function pdf_laporan_pencapaian_latihan_mengikut_negeri()
    {
        $pusat_tanggungjawab = PusatTanggungjawab::all();

        // dd($pusat_tanggungjawab);

        $pdf = PDF::loadView('laporan.laporan_lain.pdf.pencapaian_latihan_mengikut_negeri', [
            'pusat_tanggungjawab' => $pusat_tanggungjawab,
        ])->setPaper('a4', 'landscape');

        return $pdf->download('Laporan Pencapaian Latihan Mengikut Negeri.' . 'pdf');

    }

    public function excel_laporan_pencapaian_latihan_mengikut_negeri()
    {

        return (new PencapaianLatihanNegeriExport())->download('Pencapaian Latihan Mengikut Negeri.xlsx');

    }

    public function laporan_kehadiran_peserta()
    {
        $kehadiran = Kehadiran::with(['staff', 'kursus'])->get();
        // $kursus = JadualKursus::with('tempat');

        foreach ($kehadiran as $k) {
            $k['user'] = User::find($k->no_pekerja);
            $k['tempat'] = JadualKursus::with('tempat');
        }

        return view('laporan.laporan_lain.laporan_kehadiran_peserta', [
            'kehadiran' => $kehadiran,
            // 'kursus'=>$kursus,

        ]);
    }

    public function excel_kehadiran_peserta()
    {
        // $kehadiran = new KehadiranPesertaExport();
        // return $kehadiran->download('KehadiranPeserta.xls');

        return (new KehadiranPesertaExport())->download('KehadiranPeserta.xlsx');
    }


    public function pdf_laporan_kehadiran_peserta()
    {
        $kehadiran = Kehadiran::with(['staff', 'kursus'])->get();

        // $user = User::with(['staf','data_pk'])->where('id',$kehadiran->no_pekerja)->first();

        foreach ($kehadiran as $k) {
            $k['user'] = User::find($k->no_pekerja);
        }

        // $jadual = JadualKursus::where('id',$kehadiran->jadual_kursus_id)->first();
        // $tempat = Agensi::where('id',$jadual->kursus_tempat)->first();

        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_kehadiran_peserta', [
            'kehadiran' => $kehadiran,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kehadiran Peserta.' . 'pdf');
    }

    public function laporan_pelaksanaan_latihan_staf()
    {
        return view('laporan.laporan_lain.pelaksanaan_latihan_staf');
    }

    public function pdf_laporan_pelaksanaan_latihan_staf()
    {
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.pelaksanaan_latihan_staf')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pelaksanaan Latihan Staf.' . 'pdf');
    }


    public function excel_laporan_pelaksanaan_latihan_staf()
    {
        return (new PerlaksanaanLatihanStafExport())->download('KewanganTerperinci.xlsx');
    }


    public function laporan_kewangan_terperinci()
    {
        return view('laporan.laporan_lain.laporan_kewangan_terperinci');
    }

    public function pdf_laporan_kewangan_terperinci()
    {
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_kewangan_terperinci')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kewangan Terperinci.' . 'pdf');
    }

    public function excel_laporan_kewangan_terperinci()
    {
        return (new KewanganTerperinciExport())->download('KewanganTerperinci.xlsx');
    }


    public function laporan_ringkasan_jenis_kursus()
    {
        $bilangan_peserta=0;

        $kursus = JadualKursus::with(['kategori_kursus','bidang','kodkursus','kehadiran'])->get();
        foreach ($kursus as $k) {

            $bilangan_peserta += count($k->kehadiran);
        }

        // $bilangan_peserta=$kursus['kehadiran'];
        // $kehadiran =Kehadiran::where('status_kehadiran','HADIR')->where('jadual_kursus_id',$kursus->id)->get();



        // dd($kursus);
        return view('laporan.laporan_lain.ringkasan_jenis_kursus',[
            'kursus'=>$kursus,
            'bilangan_peserta'=>$bilangan_peserta
        ]);
    }

    public function pdf_laporan_ringkasan_jenis_kursus()
    {
        $bilangan_peserta=0;

        $kursus = JadualKursus::with(['kategori_kursus','bidang','kodkursus','kehadiran'])->get();
        foreach ($kursus as $k) {

            $bilangan_peserta += count($k->kehadiran);
        }

        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_ringkasan_jenis_kursus', [
            'kursus' => $kursus,
            'bilangan_peserta'=>$bilangan_peserta
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Ringkasan Jenis Kursus.' . 'pdf');
        // return view('laporan.laporan_lain.ringkasan_jenis_kursus');
    }

    public function excel_laporan_ringkasan_jenis_kursus()
    {
        return (new RingkasanJenisKursusExport())->download('RingkasanJenisKursus.xlsx');
    }

    public function laporan_ringkasan_bidang_kursus()
    {
        $bilangan_peserta=0;

        $kursus = JadualKursus::with(['kategori_kursus','bidang','kodkursus','kehadiran'])->get();
        foreach ($kursus as $k) {

            $bilangan_peserta += count($k->kehadiran);
        }

        // $bilangan_peserta=$kursus['kehadiran'];
        // $kehadiran =Kehadiran::where('status_kehadiran','HADIR')->where('jadual_kursus_id',$kursus->id)->get();



        // dd($kursus);
        return view('laporan.laporan_lain.ringkasan_bidang_kursus',[
            'kursus'=>$kursus,
            'bilangan_peserta'=>$bilangan_peserta
        ]);
    }

    public function pdf_laporan_ringkasan_bidang_kursus()
    {
        $bilangan_peserta=0;

        $kursus = JadualKursus::with(['kategori_kursus','bidang','kodkursus','kehadiran'])->get();
        foreach ($kursus as $k) {

            $bilangan_peserta += count($k->kehadiran);
        }


        // dd($kursus);
        return view('laporan.laporan_lain.pdf.laporan_ringkasan_bidang_kursus',[
            'kursus'=>$kursus,
            'bilangan_peserta'=>$bilangan_peserta
        ]);
    }


    public function excel_laporan_ringkasan_bidang_kursus()
    {
        return (new RingkasanBidangKursusExport())->download('LaporanRingkasanBidangKursus.xlsx');
    }

    public function laporan_penilaian_peserta()
    {


        $penilaian = PenilaianPeserta::with('kursus');

        // foreach ($kursus as $k) {
        //     $k['kehadiran'] = Kehadiran::find($k->jadual_kursus_id);
        //     $k['penilaian'] = PenilaianPeserta::find($k->id_jadual);
        // }



        // $jumlah_peserta = count($kursus['kehadiran']);
        // $jumlah_penilaian=count($kursus['penilaian']);


        // dd($kursus);
        return view('laporan.laporan_lain.penilaian_peserta', [
            'penilaian' => $penilaian,
            // 'jumlah_peserta'=>$jumlah_peserta,
            // 'jumlah_penilaian'=>$jumlah_penilaian
        ]);
    }

    public function pdf_laporan_penilaian_peserta()
    {
        $penilaian = PenilaianPeserta::with(['kursus'])->get();


        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_penilaian_peserta', [
            'penilaian' => $penilaian
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Penilaian Peserta.' . 'pdf');
    }


    public function excel_penilaian_peserta()
    {
        return (new PenilaianPesertaExport())->download('PenilaianPeserta.xlsx');
    }


    public function laporan_penilaian_ejen()
    {
        $ejen = PenilaianEjenPelaksana::with('penceramahKonsultan');


        return view('laporan.laporan_lain.laporan-penilaian-ejen', [
            'ejen' => $ejen
        ]);
    }

    public function excel_laporan_penilaian_ejen()
    {
        // return (new PenilaianEjenPelaksanaExport())->download('PenilaianEjenPelaksana.xlsx');
        return (new PenilaianEjenPelaksanaExport())->download('PenilaianPeserta.xlsx');
    }

    public function pdf_laporan_penilaian_ejen()
    {
        $ejen = PenilaianEjenPelaksana::with('penceramahKonsultan');


        $pdf = PDF::loadView('laporan.laporan_lain.pdf.laporan_penilaian_ejen', [
            'ejen' => $ejen
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Penilaian Ejen Pelaksana.' . 'pdf');
    }


    public function laporan_penilaian_kursus_uls()
    {

        return view('laporan.laporan_lain.laporan-penilaian-kursus-uls');
    }

    public function senarai_kursus()
    {

        $kursus = JadualKursus::with(['bidang','tempat','kategori_kursus','pengendali'])->get();

        return view('laporan.laporan_lain.penilaian.senarai_kursus',[
            'kursus'=>$kursus
        ]);
    }

    public function laporan_penilaian_prepost_show()
    {
        $pretest=PrePostTest::with('kursus');

        return view('laporan.laporan_lain.laporan-penilaian-prepost-show',[
            'pretest'=>$pretest
        ]);
    }
    public function excel_penilaian_prepost_show()
    {
//
    }

    public function pdf_penilaian_prepost_show()
    {
        $pretest=PrePostTest::with('kursus');

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-penilaian-prepost-show',[
            'pretest'=>$pretest
        ]);
    }

    public function laporan_penilaian_prepost_ulpk_show()
    {

        return view('laporan.laporan_lain.laporan-penilaian-prepost-show_ulpk');
    }

    public function laporan_penilaian_penyelia()
    {

        return view('laporan.laporan_lain.laporan-penilaian-penyelia');
    }

    public function excel_laporan_penilaian_penyelia()
    {

        return view('laporan.laporan_lain.laporan-penilaian-penyelia');
    }

    public function pdf_laporan_penilaian_penyelia()
    {

        return view('laporan.laporan_lain.laporan-penilaian-penyelia');
    }

    public function laporan_prestasi_kehadiran()
    {

        return view('laporan.laporan_lain.laporan-prestasi-kehadiran');
    }



    public function laporan_pencapaian_latihan_mengikut_kategori()
    {
        return view('laporan.laporan_lain.laporan-pencapaian_latihan-kategori');
    }

    // kemajuan
    public function laporan_kemajuan_latihan_bidang()
    {
        return view('laporan.laporan_lain.kemajuan_latihan.bidang');
    }

    public function pdf_laporan_kemajuan_latihan_bidang()
    {

        $pdf = PDF::loadView('laporan.laporan_lain.pdf.kemajuan.bidang')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kemajuan Latihan Mengikut Bidang.' . 'pdf');
    }

    public function excel_laporan_kemajuan_latihan_bidang()
    {
        // return view('laporan.laporan_lain.kemajuan_latihan.bidang');
        return (new KemajuanLatihanBidangExport())->download('Laporan Kemajuan Latihan Bidang.xlsx');

    }


    public function laporan_kemajuan_latihan_kategori()
    {
        return view('laporan.laporan_lain.kemajuan_latihan.kategori');
    }

    public function pdf_laporan_kemajuan_latihan_kategori()
    {
        // return view('laporan.laporan_lain.kemajuan_latihan.kategori');
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.kemajuan.kategori')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kemajuan Latihan Mengikut Kategori.' . 'pdf');

    }

    public function excel_laporan_kemajuan_latihan_kategori()
    {
        return (new KemajuanLatihanKategoriExport())->download('Laporan Kemajuan Latihan Mengikut Kategori.xlsx');
    }


    public function laporan_kemajuan_latihan_pusatlatihan()
    {
        return view('laporan.laporan_lain.kemajuan_latihan.pusat_latihan');
    }

    public function pdf_laporan_kemajuan_latihan_pusatlatihan()
    {
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.kemajuan.pusat_latihan')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kemajuan Latihan Mengikut Pusat Latihan.' . 'pdf');
    }

    public function excel_laporan_kemajuan_latihan_pusatlatihan()
    {
        return (new KemajuanLatihanPlExport())->download('Laporan Kemajuan Latihan Mengikut Pusat Latihan.xlsx');
    }


    public function laporan_kemajuan_latihan_negeri()
    {
        return view('laporan.laporan_lain.kemajuan_latihan.negeri');
    }

    public function pdf_laporan_kemajuan_latihan_negeri()
    {
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.kemajuan.negeri')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kemajuan Latihan Mengikut Negeri.' . 'pdf');
    }

    public function excel_laporan_kemajuan_latihan_negeri()
    {
        return (new KemajuanLatihanNegeriExport())->download('Laporan Kemajuan Latihan Mengikut Negeri.xlsx');
    }


    public function laporan_kemajuan_latihan_daerah()
    {
        return view('laporan.laporan_lain.kemajuan_latihan.daerah');
    }

    public function pdf_laporan_kemajuan_latihan_daerah()
    {
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.kemajuan.daerah')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kemajuan Latihan Mengikut Daerah.' . 'pdf');
    }

    public function excel_laporan_kemajuan_latihan_daerah()
    {
        return (new KemajuanLatihanDaerahExport())->download('Laporan Kemajuan Latihan Mengikut Daerah.xlsx');

    }

    // kehadiran
    public function laporan_kehadiran_umur_jantina()
    {

        $kehadiran_pl = KehadiranPusatLatihan::with(['peserta', 'kursus', 'tempat_kursus'])->get();
        // $tot_kursus=count($kehadiran_pl->kursus);
        // $tot_peserta = count($kehadiran_pl->peserta);
        // $kursus = JadualKursus::with('tempat');

        // $jantina = substr($kehadiran->staff->no_KP,11);

        //     if($jantina%2===0){
        //         $jantina='p';
        //         $perempuan = count($jantina);

        //     }
        //     else{
        //         $jantina = "lelaki";
        //         $lelaki = count($jantina);

        //     }

        // $tot_perempuan = count($perempuan);
        // $tot_lelaki= count($lelaki);
        // $tot_peserta=$tot_perempuan + $tot_lelaki;


        // foreach ($kehadiran as $k) {
        //     $k['user'] = User::find($k->no_pekerja);
        // }

        $tahun_ini = date('Y');

        // $tahun = substr($kehadiran->user->no_kp, 0, 2);
        // $tahun = (int)$tahun;
        //     if ($tahun <= 30) {
        //         $tahun_lahir = '20'.$tahun;
        //     }else{
        //         $tahun_lahir = '19'.$tahun;
        //     }

        // $umur_peserta = $tahun_ini - $tahun_lahir;

        // dd($kehadiran_pl);
        return view('laporan.laporan_lain.kehadiran.umur_jantina', [
            'kehadiran_pl' => $kehadiran_pl,
            // 'tot_kursus'=>$tot_kursus,
            // 'tot_peserta'=>$tot_peserta,
            'tahun_ini' => $tahun_ini,
            // 'umur_peserta'=>$umur_peserta
        ]);
    }

    public function excel_laporan_kehadiran_umur_jantina()
    {
        return (new KehadiranUmurJantinaExport())->download('KehadiranMengikutJantinaUmur.xlsx');
    }


    public function pdf_laporan_kehadiran_umur_jantina()
    {

        $kehadiran_pl = KehadiranPusatLatihan::with(['peserta', 'kursus', 'tempat_kursus'])->get();

        $tahun_ini = date('Y');

        $pdf = PDF::loadView('laporan.laporan_lain.excel.laporan_kehadiran_umur_jantina', [
            'kehadiran_pl' => $kehadiran_pl,
            'tahun_ini' => $tahun_ini,
            // 'umur_peserta'=>$umur_peserta
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Kehadiran Mengikut Umur dan Jantina.' . 'pdf');

    }


    public function laporan_kehadiran_pusat_latihan()
    {
        // $pl = KehadiranPusatLatihan::groupBy('agensi_id');

        $pl = KehadiranPusatLatihan::with(['tempat_kursus'=> function($query){
            $query->groupBy('nama_Agensi');
        }])->get();


        // // dd($pl);
        // foreach ($pl as $k) {
        //     foreach ($k as $l) {
        //         $kursus = JadualKursus::where('id', $l->jadual_kursus_id)->first();
        //         $bilangan_kursus=count('')
        //         $l['bil_kursus'] = count($l->kodkursus);

        //     }
        // }


        // $tahun = substr($pl->peserta->no_KP, 0, 2);
        // $tahun = (int)$tahun;
        //     if ($tahun <= 30) {
        //         $tahun_lahir = '20'.$tahun;
        //     }else{
        //         $tahun_lahir = '19'.$tahun;
        //     }
        // $tahun_ini = date('Y');


        // $umur_peserta = $tahun_ini - $tahun_lahir;
        return view('laporan.laporan_lain.kehadiran.pusat_latihan', [
            'pl' => $pl,

            // 'umur_peserta'=>$umur_peserta
        ]);
    }

    public function excel_kehadiran_pusat_latihan()
    {
        // return view('laporan.laporan_lain.excel.kehadiran_pusat_latihan');
        return (new KehadiranPlExport())->download('Kehadiran Mengikut Pusat Latihan.xlsx');

    }

    public function pdf_kehadiran_pusat_latihan()
    {
        $pl = PusatTang::with(['peserta', 'kursus', 'tempat_kursus'])->get()->groupBy('agensi_id');
        // dd($pl);
        foreach ($pl as $k) {
            foreach ($k as $l) {
                $kursus = JadualKursus::where('id', $l->jadual_kursus_id)->first();
            }
        }

        // $tahun = substr($pl->user->no_kp, 0, 2);
        // $tahun = (int)$tahun;
        //     if ($tahun <= 30) {
        //         $tahun_lahir = '20'.$tahun;
        //     }else{
        //         $tahun_lahir = '19'.$tahun;
        //     }
        // $tahun_ini = date('Y');


        // $umur_peserta = $tahun_ini - $tahun_lahir;
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.kehadiran.pusat_latihan', [
            'pl' => $pl,
            // 'umur_peserta'=>$umur_peserta
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Kehadiran Pusat Latihan.' . 'pdf');
    }

    public function laporan_kehadiran_negeri()
    {
        return view('laporan.laporan_lain.kehadiran.negeri');
    }

    public function pdf_kehadiran_negeri()
    {
        // return view('laporan.laporan_lain.kehadiran.negeri');

        $pdf = PDF::loadView('laporan.laporan_lain.pdf.kehadiran.laporan_kehadiran_negeri')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('LAPORAN KEHADIRAN MENGIKUT NEGERI, PARLIMEN DAN DUN.' . 'pdf');
    }

    public function excel_kehadiran_negeri()

    {   return (new KehadiranNegeriExport())->download('KehadiranMengikutNegeriDun.xlsx');
        // return view('laporan.laporan_lain.kehadiran.negeri');
    }

    // perbelanjaan
    public function laporan_perbelanjaan_bidang()
    {
        return view('laporan.laporan_lain.perbelanjaan.bidang');
    }

    public function pdf_laporan_perbelanjaan_bidang()
    {
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.perbelanjaan.bidang')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Perbelanjaan Mengikut Bidang.' . 'pdf');
    }

    public function excel_laporan_perbelanjaan_bidang()
    {
        return view('laporan.laporan_lain.perbelanjaan.bidang');
    }


    public function laporan_perbelanjaan_kategori()
    {
        return view('laporan.laporan_lain.perbelanjaan.kategori');
    }

    public function pdf_laporan_perbelanjaan_kategori()
    {
        // return view('laporan.laporan_lain.perbelanjaan.kategori');
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.perbelanjaan.kategori')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Perbelanjaan Mengikut Kategori.' . 'pdf');
    }

    public function excel_laporan_perbelanjaan_kategori()
    {
         return (new PerbelanjaanKategoriExport())->download('Perbelanjaan Mengikut Kategori.xlsx');

    }

    public function laporan_perbelanjaan_kursus()
    {
        return view('laporan.laporan_lain.perbelanjaan.kursus');
    }

    public function pdf_laporan_perbelanjaan_kursus()
    {
        // dd('2');
        // return view('laporan.laporan_lain.perbelanjaan.kursus');
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.perbelanjaan.kursus')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Perbelanjaan Mengikut Kursus.' . 'pdf');
    }

    public function excel_laporan_perbelanjaan_kursus()
    {
        return view('laporan.laporan_lain.perbelanjaan.kursus');
    }


    public function laporan_perbelanjaan_pusatlatihan()
    {
        // dd('2');
        return view('laporan.laporan_lain.perbelanjaan.pusat_latihan');
    }

    public function pdf_laporan_perbelanjaan_pusatlatihan()
    {
        // return view('laporan.laporan_lain.perbelanjaan.pusat_latihan');
        $pdf = PDF::loadView('laporan.laporan_lain.pdf.perbelanjaan.pusat_latihan')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Perbelanjaan Mengikut Pusat Latihan.' . 'pdf');
    }

    public function excel_laporan_perbelanjaan_pusatlatihan()
    {
        return (new PerbelanjaanPlExport())->download('Perbelanjaan Mengikut Pusat Latihan.xlsx');
    }
}
