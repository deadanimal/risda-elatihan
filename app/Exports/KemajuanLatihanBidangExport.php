<?php

namespace App\Exports;

use App\Models\JadualKursus;
use App\Models\BidangKursus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class KemajuanLatihanBidangExport implements FromView
{
    use Exportable;
    private $headers = [
        'Content-Type' => 'text/csv',
    ];
    public function view(): View
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

        return view('laporan.laporan_lain.excel.kemajuan.bidang',[
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
        ]);
    }
}
