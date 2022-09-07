    <table class="table text-center table-bordered datatable" style="vertical-align: middle;border-color: #00B64E;">
        <caption style="display: none">LAPORAN PENCAPAIAN MATLAMAT KEHADIRAN</caption>
        <thead class="risda-bg-g">
            <tr>
                <th rowspan="2">BIL.</th>
                <th rowspan="2">BIDANG KURSUS</th>
                <th colspan="3">BILANGAN KURSUS</th>
                <th colspan="4">KEHADIRAN</th>
                <th colspan="5">PERBELANJAAN</th>
            </tr>
            <tr>
                <th>MATLAMAT</th>
                <th>PENCAPAIAN</th>
                <th>PERATUS</th>

                <th>MATLAMAT</th>
                <th>LELAKI</th>
                <th>PEREMPUAN</th>
                <th>JUMLAH</th>

                <th>PERATUS</th>
                <th>MATLAMAT</th>
                <th>PENCAPAIAN</th>
                <th>BAKI</th>
                <th>JUMLAH</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bidang_kursus as $bk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bk->nama_Bidang_Kursus }}</td>
                    <td>{{$bk->j_matlamat_kursus}}</td>
                    <td>{{ $bk->pencapaian }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            <tr>
                <td>
                    <p style="display: none">9999</p>
                </td>
                <td class="h5 risda-g">
                    JUMLAH
                </td>
                <td></td>
                <td>{{ $j_pencapaian }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>
