<?php

namespace App\Exports;

use App\Models\BidangKursus;
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
        $j_pencapaian = 0;
        foreach ($bidang_kursus as $bk) {
            $bk['pencapaian'] = count($bk->kodkursus);
            $j_pencapaian += count($bk->kodkursus);
        }

        return view('laporan.laporan_lain.excel.laporan_pencapaian_matlamat_kehadiran', [
            'bidang_kursus' => $bidang_kursus,
            'j_pencapaian' => $j_pencapaian,
        ]);

    }

}
