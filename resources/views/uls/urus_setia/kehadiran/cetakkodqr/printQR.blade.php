<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{ $id }}
    <div class="qrcode" id="qrcode"></div>
</body>


<script>
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
</script>

</html>
