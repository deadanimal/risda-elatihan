<?php

namespace App\Exports;

use App\Models\JawapanPenilaian;
use App\Models\JadualKursus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class PrePostTestExport implements FromView
{
    use Exportable;

    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function collection($id)
    {
        return JadualKursus::find($id);
    }

    public function view(): View
    {
            $kursus = $this->collection('id');
            $pretest = JawapanPenilaian::with('kursus')->where('jenis_penilaian', '1')->get();
            $posttest = JawapanPenilaian::with('kursus')->where('jenis_penilaian', '2')->get();

            return view( 'laporan.laporan_lain.excel.penilaian.laporan-penilaian-prepost', [
                'kursus'=>$kursus,
                'pretest'=>$pretest,
                'posttest'=>$posttest

            ]);
    }
}
