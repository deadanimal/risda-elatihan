<?php

namespace App\Exports;

use App\Models\JadualKursus;
use App\Models\PerbelanjaanKursus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class PerbelanjaanKategoriExport implements FromView
{
    use Exportable;
    private $headers = [
        'Content-Type' => 'text/csv',
    ];
    public function view(): View
    {

        $j_kehadiran = 0;
        $perbelanjaanKursus = PerbelanjaanKursus::with('jadual_kursus')->get();

        // $kehadiran = Kehadiran::where('jadual_kursus_id',$perbelanjaanKursus->jadualkursus_id)->where('status_kehadiran_ke_kursus','HADIR')->get();

        // $j_kehadiran += count($kehadiran);

        return view('laporan.laporan_lain.excel.perbelanjaan.kategori',[
            'j_kehadiran'=>$j_kehadiran,
            'perbelanjaanKursus'=>$perbelanjaanKursus
        ]);
    }

}
