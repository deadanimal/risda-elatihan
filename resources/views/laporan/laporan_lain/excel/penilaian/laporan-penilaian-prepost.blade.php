<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable;border-color: #00B64E;">
        <thead class="risda-bg-g">

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
            <tr>
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
                <td>{{$j_cemerlang_pre}}</td>
                <td>{{$j_cemerlang_post}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left"><b>JUMLAH KESELURUHAN PESERTA</b></td>
                <td colspan="2">{{$tot_peserta}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left"><b>PERATUSAN LULUS</b></td>
                <td><?php echo(round((($j_cemerlang_pre+$j_lulus_pre)/$tot_peserta)*100));?> </td>
                <td><?php echo(round((($j_cemerlang_post+$j_lulus_post)/$tot_peserta)*100));?> </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left"><b>PERATUSAN GAGAL</b><br> <small>[Peserta Yang Mendapat Markah Kurang Daripada 50 %]</small></td>
                <td><?php echo(round(($j_gagal_pre/$tot_peserta)*100));?> </td>
                <td><?php echo(round(($j_gagal_post/$tot_peserta)*100));?> </td>
            </tr>

        </tbody>
    </table>
</div>
