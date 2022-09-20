<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable " border-color: #00B64E;">
        <thead class="risda-bg-g" style="vertical-align: middle">

            <tr>
                <th rowspan="3">BIL.</th>
                <th rowspan="3">NAMA </th>
                <th colspan="{{$j_sesi}}">KEHADIRAN PESERTA</th>
                {{-- <th colspan="{{$j_hari}}" > KEHADIRAN </td> --}}
                <th rowspan="3">JUMLAH</th>
                <th rowspan="3">PERATUSAN KEHADIRAN</th>
            </tr>

            <tr>
            @foreach ($kursus->aturcara as $ka)

                    <th>HARI {{$ka->ac_hari}}</th>
            @endforeach

            </tr>
            <tr>
            @foreach ($kursus->aturcara as $ka)

                <th>SESI {{$ka->ac_sesi}}</th>
            @endforeach

            </tr>

        </thead>
        <tbody>
            @foreach($kehadiran as $kk)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kk->staff->name}}</td>

                @foreach ($kursus->aturcara as $ka)
                @if ($kk->sesi == $ka->ac_sesi)
                    <td> 1 </td>
                @else
                    <td>0</td>
                @endif
                @endforeach
                <td></td>
                <td></td>

            </tr>
            @endforeach
            <tr>
                <td colspan="2">JUMLAH KEHADIRAN PESERTA</td>
                <td colspan="{{$j_sesi}}">{{$tot_k}}</td>

                <td></td>
                <td></td>

            </tr>
            <tr>
                <td colspan="2">JUMLAH KESELURUHAN PESERTA</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
