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
            $tot_peserta  = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->distinct('user_id')->count();


            $pretest = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','1')->get();

            $j_cemerlang_pre = 0;
            $j_cemerlang_post = 0;
            $j_lulus_pre= 0;
            $j_lulus_post = 0;
            $j_gagal_pre = 0;
            $j_gagal_post = 0;

            foreach($pretest as $pre){
                if($pre->markah>61){
                    $j_cemerlang_pre++;
                }
               elseif(($pre->markah>=50)&&($pre->markah<=61)){
                    $j_lulus_pre++;
                }
                else{
                    $j_gagal_pre++;
                }
            }

            $posttest = JawapanPenilaian::with('peserta')->where('jadual_kursus_id',$kursus->id)->where('jenis_penilaian','2')->get();

            foreach($posttest as $post){
                if($post->markah>61){
                    $j_cemerlang_post++;
                }
                elseif(($post->markah>=50)&&($post->markah<=61)){
                    $j_lulus_post++;
                }
                else{
                    $j_gagal_post++;
                }
            }

            $arr = [];

            foreach($pretest as $pre){
                $arr[$pre->user_id]['pretest'] = $pre->markah;
                $arr[$pre->user_id]['nama'] = $pre->peserta->name;
            }

            foreach($posttest as $post){
                $arr[$post->user_id]['posttest'] = $post->markah;

            }

            return view( 'laporan.laporan_lain.excel.penilaian.laporan-penilaian-prepost', [
                'kursus'=>$kursus,
                'pretest'=>$pretest,
                'posttest'=>$posttest,
                'j_cemerlang_pre'=>$j_cemerlang_pre,
                'j_cemerlang_post'=>$j_cemerlang_post,
                'j_lulus_pre'=>$j_lulus_pre,
                'j_lulus_post'=>$j_lulus_post,
                'j_gagal_pre'=>$j_gagal_pre,
                'j_gagal_post'=>$j_gagal_post,
                'tot_peserta'=>$tot_peserta,
                'arr'=>$arr

            ]);
    }
}
