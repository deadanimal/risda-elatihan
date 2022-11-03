<?php

namespace App\Exports;

use App\Models\BidangKursus;
use App\Models\JadualKursus;
use App\Models\PeruntukanPeserta;
use App\Models\Kehadiran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class PrestasiKehadiranExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $bidang_kursus = BidangKursus::with(['kodkursus','jadual_kursus'])->get();
        $kursus = JadualKursus::with(['bidang','kategori_kursus','kehadiran','peruntukan'])->get();

        $j_pengganti = 0;
        $j_kehadiran = 0;
        $hadir = [];
        $tidak_hadir = [];
        $pengganti = [];
        $peruntukan_peserta=[];

        foreach ($kursus as $k) {
            $j_peruntukan_peserta = 0;
            $j_kehadiran =0;

            $hadir[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('status_kehadiran_ke_kursus', 'HADIR')->count();
            $tidak_hadir[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('status_kehadiran_ke_kursus', 'TIDAK HADIR')->count();
            $pengganti[$k->id] = Kehadiran::with('kursus')->where('jadual_kursus_id', $k->id)->where('nama_pengganti','!=',null)->count();

            $peruntukan_peserta[$k->id] = PeruntukanPeserta::where('pp_jadual_kursus', $k->id)->sum('pp_peruntukan_calon');
            // dd($peruntukan_peserta);

            $kehadiran = Kehadiran::where('status_kehadiran', 'HADIR')->orWhere('status_kehadiran_ke_kursus', 'HADIR')->where('jadual_kursus_id', $k->id)->get();


            // echo '__'.$j_peruntukan_peserta;
            // dd('__'.$j_peruntukan_peserta);

            $j_kehadiran += count($kehadiran);
            $peratusan_kehadiran = 0;
        }


        return view('laporan.laporan_lain.excel.laporan_prestasi_kehadiran_peserta', [
            'bidang_kursus' => $bidang_kursus,
            'bidang_kursus' => $bidang_kursus,
            'hadir'=>$hadir,
            'tidak_hadir'=>$tidak_hadir,
            'pengganti'=>$pengganti,
            'kursus'=>$kursus,
            'peruntukan_peserta'=>$peruntukan_peserta,
        ]);
    }

}
