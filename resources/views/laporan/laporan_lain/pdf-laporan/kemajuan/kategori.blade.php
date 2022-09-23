<head>
    <title>Laporan Kemajuan Latihan Mengikut Kategori</title>

    <style type="text/css">
        *{
                line-height: 1.5;
                margin: 20px;

         }

         .a,h4,td{
             text-align: center;
         }

         p,b{
            font: 8pt "Times New Roman";
         }



        table, td, th {
        border: 1px solid;
        font: 5pt "Times New Roman";
        padding: 5px;
        border-collapse: collapse;

        }
        </style>

</head>
<h4> Laporan Kemajuan Latihan mengikut Kategori Kursus</h4>

<div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable"
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g">
                            <tr>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">KATEGORI KURSUS</th>
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
                                <td>{{ $bk->kategori->nama_Kategori_Kursus }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
