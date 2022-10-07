
    <title> Laporan Penilaian Pre Test dan Post Test</title>
    <head>
        <style type="text/css">
            /* define a few different page types we can refer to from CSS classes */
            /* see http://www.princexml.com/doc/page-size/ */

            table, td,th {
            border: 1px solid;
            font: 10pt;
            padding: 10px;
            border-collapse: collapse;

            }

            @page portrait {
              size: A4 portrait;
              margin: 10px;
            }


            th{
                text-align: justify;
             }


            .right {
                position: absolute;
                right: 0px;

            }

            .left {
                position: absolute;
                right: 0px;
            }

            small{
                font: 8pt;
                line-height: 1.0;
            }

            .column-center {
                float: left;
                width: 80%;
                height: auto;
                text-align: left;
                line-height: 1.0;

                /* Should be removed. Only for demonstration */
            }
            .column-side {
                float: left;
                width: 10%;
                height: auto;
                text-align: left;
                font-size: 10pt;

                /* Should be removed. Only for demonstration */
            }
            .column-side2 {
                margin-top: 30px;
                float: right;
                width: 10%;
                padding: 10px;
                height: auto;
                /* Should be removed. Only for demonstration */
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
                padding-top: 0px;
            }

            .table-clear{
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 0px;
                padding-right: 5px;
                padding: 5pt;
            }



            footer {
                /* page-break-after: always; */
                position: fixed;
                height: 5em;
                bottom: 0;
                text-align: justify;
                text-transform: uppercase;
                font-weight: bold;
                font-size: 9pt;
                margin-left: 20px;
                margin-right: 20px;
            }

            hr{
                bottom: 0;
                left: 0;
                right: 0;
            }

            tr {
                padding-bottom: 1em;
                }


            sup{
                    vertical-align: super;
                    font-size: smaller;
                }

                p,h5,h3,h4{
                    margin-left: 20px;
                text-align: justify;

                }

                li{
                    margin-left: 40px;
                }

                th,h4{
                    text-align: center;
                }



        </style>
    </head>
                <div class="row" style="text-align: center">
                    <div class="column-side">
                        <img src="img/risda_logo.png" alt="PGN" height="80" style="">
                    </div>
                    <div class="column-center"><b>PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (RISDA)<br>
                            (KEMENTERIAN PEMBANGUNAN LUAR BANDAR)</b>
                            <br>Bangunan RISDA, KM 7, Jalan Ampang, Karung Berkunci 11067, 50990 Kuala Lumpur<br>
                    </div>
                    <div class="column-side">
                    </div>
                </div>

            <hr>
            <br>


    <h4> Laporan Penilaian Pre Test dan Post Test Pekebun Kecil Untuk Kursus {{$kursus->kursus_nama}} <br>Pada {{date('d/m/Y', strtotime($kursus->tarikh_mula))}}</h4>


    <div>
    <table width="100%">
        <thead>

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
                <td>{{$posttest->peserta->name}}</td>
                @if($pretest==null)
                    <td style="text-align: center">-</td>
                @else
                    <td style="text-align: center">{{$pretest->markah}}</td>
                @endif

                @if($posttest==null)
                    <td style="text-align: center">-</td>
                @else
                    <td style="text-align: center">{{$posttest->markah}}</td>

                @endif

            </tr>
                @endforeach
            @endforeach

            <tr>

                <td colspan="2"><b>BILANGAN PESERTA MENDAPAT MARKAH MELEBIHI 61%</b></td>
                <td style="text-align: center">{{$j_cemerlang_pre}}</td>
                <td style="text-align: center">{{$j_cemerlang_post}}</td>
            </tr>
            <tr>
                <td colspan="2"><b>JUMLAH KESELURUHAN PESERTA</b></td>
                <td colspan="2" style="text-align: center"><b>{{$tot_peserta}}</b></td>
            </tr>
            <tr>
                <td colspan="2"><b>PERATUSAN LULUS</b></td>
                <td style="text-align: center"><?php echo(round((($j_cemerlang_pre+$j_lulus_pre)/$tot_peserta)*100));?> </td>
                <td style="text-align: center"><?php echo(round((($j_cemerlang_post+$j_lulus_post)/$tot_peserta)*100));?> </td>
            </tr>
            <tr>
                <td colspan="2"><b>PERATUSAN GAGAL</b><br> <small>[Peserta Yang Mendapat Markah Kurang Daripada 50 %]</small></td>
                <td style="text-align: center"><?php echo(round(($j_gagal_pre/$tot_peserta)*100));?> %</td>
                <td style="text-align: center"><?php echo(round(($j_gagal_post/$tot_peserta)*100));?> %</td>
            </tr>

        </tbody>
    </table>
</div>

</div>
