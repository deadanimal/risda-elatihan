<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable"
        style="vertical-align: middle;border-color: #00B64E;">
        <thead class="risda-bg-g">
            <tr>
                <th rowspan="2">BIL.</th>
                <th rowspan="2">BIDANG KURSUS</th>
                <th colspan="3">BILANGAN KURSUS</th>
                <th colspan="4">KEHADIRAN</th>
                <th colspan="4">PERBELANJAAN</th>
            </tr>
            <tr>
                <th>MATLAMAT</th>
                <th>PENCAPAIAN</th>
                <th>PERATUS</th>
                <th>MATLAMAT</th>
                {{-- <th>PANGGILAN PESERTA</th> --}}
                <th>KEHADIRAN PESERTA</th>
                {{-- <th>LELAKI</th>
                <th>PEREMPUAN</th> --}}
                <th>JUMLAH</th>
                <th>PERATUS</th>
                <th>MATLAMAT</th>
                <th>PENCAPAIAN</th>
                <th>PERATUS</th>
                <th>BAKI PERUNTUKAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bidang_kursus as $bk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bk->nama_Bidang_Kursus }}</td>
               <td> <?php $tot_kursus=array($bk->matlamat_peserta->jan,$bk->matlamat_kursus->feb,$bk->matlamat_kursus->mac,$bk->matlamat_kursus->apr,$bk->matlamat_kursus->mei,$bk->matlamat_kursus->jun,$bk->matlamat_kursus->jul,$bk->matlamat_kursus->ogos,$bk->matlamat_kursus->sept,$bk->matlamat_kursus->okt,$bk->matlamat_kursus->nov,$bk->matlamat_kursus->dis);
                echo array_sum($tot_kursus);?></td>
                <td>{{ $bk->pencapaian }}</td>
                <td></td>
                <td><?php $tot_peserta=array($bk->matlamat_peserta->jan,$bk->matlamat_peserta->feb,$bk->matlamat_peserta->mac,$bk->matlamat_peserta->apr,$bk->matlamat_peserta->mei,$bk->matlamat_peserta->jun,$bk->matlamat_peserta->jul,$bk->matlamat_peserta->ogos,$bk->matlamat_peserta->sept,$bk->matlamat_peserta->okt,$bk->matlamat_peserta->nov,$bk->matlamat_peserta->dis);
                    echo array_sum($tot_peserta);?></td>
                <td></td>
                <td></td>
                <td></td>

                @if ($bk->matlamat_perbelanjaan==null)
                    <td>0</td>;
                    @else
                    <td><?php $tot_perbelanjaan=array($bk->matlamat_perbelanjaan->jan,$bk->matlamat_perbelanjaan->feb,$bk->matlamat_perbelanjaan->mac,$bk->matlamat_perbelanjaan->apr,$bk->matlamat_perbelanjaan->mei,$bk->matlamat_perbelanjaan->jun,$bk->matlamat_perbelanjaan->jul,$bk->matlamat_perbelanjaan->ogos,$bk->matlamat_perbelanjaan->sept,$bk->matlamat_perbelanjaan->okt,$bk->matlamat_perbelanjaan->nov,$bk->matlamat_perbelanjaan->dis);
                    echo array_sum($tot_perbelanjaan);?></td>
                    @endif
                <td></td>
                <td></td>
                <td></td>

            @endforeach
        </tbody>
    </table>
</div>
