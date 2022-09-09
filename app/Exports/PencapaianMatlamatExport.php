<?php

namespace App\Exports;

use App\Models\BidangKursus;
use App\Models\MatlamatBilanganKursus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PencapaianMatlamatExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function collection()
    {
        return BidangKursus::with('kodkursus')->get();
    }

    public function view(): View
    {
        $bidang_kursus = $this->collection();

        $matlamat_kursus = MatlamatBilanganKursus::where('jenis','bidang')->get();

        $j_pencapaian = 0;
        $j_matlamat_kursus=0;
        $j_matlamat_kehadiran=0;
        $j_matlamat_perbelanjaan=0;

        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);
            $j_matlamat_kursus+=count($matlamat_kursus->jan);
            // $j_matlamat_kursus+=count($matlamat_kursus->jan+$matlamat_kursus->feb+$matlamat_kursus->mac+$matlamat_kursus->apr+$matlamat_kursus->mei+$matlamat_kursus->jun+$matlamat_kursus->jul+$matlamat_kursus->ogos+$matlamat_kursus->sept+$matlamat_kursus->okt+$matlamat_kursus->nov+$matlamat_kursus->dis);

            $j_matlamat_kehadiran += count($bk->kodkursus);
            $j_matlamat_perbelanjaan += count($bk->kodkursus);
        }

        return view('laporan.laporan_lain.excel.laporan_pencapaian_matlamat_kehadiran', [
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
        ]);

    }

}
