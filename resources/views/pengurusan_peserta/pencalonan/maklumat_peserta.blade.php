@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PESERTA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENCALONAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h5 fw-bold mt-3">
                    MAKLUMAT PERIBADI
                </p>
            </div>
        </div>

        <div class="row mt-3 ">
            <div class="col-12 col-lg-12">
                <div class="card ">
                    <div class="card-body mx-lg-5">
                        <div class="row p-3">
                            <div class="col-lg-6">
                                <p class="h5">Nama</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled value="{{ $peserta['nama'] }}">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">No. Pekerja</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $peserta['nopekerja'] }}">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">No. Kad Pengenalan Lama</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $peserta['nokp'] }}">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">No. Kad Pengenalan Baru</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $peserta['nokp'] }}">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Pusat Tanggungjawab</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $peserta['NamaPT'] }}">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Gred</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $peserta['Gred'] }}">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Tarikh Mula</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $jadual->tarikh_mula }}">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Tarikh Tamat</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $jadual->tarikh_tamat }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="table-responsive scrollbar m-4">
                <table class="table datatable table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">BIL.</th>
                            <th scope="col">KOD NAMA KURSUS</th>
                            <th scope="col">NAMA KURSUS</th>
                            <th scope="col">ANJURAN</th>
                            <th scope="col">TARIKH MULA KURSUS</th>
                            <th scope="col">TARIKH AKHIR KURSUS</th>
                            <th scope="col">STATUS KEHADIRAN</th>
                            <th scope="col">CATATAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sejarah_permohonan as $key => $p)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $p->jadualKursus->kursus_kod_nama_kursus }}</td>
                                <td>{{ $p->jadualKursus->kursus_nama }}</td>
                                <td> </td>
                                <td>{{ $p->jadualKursus->tarikh_mula }}</td>
                                <td>{{ $p->jadualKursus->tarikh_tamat }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#status-kehadiran-{{ $p->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                                <td>{{ $p->jadualKursus->kursus_catatan }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="status-kehadiran-{{ $p->id }}" tabindex="-1"
            role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content position-relative">
                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                        <button
                            class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                            <h4 class="mb-1" id="modalExampleDemoLabel">Status Kehadiran
                            </h4>
                        </div>
                        <div class="p-2">
                            <div class="table-responsive scrollbar m-2">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">BIL.</th>
                                            <th scope="col">TARIKH</th>
                                            <th scope="col">HARI</th>
                                            <th scope="col">SESI</th>
                                            <th scope="col">STATUS KEHADIRAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sejarah_permohonan as $abc)
                                            @foreach ($abc->kehadiran as $lol => $spk)
                                                <tr>
                                                    <td>{{ $lol + 1 }}.</td>
                                                    <td>{{ date('d/m/Y', strtotime($spk->tarikh)) }}</td>
                                                    <td>{{$hari[$spk->aturcara->ac_hari]}}</td>
                                                    <td>{{ $spk->sesi }}</td>
                                                    <td>{{ $spk->status_kehadiran }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row  mt-3">
            <div class="col">
                <a href="/pengurusan_peserta/pencalonan/{{$jadual->id}}" class="btn btn-primary">Kembali</a>
            </div>
        </div>

    </div>
@endsection
