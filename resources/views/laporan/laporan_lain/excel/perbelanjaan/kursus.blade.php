<div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable"
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g">
                            <tr>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">BIDANG</th>
                                {{-- <th rowspan="2">BIL.</th> --}}
                                {{-- <th rowspan="2">KURSUS</th> --}}
                                {{-- <th rowspan="2">BIL.</th> --}}
                                <th rowspan="2">TAJUK KURSUS</th>
                                <th colspan="3">BILANGAN PESERTA</th>
                                <th rowspan="2">NO LOT.</th>
                                <th rowspan="2">PERUNTUKAN (RM)</th>
                                <th colspan="11">PERBELANJAAN (RM)</th>
                                <th rowspan="2">JUMLAH (RM)</th>
                                <th rowspan="2">TANGGUNGAN (RM)</th>
                                <th rowspan="2">BAKI (RM)</th>
                            </tr>
                            <tr>
                                <th>LELAKI</th>
                                <th>PEREMPUAN</th>
                                <th>JUMLAH</th>
                                <th>ELAUN MAKAN</th>
                                <th>MAKAN/MINUM</th>
                                <th>ELAUN PENCERAMAH</th>
                                <th>ALATAN INPUT</th>
                                <th>NOTA ALAT TULIS</th>
                                <th>DOBI</th>
                                <th>PENYELENGGARAAN DALAMAN</th>
                                <th>SEWA KENDERAAN</th>
                                <th>BAYARAN KONSULTAN</th>
                                <th>PENGINAPAN</th>
                                <th>INSURANS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perbelanjaanKursus as $pk)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pk->jadual_kursus->bidang->nama_Bidang_Kursus}}</td>
                                <td>{{$pk->jadual_kursus->kursus_nama}}</td>
                                <td></td>
                                <td></td>
                                <td>{{$j_kehadiran}}</td>
                                <td></td>
                                <td>RM {{$pk->Jum_LO}}</td>
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
