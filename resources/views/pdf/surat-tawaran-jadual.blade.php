
  <head>
    <title>Surat Tawaran Kursus {{$jadual->kursus_nama}}</title>
</head>

<style type="text/css">


        .page {
            background: white;
            display: block;
            /* box-shadow: 0 0 0.5cm rgb(255, 255, 255); */
        }
    /* define a few different page types we can refer to from CSS classes */
    /* see http://www.princexml.com/doc/page-size/ */

        @media print {
            body, page {
                margin: 0;
            }
        }


    *{
            font: 12pt "Times New Roman";
            line-height: 1.5;
            margin-left: 50px;
            margin-right: 50px;
            margin-top: 20px;



     }

     .justify{
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
        width: 10%;
        height: auto;
        text-align: left;
        line-height: 1.0;

        /* Should be removed. Only for demonstration */
    }
    .column-side {
        float: left;
        width: 50%;
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

    table, td, th {
    border: 1px solid;
    /* text-align: center; */
    padding: 8px;
    border-collapse: collapse;

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
    position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
    }


    /* footer {
        clear: both;
        width: 90%;
        height: 100px;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
    } */



</style>
<p class="page" size="A4" layout="landscape">


    <div class="row" style="text-align: center" >
        <div class="column-side">
            Ruj. Kami: RISDA.500-5/1/2Jld.40({{$permohonan->kod_kursus}})
        </div>
        <div class="column-center">
        </div>
        <div class="column-side">
        </div>
    </div>
<br><br>
    <h5 style="text-transform:uppercase;text-align:center">JADUAL KURSUS {{$jadual->kursus_nama}}.</h5>


    <table width="100%" style="text-transformation:capitalize">
        <tr>
            <th>Hari</th>
            <th>Masa</th>
            <th>Aturcara</th>
        </tr>
        @foreach ($aturcara as $ac)
        <tr>
            <td> {{$ac->ac_hari}}</td>
            <td> {{$ac->ac_masa_mula}} - {{$ac->ac_masa_tamat}}</td>
            <td>{{$ac->ac_aturcara}}</td>
        </tr>
        @endforeach

    </table>

    <br><br><br>


    <footer>

        Memacu masyarakat pekebun kecil makmur daripada sumber komoditi dan hasil baharu berlandaskan revolusi perindustrian digital serta teknologi hijau</footer>

</p>








