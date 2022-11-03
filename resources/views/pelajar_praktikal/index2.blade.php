@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PELAJAR PRAKTIKAL<span class="text-danger">*</span></p>
                {{-- <p class="h5" style="color: rgb(43,93,53); ">PENCALONAN<span class="text-danger">*</span></p> --}}
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h5 fw-bold mt-3">
                    SENARAI PELAJAR PRAKTIKAL
                <span class="text-danger">*</span></p>
            </div>
        </div>

        <div class="row mt-3 ">
            <div class="col-12 col-lg-12">
                <div class="card ">
                    <div class="card-body mx-lg-5">
                        <div class="row p-3">
                            <div class="col-lg-6">
                                <p class="h5">Tahun<span class="text-danger">*</span></p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled value="2021">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Status<span class="text-danger">*</span></p>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-select form-control mb-2" onchange="filter()" id="status_s" >
                                    <option value="" hidden selected>Sila Pilih</option>
                                    <option value="1">Sedang Praktikal</option>
                                    <option value="2">Telah Tamat Praktikal</option>
                                    <option value="3">Berhenti Separuh Jalan</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Tempat Latihan Praktikal<span class="text-danger">*</span></p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" onchange="filter()" id="tempat_latihan_s">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Tahap Pengajian<span class="text-danger">*</span></p>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-select form-control mb-2" name="tahap_pengajian" onchange="filter()" id="tahap_pengajian_s">
                                    <option value="" hidden selected>Sila Pilih</option>
                                    <option value="1">Sijil</option>
                                    <option value="2">Diploma</option>
                                    <option value="3">Ijazah Sarjana Muda</option>
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <p class="h5">Nama<span class="text-danger">*</span></p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" onchange="filter()" id="nama_s">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <a href="/us-uls/PelajarPraktikal/create" class="btn btn-primary">
                    <i class="fas fa-plus"></i> TAMBAH PELAJAR
                </a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="table-responsive scrollbar m-4">
                <table class="table datatable table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">BIL.</th>
                            <th scope="col">NO KAD PENGENALAN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">TEMPAT LATIHAN PRAKTIKAL</th>
                            <th scope="col">TARIKH MULA <br> PRAKTIKAL</th>
                            <th scope="col">JUMLAH BAYARAN <br>ELAUN (RM)</th>
                            <th scope="col">STATUS<br> PRAKTIKAL</th>
                            <th scope="col">STATUS</th>
                            <th class="text-end" scope="col">TINDAKAN</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelajar as $pelajar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pelajar->no_kp }}</td>
                                <td>{{ $pelajar->nama }}</td>
                                <td>{{ $pelajar->tempat_praktikal }}</td>
                                <td>{{date('d-m-Y', strtotime($pelajar->tarikh_mula ))}} <br>-<br> {{date('d-m-Y', strtotime($pelajar->tarikh_akhir ))}}</td>
                                <td>{{ $pelajar->kelulusan_awal_pembiayaan}}</td>

                                    @if ($pelajar->status_praktikal=="1")
                                        <td> Sedang Praktikal</td>
                                    @elseif ($pelajar->status_praktikal=="2")
                                        <td> Telah Tamat Praktikal</td>
                                    @elseif ($pelajar->status_praktikal=="3")
                                        <td>Berhenti Separuh Jalan</td>

                                    @endif

                                @if ($pelajar->status==null)
                                <td> Tidak Aktif</td>


                                @else
                                    <td> Aktif</td>


                                @endif

                                <td class=" text-end">
                                    <a href="/us-uls/PelajarPraktikal/{{$pelajar->id }}/edit"
                                        class="btn btn-primary btn-sm">
                                        <small>KEMASKINI</small>
                                    </a>
                                        <br>
                                    <a href="/us-uls/PelajarPraktikal/{{$pelajar->id }}"
                                            class="btn btn-primary btn-sm">
                                            <small>MAKLUMAT ELAUN</small></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            function filter() {
                var status = $('#status_s').val();
                var tempat_latihan = $('#tempat_latihan_s').val();
                var tahap_pengajian = $('#tahap_pengajian_s').val();
                var nama = $('#nama_s').val();

                console.log(status, tempat_latihan, tahap_pengajian, nama);
                $.ajax({
                    type: 'get',
                    url: '/us-uls/PelajarPraktikal/filter',
                    data: {
                        'status': status_s,
                        'tempat_latihan': tempat_latihan_s,
                        'tahap_pengajian': tahap_pengajian_s,
                        'nama': nama_s
                    },
                    success: function(result) {
                        console.log(result);
                        $('.datatable').dataTable().fnClearTable();
                        $('.datatable').dataTable().fnDestroy();
                        $("#t_normal").html("");
                        let iteration = 1;
                        result.forEach(e => {
                            $("#t_normal").append(`
                            <tr>
                                        <td>` + iteration + `.</td>
                                        <td>${ e.Dun_kod }</td>
                                        <td>${ e.Dun }</td>
                                        <td>` +
                            (e.status_dun == '1' ?
                                '<span class="badge badge-soft-success">Aktif</span>' :
                                '<span class="badge badge-soft-danger">Tidak Aktif</span>') +
                            `</td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_dun_${ e.id }">
                                                <i class="fas fa-pen"></i>
                                            </button>

                                            <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_dun_${ e.id }">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                            `);

                            iteration++;
                        });
                        // console.log(result);
                        $('.datatable').dataTable();
                    },
                    error: function() {
                        console.log('error');
                    },
                });
            }
        </script>
    </div>


@endsection
