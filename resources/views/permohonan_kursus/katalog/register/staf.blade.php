@extends('layouts.risda-base')
@section('content')
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
                        <div class="row mb-3">
                            <div class="col">
                                <p class="fw-bold text-center risda-dg mb-2">TARIKH KURSUS</p>
                                <p class="h4 fw-bold text-center risda-g">
                                    {{ date('d-m-Y', strtotime($jadual->tarikh_mula)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="h5 mb-0 fw-bold mt-5 risda-dg text-center">MAKLUMAN</p>

                <div class="card mt-3">
                    <div class="card-body risda-bg-g text-white">
                        <p class="fw-bold text-center mb-2">
                            SILA SEMAK MAKLUMAT PERIBADI ANDA YANG TERKINI.
                            SEKIRANYA MAKLUMAT ANDA TIDAK BETUL, SILA
                            KEMASKINI MAKLUMAT ANDA DI SISTEM HRIP.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <button class="btn btn-sm btn-outline-primary mt-3 text-center" type="button" data-bs-toggle="modal"
                            data-bs-target="#profil">
                            Profil Penuh
                        </button>

                        @if ($sp == 1)
                            <button class="btn btn-sm btn-secondary mt-3 text-center" type="button" data-bs-toggle="modal"
                                data-bs-target="#register" disabled>
                                Hantar Pemohonan
                            </button>
                        @else
                            <button class="btn btn-sm btn-primary mt-3 text-center" type="button" data-bs-toggle="modal"
                                data-bs-target="#register">
                                Hantar Pemohonan
                            </button>
                        @endif
                    </div>

                    <div class="modal fade" id="profil" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="rounded-top-lg py-3 bg-light">
                                        <h4 class="mb-1 mx-3 risda-g">PROFIL PENUH </h4>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <div class="card">
                                            <div class="card-body risda-bg-dg text-white">
                                                <p class="h5 mb-0 fw-bold text-white text-center">MAKLUMAN</p>
                                                <p class="fw-bold text-center mb-2">
                                                    SILA SEMAK MAKLUMAT PERIBADI ANDA YANG TERKINI.
                                                    SEKIRANYA MAKLUMAT ANDA TIDAK BETUL, SILA
                                                    KEMASKINI MAKLUMAT ANDA DI SISTEM HRIP.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <p class="h5 mb-0 fw-bold">MAKLUMAT PERIBADI</p>
                                                <div class="row mt-4">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NO. KAD
                                                                        PENGENALAN</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $user['no_KP'] }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NO. PEKERJA</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $staf['nopekerja'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NAMA STAF</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $user['name'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">ALAMAT E-MEL</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $user['email'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NO. TELEFON
                                                                        BIMBIT</label>
                                                                    @if ($profil != null)
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $profil['notel'] }}" readonly />
                                                                    @else
                                                                        <input class="form-control" type="text" value=""
                                                                            readonly />
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NO. TELEFON
                                                                        PEJABAT</label>
                                                                    <input class="form-control" type="text" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <p class="h5 mb-0 fw-bold">JAWATAN</p>
                                                <div class="row mt-4">
                                                    <div class="col">

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">JAWATAN</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $staf['Jawatan'] }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">GRED</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $staf['Gred'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <p class="h5 mb-0 fw-bold">PUSAT TANGGUNGJAWAB</p>
                                                <div class="row mt-4">
                                                    <div class="col">

                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NAMA PUSAT
                                                                        TANGGUNGJAWAB</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $staf['NamaPT'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <p class="h5 mb-0 fw-bold">PENYELIA</p>
                                                <div class="row mt-4">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NAMA
                                                                        PENYELIA</label>
                                                                    <input class="form-control" type="text" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">JAWATAN</label>
                                                                    <input class="form-control" type="text" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">GRED</label>
                                                                    <input class="form-control" type="text" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">E-MEL</label>
                                                                    <input class="form-control" type="text" readonly />
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
                        </div>
                    </div>

                    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="row">
                                        <div class="col text-center m-3">
                                            <i class="far fa-question-circle risda-g fa-7x"></i>
                                            <br><br>
                                            Adakan anda pasti untuk memohon kursus
                                            {{ $jadual->kursus_kod_nama_kursus }} {{ $jadual->kursus_nama }}?

                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col text-center">
                                            <form method="POST" action="/permohonan_kursus/katalog_kursus">
                                                @csrf
                                                <input type="hidden" name="kod_kursus" value="{{ $jadual->id }}">
                                                <input type="hidden" name="no_pekerja" value="{{ Auth::id() }}">
                                                <input type="hidden" name="status_permohonan" value="0">
                                                <button class="btn btn-sm risda-bg-dg text-white" type="submit">Ya
                                                </button>
                                                <button class="btn btn-sm btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Tidak</button>
                                            </form>

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
