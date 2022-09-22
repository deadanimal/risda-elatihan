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
    td{
        text-align: center;
    }

</style>
</head>

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

                        {{-- <tr>
                            <th rowspan="2">BIDANG</th>
                            <th rowspan="2">BIL.</th>
                            <th rowspan="2">KATEGORI</th>
                            <th colspan="3">BILANGAN PESERTA</th>
                            <th rowspan="2">NO LOT</th>
                            <th rowspan="2">PERUNTUKAN</th>
                            <th colspan="12">PERBELANJAAN (RM)</th>
                            <th rowspan="2">JUMLAH (RM)</th>
                            <th rowspan="2">TANGGUNGAN</th>
                            <th rowspan="2">BAKI (RM)</th>
                        </tr>
                        <tr>
                            <th>LELAKI</th>
                            <th>PEREMPUAN</th>
                            <th>JUMLAH</th>
                            <th>PERUNTUKAN</th>
                            <th>ELAUN MAKAN</th>
                            <th>MAKAN/MINUM</th>
                            <th>ELAUN PENCERAMAH</th>
                            <th>ALATAN INPUT</th>
                            <th>NOTA ALAT TULIS</th>
                            <th>DOBI</th>
                            <th>PENYELENGGARAAN DALAMAN</th>
                            <th>SEWA KENDERAAN</th>
                            <th>BAYARAN KONSULTAN</th>
                            <th>PENGINAPAN</th>
                            <th>INSURANS</th>

                        </tr>
                    </thead> --}}
                    <tbody>
                        @foreach ($kehadiran as $k)
                         <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->staff->staf->NamaPT}}</td>

                                <td>

                                </td>
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
