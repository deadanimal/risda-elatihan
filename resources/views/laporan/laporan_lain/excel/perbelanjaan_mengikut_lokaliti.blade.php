<div class="card-body">
    <div class="table-responsive scrollbar ">
        <table class="table text-center table-bordered datatable" style="vertical-align: middle;border-color: #00B64E;">
            <thead class="risda-bg-g">
                <tr>
                    <th>BIL.</th>
                    <th>NEGERI</th>
                    <th>PUSAT TANGGUNGJAWAB</th>
                    <th>PERUNTUKAN<br>(RM)</th>
                    <th>PERBELANJAAN<br>(RM)</th>
                    <th>BAKI<br>(RM)</th>
                    <th>PRESTASI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perbelanjaankursus as $pk)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pk->pt->negeri->Negeri}}</td>
                    <td>{{$pk->pt->nama_PT}}</td>
                    <td>{{$pk->Jum_LO}}</td>
                    <td>3000.00</td>
                    <td>349.00</td>
                    <td>-</td>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
