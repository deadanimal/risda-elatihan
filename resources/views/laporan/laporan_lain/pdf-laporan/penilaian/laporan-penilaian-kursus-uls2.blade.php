
    <title> Laporan Penilaian Kursus</title>
    <style>

        *{
                line-height: 1.5;
                /* margin: 20px; */
                margin-right: 20px;
                margin-left: 20px;
                margin-top: 20px;
         }

         .a,h4{
             text-align: center;
         }

         p,b{
            font: 12pt "Times New Roman";
         }



        table, td, th {
        border: 1px solid;
        font: 12pt "Times New Roman";
        /* table-layout: fixed; */
        /* width: 100%; */
        /* text-align: center; */
        padding: 8px;
        border-collapse: collapse;

        }
        </style>


    <h4> Laporan Penilaian Kursus Untuk Kursus {{$kursus->kursus_nama}} <br>Pada {{date('d-m-Y', strtotime($kursus->tarikh_mula))}}</h4>


    <div>
    <table width="100%">
         <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th rowspan="3">BIL.</th>
                            <th rowspan="3">NAMA </th>
                            <th colspan="{{$j_sesi}}">KEHADIRAN PESERTA</th>
                            <th rowspan="3">JUMLAH</th>
                            <th rowspan="3">PERATUSAN KEHADIRAN</th>
                        </tr>

                        <tr>
                        @foreach ($kursus->aturcara as $ka)

                                <th class="a">HARI {{$ka->ac_hari}}</th>
                        @endforeach

                        </tr>
                        <tr>
                        @foreach ($kursus->aturcara as $ka)

                            <th class="a">SESI {{$ka->ac_sesi}}</th>
                        @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kehadiran as $kk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$kk->staff->name}}</td>

                            @foreach ($kursus->aturcara as $ka)
                            @if ($kk->sesi == $ka->ac_sesi)
                                <td class="a"> 1 </td>
                            @else
                                <td class="a">0</td>

                            @endif
                            @endforeach
                            {{-- <td>{{$kursus->aturcara->ac_sesi}}</td> --}}
                            <td></td>
                            <td></td>

                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">JUMLAH KEHADIRAN PESERTA</td>
                            <td class="a" colspan="{{$j_sesi}}">{{$tot_k}}</td>

                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td colspan="2">JUMLAH KESELURUHAN PESERTA</td>
                            <td class="a" colspan="{{$j_sesi}}"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

