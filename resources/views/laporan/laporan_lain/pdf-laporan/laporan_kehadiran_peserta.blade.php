<head>
    <title>Laporan Kehadiran Peserta</title>

    <style type="text/css">
@page {
  size: A4 landscape;
  margin: 30px;
}



    table,th,td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 10px;
        padding: 5px;
        text-transform: capitalize;
    }
    td{
        text-align: center;
    }

</style>
</head>

<body>
 <div class="table-responsive scrollbar ">
     {{-- <table class="table text-center table-bordered datatable " style="vertical-align: middle;border-color: #00B64E;"> --}}
        <table width="100%">
         <thead>

             <tr>
                 <th>BIL</th>
                 <th>BIDANG KURSUS</th>
                 <th>KATEGORI KURSUS</th>
                 <th>KOD NAMA KURSUS</th>
                 <th>NAMA KURSUS</th>
                 <th>TARIKH KURSUS</th>
                 <th>TEMPAT KURSUS</th>
                 <th>ANJURAN</th>
                 <th>NO KP</th>
                 <th>NAMA PEMOHON</th>
                 <th>GRED</th>
                 <th>PUSAT TANGGUNG-<br>JAWAB</th>
                 <th>STATUS KEHADIRAN</th>
                 <th>CATATAN</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($kehadiran as $k)
                 <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>{{ ($k->kursus->bidang->nama_Bidang_Kursus ?? '-') }}</td>
                     <td>{{ ($k->kursus->kategori_kursus->nama_Kategori_Kursus ?? '-') }}</td>
                     <td>{{ ($k->kod_kursus ?? '-') }}</td>
                     <td>{{$k->kursus->kursus_nama}}</td>
                     <td>{{date('d/m/Y', strtotime($k->kursus->tarikh_mula))}}
                     <br>-<br>{{date('d/m/Y', strtotime($k->kursus->tarikh_tamat))}}</td>
                     <td>{{($k->kursus->tempat->nama_Agensi?? '-') }} </td>
                     <td>{{($k->kursus->pengendali->nama_Agensi?? '-') }} </td>
                     <td>{{ ($k->staff->no_KP ?? '-') }}</td>
                     <td>{{ ($k->staff->name ?? '-') }}</td>
                     <td> {{($k['user']->staf->Gred?? '-') }} </td>
                     <td>{{$k['user']->staf->NamaPT}}</td>
                     <td>{{ $k->status_kehadiran_ke_kursus }}</td>
                     <td></td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 </div>
</body>
