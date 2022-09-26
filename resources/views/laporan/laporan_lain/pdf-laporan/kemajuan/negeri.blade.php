<head>
    <title>Laporan Kemajuan Latihan Mengikut Negeri</title>

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
<h4> Laporan Kemajuan Latihan mengikut Negeri</h4>
<div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable"
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g">
                            <tr>
                                <th rowspan="2">NEGERI</th>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">BIDANG KURSUS</th>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">TAJUK</th>
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
                            @foreach ($pt as $pt)
                            <tr>
                                <td>{{($pt->negeri->Negeri ?? '-')}}</td>
                                <td>{{$loop->iteration}}</td>



                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

