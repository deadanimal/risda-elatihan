
<!DOCTYPE html>
<html>

<head>
    <style>
        p{
            font-size:12pt;
            font-family: 'Times New Roman', Times, serif;
            font-style: oblique;
            line-height: 1.5;
        }
        

        .parent {
            /* inline-block hack */
            font-size: 0;
            text-align: center;
        }

        .child {
        /* inline-block hack */
        display: inline-block;
        font-size: medium;
        text-align: left;
        }


        </style>

    <title>Sijil Kursus {{$jadual->kursus_nama}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class=" container-fluid">
                <div class="row" style="margin: 25px 10px;">
                    <div class="col" style="text-align: center">
                        <img src="img/risda_logo.png" alt="PGN" height="100">
                        <p style="text-transform:uppercase"><i style="inline-size: 0%">(PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH)<br>KEMENTERIAN KEMAJIAN LUAR BANDAR DAN WILAYAH</i></p>
                    </div>
                </div>
                        <p style="text-align: center;color: red;font-size:20pt;"><i>SIJIL KEHADIRAN</i></p>

                <div class=" row">
                    <div class=" col">
                        <div class="card">

                            <div class="card-body">
                                <p style="text-align:center" class="mx-6">
                                    Dengan ini Disahkan bahawa
                                <br><br>
                                   <b> {{Auth::user()->name}}</b>
                                <br><br>
                                    Telah Menghadiri
                                <br><br>
                                   <b> <span style="text-transform:capitalize"> Kursus {{$jadual->kursus_nama}}</span></b>
                                <br><br>
                                    Anjuran
                                <br><br>
                                <b>{{$jadual->tempat->nama_Agensi}}</b>
                                <br><br>
                                Di
                                <br><br>
                               <b> {{$jadual->tempat->alamat_Agensi_baris1}} {{$jadual->tempat->alamat_Agensi_baris2}} {{$jadual->tempat->alamat_Agensi_baris3}} <br>{{$jadual->tempat->poskod}}</b>
                                <br><br>
                                 Pada
                                <br><br>
                                <b>{{date('d-m-Y', strtotime($jadual->tarikh_mula))}} hingga {{date('d-m-Y', strtotime($jadual->tarikh_tamat))}}</b>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>



                <div class="parent">
                    <div class="child">Cop Rasmi RISDA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="child">
                  Pengarah<br>Bahagian Latihan <br>RISDA
                    </div>
                  </div>

            </div>
        </div>
    </div>
</body>

</html>
