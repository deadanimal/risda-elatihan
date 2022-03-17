@extends('layouts.risda-base')
@section('content')
    @php
    use App\Models\Agensi;
    @endphp
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERMOHONAN KURSUS</p>
                <p class="h5" style="color: rgb(43,93,53); ">KATALOG KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <p class="fw-bold text-center risda-dg mb-2">KOD KURSUS</p>
                                <p class="h4 fw-bold text-center risda-g">{{ $jadual->kursus_kod_nama_kursus }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <p class="fw-bold text-center risda-dg mb-2">NAMA KURSUS</p>
                                <p class="h4 fw-bold text-center risda-g">{{ $jadual->kursus_nama }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body risda-bg-g text-white text-center">
                        <p class="card-text my-0 p-0">TARIKH KURSUS</p>
                        <h5 class="card-title text-white my-0 p-0">{{ date('d/m/Y', strtotime($jadual->tarikh_mula)) }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body risda-bg-g text-white text-center">
                        <p class="card-text my-0 p-0">TEMPOH KURSUS</p>
                        <h5 class="card-title text-white my-0 p-0">{{ $jadual->bilangan_hari }} HARI</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body risda-bg-g text-white text-center">
                        <p class="card-text my-0 p-0">TEMPAT KURSUS</p>
                        <h5 class="card-title text-white my-0 p-0">
                            @php
                                $tempat = Agensi::find($jadual->kursus_tempat);
                                $tempat_kursus = $tempat->nama_Agensi;
                            @endphp
                            {{ $tempat_kursus }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body risda-bg-g text-white text-center">
                        <p class="card-text my-0 p-0">MASA PENDAFTARAN</p>
                        <h5 class="card-title text-white my-0 p-0">{{ $jadual->kursus_masa_pendaftaran }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body risda-bg-g text-white text-center">
                        <p class="card-text my-0 p-0">TARIKH BUKA PERMOHONAN</p>
                        <h5 class="card-title text-white my-0 p-0">
                            {{ date('d/m/Y', strtotime($jadual->kursus_tarikh_daftar)) }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body risda-bg-g text-white text-center">
                        <p class="card-text my-0 p-0">TARIKH TUTUP PERMOHONAN</p>
                        <h5 class="card-title text-white my-0 p-0">
                            {{ date('d/m/Y', strtotime($jadual->kursus_tarikh_tutup)) }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body risda-bg-g text-white text-center">
                        <p class="card-text my-0 p-0">KUMPULAN SASARAN</p>
                        <h5 class="card-title text-white my-0 p-0">{{ $jadual->kursus_kumpulan_sasaran }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-body risda-bg-g text-white text-center">
                        <p class="card-text my-0 p-0">ANJURAN</p>
                        <h5 class="card-title text-white my-0 p-0"> </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-lg-10">
                <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pill-home-tab" data-bs-toggle="tab" href="#OBJEKTIF" role="tab"
                            aria-controls="OBJEKTIF" aria-selected="true">
                            OBJEKTIF
                        </a>
                    </li>
                </ul>
                <div class="tab-content border p-3" id="pill-myTabContent">
                    <div class="tab-pane fade show active" id="OBJEKTIF" role="tabpanel" aria-labelledby="home-tab">
                        {{ $jadual->kursus_objektif }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                @if ($jadual->kursus_tarikh_tutup > date('Y-m-d'))
                    <a href="/permohonan_kursus/katalog_kursus/pendaftaran/{{ $jadual->id }}"
                        class="btn risda-bg-dg text-white">Mohon Kursus</a>
                @endif
            </div>
        </div>
    </div>
@endsection
