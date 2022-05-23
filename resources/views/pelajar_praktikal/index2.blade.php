@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PELAJAR PRAKTIKAL</p>
                {{-- <p class="h5" style="color: rgb(43,93,53); ">PENCALONAN</p> --}}
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h5 fw-bold mt-3">
                    SENARAI PELAJAR PRAKTIKAL
                </p>
            </div>
        </div>

        <div class="row mt-3 ">
            <div class="col-12 col-lg-12">
                <div class="card ">
                    <div class="card-body mx-lg-5">
                        <div class="row p-3">
                            <div class="col-lg-6">
                                <p class="h5">Tahun</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled value="2021">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Status</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Tempat Latihan Praktikal</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Tahap Pengajian</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2">
                            </div>

                            <div class="col-lg-6">
                                <p class="h5">Nama</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2">
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

    </div>
@endsection
