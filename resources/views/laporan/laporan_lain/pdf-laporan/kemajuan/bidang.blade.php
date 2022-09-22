<head>
    <title>Laporan Kemajuan Latihan Mengikut Bidang</title>

    <style type="text/css">
@page {
  size:A4 landscape;
  margin: 30px;
}

th{
    font-size: 8px;
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


<div>
    <table width=100%>
        <thead class="risda-bg-g">
            <tr>
                <th rowspan="2">BIL.</th>
                <th rowspan="2">BIDANG KURSUS</th>
                <th colspan="3">BILANGAN KURSUS</th>
                <th colspan="7">KEHADIRAN</th>
                <th colspan="4">PERBELANJAAN</th>
            </tr>
            <tr>
                <th>MATLAMAT</th>
                <th>PENCAPAIAN</th>
                <th>PERATUS</th>
                <th>MATLAMAT</th>
                <th>PANGGILAN PESERTA</th>
                <th>KEHADIRAN PESERTA</th>
                <th>LELAKI</th>
                <th>PEREMPUAN</th>
                <th>JUMLAH</th>
                <th>PERATUS</th>
                <th>MATLAMAT</th>
                <th>PENCAPAIAN</th>
                <th>PERATUS</th>
                <th>BAKI PERUNTUKAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bidang_kursus as $bk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bk->nama_Bidang_Kursus }}</td>
                <td></td>
                <td>{{ $bk->pencapaian }}</td>
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


            @endforeach
        </tbody>
    </table>
</div>
