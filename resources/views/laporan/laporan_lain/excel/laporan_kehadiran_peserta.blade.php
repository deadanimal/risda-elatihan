<?php
    $totA=count($kehadiran->kursus->bidang);
?>


 <div class="table-responsive scrollbar ">
     <table class="table text-center table-bordered datatable " style="vertical-align: middle;border-color: #00B64E;">
         <thead class="risda-bg-g" style="vertical-align: middle">

             <tr>
                 {{-- <th>BIL</th> --}}
                 <th>BIDANG KURSUS</th>
                 <th>KATEGORI KURSUS</th>
                 <th>KOD NAMA KURSUS</th>
                 <th>NAMA KURSUS</th>
                 <th>TARIKH KURSUS</th>
                 <th>TEMPAT KURSUS</th>
                 <th>ANJURAN</th>
                 <th>NO KAD PENGENALAN</th>
                 <th>NAMA PEMOHON</th>
                 <th>GRED</th>
                 <th>PUSAT TANGGUNGJAWAB</th>
                 <th>STATUS KEHADIRAN</th>
                 <th>CATATAN</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($kehadiran as $index =>$k)
                 <tr>

                     {{-- <td>{{ $loop->iteration }}.</td> --}}
                     <td rowspan="$totA">{{$index+1}}</td>
                     {{-- <td>{{ ($k->kursus->bidang->nama_Bidang_Kursus ?? '-') }}</td> --}}
                     <td rowspan="$k->kursus->bidang->nama_Bidang_Kursus->count()">{{ $k->kursus->bidang->nama_Bidang_Kursus}}</td>
                     <td>{{ ($k->kursus->kategori_kursus->nama_Kategori_Kursus ?? '-') }}</td>
                     <td>{{ ($k->kod_kursus ?? '-') }}</td>
                     <td>{{($k->kursus->kursus_nama  ?? '-') }}</td>
                     <td>{{($k->kursus->tarikh_mula ?? '-') }}</td>
                     {{-- <td>{{  ( date('d/m/Y', strtotime($k->kursus->tarikh_mula))  ?? '-')}}
                     <br>-<br>{{( date('d/m/Y', strtotime($k->kursus->tarikh_tamat))  ?? '-')}}</td> --}}
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
