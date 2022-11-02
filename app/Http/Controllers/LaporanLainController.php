<?php

namespace App\Http\Controllers;
use App\Exports\KemajuanLatihanNegeriExport;
use App\Exports\PerbelanjaanPlExport;
use App\Exports\PerbelanjaanKursusExport;
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
use App\Exports\PencapaianLatihanKategoriExport;
use App\Exports\PencapaianMatlamatExport;
use App\Exports\PenilaianKeberkesananExport;
use App\Exports\PenilaianKursusExport;
use App\Exports\PerbelanjaanBidangExport;
use App\Exports\PerbelanjaanKategoriExport;
use App\Exports\PerbelanjaanMengikutLExport;
use App\Exports\PerbelanjaanMengikutPTExport;
use App\Exports\PrePostTestExport;
use App\Exports\PrepostUlpkExport;
use App\Exports\PrestasiKehadiranExport;
use App\Exports\RingkasanPenceramahExport;
use App\Models\Agensi;
use App\Models\Aturcara;
use App\Models\BidangKursus;
use App\Models\KategoriAgensi;
use App\Models\Kehadiran;
use App\Models\JadualKursus;
use App\Models\JawapanPenilaian;
use App\Models\KategoriKursus;
use App\Models\KehadiranPusatLatihan;
use App\Models\KursusPenilaian;
use App\Models\PenceramahKonsultan;
use App\Models\PenilaianEjenPelaksana;
use App\Models\PenilaianKeberkesanan;
use App\Models\PusatTanggungjawab;
use App\Models\PerbelanjaanKursus;
use App\Models\PeruntukanPeserta;
use App\Models\PenilaianPeserta;
use App\Models\MatlamatBilanganKursus;
use App\Models\PostTest;
use App\Models\Negeri;
use App\Models\Staf;
use App\Models\User;
use App\Models\PrePostTest;
use App\Policies\PreTestPolicy;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Database\Seeders\PusatTanggungjawabSeeder;

