<?php

namespace App\Exports;

use App\Models\PenilaianPeserta;
use App\Models\JadualKursus;
use App\Models\Kehadiran;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class PenilaianPesertaExport implements FromView
{
    use Exportable;

    // public function collection()
    // {
    //     return PenilaianPeserta::all();
    // }

    public function view(): View
    {
        $penilaian = PenilaianPeserta::with(['kursus','kursus.kodkursus','kursus.bidang'])->distinct()->get(['id_jadual']);
        // $kursus = JadualKursus::where('id',$penilaian->id_jadual)->first();


        $tot_penilaian = 0;

        $tot_peserta = 0;

        $tot_penilaian +=count($penilaian);

        foreach ($penilaian as $p) {
            $kursus = JadualKursus::with(['bidang','pengendali','tempat','kodkursus'])->where('id', $p->id_jadual)->first();
            $tot_peserta  = Kehadiran::with('peserta')->where('status_kehadiran_ke_kursus', 'HADIR')->where('jadual_kursus_id', $kursus->id)->count();

            return view('laporan.laporan_lain.excel.laporan_penilaian_peserta', [
            'penilaian' => $penilaian,
            'penilaian' => $penilaian,
            'tot_peserta'=>$tot_peserta,
            'tot_penilaian'=>$tot_penilaian


    ]);
        }
    }
}
