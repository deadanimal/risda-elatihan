<div class="card-body">
    <div class="table-responsive scrollbar ">
        <table class="table text-center table-bordered datatable" style="vertical-align: middle;border-color: #00B64E;">
            <thead class="risda-bg-g">
                <tr>
                    <th>BIDANG KURSUS</th>
                    <th>BIL.</th>
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
                            <td>{{ $bk->nama_Bidang_Kursus }}</td>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $jk->kursus_nama }}</td>
                            {{-- <td>{{ $jk->id }}</td> --}}
                            @if ($jk->bilangan_hari>1)
                            <td>{{date('d/m/Y', strtotime($jk->tarikh_mula))}} - {{date('d/m/Y', strtotime($jk->tarikh_tamat))}} </td>
                            @else
                            <td>{{date('d/m/Y', strtotime($jk->tarikh_mula))}}</td>
                            @endif

                            <td>{{$peruntukan_peserta[$jk->id]}}</td>

                            <td>{{$hadir[$jk->id]}}</td>
                            <td>{{$tidak_hadir[$jk->id]}}</td>
                            <td>{{$pengganti[$jk->id]}}</td>
                            @if(($hadir[$jk->id]==0)&&($pengganti[$jk->id]==0))
                            <td>0%</td>
                            @else
                            <td><?php echo(round(((($hadir[$jk->id])+($pengganti[$jk->id]))/$peruntukan_peserta[$jk->id])*100))?>%</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
    </div>

</div>
