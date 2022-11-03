<head>
    <title>Laporan Kemajuan Latihan Mengikut Kategori</title>

    <style type="text/css">
        *{
                line-height: 1.5;
                margin: 20px;

         }

         .a,h4,td{
             text-align: center;
         }

        p,b{
            font: 10pt "Times New Roman";
         }



        table, td, th {
        border: 1px solid;
        font: 7pt;
        padding: 5px;
        border-collapse: collapse;

        }
        </style>

</head>
<h4> Laporan Kemajuan Latihan mengikut Kategori Kursus</h4>

<div class="table-responsive scrollbar ">
                    <table width=100%>
                        <thead class="risda-bg-g">
                            <tr>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">KATEGORI KURSUS</th>
                                <th colspan="3">BILANGAN KURSUS</th>
                                <th colspan="7">KEHADIRAN</th>
                                <th colspan="4">PERBELANJAAN</th>
                            </tr>
                            <tr>
                                <th>MATLAMAT</th>
                                <th>PENCAPAIAN</th>
                                <th>PERATUS</th>
                                <th>MATLAMAT</th>
                                <th>MATLAMAT <br>PANGGILAN PESERTA</th>
                                <th>KEHADIRAN PESERTA</th>
                                <th>LELAKI</th>
                                <th>PEREMPUAN</th>
                                <th>JUMLAH</th>
                                <th>PERATUS</th>
                                <th>MATLAMAT</th>
                                <th>PENCAPAIAN</th>
                                <th>PERATUS</th>
                                <th>BAKI PERUNTUKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori_kursus as $k)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $k->id }}</td> --}}
                                <td>{{ $k->nama_Kategori_Kursus }}</td>

                                {{-- Bilangan Kursus --}}
                                @if ($k->matlamat_kursus==null)
                                <td>0</td>
                                @else
                                <td> <?php $tot_kursus=array($k->matlamat_kursus->jan,$k->matlamat_kursus->feb,$k->matlamat_kursus->mac,$k->matlamat_kursus->apr,$k->matlamat_kursus->mei,$k->matlamat_kursus->jun,$k->matlamat_kursus->jul,$k->matlamat_kursus->ogos,$k->matlamat_kursus->sept,$k->matlamat_kursus->okt,$k->matlamat_kursus->nov,$k->matlamat_kursus->dis);
                                    echo array_sum($tot_kursus);?> </td>
                                @endif
                                <td>{{$k['pencapaian']}}</td>

                                @if ($k->matlamat_kursus==null)
                                <td>0</td>
                                @else
                                <td> <?php $tot_kursus=array($k->matlamat_kursus->jan,$k->matlamat_kursus->feb,$k->matlamat_kursus->mac,$k->matlamat_kursus->apr,$k->matlamat_kursus->mei,$k->matlamat_kursus->jun,$k->matlamat_kursus->jul,$k->matlamat_kursus->ogos,$k->matlamat_kursus->sept,$k->matlamat_kursus->okt,$k->matlamat_kursus->nov,$k->matlamat_kursus->dis);

                                echo(round(($k['pencapaian'])/(array_sum($tot_kursus))*100));?> %</td>
                                @endif

                                {{--// Kehadiran peserta
                                //matlamat kehadiran --}}
                                @if ($k->matlamat_peserta==null)
                                    <td>0</td>
                                @else
                                <td><?php $tot_kehadiran=array($k->matlamat_peserta->jan,$k->matlamat_peserta->feb,$k->matlamat_peserta->mac,$k->matlamat_peserta->apr,$k->matlamat_peserta->mei,$k->matlamat_peserta->jun,$k->matlamat_peserta->jul,$k->matlamat_peserta->ogos,$k->matlamat_peserta->sept,$k->matlamat_peserta->okt,$k->matlamat_peserta->nov,$k->matlamat_peserta->dis);
                                    echo array_sum($tot_kehadiran);?>
                                </td>
                                @endif
                                {{-- //matlamat panggilan peserta --}}
                                @if ($k->matlamat_panggilan_peserta==null)
                                    <td>0</td>
                                @else
                                <td><?php $tot_panggilan=array($k->matlamat_panggilan_peserta->jan,$k->matlamat_panggilan_peserta->feb,$k->matlamat_panggilan_peserta->mac,$k->matlamat_panggilan_peserta->apr,$k->matlamat_panggilan_peserta->mei,$k->matlamat_panggilan_peserta->jun,$k->matlamat_panggilan_peserta->jul,$k->matlamat_panggilan_peserta->ogos,$k->matlamat_panggilan_peserta->sept,$k->matlamat_panggilan_peserta->okt,$k->matlamat_panggilan_peserta->nov,$k->matlamat_panggilan_peserta->dis);
                                    echo array_sum($tot_panggilan);?>
                                </td>
                                @endif

                                {{-- //Kehadiran Peserta --}}
                                <td>{{$t_kehadiran}}</td>
                                 <td></td>
                                <td></td>
                                <td></td>
                                <td></td>


                                {{-- Penbelanjaan --}}
                                @if ($k->matlamat_perbelanjaan==null)
                                    <td>0</td>
                                @else
                                    <td><?php $tot_perbelanjaan=array($k->matlamat_perbelanjaan->jan,$k->matlamat_perbelanjaan->feb,$k->matlamat_perbelanjaan->mac,$k->matlamat_perbelanjaan->apr,$k->matlamat_perbelanjaan->mei,$k->matlamat_perbelanjaan->jun,$k->matlamat_perbelanjaan->jul,$k->matlamat_perbelanjaan->ogos,$k->matlamat_perbelanjaan->sept,$k->matlamat_perbelanjaan->okt,$k->matlamat_perbelanjaan->nov,$k->matlamat_perbelanjaan->dis);
                                        echo array_sum($tot_perbelanjaan);?>
                                    </td>
                                @endif

                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
