<head>
    <title> Laporan Ringkasan Penceramah Kursus</title>
</head>

<style>

    *{
            line-height: 1.5;
            /* margin: 10px; */
            margin-right: 20px;
            margin-left: 20px;
            margin-top: 10px;
     }

     h4{
         text-align: center;
     }

     p,b{
        font: 11pt "Times New Roman";

     }

     .table-clear{
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0px;
        padding-right: 5px;
    }

    table, td, th {
    border: 1px solid;
    font: 10pt "Times New Roman";

    /* text-align: center; */
    padding: 8px;
    border-collapse: collapse;

    }
    </style>


<h4> Laporan Ringkasan Penceramah Kursus </h4>
<table  style="vertical-align: middle;border-color: #00B64E;">
    <thead class="risda-bg-g">

        <tr>
            <th>TAHUN</th>
            <th>BIL.</th>
            <th>PENCERAMAH KURSUS</th>
            <th>KOD NAMA KURSUS</th>
            <th>NAMA KURSUS</th>
            <th>TARIKH KURSUS</th>
            <th>TEMPAT KURSUS</th>
            <th>BAYARAN PENCERAMAH <br>(RM)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penceramah as $p)
            @foreach ($p->penceramahKonsultan as $pk)
                <tr>
                   <td>{{date('Y', strtotime(($pk->jadual_kursus->tarikh_mula?? '-'))) }}</td>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $p->nama_Agensi }}</td>
                    <td>{{ ($pk->jadual_kursus->kursus_kod_nama_kursus ?? '-')  }}</td>
                    <td>{{ ($pk->jadual_kursus->kursus_nama ?? '-') }}</td>
                    <td>{{date('d/m/Y', strtotime(($pk->jadual_kursus->tarikh_mula?? '-'))) }}</td>
                    {{-- <td>{{date('d/m/Y', strtotime(($pk->jadual_kursus->tarikh_mula?? '-'))) }}</td> --}}
                    <td>{{ $pk->jadual_kursus->tempat->nama_Agensi }}</td>
                    <td>-</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
