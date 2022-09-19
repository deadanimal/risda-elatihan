
    <title> Laporan Penilaian Pre Test dan Post Test</title>
    <style>

        *{
                line-height: 1.5;
                /* margin: 20px; */
                margin-right: 20px;
                margin-left: 40px;
                margin-top: 20px;
         }

         h4{
             text-align: center;
         }

         p,b{
            font: 12pt "Times New Roman";
         }



        table, td, th {
        border: 1px solid;
        font: 12pt "Times New Roman";

        /* text-align: center; */
        padding: 8px;
        border-collapse: collapse;

        }
        </style>


    <h4> Laporan Penilaian Pre Test dan Post Test Untuk Kursus {{$kursus->kursus_nama}} </h4>


    <div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable " border-color: #00B64E;">
        <thead class="risda-bg-g" style="vertical-align: middle">

            <tr>
                <th rowspan="2">BIL.</th>
                <th rowspan="2">NAMA PESERTA</th>
                <th colspan="2">KEPUTUSAN PENILAIAN (%)</th>

            </tr>
            <tr>
                <th>PRE TEST</th>
                <th>POST TEST</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pretest as $pretest)
            @foreach ($posttest as $posttest)

            <tr>
                <td>{{$loop->iteration}}.</td>
                <td>{{$pretest->peserta->name}}</td>
                <td style="text-align: center;">{{$pretest->markah}}</td>
                <td style="text-align: center;">{{$posttest->markah}}</td>


            </tr>
            @endforeach
            @endforeach

             <tr>

                <td colspan="2"><b>BILANGAN PESERTA MENDAPAT MARKAH MELEBIHI 61%</b></td>
                <td colspan="2" ></td>



            </tr>
            <tr>
                <td colspan="2"><b>JUMLAH KESELURUHAN PESERTA</b></td>
                <td colspan="2"></td>

            </tr>
            <tr>
                <td colspan="2"><b>PERATUSAN LULUS</b></td>
                <td colspan="2"></td>

            </tr>
            <tr>
                <td colspan="2"><b>PERATUSAN GAGAL</b></td>
                <td colspan="2"></td>

            </tr>

        </tbody>
    </table>
</div>

</div>
