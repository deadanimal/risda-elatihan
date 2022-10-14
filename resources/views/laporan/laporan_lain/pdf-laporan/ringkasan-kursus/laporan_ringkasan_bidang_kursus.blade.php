
    <title> Laporan Ringkasan Bidang Kursus</title>
    <style>

        table,th,td {
                    border: 1px solid;
                    border-collapse: collapse;
                    padding: 8px;
            font: 9pt "Times New Roman";

        }

        *{

                margin-right: 20px;
                margin-left: 20px;
                margin-top: 20px;
         }

         h4{
             text-align: center;
         }

         p{
            font: 8pt "Times New Roman";
         }




        </style>


    <h4> Laporan Ringkasan Bidang Kursus</h4>


<div class="table-responsive scrollbar ">
    <table style="width: 100%">
        <thead class="risda-bg-g" style="vertical-align: middle">

            <tr>
                {{-- <th>JENIS KURSUS</th>--}}
                <th>BIL.</th>
                <th>BIDANG KURSUS</th>
                {{-- <th>KATEGORI KURSUS</th> --}}
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
                {{-- <td>{{$k->kategori_kursus->jenis_Kategori_Kursus}}</td> --}}
                {{-- <td>{{$loop->iteration}}</td> --}}
                <td>{{$loop->iteration}}</td>
                <td>{{$k->bidang->nama_Bidang_Kursus}}</td>
                {{-- <td>{{$k->kursus_nama}}</td> --}}
                {{-- <td>{{$k->kategori_kursus->nama_Kategori_Kursus}}</td> --}}
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
