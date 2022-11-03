<head>
    <title>Laporan Pencapaian Latihan Mengikut Kategori</title>

    <style type="text/css">
@page {
  size:A4 landscape;
  margin: 30px;
}

th{
    font-size: 10px;
    border: 1px solid black;
    border-collapse: collapse;

}

    table,td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 10px;
        padding: 8px;
        text-transform: capitalize;
    }
    h4{
        text-align: center;
    }

    td{
        text-align: center"
    }

</style>
</head>
</head>

<h4>Laporan Pencapaian Latihan Mengikut Kategori</h4>


<div class="table-responsive scrollbar ">
                <table width="100%">
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
                            <th> 1-6 HARI</th>
                            <th>7 HARI DAN KE ATAS</th>
                            <th>0 HARI</th>
                            <th> 1-6 HARI</th>
                            <th>7 HARI DAN KE ATAS</th>
                        </tr>
                    <tbody>
                        @foreach ($ptj as $key=>$k)
                         <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$key}}</td>
                            <td>
                                {{ $ptj[$key]['0'] }}
                            </td>
                            <td>
                                {{ $ptj[$key]['1_6'] }}
                            </td>
                            <td>
                                {{ $ptj[$key]['7'] }}
                            </td>
                            {{-- <td>{{bilangan_hari}}</td> --}}
                            {{-- <td>{{$kehadiran_0}}</td>
                            <td>{{$kehadiran_1}}</td>
                            <td>{{$kehadiran_7}}</td> --}}

                                <td>
                                    {{ $ptj[$key]['0']+$ptj[$key]['1_6']+$ptj[$key]['7'] }}
                                </td>
                                <td>{{ ($ptj[$key]['0'] != 0 ? ($ptj[$key]['0'] / ($ptj[$key]['0']+$ptj[$key]['1_6']+$ptj[$key]['7']))*100:'0') }}</td>
                                <td>{{ ($ptj[$key]['1_6'] != 0 ? ($ptj[$key]['1_6'] / ($ptj[$key]['0']+$ptj[$key]['1_6']+$ptj[$key]['7']))*100:'0') }}</td>
                                <td>{{ ($ptj[$key]['7'] != 0 ? ($ptj[$key]['7'] / ($ptj[$key]['0']+$ptj[$key]['1_6']+$ptj[$key]['7']))*100 :'0') }}</td>

                                {{-- <td></td>
                                <td></td>
                                <td></td> --}}
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