class LaporanLainController extends Controller
{
    public function pencapaian_matlamat_kehadiran()
    {
        $bidang_kursus = BidangKursus::with(['kodkursus','matlamat_kursus'])->get();

        $j_pencapaian = 0;

        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);


        }

        $bidang = new BidangKursus();
        $bidang['j_pencapaian'] = $j_pencapaian;
        $bidang['data'] = $bidang_kursus;

        return view('laporan.laporan_lain.laporan_pencapaian_matlamat_kehadiran', [
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
        ]);
    }
    public function pmk()
    {
        // return (new PencapaianMatlamatExport)->download('PencapaianMatlamat.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return (new PencapaianMatlamatExport())->download('PencapaianMatlamat.xlsx');
    }

    public function pdf_pencapaian_matlamat_kehadiran()
    {
        $bidang_kursus = BidangKursus::with(['kodkursus','matlamat_kursus','matlamat_peserta','jadual_kursus'])->get();
        $kursus = JadualKursus::with(['kehadiran'])->get();
        $j_hadir = [];
        $j_pencapaian = 0;
        $j_matlamat_kursus = 0;

    foreach ($bidang_kursus as $bk) {
    $bk['pencapaian'] = count($bk->kodkursus);
    $j_pencapaian += count($bk->kodkursus);

    $j_matlamat_kursus=($bk->matlamat_kursus->jan+$bk->matlamat_kursus->feb+$bk->matlamat_kursus->mac+$bk->matlamat_kursus->apr+$bk->matlamat_kursus->mei+$bk->matlamat_kursus->jun+$bk->matlamat_kursus->jul+$bk->matlamat_kursus->ogos+$bk->matlamat_kursus->sept+$bk->matlamat_kursus->okt+$bk->matlamat_kursus->nov+$bk->matlamat_kursus->dis);

    // dd($j_matlamat_kursus);

}
        $bidang = new BidangKursus();
        $bidang['j_pencapaian'] = $j_pencapaian;
        $bidang['data'] = $bidang_kursus;




        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_pencapaian_matlamat_kehadiran', [
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
            'j_matlamat_kursus'=>$j_matlamat_kursus,
            'j_hadir'=>$j_hadir,
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Pencapaian Matlamat Kehadiran.' . 'pdf');
    }

    public function perbelanjaan_mengikut_pusat_tanggungjawab()
    {
        $perbelanjaan = PerbelanjaanKursus::with(['jadual_kursus', 'pt'])->get();
        return view('laporan.laporan_lain.perbelanjaan_mengikut_pusat_tanggungjawab', [
            'perbelanjaan' => $perbelanjaan
        ]);
    }

    public function pdf_perbelanjaan_mengikut_pusat_tanggungjawab()
    {
        $perbelanjaan = PerbelanjaanKursus::with(['pt'])->get();

        // foreach($perbelanjaankursus as $pk){

        // }

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_perbelanjaan_mengikut_pt', [
            'perbelanjaan' => $perbelanjaan
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Pembelanjaan Mengikut Pusat Tanggungjawab.' . 'pdf');
    }


    public function pmpt()
    {
        // $perbelanjaan = PerbelanjaanKursus::with(['jadual_kursus', 'pt']);

        return (new PerbelanjaanMengikutPTExport())->download('PerbelanjaanMengikutPusatTanggungjawab.xlsx');
    }

    public function perbelanjaan_mengikut_lokaliti()
    {
        $perbelanjaankursus = PerbelanjaanKursus::with(['pt'])->get();

        // foreach($perbelanjaankursus as $pk){

        // }


        return view('laporan.laporan_lain.perbelanjaan_mengikut_lokaliti', [
            'perbelanjaankursus' => $perbelanjaankursus,
        ]);
    }

    public function pdf_perbelanjaan_mengikut_lokaliti()
    {
        // $pt = PusatTanggungjawab::all();
        $perbelanjaankursus = PerbelanjaanKursus::with(['pt'])->get();
        $pusat_tanggungjawab = PusatTanggungjawab::with('negeri')->where('id',$perbelanjaankursus->kod_PT)->first();

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_perbelanjaan_mengikut_lokaliti', [
            // 'pt' => $pt,
            'perbelanjaankursus'=>$perbelanjaankursus,

        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pembelanjaan Mengikut Lokaliti.' . 'pdf');
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
        $bidang_kursus = BidangKursus::with(['kodkursus','jadual_kursus'])->get();
        $kursus = JadualKursus::with(['bidang','kategori_kursus','kehadiran','peruntukan'])->get();

        $j_pengganti = 0;
        $j_kehadiran = 0;
        $hadir = [];
        $tidak_hadir = [];
        $pengganti = [];
        $peruntukan_peserta=[];

        foreach ($kursus as $k) {
            $j_peruntukan_peserta = 0;
            $j_kehadiran =0;

            $hadir[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('status_kehadiran_ke_kursus', 'HADIR')->count();
            $tidak_hadir[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('status_kehadiran_ke_kursus', 'TIDAK HADIR')->count();
            $pengganti[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('nama_pengganti','!=',null)->count();

            $peruntukan_peserta[$k->id] = PeruntukanPeserta::where('pp_jadual_kursus', $k->id)->sum('pp_peruntukan_calon');
            // dd($peruntukan_peserta);

            $kehadiran = Kehadiran::where('status_kehadiran', 'HADIR')->orWhere('status_kehadiran_ke_kursus', 'HADIR')->where('jadual_kursus_id', $k->id)->get();


            // echo '__'.$j_peruntukan_peserta;
            // dd('__'.$j_peruntukan_peserta);

            $j_kehadiran += count($kehadiran);
            $peratusan_kehadiran = 0;
        }

        return view('laporan.laporan_lain.laporan_prestasi_kehadiran_peserta', [
            'bidang_kursus' => $bidang_kursus,
            'hadir'=>$hadir,
            'tidak_hadir'=>$tidak_hadir,
            'pengganti'=>$pengganti,
            'kursus'=>$kursus,
            'peruntukan_peserta'=>$peruntukan_peserta,
        ]);
    }

    public function pdf_prestasi_kehadiran()
    {
        $bidang_kursus = BidangKursus::with(['kodkursus','jadual_kursus'])->get();
        $kursus = JadualKursus::with(['bidang','kategori_kursus','kehadiran','peruntukan'])->get();

        $j_pengganti = 0;
        $j_kehadiran = 0;
        $hadir = [];
        $tidak_hadir = [];
        $pengganti = [];
        $peruntukan_peserta=[];

        foreach ($kursus as $k) {
            $j_peruntukan_peserta = 0;
            $j_kehadiran =0;

            $hadir[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('status_kehadiran_ke_kursus', 'HADIR')->count();
            $tidak_hadir[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('status_kehadiran_ke_kursus', 'TIDAK HADIR')->count();
            $pengganti[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('nama_pengganti','!=',null)->count();

            $peruntukan_peserta[$k->id] = PeruntukanPeserta::where('pp_jadual_kursus', $k->id)->sum('pp_peruntukan_calon');
            // dd($peruntukan_peserta);

            $kehadiran = Kehadiran::where('status_kehadiran', 'HADIR')->orWhere('status_kehadiran_ke_kursus', 'HADIR')->where('jadual_kursus_id', $k->id)->get();


            // echo '__'.$j_peruntukan_peserta;
            // dd('__'.$j_peruntukan_peserta);

            $j_kehadiran += count($kehadiran);
            $peratusan_kehadiran = 0;
        }

        // $peruntukan_peserta = PeruntukanPeserta::where('pp_jadual_kursus',$k->id)->get();

        // foreach ($peruntukan_peserta as $pp) {
            //     $pp->pp_peruntukan_calon;
            //     $j_peruntukan_peserta+=$pp->pp_peruntukan_calon;
        // }

        // echo '__'.$j_peruntukan_peserta;
        // dd('__'.$j_peruntukan_peserta);



        // $j_pp = $peruntukan_peserta;
        // dd('__'.$j_peruntukan_peserta);

        // $k['j_kehadiran'] = $j_kehadiran;
        // $k['j_peruntukan_peserta'] = $j_peruntukan_peserta;
        // $k['peratusan_kehadiran'] = $peratusan_kehadiran;




        // dd($peruntukan_peserta);
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_prestasi_kehadiran_peserta', [
            'bidang_kursus' => $bidang_kursus,
            'hadir'=>$hadir,
            'tidak_hadir'=>$tidak_hadir,
            'pengganti'=>$pengganti,
            'kursus'=>$kursus,
            'peruntukan_peserta'=>$peruntukan_peserta,
            'peratusan_kehadiran'=>$peratusan_kehadiran,
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
        $peserta = Staf::with(['pengguna'])->distinct()->get('Gred');

dd($peserta);

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_kehadiran_7_hari_setahun',[
            'peserta'=>$peserta
        ])
        ->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Prestasi Kehadiran 7 Hari Setahun.' . 'pdf');
    }

    public function excel_laporan_kehadiran_7_hari_setahun()
    {
        // dd('2');
        return (new Kehadiran7HariSetahunExport())->download('Laporan Kehadiran 7 Hari Setahun.xlsx');
        // return (new Kehadiran7HariSetahunExport)->download('Kehadiran7.xls', \Maatwebsite\Excel\Excel::XLS);
    }

    public function laporan_ringkasan_penceramah_kursus()
    {
        $id_penceramah = KategoriAgensi::where('Kategori_Agensi', 'Penceramah')->first()->id;

        $penceramah = Agensi::with(['penceramahKonsultan','penceramahKonsultan.jadual_kursus.tempat'])->where('kategori_agensi', $id_penceramah)->get();

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

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_ringkasan_penceramah_kursus', [
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

        $pdf = PDF::loadView('laporan.laporan_lain.excel.pencapaian_latihan_mengikut_negeri', [
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
        $kehadiran = Kehadiran::with(['staff', 'kursus','kursus.bidang','kursus.tempat','kursus.pengendali','kursus.kategori_kursus','staff.staf'])->orderBy('jadual_kursus_id')->get();
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

        return (new KehadiranPesertaExport())->download('Laporan Kehadiran Peserta.xlsx');
    }


    public function pdf_laporan_kehadiran_peserta()
    {
        // dd('2');
        $kehadiran = Kehadiran::with(['staff','kursus'])->get();
        // $kursus = JadualKursus::with('tempat');

        foreach ($kehadiran as $k) {
            $k['user'] = User::find($k->no_pekerja);
            // $k['tempat'] = JadualKursus::with('tempat');
        }

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_kehadiran_peserta', [
            'kehadiran' => $kehadiran,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kehadiran Peserta.' . 'pdf');
    }

    public function laporan_pelaksanaan_latihan_staf()
    {
        $kursus = JadualKursus::with(['kehadiran','bidang','tempat','pengendali'])->get();
        $j_kehadiran = 0;
        $hadir = [];
        $perempuan = [];
        $j_perempuan = 0;
        $j_lelaki = 0;
        $lelaki = [];

        foreach ($kursus as $ku) {
            // if (!isset($jadualkursus[$ku->perbelanjaan->jadualkursus_id])) {
            $pk=PerbelanjaanKursus::where('jadualkursus_id', $ku->id)->first();
            // $jadualkursus[$ku->perbelanjaan->jadualkursus_id]['peruntukan'] =
            $hadir[$ku->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $ku->id)->where('status_kehadiran_ke_kursus', 'HADIR')->count();
            $kehadiran = Kehadiran::with('staff')->where('jadual_kursus_id', $ku->id)->where('status_kehadiran_ke_kursus', 'HADIR');

            // foreach($kehadiran as $ke){
                // $perempuan[$kehdiran->id] = Kehadiran::where('no_pekerja')
            // }
            }

        return view('laporan.laporan_lain.pelaksanaan_latihan_staf', [
            'kursus'=>$kursus,
            'hadir'=>$hadir,

        ]);
    }

    public function pdf_laporan_pelaksanaan_latihan_staf()
    {
        $kursus = JadualKursus::with(['kehadiran','bidang','tempat','pengendali','peruntukan'])->get();

        foreach ($kursus as $ku) {
            // if (!isset($jadualkursus[$ku->perbelanjaan->jadualkursus_id])) {
            $pk=PerbelanjaanKursus::where('jadualkursus_id', $ku->id)->first();
            // $jadualkursus[$ku->perbelanjaan->jadualkursus_id]['peruntukan'] =
            $hadir[$ku->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $ku->id)->where('status_kehadiran_ke_kursus', 'HADIR')->count();


        }


        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.pelaksanaan_latihan_staf', [
            'kursus'=>$kursus,
            'hadir'=>$hadir,

        ])
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pelaksanaan Latihan Staf.' . 'pdf');
    }


    public function excel_laporan_pelaksanaan_latihan_staf()
    {
        return (new PerlaksanaanLatihanStafExport())->download('Laporan Perlaksanaan Latihan Staf.xlsx');
    }


    public function laporan_kewangan_terperinci()
    {
        $kursus = JadualKursus::with(['bidang','tempat','pengendali','kehadiran','perbelanjaan'])->where('kursus_status', '1')->get();
        $j_kehadiran = 0;
        $kehadiran = 0;
        $hadir = [];

        foreach ($kursus as $ku) {
            $pk=PerbelanjaanKursus::where('jadualkursus_id', $ku->id)->first();
            $hadir[$ku->id] = Kehadiran::with('kursus')->where('jadual_kursus_id',$ku->id)->where('status_kehadiran_ke_kursus', 'HADIR')->count();

        // echo  $ku->kursus_nama.'->' .$hadir.'___';

        }

        return view('laporan.laporan_lain.laporan_kewangan_terperinci', [
            'kursus'=>$kursus,
            // 'perbelanjaan_kursus'=>$perbelanjaan_kursus,
            'hadir'=>$hadir,
        ]);
    }

    public function pdf_laporan_kewangan_terperinci()
    {
        $kursus = JadualKursus::with(['bidang','tempat','pengendali','kehadiran','perbelanjaan'])->where('kursus_status', '1')->get();
        $j_kehadiran = 0;
        $kehadiran = 0;
        $hadir = [];

        foreach ($kursus as $ku) {

            // if (!isset($jadualkursus[$ku->perbelanjaan->jadualkursus_id])) {
            $pk=PerbelanjaanKursus::where('jadualkursus_id', $ku->id)->first();
            // $jadualkursus[$ku->perbelanjaan->jadualkursus_id]['peruntukan'] =
            $hadir[$ku->id] = Kehadiran::with('kursus')->where('jadual_kursus_id',$ku->id)->where('status_kehadiran_ke_kursus', 'HADIR')->count();

        // echo  $ku->kursus_nama.'->' .$hadir.'___';

        }

                // dd($hadir);

        // dd($kehadiran);
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_kewangan_terperinci', [
            'kursus'=>$kursus,
            // 'perbelanjaan_kursus'=>$perbelanjaan_kursus,
            'hadir'=>$hadir,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Kewangan Terperinci.' . 'pdf');
    }



    public function excel_laporan_kewangan_terperinci()
    {
        return (new KewanganTerperinciExport())->download('Laporan Kewangan Terperinci.xlsx');
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
        return view('laporan.laporan_lain.ringkasan_jenis_kursus', [
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

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_ringkasan_jenis_kursus', [
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
        return view('laporan.laporan_lain.ringkasan_bidang_kursus', [
            'kursus'=>$kursus,
            'bilangan_peserta'=>$bilangan_peserta
        ]);
    }

    public function pdf_laporan_ringkasan_bidang_kursus()
    {
        $bilangan_peserta=0;
        $bil_bidang = 0;

        $kursus = JadualKursus::with(['bidang'])->distinct()->get(['kursus_bidang']);
        $kehadiran = Kehadiran::where('jadual_kursus_id',$kursus->id)->get();


        // foreach ($kursus as $k) {
        //     // $bilangan_peserta += count($k->kehadiran);
        //     $bidang = BidangKursus::where('id',$k->kursus_bidang)->first();
        //     // $bil_bidang +=count($k->bidang);
        // }
            // dd($kursus);
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_ringkasan_bidang_kursus', [
            'kursus'=>$kursus,
            // 'bidang'=>$bidang,
            'bilangan_peserta'=>$bilangan_peserta,
            'bil_bidang'=> $bil_bidang
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Ringkasan Bidang Kursus.' . 'pdf');
    }

    public function excel_laporan_ringkasan_bidang_kursus()
    {
        return (new RingkasanBidangKursusExport())->download('LaporanRingkasanBidangKursus.xlsx');
    }

    public function laporan_penilaian_peserta()
    {
        $penilaian = PenilaianPeserta::with(['kursus','kursus.bidang','kursus.pengendali','kursus.tempat','kursus.kodkursus','kursus.bidang'])->distinct()->get(['id_jadual','nama_peserta']);
        $tot_penilaian[]= 0;

        $tot_peserta = 0;

        // $tot_penilaian +=count($penilaian);

        foreach($penilaian as $p){
// echo '<br>'.count((array)$p->kursus->id);
        $kursus = JadualKursus::with(['tempat','pengendali','bidang','kodkursus'])->where('id',$p->id_jadual)->first();
        $tot_penilaian[$kursus->id]=count((array)$p->kursus->id);
        $tot_peserta  = Kehadiran::with('peserta')->where('status_kehadiran_ke_kursus','HADIR')->where('jadual_kursus_id',$kursus->id)->count();

        }
        // exit();
        return view('laporan.laporan_lain.penilaian_peserta', [
            'penilaian' => $penilaian,
            'penilaian' => $penilaian,
            'tot_peserta'=>$tot_peserta,
            'tot_penilaian'=>$tot_penilaian

        ]);
    }

    public function pdf_laporan_penilaian_peserta()
    {
        $penilaian = PenilaianPeserta::with(['kursus'])->distinct()->get(['id_jadual','nama_peserta']);
        $tot_penilaian[]= 0;


        // $tot_penilaian  = PenilaianPeserta::distinct('id_jadual')->count();

        // $tot_penilaian = PenilaianPeserta::distinct('id_jadual')->->count();
        // $kursus = JadualKursus::where('id',$penilaian->id_jadual)->first();



        $tot_peserta = 0;

        // $tot_penilaian +=count($penilaian);

        foreach($penilaian as $p){
// echo '<br>'.count((array)$p->kursus->id);
        $kursus = JadualKursus::with(['tempat','pengendali','bidang'])->where('id',$p->id_jadual)->first();
        $tot_penilaian[$kursus->id]=count((array)$p->kursus->id);
        $tot_peserta  = Kehadiran::with('peserta')->where('status_kehadiran_ke_kursus','HADIR')->where('jadual_kursus_id',$kursus->id)->count();

        }
        // exit();

        // dd($tot_penilaian);
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_penilaian_peserta', [
            'penilaian' => $penilaian,
            'tot_peserta'=>$tot_peserta,
            'tot_penilaian'=>$tot_penilaian
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Penilaian Peserta.' . 'pdf');
    }


    public function excel_penilaian_peserta()
    {
        return (new PenilaianPesertaExport())->download('Laporan Penilaian Peserta.xlsx');
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


        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_penilaian_ejen', [
            'ejen' => $ejen
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Penilaian Ejen Pelaksana.'.'pdf');
    }


    public function laporan_penilaian_kursus_uls($id)
    {
    $kursus = JadualKursus::find($id);
    $aturcara = Aturcara::where('ac_jadual_kursus', $kursus->id)->get();
    $peserta = PeruntukanPeserta::where('pp_jadual_kursus', $kursus->id)->get();
        $j_sesi=0;
        $j_sesi=count($aturcara);

        $kehadiran = Kehadiran::with('staff')->where('jadual_kursus_id',$kursus->id)->where('status_kehadiran_ke_kursus','HADIR')->get();
        $j_kehadiran = Kehadiran::where('jadual_kursus_id',$kursus->id)->where('status_kehadiran_ke_kursus','HADIR')->distinct()->get();

        $tot_k = 0;
        $tot_k +=count($j_kehadiran);

        // $penilaianKursus = KursusPenilaian::where('jadual_kursus_id',$kursus->id)->first();
        // dd($tot_pp);
        if ($tot_k == 0) {
            alert()->error('Tiada peserta yang membuat penilaian.', 'Tiada Penilaian');
            return back();
        }

        else {
            return view('laporan.laporan_lain.penilaian.laporan-penilaian-kursus-uls2', [
                'kursus'=>$kursus,
                'j_sesi'=>$j_sesi,
                'kehadiran'=>$kehadiran,
                'tot_k'=>$tot_k,
                // 'tot_p'=>$tot_pp
            ]);
        }
    }

    public function pdf_laporan_penilaian_kursus_uls($id)
    {
        $kursus = JadualKursus::find($id);
        $aturcara = Aturcara::where('ac_jadual_kursus',$kursus->id)->get();
        $peserta = PeruntukanPeserta::where('pp_jadual_kursus',$kursus->id)->get();
        // $tot = PeruntukanPeserta::sum('pp_peruntukan_calon');

        $tot_pp = 0;


    //         foreach ($kursus as $key => $ku) {
    //     $sum = 0;
    //     $bil = PeruntukanPeserta::where('pp_jadual_kursus', $ku->id)->get()->first();
    //     foreach ($bil as $b) {
    //         $sum = $sum + $b->pp_peruntukan_calon;


    //     }
    //     $kursus['bilangan'] = $sum;
    // }

        // $tot_pp=($j_peruntukan);
        $j_sesi=0;
        $j_sesi=count($aturcara);

        $kehadiran = Kehadiran::where('jadual_kursus_id',$kursus->id)->where('status_kehadiran_ke_kursus','HADIR')->get();
        $j_kehadiran = Kehadiran::where('jadual_kursus_id',$kursus->id)->where('status_kehadiran_ke_kursus','HADIR')->distinct()->get();

        $tot_k = 0;
        $tot_k +=count($j_kehadiran);

        // $penilaianKursus = KursusPenilaian::where('jadual_kursus_id',$kursus->id)->first();

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.penilaian.laporan-penilaian-kursus-uls2',[
            'kursus'=>$kursus,
            'j_sesi'=>$j_sesi,
            'kehadiran'=>$kehadiran,
            'tot_k'=>$tot_k,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Penilaian Kursus.'.'pdf');
     }

     public function excel_laporan_penilaian_kursus_uls()
     {
         // return (new PenilaianEjenPelaksanaExport())->download('PenilaianEjenPelaksana.xlsx');
         return (new PenilaianKursusExport())->download('Penilaian Kursus.xlsx');
     }

     public function senarai_kursus_ulpk()
     {

         $kursus = JadualKursus::with(['bidang','tempat','kategori_kursus','pengendali'])->where('kursus_unit_latihan','Pekebun Kecil')->get();

         return view('laporan.laporan_lain.penilaian.senarai_kursus_ulpk',[
             'kursus'=>$kursus
         ]);
     }

     public function laporan_penilaian_prepost_ulpk($id)
    {
        $kursus = JadualKursus::find($id);


        $tot_peserta  = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->distinct('user_id')->count();


        $pretest = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','1')->get();

        $j_cemerlang_pre = 0;
        $j_cemerlang_post = 0;
        $j_lulus_pre= 0;
        $j_lulus_post = 0;
        $j_gagal_pre = 0;
        $j_gagal_post = 0;

        foreach($pretest as $pre){
            if($pre->markah>61){
                $j_cemerlang_pre++;
            }
           elseif(($pre->markah>=50)&&($pre->markah<=61)){
                $j_lulus_pre++;
            }
            else{
                $j_gagal_pre++;
            }
        }

        $posttest = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','2')->get();




        $arr = [];

        foreach($pretest as $pre){
            $arr[$pre->user_id]['pretest'] = $pre->markah;
            $arr[$pre->user_id]['nama'] = $pre->peserta->name;
        }

        foreach($posttest as $post){
            $arr[$post->user_id]['posttest'] = $post->markah;

        }


        foreach($posttest as $post){
            if($post->markah>61){
                $j_cemerlang_post++;
            }
            elseif(($post->markah>=50)&&($post->markah<=61)){
                $j_lulus_post++;
            }
            else{
                $j_gagal_post++;
            }
        }

        // dd($tot_peserta);

        if ($tot_peserta == 0) {
            alert()->error('Tiada peserta yang membuat penilaian.', 'Tiada Penilaian');
            return back();
            }

            else {
                return view('laporan.laporan_lain.penilaian.laporan-penilaian-prepost-ulpk', [
                'kursus'=>$kursus,
                'pretest'=>$pretest,
                'posttest'=>$posttest,
                'j_cemerlang_pre'=>$j_cemerlang_pre,
                'j_cemerlang_post'=>$j_cemerlang_post,
                'j_lulus_pre'=>$j_lulus_pre,
                'j_lulus_post'=>$j_lulus_post,
                'j_gagal_pre'=>$j_gagal_pre,
                'j_gagal_post'=>$j_gagal_post,
                'tot_peserta'=>$tot_peserta,
                'arr'=>$arr
                    ]);
        }
    }

    public function excel_laporan_penilaian_prepost_ulpk()
    {
        return (new PrepostUlpkExport())->download('Penilaian Pre Test dan Post Test.xlsx');

    }

    public function pdf_laporan_penilaian_prepost_ulpk($id)
    {
        $kursus = JadualKursus::find($id);

        $tot_peserta  = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->distinct('user_id')->count();


        $pretest = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','1')->get();

        $j_cemerlang_pre = 0;
        $j_cemerlang_post = 0;
        $j_lulus_pre= 0;
        $j_lulus_post = 0;
        $j_gagal_pre = 0;
        $j_gagal_post = 0;

        foreach($pretest as $pre){
            if($pre->markah>61){
                $j_cemerlang_pre++;
            }
           elseif(($pre->markah>=50)&&($pre->markah<=61)){
                $j_lulus_pre++;
            }
            else{
                $j_gagal_pre++;
            }
        }

        $posttest = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','2')->get();

        foreach($posttest as $post){
            if($post->markah>61){
                $j_cemerlang_post++;
            }
            elseif(($post->markah>=50)&&($post->markah<=61)){
                $j_lulus_post++;
            }
            else{
                $j_gagal_post++;
            }
        }

        $arr = [];

        foreach($pretest as $pre){
            $arr[$pre->user_id]['pretest'] = $pre->markah;
            $arr[$pre->user_id]['nama'] = $pre->peserta->name;
        }

        foreach($posttest as $post){
            $arr[$post->user_id]['posttest'] = $post->markah;
            $arr[$post->user_id]['nama'] = $post->peserta->name;


        }

        // dd($tot_peserta );

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.penilaian.laporan-penilaian-prepost-ulpk',[
            'kursus'=>$kursus,
            'pretest'=>$pretest,
            'posttest'=>$posttest,
            'j_cemerlang_pre'=>$j_cemerlang_pre,
            'j_cemerlang_post'=>$j_cemerlang_post,
            'j_lulus_pre'=>$j_lulus_pre,
            'j_lulus_post'=>$j_lulus_post,
            'j_gagal_pre'=>$j_gagal_pre,
            'j_gagal_post'=>$j_gagal_post,
            'tot_peserta'=>$tot_peserta,
            'arr'=>$arr

        ])->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan Penilaian Pre Test dan Post Test (ULPK).'.'pdf');


    }

    public function senarai_kursus()
    {

        $kursus = JadualKursus::with(['bidang','tempat','kategori_kursus','pengendali'])->where('kursus_unit_latihan','Staf')->get();

        return view('laporan.laporan_lain.penilaian.senarai_kursus',[
            'kursus'=>$kursus
        ]);
    }



    public function laporan_penilaian_prepost_show($id)
    {
        $kursus = JadualKursus::find($id);
        $tot_peserta  = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->distinct('user_id')->count();


        $pretest = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','1')->get();

        $j_cemerlang_pre = 0;
        $j_cemerlang_post = 0;
        $j_lulus_pre= 0;
        $j_lulus_post = 0;
        $j_gagal_pre = 0;
        $j_gagal_post = 0;

        foreach($pretest as $pre){
            if($pre->markah>61){
                $j_cemerlang_pre++;
            }
           elseif(($pre->markah>=50)&&($pre->markah<=61)){
                $j_lulus_pre++;
            }
            else{
                $j_gagal_pre++;
            }
        }

        $posttest = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','2')->get();

        //====
        $arr = [];

        foreach($pretest as $pre){
            $arr[$pre->user_id]['pretest'] = $pre->markah;
            $arr[$pre->user_id]['nama'] = $pre->peserta->name;
        }

        foreach($posttest as $post){
            $arr[$post->user_id]['posttest'] = $post->markah;
            $arr[$post->user_id]['nama'] = $post->peserta->name;


        }
        // dd($arr);
        // $arr = [
        //     '20200' => [
        //         'nama'=>'abc',
        //         'pretest'=>100,
        //         'posttest'=>50
        //     ],
        //     '20201' => [
        //         'nama'=>'abc',
        //         'pretest'=>100,
        //         'posttest'=>50
        //     ],
        //     '20202' => [
        //         'nama'=>'abc',
        //         'pretest'=>100,
        //         'posttest'=>50
        //     ],
        // ];

        //di blade
        // foreach($arr as $a){
        //     echo "pretest".$a['pretest'];
        //     echo "posttest".$a['posttest'];
        // }

        //====

        foreach($posttest as $post){
            if($post->markah>61){
                $j_cemerlang_post++;
            }
            elseif(($post->markah>=50)&&($post->markah<=61)){
                $j_lulus_post++;
            }
            else{
                $j_gagal_post++;
            }
        }


        if ($tot_peserta == 0) {
            alert()->error('Tiada peserta yang membuat penilaian.', 'Tiada Penilaian');
            return back();
            }

            else {
                return view('laporan.laporan_lain.penilaian.laporan-penilaian-prepost-show', [
                'kursus'=>$kursus,
                'pretest'=>$pretest,
                'posttest'=>$posttest,
                'j_cemerlang_pre'=>$j_cemerlang_pre,
                'j_cemerlang_post'=>$j_cemerlang_post,
                'j_lulus_pre'=>$j_lulus_pre,
                'j_lulus_post'=>$j_lulus_post,
                'j_gagal_pre'=>$j_gagal_pre,
                'j_gagal_post'=>$j_gagal_post,
                'tot_peserta'=>$tot_peserta,
                'arr'=>$arr

                    ]);
            }
    }
    public function excel_laporan_penilaian_prepost_show()
    {
        return (new PrePostTestExport())->download('Penilaian Pre Test dan Post Test.xlsx');

    }

    public function pdf_laporan_penilaian_prepost_show($id)
    {
        $kursus = JadualKursus::find($id);
        $tot_peserta  = JawapanPenilaian::where('jadual_kursus_id',$kursus->id)->distinct('user_id')->count();


        $pretest = JawapanPenilaian::where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','1')->get();

        $j_cemerlang_pre = 0;
        $j_cemerlang_post = 0;
        $j_lulus_pre= 0;
        $j_lulus_post = 0;
        $j_gagal_pre = 0;
        $j_gagal_post = 0;

        foreach($pretest as $pre){
            if($pre->markah>61){
                $j_cemerlang_pre++;
            }
           elseif(($pre->markah>=50)&&($pre->markah<=61)){
                $j_lulus_pre++;
            }
            else{
                $j_gagal_pre++;
            }
        }

        $posttest = JawapanPenilaian::where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','2')->get();

        foreach($posttest as $post){
            if($post->markah>61){
                $j_cemerlang_post++;
            }
            elseif(($post->markah>=50)&&($post->markah<=61)){
                $j_lulus_post++;
            }
            else{
                $j_gagal_post++;
            }
        }

        $arr = [];

        foreach($pretest as $pre){
            $arr[$pre->user_id]['pretest'] = $pre->markah;
            $arr[$pre->user_id]['nama'] = $pre->peserta->name;
        }

        foreach($posttest as $post){
            $arr[$post->user_id]['posttest'] = $post->markah;
            $arr[$post->user_id]['nama'] = $post->peserta->name;


        }


        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.penilaian.laporan-penilaian-prepost',[
            'kursus'=>$kursus,
            'pretest'=>$pretest,
            'posttest'=>$posttest,
            'j_cemerlang_pre'=>$j_cemerlang_pre,
            'j_cemerlang_post'=>$j_cemerlang_post,
            'j_lulus_pre'=>$j_lulus_pre,
            'j_lulus_post'=>$j_lulus_post,
            'j_gagal_pre'=>$j_gagal_pre,
            'j_gagal_post'=>$j_gagal_post,
            'tot_peserta'=>$tot_peserta,
            'arr'=>$arr


        ])->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan Penilaian Pre Test dan Post Test.'.'pdf');


    }

    public function laporan_penilaian_keberkesanan($id){
        // $pk=Kehadiran::with(['staf','kursus','penilaiankeberkesanan'])
        // ->where('status_kehadiran', 'Hadir')->get();

        // return view('laporan.laporan_lain.penilaian.laporan-penilaian-keberkesanan', [
        // 'pk'=>$pk
        // ]);

        $kursus = JadualKursus::find($id);
        // $kehadiran = Kehadiran::with(['kursus','staff','penilaiankeberkesanan'])->where('jadual_kursus_id',$kursus->id)->get();
        $pk = PenilaianKeberkesanan::with('kehadiran');


        // dd($id);
        $pdf = PDF::loadView('laporan.laporan_lain.penilaian.laporan-penilaian-keberkesanan', [
        'pk'=>$pk,
        'kursus'=>$kursus
        ]);

    }

    // public function excel_laporan_penilaian_keberkesanan(){

    //     return (new PrePostTestExport())->download('PenilaianKeberkesananKursus.xlsx');
    //     // return (new PrePostTestExport())->download('Penilaian Pre Test dan Post Test.xlsx');

    // }

    public function pdf_laporan_penilaian_keberkesanan($id){
        // $pk=Kehadiran::with(['staf','kursus','penilaiankeberkesanan'])
        // ->where('status_kehadiran', 'Hadir')->get();

        // return view('laporan.laporan_lain.penilaian.laporan-penilaian-keberkesanan', [
        // 'pk'=>$pk
        // ]);

        $kursus = JadualKursus::find($id);
        // $kehadiran = Kehadiran::with(['kursus','staff','penilaiankeberkesanan'])->where('jadual_kursus_id',$kursus->id)->get();
        $pk = PenilaianKeberkesanan::with('kehadiran');


        // dd($id);
        return view('laporan.laporan_lain.penilaian.laporan-penilaian-keberkesanan', [
        'pk'=>$pk,
        'kursus'=>$kursus
        ]);

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
        $staf = Staf::with('pt')->distinct()->get(['NamaPT']);
        // $kehadiran = Kehadiran::with('staff')->where('status_kehadiran_ke_kursus','HADIR')->where('no_pekerja',$staf->id_Pengguna)->distinct('jadual_kursus_id')->get();
        $kehadiran = Kehadiran::with('kursus','staff','staff.staf')->where('status_kehadiran_ke_kursus','HADIR')->get();
        // dd($kehadiran);
        $ptj = [];
        foreach($kehadiran as $k){
            if (!isset($ptj[$k->staff->staf->NamaPT])) {
                $ptj[$k->staff->staf->NamaPT]['0'] = 0;
                $ptj[$k->staff->staf->NamaPT]['1_6'] = 0;
                $ptj[$k->staff->staf->NamaPT]['7'] = 0;
            }

            if(!isset($ptj[$k->staff->staf->NamaPT][$k->jadual_kursus_id])){
                // echo "<br>_BILHARIs:".$k->kursus->bilangan_hari;
                //get kursus bilangan hari
                if($k->kursus->bilangan_hari == 0){
                    $ptj[$k->staff->staf->NamaPT]['0'] += 1;
                }elseif($k->kursus->bilangan_hari>0 && $k->kursus->bilangan_hari <= 6){
                    $ptj[$k->staff->staf->NamaPT]['1_6'] += 1;
                }elseif($k->kursus->bilangan_hari > 7){
                    $ptj[$k->staff->staf->NamaPT]['7'] += 1;
                }
            }
        }
        return view('laporan.laporan_lain.laporan-pencapaian_latihan-kategori',[
            'staf'=>$staf,
            'ptj'=>$ptj,

        ]);
    }

    public function pdf_laporan_pencapaian_latihan_mengikut_kategori()
    {
//         // $ptj = PusatTanggungjawab::all();
//         // $kursus = JadualKursus::with(['kategori_kursus','peruntukan'])->get();
//         // $kehadiran = Kehadiran::with(['staff','kursus'])->where('status_kehadiran_ke_kursus','HADIR')->get();
//         $kehadiran_0=0;
//         $kehadiran_1=0;
//         $kehadiran_7=0;

// foreach ($kehadiran as $k) {
//     // $ptj = PusatTanggungjawab::where('n');
//     $kursus = JadualKursus::where('id', $k->jadual_kursus_id)->first();

//     if (($kursus->bilangan_hari>=1)&&($kursus->bilangan_hari<=6)) {
//         $kehadiran_1++;
//     } elseif ($k->kursus->bilangan_hari>7) {
//         $kehadiran_7++;
//     } else {
//         $kehadiran_0++;
//     }


    $staf = Staf::with('pt')->distinct()->get(['NamaPT']);
    // $kehadiran = Kehadiran::with('staff')->where('status_kehadiran_ke_kursus','HADIR')->where('no_pekerja',$staf->id_Pengguna)->distinct('jadual_kursus_id')->get();
    $kehadiran = Kehadiran::with('kursus','staff','staff.staf')->where('status_kehadiran_ke_kursus','HADIR')->get();
    // dd($kehadiran);
    $ptj = [];
    foreach($kehadiran as $k){
        if (!isset($ptj[$k->staff->staf->NamaPT])) {
            $ptj[$k->staff->staf->NamaPT]['0'] = 0;
            $ptj[$k->staff->staf->NamaPT]['1_6'] = 0;
            $ptj[$k->staff->staf->NamaPT]['7'] = 0;
        }

        if(!isset($ptj[$k->staff->staf->NamaPT][$k->jadual_kursus_id])){
            // echo "<br>_BILHARIs:".$k->kursus->bilangan_hari;
            //get kursus bilangan hari
            if($k->kursus->bilangan_hari == 0){
                $ptj[$k->staff->staf->NamaPT]['0'] += 1;
            }elseif($k->kursus->bilangan_hari>0 && $k->kursus->bilangan_hari <= 6){
                $ptj[$k->staff->staf->NamaPT]['1_6'] += 1;
            }elseif($k->kursus->bilangan_hari > 7){
                $ptj[$k->staff->staf->NamaPT]['7'] += 1;
            }
        }
    }
    // exit();
    // dd($ptj);

    //     $kehadiran_0=0;
    //     $kehadiran_1=0;
    //     $kehadiran_7=0;

    // foreach($kehadiran as $k)
    // {
    //     $kursus = JadualKursus::where('id',$k->jadual_kursus_id)->get();

    // if (($kursus->bilangan_hari>=1)&&($kursus->bilangan_hari<=6)) {
    //     $kehadiran_1++;
    // } elseif ($k->kursus->bilangan_hari>7) {
    //     $kehadiran_7++;
    // } else {
    //     $kehadiran_0++;
    // }
    // }

        // dd($staf);

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_prestasi_kategori',[
            'staf'=>$staf,
            'ptj'=>$ptj,
        ])
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pencapaian Latihan Mengikut Kategori.'.'pdf');
    }

    public function excel_laporan_pencapaian_latihan_mengikut_kategori()
    {
        return (new PencapaianLatihanKategoriExport())->download('Laporan Pencapaian Latihan Mengikut Kategori.xlsx');
    }

    // kemajuan
    public function laporan_kemajuan_latihan_bidang()
    {
        $bidang_kursus = BidangKursus::with(['kodkursus','matlamat_kursus','matlamat_peserta','matlamat_perbelanjaan'])->get();
        $j_pencapaian = 0;

        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);


        }

        $bidang = new BidangKursus();
        $bidang['j_pencapaian'] = $j_pencapaian;
        $bidang['data'] = $bidang_kursus;

        return view('laporan.laporan_lain.kemajuan_latihan.bidang',[
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
        ]);
    }

    public function pdf_laporan_kemajuan_latihan_bidang()
    {

        $bidang_kursus = BidangKursus::with(['kodkursus','matlamat_kursus','matlamat_peserta','matlamat_perbelanjaan'])->get();
        $j_pencapaian = 0;


        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);
        }

        $bidang = new BidangKursus();
        $bidang['j_pencapaian'] = $j_pencapaian;
        $bidang['data'] = $bidang_kursus;

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kemajuan.bidang',[
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,

        ])
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
        $kategori_kursus = KategoriKursus::with(['kursus','matlamat_kursus','matlamat_peserta','matlamat_perbelanjaan','matlamat_panggilan_peserta'])->get();
        $mk = 0;
        $pencapaian_kursus = 0;
        $peruntukan_kursus = 0;
        $t_kehadiran = 0;


        foreach($kategori_kursus as $k){

            $k['pencapaian'] = count($k->kursus);
            $pencapaian_kursus +=count($k->kursus);


        $kursus = JadualKursus::with(['kehadiran','peruntukan'])->where('kod_kategori',$k->id)->get();

            // foreach($k->kursus as $ku){

                // $ku['kehadiran']=count($ku->kehadiran);
                // $t_kehadiran +=count($ku->kehadiran);

            //     $pp_calon  = PeruntukanPeserta::where('pp_jadual_kursus',$ku->id)->get();
            //     $pp_2=0;
            //     foreach($ku->pp_calon as $pp){
            //         $pp_2=$pp_2+($pp->pp_peruntukan_calon);

            //     }
            // }
            // dd('__'.$pp_2);

            // foreach($k->kursus as $ku){
            //         $j_peruntukan_peserta = 0;
            //         $j_kehadiran =0;

            //         $peruntukan_peserta = PeruntukanPeserta::where('pp_jadual_kursus',$k->id)->get();

            //         foreach ($peruntukan_peserta as $pp) {
            //             $pp->pp_peruntukan_calon;
            //             $j_peruntukan_peserta+=$pp->pp_peruntukan_calon;
            //         }

            //     echo '__'.$j_peruntukan_peserta;
            }

        return view('laporan.laporan_lain.kemajuan_latihan.kategori',[
            'kategori_kursus'=>$kategori_kursus,
            'pencapaian_kursus' =>$pencapaian_kursus,
            'kursus'=> $kursus
        ]);
    }

    public function pdf_laporan_kemajuan_latihan_kategori()
    {
    $kategori_kursus = KategoriKursus::with(['kursus','matlamat_kursus','matlamat_peserta','matlamat_perbelanjaan','matlamat_panggilan_peserta'])->get();
    $mk = 0;
    $pencapaian_kursus = 0;
    $peruntukan_kursus = 0;
    $t_kehadiran = 0;

        foreach ($kategori_kursus as $k) {
            $k['pencapaian'] = count($k->kursus);
            $pencapaian_kursus +=count($k->kursus);
        }

        $kursus = JadualKursus::with(['kehadiran','peruntukan'])->where('kod_kategori', $k->id)->get();

        foreach ($kursus as $ku) {
            $kehadiran = Kehadiran::where('jadual_kursus_id', $ku->id)->where('status_kehadiran_ke_kursus', 'HADIR')->get();
            $t_kehadiran+=count($kehadiran);

        // dd($t_kehadiran);

        }



        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kemajuan.kategori',[
            'kategori_kursus'=>$kategori_kursus,
            'pencapaian_kursus' =>$pencapaian_kursus,
            'kursus'=> $kursus,'t_kehadiran'=>$t_kehadiran

        ])->setPaper('a4', 'landscape');

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
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kemajuan.pusat_latihan')
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
        $pt = PusatTanggungjawab::with(['negeri','peruntukan'])->get()->groupBy('kod_Negeri_PT');

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kemajuan.negeri',[
            'pt'=>$pt
        ])
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
        $ptj = PusatTanggungjawab::with(['negeri','peruntukan'])->get()->di;
        $j_ptj=0;

        $peserta = PeruntukanPeserta::with(['pt','kursus'])->get();

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kemajuan.daerah',[
            'pt'=>$peserta
        ])
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
        $pl = KehadiranPusatLatihan::with(['tempat_kursus','kursus'])->get();

        $j_kursus = 0;

        foreach($pl as $pl){
            $kursus = JadualKursus::where('id',$pl->jadual_kursus_id)->distinct()->get();
            $j_kursus+=count($kursus);


        }

        // dd($j_kursus);


        // $pl = KehadiranPusatLatihan::with(['tempat_kursus'=> function($query){
        //     $query->groupBy('nama_Agensi');
        // }])->get();


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
        return view('laporan.laporan_lain.kehadiran.pusat_latihan',[
            'pl' => $pl,
            'j_kursus'=>$j_kursus

        ]);


    }

    public function excel_kehadiran_pusat_latihan()
    {
        return (new KehadiranPlExport())->download('Kehadiran Mengikut Pusat Latihan.xlsx');

    }

    public function pdf_kehadiran_pusat_latihan()
    {
        // $agensi = Agensi::where()
        $pl = KehadiranPusatLatihan::with(['tempat_kursus'])->get()->groupBy('jadual_kursus_id');
        // $tempat = Agensi::where('id',$pl->agensi_id)->distinct('id')->get();
        $j_kursus = 0;
        // $j_kursus = 0;
        // dd($pl);
        // foreach($pl as $pl){
            // $kursus = JadualKursus::where('id',$pl->jadual_kursus_id)->distinct('id')->get();
            // $pl['t_kursus'] = count($pl->kursus);

            // $j_kursus += count($pl->kursus);

            // $ad->getcodes()->distinct()->count('pid');
            // dd($pl['t_kursus']);

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kehadiran.pusat_latihan', [
            'pl' => $pl,
            'j_kursus'=>$j_kursus,

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

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kehadiran.laporan_kehadiran_negeri')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('LAPORAN KEHADIRAN MENGIKUT NEGERI, PARLIMEN DAN DUN.' . 'pdf');
    }

    public function excel_kehadiran_negeri()

    {
        // $kehadiran = Kehadiran::where

        return (new KehadiranNegeriExport())->download('KehadiranMengikutNegeriDun.xlsx');
        // return view('laporan.laporan_lain.kehadiran.negeri');
    }

    // perbelanjaan
    public function laporan_perbelanjaan_bidang()
    {
        $j_kehadiran = 0;
        $perbelanjaanKursus = PerbelanjaanKursus::with('jadual_kursus')->get();

        // $kehadiran = Kehadiran::where('jadual_kursus_id',$perbelanjaanKursus->jadualkursus_id)->where('status_kehadiran_ke_kursus','HADIR')->get();

        // $j_kehadiran += count($kehadiran);

        return view('laporan.laporan_lain.perbelanjaan.bidang',[
            'perbelanjaanKursus'=>$perbelanjaanKursus,
            'j_kehadiran'=>$j_kehadiran
        ]);
    }

    public function pdf_laporan_perbelanjaan_bidang()
    {
        $j_kehadiran = 0;
        $perbelanjaanKursus = PerbelanjaanKursus::with('jadual_kursus')->get();

        // $kehadiran = Kehadiran::where('jadual_kursus_id',$perbelanjaanKursus->jadualkursus_id)->where('status_kehadiran_ke_kursus','HADIR')->get();

        // $j_kehadiran += count($kehadiran);

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.perbelanjaan.bidang',[
            'perbelanjaanKursus'=>$perbelanjaanKursus,
            'j_kehadiran'=>$j_kehadiran
        ])
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Perbelanjaan Mengikut Bidang.' . 'pdf');
    }

    public function excel_laporan_perbelanjaan_bidang()
    {
        // return view('laporan.laporan_lain.perbelanjaan.bidang');
        return (new PerbelanjaanBidangExport())->download('Perbelanjaan Mengikut Bidang Kursus.xlsx');

    }


    public function laporan_perbelanjaan_kategori()
    {
        $j_kehadiran = 0;
        $perbelanjaanKursus = PerbelanjaanKursus::with('jadual_kursus')->get();

        // $kehadiran = Kehadiran::where('jadual_kursus_id',$perbelanjaanKursus->jadualkursus_id)->where('status_kehadiran_ke_kursus','HADIR')->get();

        // $j_kehadiran += count($kehadiran);

        return view('laporan.laporan_lain.perbelanjaan.kategori',[
            'j_kehadiran'=>$j_kehadiran,
            'perbelanjaanKursus'=>$perbelanjaanKursus
        ]);
    }

    public function pdf_laporan_perbelanjaan_kategori()
    {

        $j_kehadiran = 0;
        $perbelanjaanKursus = PerbelanjaanKursus::with('jadual_kursus')->get();

        // $kehadiran = Kehadiran::where('jadual_kursus_id',$perbelanjaanKursus->jadualkursus_id)->where('status_kehadiran_ke_kursus','HADIR')->get();

        // $j_kehadiran += count($kehadiran);

        // return view('laporan.laporan_lain.perbelanjaan.kategori');
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.perbelanjaan.kategori',[
            'perbelanjaanKursus'=>$perbelanjaanKursus,
            'j_kehadiran'=>$j_kehadiran
        ])
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Perbelanjaan Mengikut Kategori.' . 'pdf');
    }

    public function excel_laporan_perbelanjaan_kategori()
    {
         return (new PerbelanjaanKategoriExport())->download('Perbelanjaan Mengikut Kategori.xlsx');

    }

    public function laporan_perbelanjaan_kursus()
    {
        $j_kehadiran = 0;
        $perbelanjaanKursus = PerbelanjaanKursus::with('jadual_kursus')->get();
        // $kursus = JadualKursus::with('bidang')->where('id',$perbelanjaanKursus->jadualkursus_id)->get();

        // $kehadiran = Kehadiran::where('jadual_kursus_id',$perbelanjaanKursus->jadualkursus_id)->where('status_kehadiran_ke_kursus','HADIR')->get();

        // $j_kehadiran += count($kehadiran);

        return view('laporan.laporan_lain.perbelanjaan.kursus',[
            'perbelanjaanKursus'=>$perbelanjaanKursus,
            'j_kehadiran'=>$j_kehadiran
        ]);
    }

    public function pdf_laporan_perbelanjaan_kursus()
    {
        // dd('2');
        // return view('laporan.laporan_lain.perbelanjaan.kursus');
        $j_kehadiran = 0;
        $perbelanjaanKursus = PerbelanjaanKursus::with('jadual_kursus')->get();

        $kehadiran = Kehadiran::where('jadual_kursus_id',$perbelanjaanKursus->jadualkursus_id)->where('status_kehadiran_ke_kursus','HADIR')->get();

        $j_kehadiran += count($kehadiran);

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.perbelanjaan.kursus',[
            'perbelanjaanKursus'=>$perbelanjaanKursus,
            'j_kehadiran'=>$j_kehadiran
        ])
        ->setPaper('a4', 'landscape');

        // dd('2');
        return $pdf->stream('Laporan Perbelanjaan Mengikut Kursus.' . 'pdf');
    }

    public function excel_laporan_perbelanjaan_kursus()
    {
        // return view('laporan.laporan_lain.perbelanjaan.kursus');
        return (new PerbelanjaanKursusExport())->download('Perbelanjaan Mengikut Kursus.xlsx');

    }


    public function laporan_perbelanjaan_pusatlatihan()
    {
        // dd('2');
        return view('laporan.laporan_lain.perbelanjaan.pusat_latihan');
    }

    public function pdf_laporan_perbelanjaan_pusatlatihan()
    {
        // return view('laporan.laporan_lain.perbelanjaan.pusat_latihan');
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.perbelanjaan.pusat_latihan')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Perbelanjaan Mengikut Pusat Latihan.' . 'pdf');
    }

    public function excel_laporan_perbelanjaan_pusatlatihan()
    {
        return (new PerbelanjaanPlExport())->download('Perbelanjaan Mengikut Pusat Latihan.xlsx');
    }
}
