
    <hr style="color: rgba(81,179,90, 60%);height:2px;">

    <div class="card mt-5 ">
        <div class="card-header">
            <div class="row justify-content-end">
                <div class="col-xl-2">
                    <select class="form-select risda-bg-g text-white" onchange="download(this)">
                        <option selected disabled hidden>Cetak</option>
                        <option value="Excel">Excel</option>
                        <option value="Pdf">PDF</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th rowspan="3">BIL.</th>
                            <th rowspan="3">NAMA </th>
                            <th colspan="{{$j_sesi}}">KEHADIRAN PESERTA</th>
                            {{-- <th colspan="{{$j_hari}}" > KEHADIRAN </td> --}}
                            <th rowspan="3">JUMLAH</th>
                            <th rowspan="3">PERATUSAN KEHADIRAN</th>
                        </tr>

                        <tr>
                        @foreach ($kursus->aturcara as $ka)

                                <th>HARI {{$ka->ac_hari}}</th>
                        @endforeach

                        </tr>
                        <tr>
                        @foreach ($kursus->aturcara as $ka)

                            <th>SESI {{$ka->ac_sesi}}</th>
                        @endforeach

                        </tr>



                            {{-- <th colspan="2">HARI 1</th>
                            <th colspan="2">HARI 2</th>
                            <th colspan="3">HARI 3</th> --}}
                        {{-- <tr>
                            <th>SESI 1 </th>
                            <th>SESI 2 </th>

                            <th>SESI 1 </th>
                            <th>SESI 2 </th>

                            <th>SESI 1 </th>
                            <th>SESI 2 </th>
                            <th>SESI 3</th>
                        </tr> --}}

                    </thead>
                    <tbody>
                        @foreach($kehadiran as $kk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$kk->staff->name}}</td>

                            @foreach ($kursus->aturcara as $ka)
                            @if ($kk->sesi == $ka->ac_sesi)
                                <td> 1 </td>
                            @else
                                <td>0</td>

                            @endif
                            @endforeach
                            {{-- <td>{{$kursus->aturcara->ac_sesi}}</td> --}}
                            <td></td>
                            <td></td>

                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">JUMLAH KEHADIRAN PESERTA</td>
                            <td colspan="{{$j_sesi}}">{{$tot_k}}</td>

                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td colspan="2">JUMLAH KESELURUHAN PESERTA</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

