
    <title> Laporan Penilaian Pre Test dan Post Test</title>
    <style>

        table,th,td {
                    border: 1px solid;
                    border-collapse: collapse;
                    padding: 8px;
            font: 9pt "Times New Roman";

        }

        *{

                margin-right: 20px;
                margin-left: 20px;
                margin-top: 20px;
         }

         h4{
             text-align: center;
         }

         p{
            font: 8pt "Times New Roman";
         }




        </style>


    <h4> Laporan Penilaian Pre Test dan Post Test Untuk Kursus {{$kursus->kursus_nama}} <br>Pada {{date('d-m-Y', strtotime($kursus->tarikh_mula))}}</h4>


    <div>
    <table style="width: 100%">
        <thead>

            <tr>
                <th rowspan="2">BIL.</th>
                <th rowspan="2">NAMA PESERTA</th>
                <th colspan="2">KEPUTUSAN PENILAIAN (%)</th>

            </tr>
            <tr>
                <th>PRE TEST</th>
                <th>POST TEST</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arr as $a=>$v)
             <tr style="text-align: center" >
                 <td>{{$loop->iteration}}.</td>
                 <td>{{$v['nama']}}</td>
                 {{-- <td>{{$a['pretest']->name}}}}</td> --}}
                 @if(!isset($v['pretest']))
                     <td style="text-align: center">-</td>
                 @else
                     <td style="text-align: center">{{$v['pretest']}}</td>
                 @endif

                 @if(!isset($v['posttest']))

                     <td style="text-align: center">-</td>
                 @else
                     <td style="text-align: center">{{$v['posttest']}}</td>

                 @endif

             </tr>
             @endforeach

             <tr>

                 <td colspan="2" style="text-align: left"><b>BILANGAN PESERTA MENDAPAT MARKAH MELEBIHI 61%</b></td>
                 <td style="text-align: center">{{$j_cemerlang_pre}}</td>
                 <td style="text-align: center">{{$j_cemerlang_post}}</td>
             </tr>
             <tr>
                 <td colspan="2" style="text-align: left"><b>JUMLAH KESELURUHAN PESERTA</b></td>
                 <td style="text-align: center" colspan="2">{{$tot_peserta}}</td>
             </tr>
             <tr>
                 <td colspan="2" style="text-align: left"><b>PERATUSAN LULUS</b></td>
                 <td style="text-align: center"><?php echo(round((($j_cemerlang_pre+$j_lulus_pre)/$tot_peserta)*100));?> </td>
                 <td style="text-align: center"><?php echo(round((($j_cemerlang_post+$j_lulus_post)/$tot_peserta)*100));?> </td>
             </tr>
             <tr>
                 <td colspan="2" style="text-align: left"><b>PERATUSAN GAGAL</b><br> <small>[Peserta Yang Mendapat Markah Kurang Daripada 50 %]</small></td>
                 <td style="text-align: center"><?php echo(round(($j_gagal_pre/$tot_peserta)*100));?> </td>
                 <td style="text-align: center"><?php echo(round(($j_gagal_post/$tot_peserta)*100));?> </td>
             </tr>

         </tbody>
    </table>
</div>

</div>
