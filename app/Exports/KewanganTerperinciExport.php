<?php

namespace App\Exports;

use App\Models\JadualKursus;
use App\Models\PerbelanjaanKursus;
use App\Models\Kehadiran;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class KewanganTerperinciExport implements FromView
{
    use Exportable;
    public function view(): View
    {
        $kursus = JadualKursus::with(['bidang','tempat','pengendali','kehadiran','perbelanjaan'])->where('kursus_status', '1')->get();
        $j_kehadiran = 0;
        $kehadiran = 0;
        $hadir = [];

        foreach ($kursus as $ku) {
            // if (!isset($jadualkursus[$ku->perbelanjaan->jadualkursus_id])) {
            $pk=PerbelanjaanKursus::where('jadualkursus_id', $ku->id)->first();
            // $jadualkursus[$ku->perbelanjaan->jadualkursus_id]['peruntukan'] =
            $hadir[$ku->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $ku->id)->where('status_kehadiran_ke_kursus', 'HADIR')->count();

            // echo  $ku->kursus_nama.'->' .$hadir.'___';
        }


        return view('laporan.laporan_lain.excel.laporan_kewangan_terperinci',[
            'kursus'=>$kursus,
            // 'perbelanjaan_kursus'=>$perbelanjaan_kursus,
            'hadir'=>$hadir,

        ]);
    }
}
