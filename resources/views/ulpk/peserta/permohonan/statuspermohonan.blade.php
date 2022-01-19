@extends('layouts.risda-base')
@section('content')

    <style>
        table.table-permohonan>thead>tr {
            border-color: rgb(31, 66, 38);
        }

        table.table-permohonan>tbody>tr {
            border-color: rgb(31, 66, 38);
            vertical-align: middle;
        }

    </style>

    <div class="container">
        <div class="row mt-3 mb-5">
            <div class="col-12 mb-3">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53); letter-spacing: 5px;">PERMOHONAN KURSUS</p>
                <p class="h5" style="color: rgb(43,93,53)">STATUS PERMOHONAN</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center" id="pill-myTab" role="tablist"
                    style="border-bottom:1px solid rgb(146,200,162);">
                    <li class="nav-item"><a class="nav-link active" id="pill-home-tab" data-bs-toggle="tab"
                            href="#pill-tab-home" role="tab" aria-controls="pill-tab-home" aria-selected="true">SENARAI
                            PERMOHONAN</a></li>
                    <li class="nav-item"><a class="nav-link" id="pill-profile-tab" data-bs-toggle="tab"
                            href="#pill-tab-profile" role="tab" aria-controls="pill-tab-profile"
                            aria-selected="false">SEJARAH
                            PERMOHONAN</a></li>
                </ul>
                <div class="tab-content mt-3" id="pill-myTabContent">
                    <div class="tab-pane fade show active" id="pill-tab-home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-12">
                                <p class="h3 mt-3">Senarai Permohonan</p>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive scrollbar text-center">
                                            <table class="table table-permohonan">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold text-dark" scope="col">BIL.</th>
                                                        <th class="fw-bold text-dark" scope="col">KOD KURSUS</th>
                                                        <th class="fw-bold text-dark" scope="col">NAMA KURSUS</th>
                                                        <th class="fw-bold text-dark" scope="col">TARIKH KURSUS</th>
                                                        <th class="fw-bold text-dark" scope="col">STATUS</th>
                                                        <th class="fw-bold text-dark" scope="col">TINDAKAN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permohonan as $p)
                                                        <tr style="text-center">
                                                            <td>{{ $loop->iteration }}.</td>
                                                            <td>{{ $p->kod_kursus }}</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>{{ $p->status_permohonan }}
                                                            </td>
                                                            <td class="text-end" style="width:210px;">
                                                                <div class="d-grid gap-2">
                                                                    <a class="btn btn-primary btn-sm" href="#">
                                                                        Cetak Surat Tawaran
                                                                    </a>
                                                                    <a class="btn btn-primary btn-sm"
                                                                        href="/ulpk/permohonan/kehadiran/{{ $p->kod_kursus }}">Kehadiran</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pill-tab-profile" role="tabpanel" aria-labelledby="profile-tab">Food
                        truck
                        fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore
                        velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
                        beer
                        twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                        vinyl
                        cillum PBR. Homo nostrud organic. </div>
                </div>

            </div>
        </div>

    </div>


@endsection
