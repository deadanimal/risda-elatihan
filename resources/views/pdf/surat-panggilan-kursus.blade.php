<head>
    <title>Surat Panggilan Ke Kursus {{$jadual->kursus_nama}}</title>

<style type="text/css">
    /* define a few different page types we can refer to from CSS classes */
    /* see http://www.princexml.com/doc/page-size/ */
    table, td,th {
    border: 1px solid;
    /* padding: 8px; */
    border-collapse: collapse;

    }

    @page portrait {
      size: A4 portrait;
      margin: 10px;
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

        <p class="right" style="font-size: 10pt">Ruj. Kami: RISDA.500-5/1/3JLD4({{$jadual->id}})
            <br>
            Tarikh: {{$hari_ini}}</p>
            <br>
        <br><br>

        <p><b>Seperti Senarai Edaran</b></p>

        <p>Tuan/Puan,</p>

        <h5 style="text-transform:uppercase">KURSUS {{$jadual->kursus_nama}}. </h5>

        <p>Dengan hormatnya merujuk kepada perkara di atas.</p>

        <p>2. &nbsp; &nbsp;  Sukacita dimaklumkan bahawa, Bahagian Latihan akan menjalankan satu kursus seperti di atas bagi {{$jadual->kursus_unit_latihan}} seperti ketetapan berikut:-

            <br>
            <table width=100% class="table-clear" style="cellpadding:10px;margin-left:40px;">
                <tr>
                    <th> Tarikh</th>
                    <th>:</th>
                    @if ($jadual->bilangan_hari=="1")
                    <td style="text-transform: capitalize">{{date('d-m-Y H:i', strtotime($jadual->tarikh_mula))}}

                     @else
                    <td style="text-transform: capitalize">{{date('d-m-Y H:i', strtotime($jadual->tarikh_mula))}} hingga {{date('d-m-Y H:i', strtotime($jadual->tarikh_tamat))}}</td>

                    @endif
                </tr>
                <tr>
                    <th>Tempat Kursus</th>
                    <th>:</th>
                    <td style="text-transform: capitalize">{{$jadual->tempat->nama_Agensi}}<br>{{$jadual->tempat->alamat_Agensi_baris1}} {{$jadual->tempat->alamat_Agensi_baris2}}
                        <br> {{$jadual->tempat->poskod}}
                        {{-- <br> {{$agensi->negeri->Negeri}} --}}
                    </td>
                </tr>
                <tr>
                    <th>Tarikh/Masa Pendaftaran</th>
                    <th>:</th>
                    <td style="text-transform: capitalize">{{date('d-m-Y', strtotime($jadual->tarikh_mula))}}</td>
                </tr>
                <tr>
                    <th>Kriteria Peserta</th>
                    <th>:</th>
                    <td> Terbuka kepada semua KIR/AIR</td>
                </tr>
                <tr>
                    <th rowspan="4">Lain-lain</th>
                    <th rowspan="4">:</th>
                </tr>
                <tr>
                            <td>Kenderaan diselaras diperingkat Pusat Tanggungjawab yang terlibat. </td>
                </tr>
                <tr>
                            <td>Penginapan dan makan / minum disediakan. </td>
                </tr>
                <tr>
                            <td>Peserta perlu mematuhi Prosedur Operasi (SOP) sepanjang berada di Pusat Latihan.</td>
                </tr>

            </table>
        </p>

        <footer>
            <hr>
           MEMACU MASYARAKAT PEKEBUN KECIL MAKMUR DARIPADA SUMBER KOMODITI DAN HASIL BAHARU BERLANDASKAN REVOLUSI PERINDUSTRIAN DIGITAL SERTA TEKNOLOGI HIJAU. </footer>
    <div class="page_break"></div>

    <p>3.&nbsp; &nbsp; Selaras dengan Langkah Pencegahan Covid-19, beberapa perkara perlu dititikberatkan oleh Pusat Tanggungjawab terhadap pemilihan dan kehadiran peserta ke Pusat Latihan. Antara perkara tersebut adalah:
        <ol type="i">
            <li>Peserta hendaklah lengkap menerima vaksin mengikut dos yang telah ditetapkan.</li>
            <li> Suhu badan tidak melebihi 37.5 darjah selsius</li>
            <li> Sihat tubuh badan dan bebas dari segala jangkitan iaitu demam, batuk dan sukar bernafas. </li>
            <li>Tahap kesihatan yang baik dan tidak mempunyai penyakit imuniti rendah dan penyakit kronik.</li>
            <li> Sentiasa memakai penutup muka (face mask), membasuh tangan serta menjaga penjarakan sosial 1 meter. </li>
            <li> Peserta wajib mendaftar pada tempoh yang ditetapkan sahaja. </li>
        </ol>

        <h5><sup>*</sup>Pusat Tanggungjawab perlu memastikan segala kriteria ini dipenuhi sebelum menghantar ke Pusat Latihan</h5>


        <p>4. Pihak tuan/puan juga diminta untuk mendaftarkan peserta daripada Pusat Tanggungjawab masing-masing ke dalam e-Latihan selewat-lewatnya 3 hari sebelum tarikh perlaksanaan kursus dan seterusnya menyediakan surat panggilan kursus kepada peserta bagi memudahkan urusan pendaftaran dan perlindungan insuran di mana mereka dikehendaki membawa surat berkenaan dan kad pengenalan semasa pendaftaran kursus.</p>

        <p>5. Kerjasama pihak tuan dalam menjayakan program ini amatlah dihargai dan didahului dengan ucapan terima kasih. </p>

        <p>Sekian</p>
        <h4>"WAWASAN KEMAKMURAN BERSAMA 2030"</h4>
        <h4>"BERKHIDMAT UNTUK NEGARA"</h4>

    </p>
        <div class="page_break"></div>


        <h3 style="text-transform: uppercase">KUOTA PESERTA KURSUS {{$jadual->kursus_nama}}:</h3>

        @if ($jadual->bilangan_hari=="1")
            <h3 style="text-transform: uppercase">PADA {{date('d-m-Y', strtotime($jadual->tarikh_mula))}}</h3>
         @else
            <h3 style="text-transform: uppercase">PADA {{date('d-m-Y', strtotime($jadual->tarikh_mula))}} HINGGA  {{date('d-m-Y', strtotime($jadual->tarikh_tamat))}}</h3>
        @endif


        <h3 style="text-transform: uppercase">TEMPAT: {{$jadual->tempat->nama_Agensi}}</h3>

        <table>
            <tr>
                <td> NEGERI</td>
                <td> PUSAT TANGGUNGJAWAB </td>
                <td> KUOTA PESERTA/PERKURSUS</td>
            </tr>
            {{-- @foreach ($ptj as $ptj)

            <tr>

                <td>{{$ptj->negeri->Negeri}}</td>
                <td>{{$ptj->nama_PT}}</td>
                <td>{{$ptj->pp_peruntukan_calon}}</td>
            </tr>

                @endforeach --}}
        </table>
        <footer>
        <hr>
       MEMACU MASYARAKAT PEKEBUN KECIL MAKMUR DARIPADA SUMBER KOMODITI DAN HASIL BAHARU BERLANDASKAN REVOLUSI PERINDUSTRIAN DIGITAL SERTA TEKNOLOGI HIJAU. </footer>
        </body>



