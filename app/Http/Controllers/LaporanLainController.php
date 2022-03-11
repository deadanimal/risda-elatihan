<?php

namespace App\Http\Controllers;

use App\Exports\PencapaianMatlamatExport;
use App\Exports\PerbelanjaanMengikutPTExport;
use App\Models\BidangKursus;
use App\Models\PusatTanggungjawab;
use Illuminate\Support\Facades\Http;

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
        return (new PencapaianMatlamatExport)->download('PencapaianMatlamat.xlsx');
    }

    public function perbelanjaan_mengikut_pusat_tanggungjawab()
    {
        $pt = new PusatTanggungjawab();
        $response = Http::post('https://libreoffice.prototype.com.my/cetak/LaporanPMPT', [$pt]);
        $res = $response->getBody()->getContents();
        $url = "data:application/pdf;base64," . $res;

        return view('laporan.laporan_lain.perbelanjaan_mengikut_pusat_tanggungjawab', [
            'pusat_tanggungjawab' => $pt,
            'url' => $url,
        ]);
    }
    public function pmpt()
    {
        return (new PerbelanjaanMengikutPTExport)->download('PerbelanjaanMengikutPusatTanggungjawab.xlsx');
    }

    public function perbelanjaan_mengikut_lokaliti()
    {
        $pt = new PusatTanggungjawab();
        $response = Http::post('https://libreoffice.prototype.com.my/cetak/LaporanPML', [$pt]);
        $res = $response->getBody()->getContents();
        $url = "data:application/pdf;base64," . $res;

        return view('laporan.laporan_lain.perbelanjaan_mengikut_lokaliti', [
            'url' => $url,
        ]);
    }
    public function pml()
    {
        return view('laporan.laporan_lain.export.perbelanjaan_mengikut_lokaliti');
    }

    public function laporan_prestasi_kehadiran_peserta()
    {
        return view('laporan.laporan_lain.laporan_prestasi_kehadiran_peserta');
    }

    public function laporan_kehadiran_7_hari_setahun()
    {
        return view('laporan.laporan_lain.laporan_kehadiran_7_hari_setahun');
    }

    public function laporan_ringkasan_penceramah_kursus()
    {
        return view('laporan.laporan_lain.laporan_ringkasan_penceramah_kursus');
    }

    public function laporan_pencapaian_latihan_mengikut_negeri()
    {
        return view('laporan.laporan_lain.pencapaian_latihan_mengikut_negeri');
    }
    public function laporan_kehadiran_peserta()
    {
        return view('laporan.laporan_lain.laporan_kehadiran_peserta');
    }

    public function laporan_pelaksanaan_latihan_staf()
    {
        return view('laporan.laporan_lain.pelaksanaan_latihan_staf');
    }

    public function laporan_kewangan_terperinci()
    {
        return view('laporan.laporan_lain.laporan_kewangan_terperinci');
    }

    public function laporan_ringkasan_jenis_kursus()
    {
        return view('laporan.laporan_lain.ringkasan_jenis_kursus');
    }

    public function laporan_ringkasan_bidang_kursus()
    {
        return view('laporan.laporan_lain.ringkasan_bidang_kursus');
    }

    public function laporan_penilaian_peserta()
    {
        return view('laporan.laporan_lain.penilaian_peserta');
    }
}
