<head>
    <title>Laporan Perlaksanaan Latihan Staf</title>

    <style type="text/css">
@page {
  size:A4 landscape;
  margin: 30px;
}

th{
    font-size: 6px;
    border: 1px solid black;
    border-collapse: collapse;

}

    table,td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 8px;
        padding: 8px;
        text-transform: capitalize;
    }
    h4{
        text-align: center;
    }

</style>
</head>
</head>

<h4>Laporan Perlaksanaan Latihan Staf</h4>


<div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " style="vertical-align: middle;border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th rowspan="3">BIL</th>
                            <th rowspan="3">BIDANG KURSUS</th>
                            {{-- <th rowspan="3">BIL</th> --}}
                            <th rowspan="3">NAMA KURSUS</th>
                            <th rowspan="3">TARIKH KURSUS</th>
                            <th rowspan="3">TEMPAT KURSUS</th>
                            <th rowspan="3">ANJURAN</th>
                            <th rowspan="3">NO.FT</th>
                            <th colspan="9">BILANGAN PESERTA</th>
                            <th colspan="5">KATEGORI</th>
                        </tr>
                        <tr>
                            <th colspan="3">BILANGAN</th>
                            <th colspan="3">KEHADIRAN</th>
                            <th colspan="3">PERATUS KEHADIRAN</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>E</th>
                        </tr>
                        <tr>
                            <th>LELAKI</th>
                            <th>PEREMPUAN</th>
                            <th>JUMLAH BILANGAN PESERTA</th>
                            <th>LELAKI</th>
                            <th>PEREMPUAN</th>
                            <th>JUMLAH BILANGAN PESERTA</th>
                            <th>LELAKI</th>
                            <th>PEREMPUAN</th>
                            <th>JUMLAH BILANGAN PESERTA</th>
                            <th>PENGURUSAN TERTINGGI</th>
                            <th>GRED 41-54</th>
                            <th>GRED 27-40</th>
                            <th>GRED 17-26</th>
                            <th>GRED 11-16</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kursus as $k)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->bidang->nama_Bidang_Kursus}}</td>
                            <td>{{$k->kursus_nama}}</td>
                            <td>{{$k->tarikh_mula}}</td>
                            <td>{{$k->tempat->nama_Agensi}}</td>
                            <td>{{$k->pengendali->nama_Agensi}}</td>
                            <td>{{$k->kursus_no_ft}}</td>

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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        @endforeach

                    </tbody>
                </table>
            </div>



