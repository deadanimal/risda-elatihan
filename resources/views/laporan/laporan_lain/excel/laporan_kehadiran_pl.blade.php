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
           {{-- <td>{{$pl}}</td> --}}
             {{-- @foreach ($pl as $k)
             <tr>
                <td></td>
                <td></td>
            <tr>
            @endforeach --}}
            <td>{{$pl->tempat_kursus}}</td>

        </tbody>
    </table>
</div>
