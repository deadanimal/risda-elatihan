<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable"
        style="vertical-align: middle;border-color: #00B64E;">
        <thead class="risda-bg-g">
            <tr>
                <th rowspan="3">BIL.</th>
                <th rowspan="3">PUSAT LATIHAN / PUSAT TANGGUNGJAWAB</th>
                <th colspan="15">BILANGAN KURSUS</th>
            </tr>
            <tr>
                <th colspan="5">LELAKI</th>
                <th colspan="5">PEREMPUAN</th>
                <th colspan="5">JUMLAH KESELURUHAN</th>
            </tr>
            <tr>
                <th>19-40 TAHUN</th>
                <th>41-65 TAHUN</th>
                <th>66-70 TAHUN</th>
                <th>71 TAHUN DAN KEATAS</th>
                <th>JUMLAH</th>
                <th>19-40 TAHUN</th>
                <th>41-65 TAHUN</th>
                <th>66-70 TAHUN</th>
                <th>71 TAHUN DAN KEATAS</th>
                <th>JUMLAH</th>
                <th>19-40 TAHUN</th>
                <th>41-65 TAHUN</th>
                <th>66-70 TAHUN</th>
                <th>71 TAHUN DAN KEATAS</th>
                <th>JUMLAH</th>
            </tr>
        </thead>
        <tbody>
           @foreach($kehadiran_pl as $pl)
            <tr>
                <td>{{$loop->iteration}}
                <td>{{($pl->tempat_kursus->nama_Agensi ?? '-') }}</td>
                <td>{{($tot_kursus ?? '-') }}</td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>
