

<style type="text/css">
    /* define a few different page types we can refer to from CSS classes */
    /* see http://www.princexml.com/doc/page-size/ */



    *{
            line-height: 1.5;
            /* margin: 10px; */
            margin-right: 20px;
            margin-left: 20px;
            margin-top: 10px;
     }

     p,b{
        font: 12pt "Times New Roman";

     }

     .table-clear{
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0px;
        padding-right: 5px;
    }

    table, td, th {
    border: 1px solid;
    font: 10pt "Times New Roman";

    /* text-align: center; */
    padding: 8px;
    border-collapse: collapse;

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



</style>
<body>
    <p class="portrait">
        <div class="row" style="text-align: center">
            <div class="column-side">
                <img src="img/risda_logo.png" alt="PGN" height="80" style="">
            </div>
            <div class="column-center"><b>PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (RISDA)
                   <br> (KEMENTERIAN PEMBANGUNAN LUAR BANDAR)</b>
                    <br>Bangunan RISDA, KM 7, Jalan Ampang, Karung Berkunci 11067, 50990 Kuala Lumpur<br>
            </div>
            <div class="column-side">
            </div>
        </div>
        {{-- <div class="one"><img  src="img/risda_logo.png" width="30%"></div> <div class="two"><b>PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (RISDA)
        <br>
        (KEMENTERIAN PEMBANGUNAN LUAR BANDAR)</b>
        <br><small> Bangunan RISDA, KM 7, Jalan Ampang, Karung Berkunci 11067, 50990 Kuala Lumpur</small></div>
        <br> --}}
        <hr>
        <br>
        <p style="text-align: center"> LAPORAN PRESTASI KEHADIRAN PESERTA</p>

<div class="card-body">
    <div class="table-responsive scrollbar ">
        {{-- <table class="table text-center table-bordered datatable" style="vertical-align: middle;border-color: #00B64E;"> --}}
            <table width="100%" style="text-transformation:capitalize">
            <thead class="risda-bg-g">
                <tr>
                    <th>BIL.</th>
                    <th>BIDANG KURSUS</th>
                    <th>NAMA KURSUS</th>
                    <th>TARIKH KURSUS</th>
                    <th>BIL PANGGILAN</th>
                    <th>BIL HADIR</th>
                    <th>BIL TIDAK HADIR</th>
                    <th>BIL PENGGANTI</th>
                    <th>PERATUSAN KEHADIRAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidang_kursus as $bk)
                    @foreach ($bk->jadual_kursus as $jk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bk->nama_Bidang_Kursus }}</td>
                            <td>{{ $jk->kursus_nama }}</td>
                            @if ($jk->bilangan_hari>1)
                            <td>{{date('d/m/Y', strtotime($jk->tarikh_mula))}} - {{date('d/m/Y', strtotime($jk->tarikh_tamat))}} </td>
                            @else
                            <td>{{date('d/m/Y', strtotime($jk->tarikh_mula))}}</td>
                            @endif
                            <td></td>
                            <td>{{ $jk->bil_hadir }}</td>
                            <td>{{ $jk->bil_tidak_hadir }}</td>
                            <td>{{ $jk->bil_pengganti }}</td>
                            <td>{{ $jk->peratusan }}%</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>

            {{-- <tbody>
                @foreach ($kursus as $k)
                <tr>
                    <td>{{$k->bidang->nama_Bidang_Kursus}}</td>
                    <td>{{$k->kursus_nama}}</td>
                    @if ($k->bilangan_hari>1)
                        <td>{{date('d/m/Y', strtotime($k->tarikh_mula))}} - {{date('d/m/Y', strtotime($k->tarikh_tamat))}} </td>
                    @else
                        <td>{{date('d/m/Y', strtotime($k->tarikh_mula))}}</td>
                    @endif
                    <td>{{$k->j_peruntukan}}</td>
                    <td>{{ $k->$j_kehadiran }}</td>
                    <td>{{ $k->$j_kehadiran }}</td>
                    <td>{{ $k->$j_kehadiran }}</td>
                    <td></td>
                @endforeach
                </tr>
            </tbody> --}}

        </table>
    </div>

</div>
    </table>
</p>

