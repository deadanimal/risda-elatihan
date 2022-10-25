
    <title> Laporan Kehadiran 7 Hari Setahun</title>
    <style>

        *{
                line-height: 1.5;
                /* margin: 10px; */
                margin-right: 20px;
                margin-left: 20px;
                margin-top: 20px;
         }

         h4{
             text-align: center;
         }

         p,b{
            font: 7pt "Times New Roman";
         }



         .table-clear{
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 0px;
            padding-right: 5px;
        }

        table, td, th {
        border: 1px solid;
        font: 8pt "Times New Roman";

        /* text-align: center; */
        padding: 8px;
        border-collapse: collapse;

        }
        </style>


    <h4> Laporan Kehadiran 7 Hari Setahun </h4>


<div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable"
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g">
                            <tr>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">KUMPULAN</th>
                                <th rowspan="2">BILANGAN ANGGOTA</th>
                                <th colspan="3">BILANGAN KEHADIRAN ANGGOTA KURSUS PENDEK</th>
                                <th>BILANGAN KEHADIRAN ANGGOTA KURSUS PANJANG</th>
                            </tr>
                            <tr>
                                <th>LEBIH 7 HARI SETAHUN</th>
                                <th>KURANG 7 HARI SETAHUN</th>
                                <th>TIDAK BERKURSUS</th>
                                <th>LEBIH 3 BULAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->Gred}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>

