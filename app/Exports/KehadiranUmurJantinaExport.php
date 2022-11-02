<?php

namespace App\Exports;

use App\Models\KehadiranPusatLatihan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class KehadiranUmurJantinaExport implements FromView
{
    use Exportable;

    public function view(): View
    {

        $kehadiran_pl = KehadiranPusatLatihan::with(['peserta', 'kursus', 'tempat_kursus'])->get();

        return view('laporan.laporan_lain.excel.laporan_kehadiran_umur_jantina', [
            'kehadiran_pl' => $kehadiran_pl,
            // 'kursus'=>$kursus,

        ]);
    }



}
