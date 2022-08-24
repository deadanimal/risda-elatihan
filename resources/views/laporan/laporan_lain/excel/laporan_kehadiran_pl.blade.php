<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable " style="border-color: #00B64E;">
        <thead class="risda-bg-g" style="vertical-align: middle">
            <tr>
                <th rowspan="2">PUSAT LATIHAN/ PUSAT TANGGUNGJAWAB</th>
                <th rowspan="2">BILANGAN KURSUS</th>
                <th colspan="3" >BILANGAN PESERTA</th>
            </tr>

            <tr>
                <th>LELAKI</th>
                <th>PEREMPUAN</th>
                <th>JUMLAH</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($pl as $k)
                {{-- @foreach ($k  as $l )--}}
                 <td>{{$k->tempat_kursus->nama_Agensi}}</td>
                <td>{{$k->kursus->nama_kursus}}</td>
                <td></td>
                <td></td>
                <td></td>
                {{-- @endforeach--}}
            <tr>
            @endforeach
        </tbody>
    </table>
</div>
