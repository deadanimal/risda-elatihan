<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable "
        style="vertical-align: middle;border-color: #00B64E;">
        <thead class="risda-bg-g" style="vertical-align: middle">

            <tr>
                <th>JENIS KURSUS</th>
                <th>BIL.</th>
                <th>BIDANG KURSUS</th>
                <th>BIL.</th>
                <th>KATEGORI KURSUS</th>
                <th>BILANGAN PESERTA</th>
                <th>PERUNTUKAN</th>
                <th>PERBELANJAAN</th>
                <th>TANGGUNGAN</th>
                <th>BAKI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kursus as $k)
            <tr>
                <td>{{$k->kategori_kursus->jenis_Kategori_Kursus}}</td>
                <td>{{$loop->iteration}}</td>
                <td>{{$k->bidang->nama_Bidang_Kursus}}</td>
                <td>{{$loop->iteration}}</td>
                <td>{{$k->kursus_nama}}</td>
                <td>{{$k->kategori_kursus->nama_Kategori_Kursus}}</td>
                {{-- <td>{{$bilangan_peserta}}</td> --}}
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>
