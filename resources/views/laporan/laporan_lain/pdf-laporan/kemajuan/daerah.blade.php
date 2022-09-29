<head>
    <title>Laporan Kemajuan Latihan Mengikut Daerah</title>

    <style type="text/css">
        *{
                line-height: 1.5;
                margin: 20px;

         }

         .a,h4{
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
<h4> Laporan Kemajuan Latihan mengikut Daerah</h4>

<div class="table-responsive scrollbar ">
                    <table width=100%>
                        <thead>
                            <tr>
                                <th>BIL.</th>
                                <th>NEGERI</th>
                                {{-- <th>BIL.</th> --}}
                                <th>PUSAT TANGGUNGJAWAB</th>
                                {{-- <th>BIL. PEKEBUN KECIL</th> --}}
                                <th>BIL.</th>
                                <th>KATEGORI KURSUS</th>
                                <th>BIL.</th>
                                <th>TARIKH KURSUS</th>
                                <th>BILANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pt as $p)
                            <tr>
                                {{-- @foreach($ptj->negeri as $neg) --}}

                                <td>{{$loop->iteration}}</td>
                                <td>{{($p->negeri->Negeri?? '-')}}</td>
                                <td>{{($p->pt->nama_PT?? '-')}}</td>
                                <td></td>
                                <td>{{($p->kursus->kategori_kursus->nama_Kategori_Kursus?? '-')}}</td>
                                <td></td>
                                <td>{{$p->kursus->tarikh_mula}}</td>
                                <td></td>

                
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
