<!DOCTYPE html>
<html>

<head>
    <title>KOD QR PUSAT LATIHAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style type="text/css">

    @page {
        size: A4;
        margin: 2cm;
    }

    .qr {
      height:50%;

      /* max-width: 200px; */
      /* margin: 10px; */

    }

    .row:after {
        content: "";
        display: table;
        clear: both;
        padding-top: 0px;
    }

    [class*="col-"] {
        float: left;
    }


    .b {

        padding: 10px;
        margin: 90px;

        }


    body {
        padding: 0;
        margin: 0;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-blend-mode: lighten;
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
        width: 80;
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

</style>


<body>

    <div class="row" style="text-align:center;width:100%">
        <div class="column-side">
            <img src="img/risda_logo.png" alt="PGN" height="85">
        </div>
        <div class="column-center"><b>PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (RISDA)<br>
                (KEMENTERIAN PEMBANGUNAN LUAR BANDAR)</b>
                <br><small>Bangunan RISDA, KM 7, Jalan Ampang, Karung Berkunci 11067, 50990 Kuala Lumpur</small><br>
        </div>
        <div class="column-side">
        </div>
    </div>

    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class=" container-fluid">
                <div class="row">
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <br><br>
                        {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data=http://127.0.0.1:8000/kehadiran_ke_pl/create/{{$agensi->id}}" alt="" title="" /> --}}
                        <img src="https://api.qrserver.com/v1/create-qr-code/?data=risda-elatihan.prototype.com.my/kehadiran_ke_pl/create/{{$agensi->id}}" alt="" title="" class="qr" />

                    </div>
                <div class="b">
                    <div class="col" style="text-align: center">
                        <h4  style="text-transform: uppercase">{{$agensi->nama_Agensi}}</h4>
                        <h4> {{$agensi->alamat_Agensi_baris1}} <br> {{$agensi->alamat_Agensi_baris2}} <br> {{$agensi->alamat_Agensi_baris3}}
                        {{$agensi->poskod}} {{$agensi->daerah->Daerah}}, {{($agensi->negeri->Negeri?? '-') }} <br>  </h4>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
