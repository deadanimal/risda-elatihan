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
        // $kursus = JadualKursus::with(['bidang','tempat','pengendali'])->where('kursus_status','1')->get();
        // $j_kehadiran = 0;
        // dd($kursus);

        // foreach($kursus as $ku){
        //     $pk=PerbelanjaanKursus::where('jadualkursus_id',$ku->id)->first();
        //     $hadir = Kehadiran::where('jadual_kursus_id',$ku->id)->get();


        //     foreach($hadir as $h){
        //         $kehadiran = 0;


        //         if($hadir->status_kehadiran_ke_kursus=="HADIR" &&  $hadir->status_kehadiran_ke_kursus==null){
        //             $kehadiran++;
        //         }
        //         else if ($hadir->status_kehadiran_ke_kursus=="TIDAK HADIR" &&  $hadir->status_kehadiran_ke_kursus!=null){
        //             $kehadiran++;
        //         }
        //         else{
        //              $kehadiran = 0;
        //         }
        //     }
        //     $ku['j_kehadiran']+=count($kehadiran);
        //     $perbelanjaan_kursus=$pk->Jum_LO;


        // }



        return view('laporan.laporan_lain.excel.laporan_kewangan_terperinci',[
            // 'perbelanjaan_kursus'=>$perbelanjaan_kursus,
            // 'j_kehadiran'=>$j_kehadiran,
            // 'kursus'=>$kursus,

        ]);
    }
}
