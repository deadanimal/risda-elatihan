{{-- <p>Salam sejahtera,</p>

<p class="mt-4">Tuan/Puan,</p>

<p class="mt-4">Permohonan anda bagi {{$permohonan->jadual->kursus_nama}} telah diluluskan.</p>

<p class="mt-4">Sekian, terima kasih.</p>

<p class="mt-4">PENTADBIR e-LATIHAN, RISDA</p> --}}
<style>
.text-right {
    text-align: right;
}

.text-left {
    text-align: left;
}

.text-center {
    text-align:center;
}



</style>



{{-- <link href="/vendor/mail/html/themes/default.css" rel="stylesheet"> --}}

{{-- <img class="header a" src="/img/risda_logo.png" > --}}

<img class="header a" src="{{ $message->embed(public_path() . '/img/risda_logo.png') }}" width="30%"/>

<h3 class="header">PIHAK BERKUASA KEMAJUAN PEKEBUN KECIL PERUSAHAAN GETAH (GETAH)</h3>
 <h4 class="header"> PENGESAHAN KEHADIRAN PROGRAM LATIHAN</h4>


{{-- <p class="text-left">No. Kad Pengenalan	: {{$permohonan->peserta->no_KP}}</p>        <p class="text-right">Tarikh : {{date('d-m-Y', strtotime($permohonan->updated_at))}}</p>
<p class="text-left"> Nama :{{$permohonan->peserta->name}}</p>
<p class="text-left">Pusat Tanggungjawab: </p> --}}

<table>
    <tr>
        <td>No. Kad Pengenalan	: {{$permohonan->peserta->no_KP}}</td>
        <td>Tarikh : {{date('d-m-Y', strtotime($permohonan->updated_at))}}</td>
    </tr>
    <tr>
        <td>Nama :{{$permohonan->peserta->name}}</td>
    </tr>
    <tr>
        <td>Pusat Tanggungjawab: </td>
    </tr>
</table>

Tuan/Puan,

<p style="text-transform: uppercase">PERMOHONAN {{$permohonan->jadual->kursus_nama}} </p>

Sukacita perkara di atas adalah dirujuk.

<p> Adalah dimaklumkan bahawa permohonan Tuan/Puan telah DILULUSKAN untuk mengikuti latihan di atas. Butiran latihan adalah seperti berikut:</p>

<p style="text-transform: uppercase">
    <ol>
        <li>Tarikh: {{date('d-m-Y', strtotime($permohonan->jadual->tarikh_mula))}}</li>
        <li>Tempat: {{$agensi->nama_Agensi}}</li>
    </ol>


<p> 2.  Tuan/puan diminta untuk membuat pengesahan kehadiran melalui Sistem e-latihan di pautan berikut
<a href="http://risda-elatihan.prototype.com.my/us-uls/kehadiran/ke-kursus/mengesahkan-kehadiran">Sistem Maklumat Latihan Risda</a> pada atau sebelum {{date('d-m-Y', strtotime($permohonan->jadual->tarikh_mula))}}.</p>

<p>3. Sekiranya tiada maklumbalas pengesahan yang dibuat dalam tempoh ditetapkan, tuan/puan dianggap tidak berminat untuk menghadiri latihan. Sebarang pertanyaan boleh berhubung dengan Urus setia Latihan.</p>

<p>Sekian, terima kasih.</p>


<h3>ʺBERKHIDMAT UNTUK NEGARAʺ</h3>


<h5>UNIT LATIHAN STAF</h5>
<h5>BAHAGIAN LATIHAN RISDA</h5>
