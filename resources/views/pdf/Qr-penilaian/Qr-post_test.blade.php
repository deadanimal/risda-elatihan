<!DOCTYPE html>
<html>

<head>
    <title>QR Code Penilaian Post Test</title>
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
                        {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data=http://127.0.0.1:8000/uls/kehadiran/{{$id}}" alt="" title="" /> --}}
                        <img src="https://api.qrserver.com/v1/create-qr-code/?data=risda-elatihan.prototype.com.my/penilaian/jawab-post-test"/>

                    </div>
                <div class="b">
                    <div class="col" style="text-align: justify">
                        <h3 style="text-transform:capitalize;text-align:center">PENILAIAN POST TEST</h3>
                        <h4 style="text-transform:capitalize"> Nama Kursus: {{$kursus->kursus_nama}}</h4>
                        <h4 style="text-transform:capitalize"> Tarikh Kursus: {{date('d-m-Y', strtotime($kursus->tarikh_mula))}} hingga {{date('d-m-Y', strtotime($kursus->tarikh_tamat))}}</h4>


                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
