<div class="card-body">
    <div class="table-responsive scrollbar ">
        <table class="table text-center table-bordered datatable" style="vertical-align: middle;border-color: #00B64E;">
            <thead class="risda-bg-g">
                <tr>
                    <th>BIL.</th>
                    <th>BIDANG KURSUS</th>
                    <th>NAMA KURSUS</th>
                    <th>TARIKH KURSUS</th>
                    <th>BIL PANGGILAN</th>
                    <th>BIL HADIR</th>
                    <th>BIL TIDAK HADIR</th>
                    <th>BIL PENGGANTI</th>
                    <th>PERATUSAN KEHADIRAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidang_kursus as $bk)
                    @foreach ($bk->jadual_kursus as $jk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bk->nama_Bidang_Kursus }}</td>
                            <td>{{ $jk->id }}</td>
                            <td>{{ $jk->tarikh }}</td>
                            <td></td>
                            <td>{{ $jk->bil_hadir }}</td>
                            <td>{{ $jk->bil_tidak_hadir }}</td>
                            <td>{{ $jk->bil_pengganti }}</td>
                            <td>{{ $jk->peratusan }}%</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

</div>
