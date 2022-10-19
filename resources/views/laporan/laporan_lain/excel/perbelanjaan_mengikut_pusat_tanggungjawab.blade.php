 <div class="card-body">
     <div class="table-responsive scrollbar ">
         <table class="table text-center table-bordered datatable" style="vertical-align: middle;border-color: #00B64E;">
             <thead class="risda-bg-g">
                 <tr>
                     <th>BIL.</th>
                     <th>PUSAT TANGGUNGJAWAB</th>
                     <th>PERUNTUKAN<br>(RM)</th>
                     <th>PERBELANJAAN<br>(RM)</th>
                     <th>BAKI<br>(RM)</th>
                     <th>PRESTASI</th>
                 </tr>
             </thead>
             <tbody>

                @foreach ($perbelanjaan as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->pt->nama_PT}}</td>
                    <td>{{$p->Jum_LO}}</td>
                    <td>3000.00</td>
                    <td>489.00</td>
                    <td>-</td>
                </tr>

                @endforeach
             </tbody>
         </table>
     </div>

 </div>
 <script>
     $(document).ready(function() {
         $("th").addClass('fw-bold text-white');
     });
 </script>
