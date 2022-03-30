@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    CETAK KOD QR
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-3 d-flex align-items-center">
                        <p class="h5 p-0 m-0 risda-dg">TAHUN</p>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-select tahun" autocomplete="off">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3 d-flex align-items-center">
                        <p class="h5 p-0 m-0 risda-dg">UNIT LATIHAN</p>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" value="STAF" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="table-responsive scrollbar ">
                    <table class="table datatable text-center">
                        <thead>
                            <tr>
                                <th class="fw-bold text-dark" scope="col">BIL.</th>
                                <th class="fw-bold text-dark" scope="col">KOD NAMA KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">NAMA KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">TARIKH KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">TEMPAT KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permohonan as $p)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $p->jadualKursus->kursus_kod_nama_kursus }}
                                    </td>
                                    <td>
                                        {{ $p->jadualKursus->kursus_nama }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($p->jadualKursus->tarikh_mula)) }}
                                    </td>
                                    <td>
                                        {{ $p->jadualKursus->kursus_tempat }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm mb-2"
                                            href="/penilaian/cetakQr2/{{ $p->jadualKursus->id }}">
                                            <p class="m-0"> Cetak Kod QR</p>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
