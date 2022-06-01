
  <head>
    <title>Surat Tawaran Kursus {{$jadual->kursus_nama}}</title>
</head>

<style type="text/css">

        body {
            background: rgb(204,204,204);
        }

        .page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            /* box-shadow: 0 0 0.5cm rgb(255, 255, 255); */
        }
    /* define a few different page types we can refer to from CSS classes */
    /* see http://www.princexml.com/doc/page-size/ */

        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        }


    *{
            font: 12pt "Times New Roman";
            line-height: 1.25;
            margin-left: 50px;
            margin-right: 50px;
            margin-top: 10px;


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
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;

}

th, td {
  padding: 5px;
}

    .footer {
        /* page-break-after: always; */
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-left: 20px;
        margin-right: 20px;
        text-transform: uppercase;
        font-weight: bold;
    }


</style>
<p class="page" size="A4" layout="landscape">


    <div class="row" style="text-align: center">
        <div class="column-side">
            Ruj. Kami: RISDA.500-5/1/2Jld.40({{$permohonan->kod_kursus}})
        </div>
        <div class="column-center">
        </div>
        <div class="column-side">
        </div>
    </div>

    <h5 style="text-transform:uppercase;text-align:center">JADUAL KURSUS {{$jadual->kursus_nama}}.</h5>


    <table width="100%">
        @foreach ($aturcara as $ac)
        <tr>
            <td> {{$ac->ac_hari}}</td>
            <td> {{$ac->ac_masa}}</td>
            <td>{{$ac->ac_aturcara}}</td>
        </tr>
        @endforeach

    </table>

    <br><br><br>

    <footer><h5> Memacu masyarakat pekebun kecil makmur daripada sumber komoditidan hasil baharu berlandaskan revolusi perindustrian digital serta teknologi hijau</h5></footer>

</p>








