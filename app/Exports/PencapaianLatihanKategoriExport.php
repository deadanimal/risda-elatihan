<?php

namespace App\Exports;

use App\Models\JadualKursus;
use App\Models\Staf;
use App\Models\Kehadiran;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PencapaianLatihanKategoriExport implements FromView
{
    use Exportable;
    private $headers = [
            'Content-Type' => 'text/csv',
    ];
    public function view(): View
    {
        $staf = Staf::with('pt')->distinct()->get(['NamaPT']);
        $kehadiran = Kehadiran::with('kursus','staff','staff.staf')->where('status_kehadiran_ke_kursus','HADIR')->get();
        // dd($kehadiran);
        $ptj = [];
        foreach($kehadiran as $k){
            if (!isset($ptj[$k->staff->staf->NamaPT])) {
                $ptj[$k->staff->staf->NamaPT]['0'] = 0;
                $ptj[$k->staff->staf->NamaPT]['1_6'] = 0;
                $ptj[$k->staff->staf->NamaPT]['7'] = 0;
            }

            if(!isset($ptj[$k->staff->staf->NamaPT][$k->jadual_kursus_id])){
                // echo "<br>_BILHARIs:".$k->kursus->bilangan_hari;
                //get kursus bilangan hari
                if($k->kursus->bilangan_hari == 0){
                    $ptj[$k->staff->staf->NamaPT]['0'] += 1;
                }elseif($k->kursus->bilangan_hari>0 && $k->kursus->bilangan_hari <= 6){
                    $ptj[$k->staff->staf->NamaPT]['1_6'] += 1;
                }elseif($k->kursus->bilangan_hari > 7){
                    $ptj[$k->staff->staf->NamaPT]['7'] += 1;
                }
            }
        }
        return view('laporan.laporan_lain.excel.laporan_prestasi_kategori',[
            'staf'=>$staf,
            'ptj'=>$ptj,
        ]);
    }
}
