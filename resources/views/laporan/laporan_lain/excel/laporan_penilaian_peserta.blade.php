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
                    <th>MARKAH %</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($penilaian as $p)
                <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ($p->kursus->bidang->nama_Bidang_Kursus ?? '-') }}</td>
                        <td>{{($p->kursus->kursus_nama?? '-')}}</td>
                        <td>{{ ($p->kursus->kodkursus->kod_Kursus ?? '-') }}</td>
                        @if($p->kursus->bilangan_hari>1)
                            <td>{{date('d/m/Y', strtotime($p->kursus->tarikh_mula))}}
                            <br>-<br>{{date('d/m/Y', strtotime($p->kursus->tarikh_tamat))}}</td>
                        @else
                            <td>{{date('d/m/Y', strtotime($p->kursus->tarikh_mula))}}
                        @endif
                        <td>{{($p->kursus->tempat->nama_Agensi?? '-') }} </td>
                        <td>{{($p->kursus->pengendali->nama_Agensi?? '-') }} </td>
                        <td>{{$p->kursus->kursus_no_ft}}</td>
                        <td>{{$tot_peserta}}</td>
                        <td>{{$tot_penilaian}}</td>
                        <td>0.00%</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>
