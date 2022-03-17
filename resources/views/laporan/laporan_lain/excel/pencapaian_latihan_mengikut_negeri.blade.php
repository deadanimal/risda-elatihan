<table class="table text-center table-bordered datatable" border-color: #00B64E;">
    <thead class="risda-bg-g" style="vertical-align: middle">
        <tr>
            <th rowspan="2">BIL.</th>
            <th rowspan="2">PUSAT TANGGUNGJAWAB</th>
            <th colspan="3">HARI BERKURSUS</th>
            <th rowspan="2">JUMLAH</th>
            <th colspan="3">HARI BERKURSUS</th>
        </tr>
        <tr>
            <th>0 HARI</th>
            <th>1-6 HARI</th>
            <th>7 HARI DAN KEATAS</th>
            <th>0 HARI</th>
            <th>1-6 HARI</th>
            <th>7 HARI DAN KEATAS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pusat_tanggungjawab as $pt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pt->nama_PT }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
