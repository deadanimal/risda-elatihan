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
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERMOHONAN KURSUS</p>
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
                                            <table class="table table-permohonan datatable">
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
                                                        @if ($p->jadual == null)
                                                            @role('Peserta ULS')
                                                                @if (Auth::id() == $p->no_pekerja)
                                                                    <tr style="text-center">
                                                                        <td>{{ $loop->iteration }}.</td>
                                                                        <td>-
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-
                                                                        </td>
                                                                        <td>
                                                                            @if ($p->status_permohonan == 0)
                                                                                Belum Disemak
                                                                            @elseif($p->status_permohonan == 1)
                                                                                Belum Disemak (Sokongan)
                                                                            @elseif($p->status_permohonan == 2)
                                                                                Disokong
                                                                            @elseif($p->status_permohonan == 3)
                                                                                Tidak Disokong
                                                                            @elseif($p->status_permohonan == 4)
                                                                                Diluluskan
                                                                            @elseif($p->status_permohonan == 5)
                                                                                Tidak Lulus
                                                                            @elseif($p->status_permohonan == 6)
                                                                                Dicalonkan
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-end" style="width:210px;">
                                                                            <div class="d-grid gap-2">

                                                                                @if (($p->status_permohonan == 4)||($p->status_permohonan == 6))
                                                                                    <a class="btn btn-primary btn-sm"
                                                                                        href="/uls/permohonan/kehadiran/{{ $p->kod_kursus }}">Kehadiran</a>

                                                                                    <a class="btn btn-primary btn-sm"
                                                                                        href="/cetak_surat_tawaran/{{ $p->id }}">
                                                                                        Cetak Surat Tawaran
                                                                                    </a>
                                                                                @else
                                                                                    <button class="btn btn-secondary btn-sm"
                                                                                        href="/uls/permohonan/kehadiran/{{ $p->kod_kursus }}"
                                                                                        @disabled(true)>Kehadiran</button>

                                                                                    <button class="btn btn-secondary btn-sm"
                                                                                        href="#"
                                                                                        @disabled(true)>Cetak Surat
                                                                                        Tawaran</button>
                                                                                @endif
                                                                                <form
                                                                                    action="/permohonan_kursus/katalog_kursus/{{ $p->id }}"
                                                                                    method="post">
                                                                                    @method('DELETE')
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger btn-sm">Buang</button>
                                                                                </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                @elserole('Peserta ULPK')
                                                                @if (Auth::id() == $p->no_pekerja)
                                                                    <tr style="text-center">
                                                                        <td>{{ $loop->iteration }}.</td>
                                                                        <td>-
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-
                                                                        </td>
                                                                        <td>
                                                                            @if ($p->status_permohonan == 0)
                                                                                Belum Disemak
                                                                            @elseif($p->status_permohonan == 1)
                                                                                Belum Disemak (Sokongan)
                                                                            @elseif($p->status_permohonan == 2)
                                                                                Disokong
                                                                            @elseif($p->status_permohonan == 3)
                                                                                Tidak Disokong
                                                                            @elseif($p->status_permohonan == 4)
                                                                                Diluluskan
                                                                            @elseif($p->status_permohonan == 5)
                                                                                Tidak Lulus
                                                                            @elseif($p->status_permohonan == 6)
                                                                                Dicalonkan
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-end" style="width:210px;">
                                                                            <div class="d-grid gap-2">
                                                                                <a class="btn btn-primary btn-sm"
                                                                                    href="/cetak_surat_tawaran/{{ $p->id }}">
                                                                                    Cetak Surat Tawaran
                                                                                </a>

                                                                                <a class="btn btn-primary btn-sm"
                                                                                    href="/uls/permohonan/kehadiran/{{ $p->kod_kursus }}">Kehadiran</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @else
                                                                <tr style="text-center">
                                                                    <td>{{ $loop->iteration }}.</td>
                                                                    <td>{{ $p->jadual->kursus_kod_nama_kursus }}
                                                                    </td>
                                                                    <td>{{ $p->jadual->kursus_nama }}</td>
                                                                    <td>{{ date('d-m-Y', strtotime($p->jadual->tarikh_mula)) }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($p->status_permohonan == 0)
                                                                            Belum Disemak
                                                                        @elseif($p->status_permohonan == 1)
                                                                            Belum Disemak (Sokongan)
                                                                        @elseif($p->status_permohonan == 2)
                                                                            Disokong
                                                                        @elseif($p->status_permohonan == 3)
                                                                            Tidak Disokong
                                                                        @elseif($p->status_permohonan == 4)
                                                                            Diluluskan
                                                                        @elseif($p->status_permohonan == 5)
                                                                            Tidak Lulus
                                                                        @elseif($p->status_permohonan == 6)
                                                                            Dicalonkan
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-end" style="width:210px;">
                                                                        <div class="d-grid gap-2">
                                                                            <a class="btn btn-primary btn-sm"
                                                                                href="/cetak_surat_tawaran/{{ $p->id }}">
                                                                                Cetak Surat Tawaran
                                                                            </a>
                                                                            <a class="btn btn-primary btn-sm"
                                                                                href="/uls/permohonan/kehadiran/{{ $p->kod_kursus }}">Kehadiran</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endrole
                                                        @else
                                                            @if ($p->jadual->tarikh_tamat >= $hari_ini)
                                                                @role('Peserta ULS')
                                                                    @if (Auth::id() == $p->no_pekerja)
                                                                        <tr style="text-center">
                                                                            <td>{{ $loop->iteration }}.</td>
                                                                            <td>{{ $p->jadual->kursus_kod_nama_kursus }}
                                                                            </td>
                                                                            <td>{{ $p->jadual->kursus_nama }}</td>
                                                                            <td>{{ date('d-m-Y', strtotime($p->jadual->tarikh_mula)) }}
                                                                            </td>
                                                                            <td>
                                                                                @if ($p->status_permohonan == 0)
                                                                                    Belum Disemak
                                                                                @elseif($p->status_permohonan == 1)
                                                                                    Belum Disemak (Sokongan)
                                                                                @elseif($p->status_permohonan == 2)
                                                                                    Disokong
                                                                                @elseif($p->status_permohonan == 3)
                                                                                    Tidak Disokong
                                                                                @elseif($p->status_permohonan == 4)
                                                                                    Diluluskan
                                                                                @elseif($p->status_permohonan == 5)
                                                                                    Tidak Lulus
                                                                                @elseif($p->status_permohonan == 6)
                                                                                    Dicalonkan
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-end" style="width:210px;">
                                                                                <div class="d-grid gap-2">

                                                                                    @if (($p->status_permohonan == 4)||($p->status_permohonan == 6))

                                                                                        <a class="btn btn-primary btn-sm"
                                                                                            href="/uls/permohonan/kehadiran/{{ $p->kod_kursus }}">Kehadiran</a>

                                                                                        <a class="btn btn-primary btn-sm"
                                                                                            href="/cetak_surat_tawaran/{{ $p->id }}">
                                                                                            Cetak Surat Tawaran
                                                                                        </a>
                                                                                    @else
                                                                                        <button class="btn btn-secondary btn-sm"
                                                                                            href="/uls/permohonan/kehadiran/{{ $p->kod_kursus }}"
                                                                                            @disabled(true)>Kehadiran</button>

                                                                                        <button class="btn btn-secondary btn-sm"
                                                                                            href="#"
                                                                                            @disabled(true)>Cetak
                                                                                            Surat Tawaran</button>
                                                                                    @endif
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    @elserole('Peserta ULPK')
                                                                    @if (Auth::id() == $p->no_pekerja)
                                                                        <tr style="text-center">
                                                                            <td>{{ $loop->iteration }}.</td>
                                                                            <td>{{ $p->jadual->kursus_kod_nama_kursus }}
                                                                            </td>
                                                                            <td>{{ $p->jadual->kursus_nama }}</td>
                                                                            <td>{{ date('d-m-Y', strtotime($p->jadual->tarikh_mula)) }}
                                                                            </td>
                                                                            <td>
                                                                                @if ($p->status_permohonan == 0)
                                                                                    Belum Disemak
                                                                                @elseif($p->status_permohonan == 1)
                                                                                    Belum Disemak (Sokongan)
                                                                                @elseif($p->status_permohonan == 2)
                                                                                    Disokong
                                                                                @elseif($p->status_permohonan == 3)
                                                                                    Tidak Disokong
                                                                                @elseif($p->status_permohonan == 4)
                                                                                    Diluluskan
                                                                                @elseif($p->status_permohonan == 5)
                                                                                    Tidak Lulus
                                                                                @elseif($p->status_permohonan == 6)
                                                                                    Dicalonkan
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-end" style="width:210px;">
                                                                                <div class="d-grid gap-2">
                                                                                    <a class="btn btn-primary btn-sm"
                                                                                        href="/cetak_surat_tawaran/{{ $p->id }}">
                                                                                        Cetak Surat Tawaran
                                                                                    </a>
                                                                                    <a class="btn btn-primary btn-sm"
                                                                                        href="/uls/permohonan/kehadiran/{{ $p->kod_kursus }}">Kehadiran</a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @else
                                                                    <tr style="text-center">
                                                                        <td>{{ $loop->iteration }}.</td>
                                                                        <td>{{ $p->jadual->kursus_kod_nama_kursus }}
                                                                        </td>
                                                                        <td>{{ $p->jadual->kursus_nama }}</td>
                                                                        <td>{{ date('d-m-Y', strtotime($p->jadual->tarikh_mula)) }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($p->status_permohonan == 0)
                                                                                Belum Disemak
                                                                            @elseif($p->status_permohonan == 1)
                                                                                Belum Disemak (Sokongan)
                                                                            @elseif($p->status_permohonan == 2)
                                                                                Disokong
                                                                            @elseif($p->status_permohonan == 3)
                                                                                Tidak Disokong
                                                                            @elseif($p->status_permohonan == 4)
                                                                                Diluluskan
                                                                            @elseif($p->status_permohonan == 5)
                                                                                Tidak Lulus
                                                                            @elseif($p->status_permohonan == 6)
                                                                                Dicalonkan
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-end" style="width:210px;">
                                                                            <div class="d-grid gap-2">
                                                                                <a class="btn btn-primary btn-sm"
                                                                                    href="/cetak_surat_tawaran/{{ $p->id }}">
                                                                                    Cetak Surat Tawaran
                                                                                </a>
                                                                                <a class="btn btn-primary btn-sm"
                                                                                    href="/uls/permohonan/kehadiran/{{ $p->kod_kursus }}">Kehadiran</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endrole
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pill-tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-12">
                                <p class="h3 mt-3">Sejarah Permohonan</p>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive scrollbar text-center">
                                            <table class="table table-permohonan datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold text-dark" scope="col">BIL.</th>
                                                        <th class="fw-bold text-dark" scope="col">KOD KURSUS</th>
                                                        <th class="fw-bold text-dark" scope="col">NAMA KURSUS</th>
                                                        <th class="fw-bold text-dark" scope="col">TARIKH KURSUS</th>
                                                        <th class="fw-bold text-dark" scope="col">STATUS KEHADIRAN</th>
                                                        <th class="fw-bold text-dark" scope="col">TINDAKAN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($permohonan as $p)
                                                        @if ($p->jadual == null)
                                                            <tr style="text-center">
                                                                <td>{{ $loop->iteration }}.</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-
                                                                </td>
                                                                <td>{{ $p->status_kehadiran }}</td>
                                                                <td class="text-end" style="width:210px !important">
                                                                    <div class="d-grid gap-2">
                                                                        <a class="btn btn-primary btn-sm"
                                                                            href="/cetak_surat_tawaran/{{ $p->id }}">
                                                                            Cetak Surat Tawaran
                                                                        </a>
                                                                    </div>
                                                                    <form
                                                                        action="/permohonan_kursus/katalog_kursus/{{ $p->id }}"
                                                                        method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm">Buang</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @else
                                                            @if ($p->jadual->tarikh_mula < $hari_ini)
                                                                <tr style="text-center">
                                                                    <td>{{ $loop->iteration }}.</td>
                                                                    <td>{{ $p->jadual->kursus_kod_nama_kursus }}</td>
                                                                    <td>{{ $p->jadual->kursus_nama }}</td>
                                                                    <td>{{ date('d-m-Y', strtotime($p->jadual->tarikh_mula)) }}
                                                                    </td>
                                                                    <td>{{ $p->status_kehadiran }}</td>
                                                                    <td class="text-end"
                                                                        style="width:210px !important">
                                                                        <div class="d-grid gap-2">
                                                                            <a class="btn btn-primary btn-sm"
                                                                                href="/cetak_surat_tawaran/{{ $p->id }}">
                                                                                Cetak Surat Tawaran
                                                                            </a>


                                                                            @if ($p->dinilai == null && $p->dinilai_pre == null && $p->dinilai_post == null)
                                                                                <button class="btn btn-secondary btn-sm"
                                                                                    @disabled(true)>
                                                                                    Cetak Sijil Kursus
                                                                                </button>

                                                                             @elseif ($p->dinilai == !null && $p->dinilai_pre == null && $p->dinilai_post == null)
                                                                                <button class="btn btn-secondary btn-sm"
                                                                                    @disabled(true)>
                                                                                    Cetak Sijil Kursus
                                                                                </button>

                                                                            @elseif ($p->dinilai == !null && $p->dinilai_pre == !null && $p->dinilai_post == null)
                                                                                <button class="btn btn-secondary btn-sm"
                                                                                    @disabled(true)>
                                                                                    Cetak Sijil Kursus
                                                                                </button>

                                                                            @elseif ($p->dinilai == null && $p->dinilai_pre == !null && $p->dinilai_post == !null)
                                                                                <button class="btn btn-secondary btn-sm"
                                                                                    @disabled(true)>
                                                                                    Cetak Sijil Kursus
                                                                                </button>

                                                                            @elseif ($p->dinilai == null && $p->dinilai_pre == !null && $p->dinilai_post == null)
                                                                                <button class="btn btn-secondary btn-sm"
                                                                                    @disabled(true)>
                                                                                    Cetak Sijil Kursus
                                                                                </button>

                                                                            @elseif ($p->dinilai == null && $p->dinilai_pre == !null && $p->dinilai_post == !null)
                                                                                <button class="btn btn-secondary btn-sm"
                                                                                    @disabled(true)>
                                                                                    Cetak Sijil Kursus
                                                                                </button>

                                                                             @elseif ($p->dinilai == !null && $p->dinilai_pre == !null && $p->dinilai_post == null)
                                                                                <button class="btn btn-secondary btn-sm"
                                                                                    @disabled(true)>
                                                                                    Cetak Sijil Kursus
                                                                                </button>

                                                                            @elseif ($p->dinilai == !null && $p->dinilai_pre == null && $p->dinilai_post == !null)
                                                                                <button class="btn btn-secondary btn-sm"
                                                                                    @disabled(true)>
                                                                                    Cetak Sijil Kursus
                                                                                </button>

                                                                            @else
                                                                                <a class="btn btn-primary btn-sm"
                                                                                    href="/cetak_sijilkursus/{{ $p->id }}">
                                                                                    Cetak Sijil Kursus
                                                                                </a>
                                                                            @endif

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
