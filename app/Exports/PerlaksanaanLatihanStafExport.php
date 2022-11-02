<?php

namespace App\Exports;

use App\Models\JadualKursus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerlaksanaanLatihanStafExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $kursus = JadualKursus::with(['kehadiran','bidang','tempat','pengendali','peruntukan'])->get();


        return view('laporan.laporan_lain.excel.pelaksanaan_latihan_staf',[
            'kursus'=>$kursus
        ]);
    }
}
