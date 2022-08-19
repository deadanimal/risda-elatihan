<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\PerbelanjaanKursus;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PerbelanjaanMengikutPTExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $perbelanjaan = PerbelanjaanKursus::with(['jadual_kursus', 'pt']);

        return view('laporan.laporan_lain.excel.perbelanjaan_mengikut_pusat_tanggungjawab',[
            'perbelanjaan' => $perbelanjaan
        ]);

    }
}
