
    <title> Laporan Kehadiran Peserta</title>
<style>

    *{
            line-height: 1.5;
            /* margin: 10px; */
            margin-right: 50px;
            margin-left: 10px;
            margin-top: 20px;
     }

     h4{
         text-align: center;
     }

     p,b{
        font: 7pt "Times New Roman";
     }



     .table-clear{
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0px;
        padding-right: 5px;
    }

    table, td, th {
    border: 1px solid;
    font: 8pt "Times New Roman";

    /* text-align: center; */
    padding: 8px;
    border-collapse: collapse;

    }
    </style>


<h4> Laporan Kehadiran Peserta </h4>


<div class="table-responsive scrollbar ">
    <table width="100%" cellspacing="0" cellpadding="0">
        <thead class="risda-bg-g" style="vertical-align: middle">
            <tr>
                <th>BIL</th>
                <th>BIDANG KURSUS</th>
                <th>KATEGORI KURSUS</th>
                <th>KOD NAMA KURSUS</th>
                <th>NAMA KURSUS</th>
                <th>TARIKH KURSUS</th>
                <th>TEMPAT KURSUS</th>
                <th>ANJURAN</th>
                <th>NO KAD PENGENALAN</th>
                <th>NAMA PEMOHON</th>
                <th>GRED</th>
                <th>PUSAT TANGGUNGJAWAB</th>
                <th>STATUS KEHADIRAN</th>
                <th>CATATAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kehadiran as $index =>$k)
                <tr>

                    {{-- <td>{{ $loop->iteration }}.</td> --}}
                    <td>{{$index+1}}</td>
                    {{-- <td>{{ ($k->kursus->bidang->nama_Bidang_Kursus ?? '-') }}</td> --}}
                    <td>{{ $k->kursus->bidang->nama_Bidang_Kursus}}</td>
                    <td>{{ ($k->kursus->kategori_kursus->nama_Kategori_Kursus ?? '-') }}</td>
                    <td>{{ ($k->kod_kursus ?? '-') }}</td>
                    <td>{{($k->kursus->kursus_nama  ?? '-') }}</td>
                    <td>{{date('d/m/Y', strtotime(($k->kursus->tarikh_mula?? '-'))) }}</td>
                    <td>{{($k->kursus->tempat->nama_Agensi?? '-') }} </td>
                    <td>{{($k->kursus->pengendali->nama_Agensi?? '-') }} </td>
                    <td>{{ ($k->staff->no_KP ?? '-') }}</td>
                    <td>{{ ($k->staff->name ?? '-') }}</td>
                    <td> {{($k['user']->staf->Gred?? '-') }} </td>
                    <td>{{$k['user']->staf->NamaPT}}</td>
                    <td>{{ $k->status_kehadiran_ke_kursus }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
