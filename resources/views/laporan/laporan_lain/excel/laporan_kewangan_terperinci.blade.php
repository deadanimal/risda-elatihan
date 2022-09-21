 <div class="card-body">
                <div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable "
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g" style="vertical-align: middle">

                            <tr>
                                <th>BIL</th>
                                <th>BIDANG KURSUS</th>
                                {{-- <th>BIL</th> --}}
                                <th>NAMA KURSUS</th>
                                <th>TARIKH KURSUS</th>
                                <th>ANJURAN</th>
                                <th>NO. FT</th>
                                <th>BIL. PESERTA HADIR</th>
                                <th>PERUNTUKAN</th>
                                <th>PERBELANJAAN</th>
                                <th>TANGGUNGAN</th>
                                <th>BAKI</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kursus as $k)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$k->bidang->nama_Bidang_Kursus}}</td>
                                <td>{{$k->kursus_nama}}</td>
                                @if ($k->bilangan_hari>1)
                                    <td class="a">{{date('d/m/Y', strtotime($k->tarikh_mula))}} - {{date('d/m/Y', strtotime($k->tarikh_tamat))}} </td>
                                @else
                                <td>{{date('d/m/Y', strtotime($k->tarikh_mula))}}</td>
                                @endif
                                <td>{{$k->pengendali->nama_Agensi}}</td>
                                <td>{{$k->kursus_no_ft}}</td>
                                <td></td>
                                <td class="a">{{($k->perbelanjaan->Jum_LO?? '-') }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
        </div>
    </div>
