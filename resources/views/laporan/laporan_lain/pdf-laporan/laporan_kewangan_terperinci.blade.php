
    <title> Laporan Kewangan Terperinci</title>
    <style>

        *{
                line-height: 1.5;
                /* margin: 20px; */
                margin-right: 20px;
                margin-left: 20px;
                margin-top: 20px;
         }

         .a,h4,td{
             text-align: center;
         }

         p,b{
            font: 10pt "Times New Roman";
         }



        table,th,td{
        border: 1px solid;
        font: 8pt "Times New Roman";
        /* table-layout: fixed; */
        /* width: 100%; */
        /* text-align: center; */
        padding: 8px;
        border-collapse: collapse;

        }
        </style>


    <h4> Laporan Kewangan Terperinci  </h4>

 <div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable "
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g" style="vertical-align: middle">

                            <tr>
                                <th>BIL.</th>
                                <th>BIDANG KURSUS</th>
                                {{-- <th>BIL</th> --}}
                                <th>NAMA KURSUS</th>
                                <th>TARIKH KURSUS</th>
                                <th>ANJURAN</th>
                                <th>NO. FT</th>
                                <th>BIL. PESERTA HADIR</th>
                                <th>PERUNTUKAN</th>
                                <th>PERBELANJAAN</th>
                                <th>TANGGUNGAN</th>
                                <th>BAKI</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kursus as $key=>$k)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$k->bidang->nama_Bidang_Kursus}}</td>
                                <td>{{$k->kursus_nama}}</td>
                                @if ($k->bilangan_hari>1)
                                    <td>{{date('d/m/Y', strtotime($k->tarikh_mula))}} - {{date('d/m/Y', strtotime($k->tarikh_tamat))}} </td>
                                @else
                                <td>{{date('d/m/Y', strtotime($k->tarikh_mula))}}</td>
                                @endif
                                <td>{{$k->pengendali->nama_Agensi}}</td>
                                <td>{{$k->kursus_no_ft}}</td>
                                <td>{{$hadir[$k->id]}}</td>
                                <td>{{($k->perbelanjaan->Jum_LO?? '-') }}</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
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
