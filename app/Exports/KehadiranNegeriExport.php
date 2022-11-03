<?php

namespace App\Exports;

use App\Models\Kehadiran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class KehadiranNegeriExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('laporan.laporan_lain.excel.laporan_kehadiran_negeri');
        // 'kursus'=>$kursus,
    }

}
