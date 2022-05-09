<!DOCTYPE html>
<html>

<head>
    <title>KOD QR PUSAT LATIHAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
    @page {
        size: A4;
        margin: 0;
    }

    img {
      height: 50%
      max-width: 200px;
      margin: 10px;

    }

    .row::after {
        content: "";
        clear: both;
        display: table;
        margin-top: 10;
    }

    [class*="col-"] {
        float: left;
    }

    h4{
        text-transform: capitalize;
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

</style>


<body>

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
                        <h4> PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (RISDA)</h4>
                        <br><br>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?data=http://127.0.0.1:8000/uls/kehadiran/{{$agensi->id}}" alt="" title="" />
                        {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data=risda-elatihan.prototype.com.my/uls/kehadiran/{{$id}}" alt="" title="" /> --}}

                    </div>
                <div class="b">
                    <div class="col" style="text-align: justify">
                        <h4> Nama Agensi: {{$agensi->nama_Agensi}}</h4>
                        <h4> Alamat: {{$agensi->alamat_Agensi_baris1}} <br> {{$agensi->alamat_Agensi_baris2}} <br> {{$agensi->alamat_Agensi_baris3}} </h4>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
