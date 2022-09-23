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
use App\Exports\PrestasiKehadiranExport;
use App\Exports\RingkasanPenceramahExport;
use App\Models\Agensi;
use App\Models\Aturcara;
use App\Models\BidangKursus;
use App\Models\KategoriAgensi;
use App\Models\Kehadiran;
use App\Models\JadualKursus;
use App\Models\JawapanPenilaian;
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

        // $response = Http::post('https://libreoffice.prototype.com.my/cetak/LaporanPMK', [$bidang]);

        // $res = $response->getBody()->getContents();

        // $url = "data:application/pdf;base64," . $res;

        return view('laporan.laporan_lain.laporan_pencapaian_matlamat_kehadiran', [
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
            // 'url' => $url,
        ]);
    }
    public function pmk()
    {
        // return (new PencapaianMatlamatExport)->download('PencapaianMatlamat.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return (new PencapaianMatlamatExport())->download('PencapaianMatlamat.xlsx');
    }

    public function pdf_pencapaian_matlamat_kehadiran()
    {
        // $bidang_kursus = BidangKursus::with('kodkursus')->get();
        // $matlamat_kursus = MatlamatBilanganKursus::where('jenis','bidang')->get();

        // $j_pencapaian = 0;
        // $j_matlamat_kursus=0;
        // $j_matlamat_kehadiran=0;
        // $j_matlamat_perbelanjaan=0;

        // foreach ($bidang_kursus as $bk) {
        //     $bk['pencapaian'] = count($bk->kodkursus);
        //     $j_pencapaian += count($bk->kodkursus);
        //     $j_matlamat_kursus+=count($matlamat_kursus->jan);
        // }

        // dd($matlamat_kursus->jan);

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_pencapaian_matlamat_kehadiran', [
            // 'bidang_kursus' => $bidang_kursus,
            // 'j_pencapaian' => $j_pencapaian,
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
        // $perbelanjaan = PerbelanjaanKursus::with(['jadual_kursus', 'pt']);

        return (new PerbelanjaanMengikutPTExport())->download('PerbelanjaanMengikutPusatTanggungjawab.xlsx');
    }

    public function perbelanjaan_mengikut_lokaliti()
    {
        // $pt = PusatTanggungjawab::all();
        $perbelanjaankursus = PerbelanjaanKursus::with(['pt'])->get();

        // $response = Http::post('https://libreoffice.prototype.com.my/cetak/LaporanPML', [$pt]);
        // $res = $response->getBody()->getContents();
        // $url = "data:application/pdf;base64," . $res;

        return view('laporan.laporan_lain.perbelanjaan_mengikut_lokaliti', [
            'perbelanjaankursus' => $perbelanjaankursus,
        ]);
    }

    public function pdf_perbelanjaan_mengikut_lokaliti()
    {
        // $pt = PusatTanggungjawab::all();
        $perbelanjaankursus = PerbelanjaanKursus::with(['pt'])->get();

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_perbelanjaan_mengikut_lokaliti',[
            // 'pt' => $pt,
            'perbelanjaankursus'=>$perbelanjaankursus
        ])->setPaper('a4', 'landscape');

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
        $kursus = JadualKursus::with(['bidang','kategori_kursus','kehadiran','peruntukan'])->get();

        $j_pengganti = 0;


        foreach($kursus as $k){

            $j_peruntukan_peserta = 0;
            $j_kehadiran =0;

            $peruntukan_peserta = PeruntukanPeserta::where('pp_jadual_kursus',$k->id)->get();

            foreach ($peruntukan_peserta as $pp) {
                $pp->pp_peruntukan_calon;
                $j_peruntukan_peserta+=$pp->pp_peruntukan_calon;


            }

            // echo '__'.$j_peruntukan_peserta;
            // dd('__'.$j_peruntukan_peserta);


                $kehadiran = Kehadiran::where('status_kehadiran','HADIR')->orWhere('status_kehadiran_ke_kursus','HADIR')->where('jadual_kursus_id',$k->id)->get();



                $j_kehadiran =0;
                $j_tidak_hadir = 0;


            // echo '__'.$j_peruntukan_peserta;
            // dd('__'.$j_peruntukan_peserta);

                $j_kehadiran += count($kehadiran);
            $peratusan_kehadiran = 0;


                if($j_kehadiran==0){
                    $peratusan_kehadiran = 0;
                    $j_tidak_hadir = 0;
                }
                else{
                    $j_tidak_hadir = $j_peruntukan_peserta - $j_kehadiran;

                    $peratusan_kehadiran = ($j_kehadiran / $j_peruntukan_peserta)*100;
                }
                $j_pp = $j_peruntukan_peserta;
            // dd('__'.$j_peruntukan_peserta);

                // $k['j_kehadiran'] = $j_kehadiran;
                // $k['j_peruntukan_peserta'] = $j_peruntukan_peserta;
                // $k['peratusan_kehadiran'] = $peratusan_kehadiran;
        }



        // dd($j_peruntukan_peserta);
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_prestasi_kehadiran_peserta', [
            'bidang_kursus' => $bidang_kursus,
            '$j_peruntukan_peserta'=>$j_peruntukan_peserta,
            'kursus'=>$kursus,
            // 'j_peruntukan'=>$j_peruntukan,
            'j_kehadiran'=>$j_kehadiran,
            'peratusan_kehadiran'=>$peratusan_kehadiran,
            'j_tidak_hadir'=>$j_tidak_hadir,
            'j_pp'=>$j_pp
        ])->setPaper('a4', 'landscape');


        return $pdf->stream('Laporan Prestasi Kehadiran Peserta.' . 'pdf');
    }




    // public function pdf_prestasi_kehadiran()
    // {
        // $bidang_kursus = BidangKursus::with('kodkursus')->get();
        // $j_kehadiran =0;

        // foreach($bidang_kursus as $bk){
        //     $kehadiran = Kehadiran::where('status_kehadiran','HADIR')->orWhere('status_kehadiran_ke_kursus','HADIR')->get();

        //     $j_kehadiran += count($bk->kehadiran);
        // }


        // $bidang_kursus['j_kehadiran'] = $j_kehadiran;
        // // $bidang['data'] = $bidang_kursus;



        // $peruntukan_peserta = PeruntukanPeserta::where('')


    //     $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_prestasi_kehadiran_peserta', [
    //         'bidang_kursus' => $bidang_kursus,
    //         'j_kehadiran' =>$j_kehadiran
    //     ])->setPaper('a4', 'landscape');




    //     return $pdf->stream('Laporan Prestasi Kehadiran Peserta.' . 'pdf');
    // }

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
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_kehadiran_7_hari_setahun')
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
        $kehadiran = Kehadiran::with(['staff', 'kursus'])->orderBy('jadual_kursus_id')->get();
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
        return view('laporan.laporan_lain.pelaksanaan_latihan_staf');
    }

    public function pdf_laporan_pelaksanaan_latihan_staf()
    {
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.pelaksanaan_latihan_staf')
        ->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Pelaksanaan Latihan Staf.' . 'pdf');
    }


    public function excel_laporan_pelaksanaan_latihan_staf()
    {
        return (new PerlaksanaanLatihanStafExport())->download('Laporan Perlaksanaan Latihan Staf.xlsx');
    }


    public function laporan_kewangan_terperinci()
    {
        $kursus = JadualKursus::with(['bidang','tempat','pengendali','kehadiran','perbelanjaan'])->where('kursus_status','1')->get();
        $j_kehadiran = 0;
        $kehadiran = 0;


        foreach($kursus as $k){
            $kehadiran = Kehadiran::where('jadual_kursus_id',$k->id)->where('status_kehadiran_ke_kursus','HADIR')->get();


            $j_kehadiran +=count($kehadiran);

        }


        return view('laporan.laporan_lain.laporan_kewangan_terperinci',[
            'kursus'=>$kursus
        ]);
    }

    // public function pdf_laporan_kewangan_terperinci()
    // {
    //     // $kehadiran = Kehadiran::with(['kursus'])->where('status_kehadiran_ke_kursus','HADIR')->get();
    //     // $jumlah_kehadiran = 0;
    //     // $jumlah_kehadiran+=count($kehadiran );

    //     // foreach($kehadiran as $k){
    //     //     $kehadiran = Kehadiran::where('jadual_kursus_id',$k->id)->where('status_kehadiran_ke_kursus','HADIR')->get();
    //     // }

    //     $kursus = JadualKursus::with(['bidang','tempat','pengendali'])->where('kursus_status','1')->get();
    //     $j_kehadiran = 0;
    //     $kehadiran = 0;
    //     // dd($kursus);

    //     // foreach ($kursus as $ku) {
    //     //     $pk=PerbelanjaanKursus::where('jadualkursus_id', $ku->id)->first();
    //     //     $hadir = Kehadiran::where('jadual_kursus_id', $ku->id)->get();

    //     //     $j_kehadiran +=count($hadir);
    //     // }

    //     // echo  '__'.$j_kehadiran;
    // }


    public function pdf_laporan_kewangan_terperinci()
    {
        $kursus = JadualKursus::with(['bidang','tempat','pengendali','kehadiran','perbelanjaan'])->where('kursus_status','1')->get();
        $j_kehadiran = 0;
        $kehadiran = 0;
        // dd($kursus);

        foreach($kursus as $ku){
            $pk=PerbelanjaanKursus::where('jadualkursus_id',$ku->id)->first();
            $hadir = Kehadiran::where('jadual_kursus_id',$ku->id)->get();


            // foreach($hadir as $h){
            // // $kehadiran = 0;

            //     $kehadiran = 0;
            //     if($hadir->status_kehadiran_ke_kursus=="HADIR" &&  $hadir->status_kehadiran_ke_kursus==null){
            //         $kehadiran++;
            //     }
            //     else if ($hadir->status_kehadiran_ke_kursus=="TIDAK HADIR" &&  $hadir->status_kehadiran_ke_kursus!=null){
            //         $kehadiran++;
            //     }
            //     else{
            //          $kehadiran = 0;
            //     }



            // dd($kursus echo "<br>" $j_kehadiran);
            // echo  '__'.$kursus. '__'.$j_kehadiran;


            $ku['j_kehadiran']=($kehadiran);
            // $perbelanjaan_kursus=$pk->Jum_LO;

        }

        // dd($kehadiran);
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_kewangan_terperinci',[
            'kursus'=>$kursus,
            // 'perbelanjaan_kursus'=>$perbelanjaan_kursus,
            'j_kehadiran'=>$j_kehadiran
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
        return view('laporan.laporan_lain.pdf-laporan.laporan_ringkasan_bidang_kursus',[
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


        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_penilaian_peserta', [
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
        return view('laporan.laporan_lain.penilaian.laporan-penilaian-kursus-uls2',[
            'kursus'=>$kursus,
            'j_sesi'=>$j_sesi,
            'kehadiran'=>$kehadiran,
            'tot_k'=>$tot_k,
            // 'tot_p'=>$tot_pp
        ]);
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

    public function senarai_kursus()
    {

        $kursus = JadualKursus::with(['bidang','tempat','kategori_kursus','pengendali'])->get();

        return view('laporan.laporan_lain.penilaian.senarai_kursus',[
            'kursus'=>$kursus
        ]);
    }

    public function laporan_penilaian_prepost_show($id)
    {
        $kursus = JadualKursus::find($id);
        $pretest = JawapanPenilaian::where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','1')->get();
        $posttest = JawapanPenilaian::where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','2')->get();
        // $post_test =PostTest::with

        // dd($pretest);
              return view('laporan.laporan_lain.penilaian.laporan-penilaian-prepost-show',[
            'kursus'=>$kursus,
            'pretest'=>$pretest,
            'posttest'=>$posttest
        ]);
    }
    public function excel_laporan_penilaian_prepost_show()
    {
        return (new PrePostTestExport())->download('Penilaian Pre Test dan Post Test.xlsx');

    }

    public function pdf_laporan_penilaian_prepost_show($id)
    {
        $kursus = JadualKursus::find($id);
        $pretest = JawapanPenilaian::where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','1')->get();
        $posttest = JawapanPenilaian::where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','2')->get();

        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.penilaian.laporan-penilaian-prepost',[
            'kursus'=>$kursus,
            'pretest'=>$pretest,
            'posttest'=>$posttest,

        ])->setPaper('a4', 'landscape');

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
        return view('laporan.laporan_lain.laporan-pencapaian_latihan-kategori');
    }

    public function pdf_laporan_pencapaian_latihan_mengikut_kategori()
    {
        // $ptj = PusatTanggungjawab::all();
        // $kursus = JadualKursus::with(['kategori_kursus','peruntukan'])->get();
        $kehadiran = Kehadiran::with(['staff','kursus'])->where('status_kehadiran_ke_kursus','HADIR')->get();


        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.laporan_prestasi_kategori',[
            'kehadiran'=>$kehadiran
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
        return view('laporan.laporan_lain.kemajuan_latihan.kategori');
    }

    public function pdf_laporan_kemajuan_latihan_kategori()
    {
        $bidang_kursus = BidangKursus::with(['kodkursus','matlamat_kursus','matlamat_peserta','matlamat_perbelanjaan','kategori'])->get();
        $j_pencapaian = 0;


        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);
        }

        $bidang = new BidangKursus();
        $bidang['j_pencapaian'] = $j_pencapaian;
        $bidang['data'] = $bidang_kursus;


        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kemajuan.kategori',[
            'bidang_kursus'=>$bidang_kursus,
            'j_pencapaian',$j_pencapaian
        ])
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
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kemajuan.negeri')
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
        $pdf = PDF::loadView('laporan.laporan_lain.pdf-laporan.kemajuan.daerah')
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
            'pl' => $pl

        ]);


    }

    public function excel_kehadiran_pusat_latihan()
    {
        return (new KehadiranPlExport())->download('Kehadiran Mengikut Pusat Latihan.xlsx');

    }

    public function pdf_kehadiran_pusat_latihan()
    {
        $pl = KehadiranPusatLatihan::with(['tempat_kursus','kursus'])->get();
        $j_kursus = 0;


        // foreach($pl as $pl){

        //     $pl['kursus'] = count($pl->kursus);
        //     $j_kursus += count($pl->kursus);
        // }

        // $pl = new KehadiranPusatLatihan();
        // $pl['j_kursus'] = $j_kursus;
        // $pl['data'] = $pl;


        // $tahun = substr($pl->user->no_kp, 0, 2);
        // $tahun = (int)$tahun;
        //     if ($tahun <= 30) {
        //         $tahun_lahir = '20'.$tahun;
        //     }else{
        //         $tahun_lahir = '19'.$tahun;
        //     }
        // $tahun_ini = date('Y');


        // $umur_peserta = $tahun_ini - $tahun_lahir;
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

    {   return (new KehadiranNegeriExport())->download('KehadiranMengikutNegeriDun.xlsx');
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
