
    <title>QR Code Kursus</title>
    <style>

    ul {
    text-ah4gn: justify;
    font: 12pt "Times New Roman";

    }

    img {
      height: 50%
      max-width: 200px;
      margin: 10px;

    }


    </style>
</head>


<body>
    <br>
    <br>

    <div class="container-fluid">
            <div style="text-align: center;">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=risda-elatihan.prototype.com.my/uls/kehadiran/{{$id}}" alt="" title="" />
                {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data=http://127.0.0.1:8000/uls/kehadiran/{{$id}}" alt="" title="" /> --}}
            </div>
    </div>
                    <h4> Masa: {{$aturcara->ac_masa}}</h4>
                    <h4> Nama Kursus: {{$kursus->kursus_nama}}</h4>
                    <h4> Hari: {{$aturcara->ac_hari}}</h4>
                    <h4> Sesi: {{$aturcara->ac_sesi}}</h4>
                    <h4> Aturcara: {{$aturcara->ac_aturcara}}</h4>




    <div class="qrcode" id="qrcode"></div>
    <div class="qrcode" id="{{$id}}"></div>
</body>

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
                colorh4ght: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        });
    });
</script>

