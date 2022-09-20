<?php

namespace App\Exports;

use App\Models\JadualKursus;
use App\Models\Aturcara;
use App\Models\PeruntukanPeserta;
use App\Models\Kehadiran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenilaianKursusExport implements FromView
{
    use Exportable;

    public function collection()
    {
        return JadualKursus::find($id);
    }

    public function view(): View
    {
        $kursus = JadualKursus::find($id);
        $aturcara = Aturcara::where('ac_jadual_kursus',$kursus->id)->get();
        $peserta = PeruntukanPeserta::where('pp_jadual_kursus',$kursus->id)->get();
        // $tot_pp = 0;
        // foreach($peserta as $p){
        //     $j_peruntukan = 0;
        //     $j_peruntukan = $peserta->pp_peruntukan_calon;

        // }

        // $tot_pp +=count($j_peruntukan);

        $j_sesi=0;
        $j_sesi=count($aturcara);

        $kehadiran = Kehadiran::where('jadual_kursus_id',$kursus->id)->where('status_kehadiran_ke_kursus','HADIR')->get();
        $j_kehadiran = Kehadiran::where('jadual_kursus_id',$kursus->id)->where('status_kehadiran_ke_kursus','HADIR')->distinct()->get();

        $tot_k = 0;
        $tot_k +=count($j_kehadiran);
        return view('laporan.laporan_lain.excel.penilaian.laporan-penilaian-kursus', [
        'penilaian' => $penilaian,


    ]);
    }
}
