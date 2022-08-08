<table class="table text-center table-bordered datatable" style="vertical-align: middle;border-color: #00B64E;">
    <thead class="risda-bg-g">

        <tr>
            <th>TAHUN</th>
            <th>BIL.</th>
            <th>PENCERAMAH KURSUS</th>
            <th>KOD NAMA KURSUS</th>
            <th>NAMA KURSUS</th>
            <th>TARIKH MULA</th>
            <th>TARIKH AKHIR</th>
            <th>TEMPAT KURSUS</th>
            <th>BAYARAN PENCERAMAH <br> (RM)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penceramah as $p)
            @foreach ($p->penceramahKonsultan as $pk)
                <tr>
                    <td>{{ $pk->tahun }}</td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_Agensi }}</td>
                    <td>{{ $pk->jadual_kursus->kursus_kod_nama_kursus }}</td>
                    <td>{{ $pk->jadual_kursus->kursus_nama }}</td>
                    <td>{{ $pk->mula }}</td>
                    <td>{{ $pk->tamat }}</td>
                    <td>{{ $pk->tempat }}</td>
                    <td></td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
