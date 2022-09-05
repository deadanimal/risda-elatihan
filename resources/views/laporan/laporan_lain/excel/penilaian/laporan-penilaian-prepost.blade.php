<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable " border-color: #00B64E;">
        <thead class="risda-bg-g" style="vertical-align: middle">

            <tr>
                <th rowspan="2">BIL.</th>
                <th rowspan="2">NAMA PESERTA</th>
                <th colspan="2">KEPUTUSAN PENILAIAN (%)</th>
                <th colspan="6">PENILAIAN UMUM TENAGA PENGAJAR TERHADAP PESERTA PROGRAM

            </tr>
            <tr>
                <th>PRE TEST</th>
                <th>POST TEST</th>
                <th>KETEPATAN MASA MENGHADIRI KELAS</th>
                <th>PENGUBARAN DALAM AKTIVITI</th>
                <th>KOMUNIKASI DAN HORMAT SESAMA PESERTA</th>
                <th>KEPIMPINAN DIRI</th>
                <th>KUALITI KERJA</th>
                <th>PURATA KESELURUHAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pretest as $pretest)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pretest->peserta->nama}}</td>
                <td>{{$pretest->markah}}%</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


            </tr>
             <tr>

                <td colspan="4" class="justify"><b>BILANGAN PESERTA MENDAPAT MARKAH MELEBIHI 61%</b></td>
                <td colspan="8"></td>



            </tr>
            <tr>
                <td colspan="4" class="justify"><b>JUMLAH KESELURUHAN PESERTA</b></td>
                <td colspan="8"></td>

            </tr>
            <tr>
                <td colspan="4" class="justify"><b>PERATUSAN LULUS</b></td>
                <td colspan="8"></td>

            </tr>
            <tr>
                <td colspan="4" class="justify"><b>PERATUSAN GAGAL</b></td>
                <td colspan="8"></td>
                <td></td>
            </tr>

        </tbody>
    </table>
</div>

</div>
