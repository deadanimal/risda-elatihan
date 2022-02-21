@extends('layouts.risda-base')
@section('content')
    @php
    use App\Models\Agensi;
    @endphp
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERMOHONAN KURSUS</p>
                <p class="h5" style="color: rgb(43,93,53); ">KATELOG KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    KEHADIRAN KE KURSUS
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KATEGORI KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="" readonly>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            @foreach ($jadual as $j)
                <div class="col-4 mb-5">
                    <div class="card overflow-hidden" style="width: 18rem;">
                        <div class="card-img-top">
                            <img class="img-fluid" src="/img/katelog-card-bg.jpg" />
                        </div>
                        <div class="card-img-overlay">
                            {{-- <p class="fw-bold text-end text-white mb-0">STATUS</p> --}}
                            <p class="fw-bold text-center text-white mt-3 mb-0">NAMA KURSUS</p>
                            <p class="h4 fw-bold text-center text-white">{{ $j->kursus_nama }}</p>
                        </div>
                        <div class="card-body my-2 py-0">
                            <p class="card-text my-0 p-0">KOD KURSUS</p>
                            <h5 class="card-title my-0 p-0">{{ $j->kursus_kod_nama_kursus }}</h5>
                        </div>
                        <div class="card-body my-2 mt-0 py-0">
                            <p class="card-text my-0 p-0">TARIKH KURSUS</p>
                            <h5 class="card-title my-0 p-0">{{ date('d/m/Y', strtotime($j->tarikh_mula)) }} -
                                {{ date('d/m/Y', strtotime($j->tarikh_tamat)) }}</h5>
                        </div>
                        <div class="card-body my-2 mt-0 py-0">
                            <p class="card-text my-0 p-0">TEMPAT KURSUS</p>
                            <h5 class="card-title my-0 p-0">
                                @php
                                    $tempat = Agensi::find($j->kursus_tempat);
                                    $tempat_kursus = $tempat->nama_Agensi;
                                @endphp
                                {{ $tempat_kursus }}
                            </h5>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a class="btn btn-primary btn-sm"
                            href="/permohonan_kursus/katalog_kursus/{{ $j->id }}">Maklumat Lanjut</a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
