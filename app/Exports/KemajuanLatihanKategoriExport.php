<?php

namespace App\Exports;

use App\Models\JadualKursus;
use App\Models\KategoriKursus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class KemajuanLatihanKategoriExport implements FromView
{
    use Exportable;
    private $headers = [
        'Content-Type' => 'text/csv',
    ];
    public function view(): View
    {
        $kategori_kursus = KategoriKursus::with(['kursus','matlamat_kursus','matlamat_peserta','matlamat_perbelanjaan','matlamat_panggilan_peserta'])->get();
        $mk = 0;
        $pencapaian_kursus = 0;
        $peruntukan_kursus = 0;
        $t_kehadiran = 0;


        foreach($kategori_kursus as $k){

            $k['pencapaian'] = count($k->kursus);
            $pencapaian_kursus +=count($k->kursus);


        $kursus = JadualKursus::with(['kehadiran','peruntukan'])->where('kod_kategori',$k->id)->get();

            // foreach($k->kursus as $ku){

                // $ku['kehadiran']=count($ku->kehadiran);
                // $t_kehadiran +=count($ku->kehadiran);

            //     $pp_calon  = PeruntukanPeserta::where('pp_jadual_kursus',$ku->id)->get();
            //     $pp_2=0;
            //     foreach($ku->pp_calon as $pp){
            //         $pp_2=$pp_2+($pp->pp_peruntukan_calon);

            //     }
            // }
            // dd('__'.$pp_2);

            // foreach($k->kursus as $ku){
            //         $j_peruntukan_peserta = 0;
            //         $j_kehadiran =0;

            //         $peruntukan_peserta = PeruntukanPeserta::where('pp_jadual_kursus',$k->id)->get();

            //         foreach ($peruntukan_peserta as $pp) {
            //             $pp->pp_peruntukan_calon;
            //             $j_peruntukan_peserta+=$pp->pp_peruntukan_calon;
            //         }

            //     echo '__'.$j_peruntukan_peserta;
            }
            return view('laporan.laporan_lain.excel.kemajuan.kategori',[
                'kategori_kursus'=>$kategori_kursus,
                'pencapaian_kursus' =>$pencapaian_kursus,
                'kursus'=> $kursus
            ]);
    }
}
