
  <head>
    <title>Surat Tawaran Kursus {{$jadual->kursus_nama}}</title>
    <style type="text/css">
        /* define a few different page types we can refer to from CSS classes */
        /* see http://www.princexml.com/doc/page-size/ */


        @page portrait {
          size: A4 portrait;
          margin: 3cm;
        }

        .page_break {
            page-break-before: always;
            margin-top: 30px;
        }



        *{
                font: 12pt "Times New Roman";
                line-height: 1.5;
                margin-right: 20px;
                margin-top: 10px;


         }

        th{
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
            /* padding-left: 0px; */
            /* padding-right: 5px; */
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



    </style>
<body>
    <p class="portrait">
        <div class="row" style="text-align: center">
            <div class="column-side">
                <img src="img/risda_logo.png" alt="PGN" height="80" style="">
            </div>
            <div class="column-center"><b>PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (RISDA)<br>
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

        <p> 2. Sukacita dimaklumkan bahawa, Pihak Pengurusan RISDA telah mencalonkan tuan untuk mengikuti kursus tersebut. Maklumat kursus adalah seperti ketetapan berikut:</p>
             <table width=100% class="table-clear" style="margin-left:20px">

               <tr>
                    <td> Tarikh</td>
                    <td>:</td>

                    @if($jadual->bilangan_hari=="1")
                    <td>{{date('d/m/Y', strtotime($jadual->tarikh_mula))}}</td>
                    @else
                    <td>{{date('d/m/Y', strtotime($jadual->tarikh_mula))}} hingga {{date('d/m/Y', strtotime($jadual->tarikh_tamat))}}</td>

                    @endif


                </tr>
                <tr></tr>
                <tr>
                    <td style="align:top">Tempat Kursus & Penginapan</td>
                    <td>:</td>
                    <td>{{$agensi->nama_Agensi}}
                        <br> {{$agensi->alamat_Agensi_baris1}},{{$agensi->poskod}}  {{($agensi->daerah->Daerah ?? '-') }}
                        <br> {{($agensi->negeri->Negeri?? '-') }}</td>
                </tr>
                <tr>
                    <td> Kehadiran</td>
                    <td>:</td>
                    <td> Wajib</td>
                </tr>

            </table>
            <br>
            <p class="justify"> 3. Sedemikian, kerjasama tuan adalah dipohon untuk memaklumkan kepada pegawai berkenaan untuk menghadiri serta menjayakan program tersebut. Sebarang pertanyaa, sila hubungi urusetia di iaitu    </p>
            <br>
            <p class="justify"> Sekian Terima Kasih.</p>
            <br>
            <h4>"WAWASAN KEMAKMURAN BERSAMA 2030"</h4>

            <h4>"BERKHIDMAT UNTUK NEGARA"</h4>



        <footer> <hr> Memacu masyarakat pekebun kecil makmur daripada sumber komoditi dan hasil baharu berlandaskan revolusi perindustrian digital serta teknologi hijau</footer>
</p>
</body>








