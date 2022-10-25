<title>
    LAPORAN PENCAPAIAN MATLAMAT KEHADIRAN
</title>

<style type="text/css">
    /* define a few different page types we can refer to from CSS classes */
    /* see http://www.princexml.com/doc/page-size/ */



    *{
            line-height: 1.5;
            margin: 10px;
            /* margin-right: 20px;
            margin-left: 20px;
            margin-top: 10px; */
     }

     p,b{
        font: 8pt "Times New Roman";

     }

     .table-clear{
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0px;
        padding-right: 5px;
    }

    table, td,th {
    border: 1px solid;
    font: 5pt "Times New Roman";
    /* padding: 8px; */
    border-collapse: collapse;


    /* text-align: center;*/
    }

    td{
    padding: 5px;
    text-align: center;


    }

    .right {
        position: absolute;
        right: 0px;

    }

    .left {
        position: absolute;
        right: 0px;
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

        h3,h4{
            text-align: center;
        }



</style>
<br><h4>LAPORAN PENCAPAIAN MATLAMAT KEHADIRAN</h4>
     <table width="100%">
        {{-- <caption style="display: none">LAPORAN PENCAPAIAN MATLAMAT KEHADIRAN</caption> --}}
        <thead class="risda-bg-g">
            <tr>
                <th rowspan="2">BIL.</th>
                <th rowspan="2">BIDANG KURSUS</th>
                <th colspan="3">BILANGAN KURSUS</th>
                <th colspan="5">KEHADIRAN</th>
                <th colspan="4">PERBELANJAAN</th>
            </tr>
            <tr>
                <th>MATLAMAT</th>
                <th>PENCAPAIAN</th>
                <th>PERATUS</th>

                <th>MATLAMAT</th>
                <th>LELAKI</th>
                <th>PEREMPUAN</th>
                <th>JUMLAH</th>
                <th>PERATUS</th>

                <th>MATLAMAT</th>
                <th>PENCAPAIAN</th>
                <th>BAKI</th>
                <th>JUMLAH</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bidang_kursus as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_Bidang_Kursus }}</td>
                    {{-- Bilangan Kursus --}}
                    @if ($k->matlamat_kursus==null)
                    <td>0</td>
                    @else
                    <td> <?php $tot_kursus=array($k->matlamat_kursus->jan,$k->matlamat_kursus->feb,$k->matlamat_kursus->mac,$k->matlamat_kursus->apr,$k->matlamat_kursus->mei,$k->matlamat_kursus->jun,$k->matlamat_kursus->jul,$k->matlamat_kursus->ogos,$k->matlamat_kursus->sept,$k->matlamat_kursus->okt,$k->matlamat_kursus->nov,$k->matlamat_kursus->dis);
                        echo array_sum($tot_kursus);?> </td>
                    @endif
                    <td>{{ $k->pencapaian }}</td>
                     @if ($k->matlamat_kursus==null)
                        <td>0</td>
                        @else
                        <td> <?php $tot_kursus=array($k->matlamat_kursus->jan,$k->matlamat_kursus->feb,$k->matlamat_kursus->mac,$k->matlamat_kursus->apr,$k->matlamat_kursus->mei,$k->matlamat_kursus->jun,$k->matlamat_kursus->jul,$k->matlamat_kursus->ogos,$k->matlamat_kursus->sept,$k->matlamat_kursus->okt,$k->matlamat_kursus->nov,$k->matlamat_kursus->dis);

                        echo(round(($k['pencapaian'])/(array_sum($tot_kursus))*100));?> %</td>
                        @endif
                        {{-- Bilangan Kehadiran --}}
                    @if ($k->matlamat_peserta==null)
                        <td>0</td>
                        @else
                        <td> <?php $tot_peserta=array($k->matlamat_peserta->jan,$k->matlamat_peserta->feb,$k->matlamat_peserta->mac,$k->matlamat_peserta->apr,$k->matlamat_peserta->mei,$k->matlamat_peserta->jun,$k->matlamat_peserta->jul,$k->matlamat_peserta->ogos,$k->matlamat_peserta->sept,$k->matlamat_peserta->okt,$k->matlamat_peserta->nov,$k->matlamat_peserta->dis);
                            echo array_sum($tot_peserta);?> </td>
                        @endif
                    <td>Lelaki</td>
                    <td>Perempuan</td>
                    {{-- <td>{{$j_hadir[$k->jadual_kursus]}}</td> --}}
                    <td></td>
                    <td></td>
                    @if ($k->matlamat_perbelanjaan==null)
                        <td>0</td>
                        @else
                        <td> <?php $tot_perbelanjaan=array($k->matlamat_perbelanjaan->jan,$k->matlamat_perbelanjaan->feb,$k->matlamat_perbelanjaan->mac,$k->matlamat_perbelanjaan->apr,$k->matlamat_perbelanjaan->mei,$k->matlamat_perbelanjaan->jun,$k->matlamat_perbelanjaan->jul,$k->matlamat_perbelanjaan->ogos,$k->matlamat_perbelanjaan->sept,$k->matlamat_perbelanjaan->okt,$k->matlamat_perbelanjaan->nov,$k->matlamat_perbelanjaan->dis);
                            echo array_sum($tot_perbelanjaan);?> </td>
                        @endif
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            @endforeach
            <tr style="">
                <td>
                    <p style="display: none">9999</p>
                </td>
                <td class="h5 risda-g">
                    JUMLAH
                </td>
                <td>{{$j_matlamat_kursus}}</td>
                <td>{{ $j_pencapaian }}</td>
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
            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>
