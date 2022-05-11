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


</style>



<link href="/vendor/mail/html/themes/default.css" rel="stylesheet">

<img class="logo" src="/img/risda_logo.png">


<h4 class="text-left">No. Kad Pengenalan	: {{$permohonan->user->}}</h4>        <h4 class="text-right">Tarikh : {{$permohonan->updated_at}}</h4>
<h4 class="text-left"> Nama :{{$permohonan->user->name}}</h4>
<h4 class="text-left">Pusat Tanggungjawab: </h4>

Tuan/Puan,

<p style="text-transform: uppercase">PERMOHONAN {{$permohonan->jadual->kursus_nama}} </p>

Sukacita perkara di atas adalah dirujuk.

<p> Adalah dimaklumkan bahawa permohonan Tuan/Puan telah DILULUSKAN untuk mengikuti latihan di atas. Butiran latihan adalah seperti berikut:</p>

<p style="text-transform: uppercase">
    <ol>
        <li>tarikh: {{$permohonan->jadual->tarikh_mula}}</li>
        <li>Tempat: {{$permohonan->jadual->kursus_tempat}}</li>
    </ol>


<p> 2.  Tuan/puan diminta untuk membuat pengesahan kehadiran melalui Sistem e-latihan di pautan berikut
<a href="http://risda-elatihan.prototype.com.my/us-uls/kehadiran/ke-kursus/mengesahkan-kehadiran">Sistem Maklumat Latihan Risda</a> pada atau sebelum {{$permohonan->jadual->tarikh_mula}}.</p>

<p>3. Sekiranya tiada maklumbalas pengesahan yang dibuat dalam tempoh ditetapkan, tuan/puan dianggap tidak berminat untuk menghadiri latihan. Sebarang pertanyaan boleh berhubung dengan Urus setia Latihan.</p>

<p>Sekian, terima kasih.</p>


<h3>ʺBERKHIDMAT UNTUK NEGARAʺ</h3>


<h5>UNIT LATIHAN STAF</h5>
<h5>BAHAGIAN LATIHAN RISDA</h5>
