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

        $matlamat_kursus = MatlamatBilanganKursus::where('bidang_ref',$bidang_kursus->id)->get();

        $j_pencapaian = 0;
        $j_matlamat_kursus=0;
        $j_matlamat_kehadiran=0;
        $j_matlamat_perbelanjaan=0;
        $j_mk = 0;


        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);


            // $bk['jmk']=($matlamat_kursus->jan+$matlamat_kursus->feb+$matlamat_kursus->mac+$matlamat_kursus->apr+$matlamat_kursus->mei+$matlamat_kursus->jun+$matlamat_kursus->jul+$matlamat_kursus->ogos+$matlamat_kursus->sept+$matlamat_kursus->okt+$matlamat_kursus->nov+$matlamat_kursus->dis);
            // $j_matlamat_kursus=($matlamat_kursus->jan+$matlamat_kursus->feb+$matlamat_kursus->mac+$matlamat_kursus->apr+$matlamat_kursus->mei+$matlamat_kursus->jun+$matlamat_kursus->jul+$matlamat_kursus->ogos+$matlamat_kursus->sept+$matlamat_kursus->okt+$matlamat_kursus->nov+$matlamat_kursus->dis);

            $j_matlamat_kehadiran += count($bk->kodkursus);
            $j_matlamat_perbelanjaan += count($bk->kodkursus);
        }
        // $bk['jmk']=$matlamat_kursus->jan;
        $j_mk=$matlamat_kursus->jan;

        // dd($j_matlamat_kursus);

        return view('laporan.laporan_lain.excel.laporan_pencapaian_matlamat_kehadiran', [
            'bidang_kursus' => $bidang_kursus,
            'j_mk'=>$j_mk,
            'j_pencapaian' => $j_pencapaian,
            'j_matlamat_kursus'=>$j_matlamat_kursus,
            'j_matlamat_kehadiran'=>$j_matlamat_kehadiran,
            'j_matlamat_perbelanjaan'=>$j_matlamat_perbelanjaan
        ]);

    }

}
