<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code Kursus</title>
    <style>

    img {
      height: 50%
      max-width: 200px;
      margin: 10px;

    }

    ul{
        text-align: justify;
    }

    </style>
</head>


<body>
    <br>
    <br>

    <div class="container-fluid">
            <div style="text-align: center;">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=risda-elatihan.prototype.com.my/uls/kehadiran/{{$id}}" alt="" title="" />
                <ul>
                    <li> Masa: {{$aturcara->ac_masa}}</li>
                    <li> Nama Kursus: {{$kursus->kursus_nama}}</li>
                    <li> Hari: {{$aturcara->ac_hari}}</li>
                    <li> Sesi: {{$aturcara->ac_sesi}}</li>
                    <li> Aturcara: {{$aturcara->ac_aturcara}}</li>
                </ul>


        </div>
    </div>
    <div class="qrcode" id="qrcode"></div>
    <div class="qrcode" id="{{$id}}"></div>
</body>


{{-- <script>
    $(document).ready(function() {
        var a = {!! json_encode($id) !!};
        console.log(a);
        // var id = JSON.parse("{{ json_encode($id) }}");
        // var qr = $("#qrcode");
        // var outUrl = APP_URL + "/uls/kehadiran/" + id;
        // new QRCode(document.getElementById(qr), {
        //     text: outUrl,
        //     width: 90,
        //     height: 90,
        //     colorDark: "#000000",
        //     colorLight: "#ffffff",
        //     correctLevel: QRCode.CorrectLevel.H
        // });
    });
</script> --}}

<script>
    $(document).ready(function() {
        let qr = $(".qrcode");
        jQuery.each(qr, function(key, val) {
            var outUrl = APP_URL + "/uls/kehadiran/" + val.id;
            new QRCode(document.getElementById(val.id), {
                text: outUrl,
                width: 90,
                height: 90,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        });
    });
</script>

</html>
