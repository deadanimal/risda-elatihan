@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>PENGURUSAN PESERTA</strong></h1>
            <h5 class="risda-dg">SEMAKAN PERMOHONAN</h5>
        </div>
    </div>

    <hr class="risda-g">

    <div class="row justify-content-center mt-3">
        <div class="row col-lg-10">
            <div class="card risda-bg-g ">
                <h5 class="text-white my-2 mx-3">MAKLUMAT PERMOHONAN</h5>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label risda-g">NO. KAD PENGENALAN</label>
                        <input class="form-control" type="text" value="{{ $user->peserta->no_KP }}" readonly />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label risda-g">NO. PEKERJA</label>
                        <input class="form-control" type="text" value="{{ $staf['nopekerja'] }}" readonly />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label risda-g">NAMA STAF</label>
                        <input class="form-control" type="text" value="{{ $user->peserta->name }}" readonly />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label risda-g">ALAMAT E-MEL</label>
                        <input class="form-control" type="text" value="{{ $user->peserta->email }}" readonly />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label risda-g">NO. TELEFON BIMBIT</label>
                        <input class="form-control" type="text" value="{{ $staf['notel'] }}" readonly />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label risda-g">NO. TELEFON PEJABAT</label>
                        <input class="form-control" type="text" readonly />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label risda-g">JAWATAN</label>
                        <input class="form-control" type="text" value="{{ $staf['Jawatan'] }}" readonly />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label risda-g">GRED</label>
                        <input class="form-control" type="text" value="{{ $staf['Gred'] }}" readonly />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label risda-g">NAMA PUSAT TANGGUNGJAWAB</label>
                        <input class="form-control" type="text" value="{{ $staf['NamaPT'] }}" readonly />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label risda-g">NAMA PENYELIA</label>
                        <input class="form-control" type="text" readonly />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label risda-g">JAWATAN</label>
                        <input class="form-control" type="text" readonly />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
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

    <hr class="risda-g mt-3">

    <div class="row">
        <div class="col">
            <h5>SEMAKAN PERMOHONAN</h5>
        </div>
    </div>
    <div class="row ms-5 mt-4">
        <div class="col">
            <form action="/permohonan_kursus/katalog_kursus/{{ $user->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-3 text-end">
                        <label class="form-label risda-g">STATUS</label>
                    </div>
                    <div class="col-lg-6">

                        <select name="status_permohonan" class="form-control">
                            @if ($user->status_permohonan == '1')
                                @role('Penyokong')
                                    <option value="" hidden selected>Belum Disokong</option>
                                    <option value="2">Sokong</option>
                                    <option value="3">Tidak Sokong</option>
                                @else
                                    <option value="" hidden selected>Belum Disokong</option>
                                @endrole
                            @else
                                <option value="" hidden selected>Sila Pilih</option>
                                @role('Penyokong')
                                    <option value="" hidden selected>Belum disemak</option>
                                @else
                                    @if ($user->status_permohonan == '0')
                                        <option value="1">Hantar ke penyokong</option>
                                    @elseif($user->status_permohonan == '2' || $user->status_permohonan == '3')
                                        <option value="4">Lulus</option>
                                        <option value="5">Tidak Lulus</option>
                                    @endif
                                @endrole
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-9 text-end">
                        @if ($user->status_permohonan == '1')
                            @role('Penyokong')
                                <button type="submit" class="btn btn-secondary text-white btn-sm">Hantar</button>
                            @else
                                <button type="submit" disabled class="btn btn-secondary text-white btn-sm">Hantar</button>
                            @endrole
                        @else
                            @role('Penyokong')
                                <button type="submit" disabled class="btn btn-secondary text-white btn-sm">Hantar</button>
                            @else
                                <button type="submit" class="btn btn-secondary text-white btn-sm">Hantar</button>
                            @endrole
                        @endif

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
