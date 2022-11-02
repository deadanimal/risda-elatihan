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
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NO. PERMOHONAN TANAM
                                                                        SEMULA (TS)</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NO. KAD
                                                                        PENGENALAN</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['No_KP'] }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NO. KAD PENGENALAN
                                                                        KIR</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['U_PIR_ID'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NAMA</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Nama_PK'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">TARIKH LAHIR</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['tarikh_lahir'] }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">JANTINA</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Jantina'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">KETURUNAN</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Bangsa'] }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NO. TELEFON
                                                                        BIMBIT</label>
                                                                    <input class="form-control" type="text" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">STATUS ISI
                                                                        RUMAH</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">KATEGORI PEKEBUN
                                                                        KECIL</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">SKIM</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">TARAF
                                                                        KESIHATAN</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">PUSAT
                                                                        TANGGUNGJAWAB</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">ALAMAT RUMAH
                                                                        1</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Nombor'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">ALAMAT RUMAH
                                                                        2</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Jalan'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">ALAMAT RUMAH
                                                                        3</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Nama_Kampung'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">ALAMAT RUMAH
                                                                        4</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Bandar'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">POSKOD</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Poskod'] }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">NEGERI</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Negeri'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">DAERAH</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Daerah'] }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">MUKIM</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Mukim'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">PARLIMEN</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">DUN</label>
                                                                    <input class="form-control" type="text" value=""
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">KAMPUNG</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Kampung'] }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label risda-g">SEKSYEN</label>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $pk['Seksyen'] }}" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($pk['Tanah'] as $key => $t)
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="h5 mb-0 fw-bold">MAKLUMAT KEBUN {{$key+1}}</p>
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">ALAMAT KEBUN
                                                                            1</label>
                                                                        <input class="form-control" type="text"
                                                                            value="" readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">ALAMAT KEBUN
                                                                            2</label>
                                                                        <input class="form-control" type="text"
                                                                            value="" readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">ALAMAT KEBUN
                                                                            3</label>
                                                                        <input class="form-control" type="text"
                                                                            value="" readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">POSKOD</label>
                                                                        <input class="form-control" type="text"
                                                                            value="" readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">NEGERI</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $t['U_Negeri_ID'] }}" readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">DAERAH</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $t['U_Daerah_ID'] }}" readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">MUKIM</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $t['U_Mukim_ID'] }}" readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">PARLIMEN</label>
                                                                        <input class="form-control" type="text" value="{{$t['U_Parlimen_ID']}}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">DUN</label>
                                                                        <input class="form-control" type="text" value="{{$t['U_Dun_ID']}}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">KAMPUNG</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $t['U_Kampung_ID'] }}" readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">SEKSYEN</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $t['U_Seksyen_ID'] }}" readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">NO. GERAN</label>
                                                                        <input class="form-control" type="text" value="{{$t['No_Geran']}}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">NO. LOT</label>
                                                                        <input class="form-control" type="text" value="{{$t['No_Lot']}}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">JENIS TANAMAN</label>
                                                                        @foreach ($t['Tanaman'] as $tanaman)
                                                                        <input class="form-control" type="text"
                                                                        value="{{ $tanaman['Jenis_Tanaman'] }}" readonly />
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label risda-g">LUAS KEBUN</label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $t['Luas_Pemilikan'] }}" readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
                                            <i class="far fa-exclamation-square risda-g fa-7x"></i>
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
