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
                        @foreach ($kehadiran as $k)
                         <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->staff->staf->NamaPT}}</td>
                            <td>{{$k->kursus->bilangan_hari}}</td>
                            {{-- @if(($k->kursus->bilangan_hari>1)&&($k->kursus->bilangan_hari<=6))
                               <td>1</td>
                            @elseif($k->kursus->bilangan_hari>7)
                            <td>2</td>

                               @endif--}}
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
