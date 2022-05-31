
  <head>
    <title>Surat Tawaran Kursus {{$jadual->kursus_nama}}</title>
</head>

<style type="text/css">
    /* define a few different page types we can refer to from CSS classes */
    /* see http://www.princexml.com/doc/page-size/ */


    @page landscape {
      size: A4 landscape;
      orientation: landscape;
      margin: 20px;
    }



    @page portrait {
      size: A4 portrait;
      margin: 10px;
    }


    .page_break {
      page-break-before: always
    }




    *{
            font: 12pt "Times New Roman";
            line-height: 1.25;
            margin-left: 20px;
            margin-right: 20px;
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



    .footer {
        /* page-break-after: always; */
        position: fixed;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
        margin-left: 20px;
        margin-right: 20px;
        text-transform: uppercase;
        font-weight: bold;
    }



</style>
<body>
    <p class="portrait">
        <div class="row" style="text-align: center">
            <div class="column-side">
                <img src="img/risda_logo.png" alt="PGN" height="80" style="">
            </div>
            <div class="column-center">
                <b>
                    PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (RISDA)<br>
                    (KEMENTERIAN PEMBANGUNAN LUAR BANDAR)</b>
                    <br>Bangunan RISDA, KM 7, Jalan Ampang, Karung Berkunci 11067, 50990 Kuala Lumpur<br>
            </div>
            <div class="column-side">
            </div>
        </div>
        {{-- <div class="one"><img  src="img/risda_logo.png" width="30%"></div> <div class="two"><b>PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (RISDA)
        <br>
        (KEMENTERIAN PEMBANGUNAN LUAR BANDAR)</b>
        <br><small> Bangunan RISDA, KM 7, Jalan Ampang, Karung Berkunci 11067, 50990 Kuala Lumpur</small></div>
        <br> --}}
        <small class="right"> Tel : 03-4256 4022</small>
        <br><small class="right"> Laman Web : http://wwww.risda.gov.my </small>
        <br>

        <hr>

        <p class="right" style="font-size: 10pt">Ruj. Kami: RISDA.500-5/1/2Jld.40({{$permohonan->kod_kursus}})
            <br>
            Tarikh: {{$hari_ini}}</p>
            <br>
        <br><br>

        <b>Seperti Senarai Edaran</b>

        <p>Tuan,</p>

        <br><b style="text-transform:uppercase"> KURSUS {{$jadual->kursus_nama}} .</b>

        <p>Dengan segala hormatnya, perkara di atas adalah dirujuk.</p>

        <p class="justify"> 2. Sukacita dimaklumkan bahawa, Pihak Pengurusan RISDA telah mencalonkan tuan untuk mengikuti kursus tersebut. Maklumat kursus adalah seperti ketetapan berikut:</p>
            <table width=100% class="table-clear">

                <tr>
                    <td> Tarikh</td>
                    <td>:</td>
                    <td>{{date('d-m-Y', strtotime($jadual->tarikh_mula))}} hingga {{date('d-m-Y', strtotime($jadual->tarikh_tamat))}}</td>

                </tr>
                <tr>
                    <td>Masa</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="align:top">Tempat Kursus & Penginapan</td>
                    <td>:</td>
                    <td>{{$agensi->nama_Agensi}}
                        <br> {{$agensi->alamat_Agensi_baris1}}
                        <br> {{$agensi->poskod}}  {{$agensi->daerah->Daerah}}
                        <br> {{$agensi->negeri->Negeri}}</td>
                </tr>
                <tr>
                    <td>Peserta & Jadual</td>
                    <td>:</td>
                    <td> Lampiran 1 & 2</td>
                </tr>
                <tr>
                    <td> Kehadiran</td>
                    <td>:</td>
                    <td> Wajib</td>
                </tr>
                <tr>
                    <td> Penganjur</td>
                    <td>:</td>
                    <td></td>
                </tr>

            </table>

            <p class="justify"> 3. Sedemikian, kerjasama tuan adalah dipohon untuk memaklumkan kepada pegawai berkenaan untuk menghadiri serta menjayakan program tersebut. Sebarang pertanyaa, sila hubungi urusetia di iaitu    </p>

            <p class="justify"> Sekian Terima Kasih.</p>

            <h4>"WAWASAN KEMAKMURAN BERSAMA 2030"</h4>

            <h4>"BERKHIDMAT UNTUK NEGARA"</h4>



        <footer> <hr> Memacu masyarakat pekebun kecil makmur daripada sumber komoditidan hasil baharu berlandaskan revolusi perindustrian digital serta teknologi hijau</footer>
</p>

<p class="landscape page_break">

    <table width="100%">
        <tr>
            @foreach ($aturcara as $ac)
            <th> </th>
            <td> {{$ac->ac_masa}}</td>
            @endforeach
        </tr>
        <tr>
            @foreach ($aturcara as $a)

            <td></td>
            <td>{{$a->ac_aturcara}}</td>
            @endforeach
        </tr>


    </table>
</p>
</body>








