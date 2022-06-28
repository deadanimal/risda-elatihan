<head>
    <title>Surat Tawaran Kursus {{$jadual->kursus_nama}}</title>
</head>

<style type="text/css">
    /* define a few different page types we can refer to from CSS classes */
    /* see http://www.princexml.com/doc/page-size/ */


    @page portrait {
      size: A4 portrait;
      margin: 10px;
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
        page-break-after: always;
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

    sup{
            vertical-align: super;
            font-size: smaller;
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

        <b>Seperti Senarai Edaran</b>

        <p>Tuan/Puan,</p>

        <h5 style="text-transform:uppercase">KURSUS {{$jadual->kursus_nama}}. </h5>

        Dengan hormatnya merujuk kepada perkara di atas.

        <p>2. Sukacita dimaklumkan bahawa, Bahagian Latihan akan menjalankan satu kursus seperti di atas bagi pekebun kecil seperti ketetapan berikut:-

            <br>
            <table >
                <tr>
                    <td> Tarikh</td>
                    <td>:</td>
                    <td style="text-transform: capitalize">{{$jadual->tarikh_mula}} hingga {{$jadual->tarikh_tamat}}</td>
                </tr>
                <tr>
                    <td>Tempat Kursus</td>
                    <td>:</td>
                    <td style="text-transform: capitalize">{{$jadual->tempat->nama_Agensi}}<br>{{$jadual->tempat->alamat_Agensi_baris1}} {{$jadual->tempat->alamat_Agensi_baris2}}
                        <br> {{$jadual->tempat->poskod}}
                        {{-- <br> {{$agensi->negeri->Negeri}} --}}
                    </td>
                </tr>
                <tr>
                    <td>Tarikh /Masa Pendaftaran</td>
                    <td>:</td>
                    <td style="text-transform: capitalize">{{date('d-m-Y', strtotime($jadual->tarikh_mula))}}</td>
                </tr>
                <tr>
                    <td>Kriteria Peserta</td>
                    <td>:</td>
                    <td> Terbuka kepada semua KIR/AIR</td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td>:</td>
                    <td>
                        <ol>
                            <li> Kenderaan diselaras diperingkat Pusat Tanggungjawab yang terlibat</li>
                            <li>Penginapan dan makan / minum disediakan. </li>
                            <li>Peserta perlu mematuhi Prosedur Operasi (SOP) sepanjang berada di Pusat Latihan</li>
                        </ol>
                    </td>
                </tr>
            </table>
        </p>
    <p>3. Selaras dengan Langkah Pencegahan Covid-19, beberapa perkara perlu dititikberatkan oleh Pusat Tanggungjawab terhadap pemilihan dan kehadiran peserta ke Pusat Latihan. Antara perkara tersebut adalah:
        <ol>
            <li>Peserta hendaklah lengkap menerima vaksin mengikut dos yang telah ditetapkan.</li>
            <li> Suhu badan tidak melebihi 37.5<sup>o</sup>C</li>
            <li> Sihat tubuh badan dan bebas dari segala jangkitan iaitu demam, batuk dan sukar bernafas </li>
            <li>Tahap kesihatan yang baik dan tidak mempunyai penyakit imuniti rendah dan penyakit kronik.</li>
            <li> Sentiasa memakai penutup muka (face mask), membasuh tangan serta menjaga penjarakan sosial 1 meter. </li>
            <li> Peserta wajib mendaftra pada tempohyang ditetapkan sahaja. </li>
        </ol>

        <p><sup>*</sup>Pusat Tanggungjawab perlu memastikan segala kriteria ini dipenuhi sebelum menghantar ke Pusat Latihan</p>

        <hr>
        <footer>MEMACU MASYARAKAT PEKEBUN KECIL MAKMUR DARIPADA SUMBER KOMODITI DAN HASIL BAHARU BERLANDASKAN REVOLUSI PERINDUSTRIAN DIGITAL SERTA TEKNOLOGI HIJAU. </footer>


        <p>4. Pihak tuan/puan juga dipohon untuk mendaftarkan peserta daripada Pusat Tanggungjawab masing-masing ke dalam e-Latihan selewat-lewatnya 3 hari sebelum tarikh perlaksanaan kursus dan seterusnya menyediakan surat panggilan kursus kepada peserta bagi memnudahkan urusan pendaftaran dan perlindungan insuran di mana mereka dikehendaki membawa surat berkenaan dan kad pengenalan semasa pendaftaran kursus.</p>

        <p>5. Kerjasama pihak tuan dalam menjayakan program ini amatlah dihargai dan didahului dengan ucapan terima kasih. </p>

        <p>Sekian</p>

        <h4>"WAWASAN KEMAKMURAN BERSAMA 2030"</h4>
        <h4>"BERKHIDMAT UNTUK NEGARA"</h4>

        <hr>
        <footer>MEMACU MASYARAKAT PEKEBUN KECIL MAKMUR DARIPADA SUMBER KOMODITI DAN HASIL BAHARU BERLANDASKAN REVOLUSI PERINDUSTRIAN DIGITAL SERTA TEKNOLOGI HIJAU. </footer>

        <h3 style="text-transform: uppercase">KUOTA PESERTA KURSUS {{$jadual->kursus_nama}}</h3>

        <h3 style="text-transform: uppercase">PADA {{date('d-m-Y', strtotime($jadual->tarikh_mula))}} hingga {{date('d-m-Y', strtotime($jadual->tarikh_tamat))}}</h3>

        <h3 style="text-transform: uppercase">TEMPAT: {{$jadual->tempat->nama_Agensi}}</h3>

        {{-- <table>
            <tr>
                <td> NEGERI</td>
                <td>PT @ PRJ </td>
                <td> KUOTA PESERTA/PERKURSUS</td>
            </tr>
            @foreach ($ptj as $ptj)

            <tr>

                <td>{{$ptj->negeri->Negeri}}</td>
                <td>{{$ptj->nama_PT}}</td>
                <td>{{$ptj->pp_peruntukan_calon}}</td>
            </tr>

                @endforeach
        </table> --}}

        <hr>
        <footer>MEMACU MASYARAKAT PEKEBUN KECIL MAKMUR DARIPADA SUMBER KOMODITI DAN HASIL BAHARU BERLANDASKAN REVOLUSI PERINDUSTRIAN DIGITAL SERTA TEKNOLOGI HIJAU. </footer>




