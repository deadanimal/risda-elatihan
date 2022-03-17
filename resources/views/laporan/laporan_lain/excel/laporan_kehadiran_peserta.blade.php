 <div class="table-responsive scrollbar ">
     <table class="table text-center table-bordered datatable " border-color: #00B64E;">
         <thead class="risda-bg-g" style="vertical-align: middle">

             <tr>
                 <th>BIL</th>
                 <th>BIDANG KURSUS</th>
                 <th>KATEGORI KURSUS</th>
                 <th>KOD NAMA KURSUS</th>
                 <th>NAMA KURSUS</th>
                 <th>TARIKH KURSUS</th>
                 <th>TEMPAT KURSUS</th>
                 <th>ANJURAN</th>
                 <th>BIL</th>
                 <th>NO KAD PENGENALAN</th>
                 <th>NAMA PEMOHON</th>
                 <th>GRED</th>
                 <th>PUSAT TANGGUNGJAWAB</th>
                 <th>STATUS KEHADIRAN</th>
                 <th>CATATAN</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($kehadiran as $k)
                 <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>{{ $k->user->no_KP }}</td>
                     <td>{{ $k->user->name }}</td>
                     <td></td>
                     <td></td>
                     <td>{{ $k->status_kehadiran_ke_kursus }}</td>
                     <td></td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 </div>
