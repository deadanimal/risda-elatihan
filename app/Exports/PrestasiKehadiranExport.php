<?php

namespace App\Exports;

use App\Models\BidangKursus;
use App\Models\Kehadiran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PrestasiKehadiranExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $bidang_kursus = BidangKursus::with('jadual_kursus')->get();

        $hadir = 0;
        $tidak_hadir = 0;
        $bil_pengganti = 0;
        foreach ($bidang_kursus as $bk) {
            foreach ($bk->jadual_kursus as $jk) {
                $jk['tarikh'] = date('d/m/Y', strtotime($jk->tarikh_mula));
                $kehadiran = Kehadiran::where('jadual_kursus_id', $jk->id)->get();
                $jk['kehadiran'] = $kehadiran;
            //     if (!$kehadiran->isEmpty()) {
            //         foreach ($kehadiran as $k) {
            //             if ($k->status_kehadiran_ke_kursus == "HADIR" && $k->pengesahan == "DISAHKAN") {
            //                 $hadir++;
            //             }
            //             if ($k->status_kehadiran_ke_kursus == "TIDAK HADIR" && $k->pengesahan == "DISAHKAN") {
            //                 $tidak_hadir++;
            //             }
            //             if ($k->nama_pengganti != null) {
            //                 $bil_pengganti++;
            //             }
            //         }

            //         $jk['peratusan'] = ($hadir / ($hadir + $tidak_hadir) * 100);
            //     } else {
            //         $jk['peratusan'] = 0;
            //     }
            //     $jk['bil_hadir'] = $hadir;
            //     $jk['bil_tidak_hadir'] = $tidak_hadir;
            //     $jk['bil_pengganti'] = $bil_pengganti;
             }
        }
        // dd($bidang_kursus);
        return view('laporan.laporan_lain.excel.laporan_prestasi_kehadiran_peserta', [
            'bidang_kursus' => $bidang_kursus,
        ]);
    }

}
