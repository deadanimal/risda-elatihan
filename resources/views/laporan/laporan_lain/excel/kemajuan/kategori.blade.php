          <div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable"
                        style="vertical-align: middle;border-color: #00B64E;">
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
                                <th>PANGGILAN PESERTA</th>
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

                                    {{--Kehadiran peserta --}}
                                    @if ($k->matlamat_peserta==null)
                                        <td>0</td>
                                    @else
                                    <td><?php $tot_kehadiran=array($k->matlamat_peserta->jan,$k->matlamat_peserta->feb,$k->matlamat_peserta->mac,$k->matlamat_peserta->apr,$k->matlamat_peserta->mei,$k->matlamat_peserta->jun,$k->matlamat_peserta->jul,$k->matlamat_peserta->ogos,$k->matlamat_peserta->sept,$k->matlamat_peserta->okt,$k->matlamat_peserta->nov,$k->matlamat_peserta->dis);
                                        echo array_sum($tot_kehadiran);?>
                                    </td>
                                    @endif
                                    <td></td>
                                    <td></td>
                                     <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    {{-- @foreach ($k->kursus as $ku)
                                    <td>{{$ku['peruntukan_calon']}}</td>
                                    <td>{{$ku['kehadiran']}}</td>
                                    <td>
                                    @endforeach --}}

                                    {{-- Pernbelanjaan --}}
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
