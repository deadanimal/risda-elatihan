<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PerbelanjaanMengikutLExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('laporan.laporan_lain.excel.perbelanjaan_mengikut_lokaliti');
    }
}
