<title>
    Laporan Perbelanjaan Mengikut Lokaliti
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
        font: 10pt "Times New Roman";

     }

     .table-clear{
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0px;
        padding-right: 5px;
    }

    table, td,th {
    border: 1px solid;
    font: 10pt "Times New Roman";
    /* padding: 8px; */
    border-collapse: collapse;
    /* width: 100%; */

    /* text-align: center;*/
    }

    td{
    padding: 5px;
    text-align: center;
    text-transform: capitalize;


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
<br><h4>Laporan Perbelanjaan Mengikut Lokaliti</h4>

<div class="card-body">
    <div>
        <table width="100%">
            <thead class="risda-bg-g">
                <tr>
                    <th>BIL.</th>
                    <th>PUSAT TANGGUNGJAWAB</th>
                    <th>PERUNTUKAN<br>(RM)</th>
                    <th>PERBELANJAAN<br>(RM)</th>
                    <th>BAKI<br>(RM)</th>
                    <th>PRESTASI</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($perbelanjaankursus as $pk)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pk->pt->nama_PT}}</td>
                    <td>{{$pk->Jum_LO}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
               @endforeach
            </tbody>
        </table>
    </div>

</div>
<script>
    $(document).ready(function() {
        $("th").addClass('fw-bold text-white');
    });
</script>
