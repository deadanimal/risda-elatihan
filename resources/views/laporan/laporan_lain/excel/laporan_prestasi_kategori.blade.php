<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable " style="vertical-align: middle;border-color: #00B64E;">
        <thead class="risda-bg-g" style="vertical-align: middle">
            <tr>
                    <th rowspan="2">BIL</th>
                    <th rowspan="2">PUSAT TANGGUNGJAWAB</th>
                    <th colspan="3">KATEGORI PENGURUSAN & PROFESIONAL</th>
                    <th rowspan="2">JUMLAH</th>
                    <th colspan="3">PERATUSAN</th>
            </tr>
            <tr>
                    <th>0 HARI</th>
                    <th>1-6 HARI</th>
                    <th>7 HARI DAN KE ATAS</th>
                    <th>0 HARI</th>
                    <th>1-6 HARI</th>
                    <th>7 HARI DAN KE ATAS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ptj as $key=>$k)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$key}}</td>
                <td>{{ $ptj[$key]['0'] }}</td>
                <td>{{ $ptj[$key]['1_6'] }}</td>
                <td>{{ $ptj[$key]['7'] }} </td>
                <td>{{ $ptj[$key]['0']+$ptj[$key]['1_6']+$ptj[$key]['7'] }}</td>
                <td>{{ ($ptj[$key]['0'] != 0 ? ($ptj[$key]['0'] / ($ptj[$key]['0']+$ptj[$key]['1_6']+$ptj[$key]['7']))*100:'0') }}%</td>
                <td>{{ ($ptj[$key]['1_6'] != 0 ? ($ptj[$key]['1_6'] / ($ptj[$key]['0']+$ptj[$key]['1_6']+$ptj[$key]['7']))*100:'0') }}%</td>
                <td>{{ ($ptj[$key]['7'] != 0 ? ($ptj[$key]['7'] / ($ptj[$key]['0']+$ptj[$key]['1_6']+$ptj[$key]['7']))*100 :'0') }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
