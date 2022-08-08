<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable " style="vertical-align: middle;border-color: #00B64E;">
        <thead class="risda-bg-g" style="vertical-align: middle">

            <tr>
                <tr>
                    <th>BIL.</th>
                    <th>BIDANG KURSUS</th>
                    {{-- <th>BIL.</th> --}}
                    <th>NAMA KURSUS</th>
                    <th>KOD NAMA KURSUS</th>
                    <th>TARIKH KURSUS</th>
                    <th>TEMPAT KURSUS</th>
                    <th>ANJURAN</th>
                    <th>NO. FT</th>
                    <th>JUMLAH PESERTA</th>
                    <th>JUMLAH PENILAIAN</th>
                    <th>NAMA KONSULTAN/PENCERAMAH</th>
                    <th>MARKAH %</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($penilaian as $p)
                <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ($p->kursus->bidang->nama_Bidang_Kursus ?? '-') }}</td>
                        <td>{{ ($p->kursus->kategori_kursus->nama_Kategori_Kursus ?? '-') }}</td>
                        <td>{{$p->kursus->kursus_nama}}</td>
                        <td>{{ ($p->kursus->kod_kursus ?? '-') }}</td>
                        <td>{{date('d/m/Y', strtotime($p->kursus->tarikh_mula))}}
                        <br>-<br>{{date('d/m/Y', strtotime($p->kursus->tarikh_tamat))}}</td>
                        <td>{{($p->kursus->tempat->nama_Agensi?? '-') }} </td>
                        <td>{{($p->kursus->pengendali->nama_Agensi?? '-') }} </td>
                        <td>{{$p->kursus->kursus_no_ft}}
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>
