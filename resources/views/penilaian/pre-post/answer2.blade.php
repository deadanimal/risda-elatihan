@extends('layouts.risda-base')
@section('content')
<div class="container">
    <div class="row mt-3 mb-2">
        <div class="col-12 mb-2">
            <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
            <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN PRE TEST DAN POST TEST</p>
        </div>
    </div>
    <hr style="color: rgba(81,179,90, 60%);height:2px;">

    <div class="row">
        <div class="col-12">
            <p class="h4 fw-bold mt-3">
                PENILAIAN PRE TEST
            </p>
            <p class="h5 mt-5">
                SILA JAWAB SEMUA SOALAN
            </p>
        </div>
    </div>

    <form action="{{ route('simpanPenilaian') }}" method="post">
        <div class="row mt-5 justify-content-center">
            @csrf
            <input type="hidden" name="jadual_kursus_id" value="{{ $jadual_kursus->id }}">
            @foreach ($jadual_kursus->preposttest as $ppt)
                @if ($ppt->status == 'Aktif')
                    @if ($ppt->jenis_soalan == 'FILL IN THE BLANK')
                        <div class="col-8">
                            <h5>{{ $ppt->soalan }}</h5>
                        </div>
                        <div class="col-8 mt-3">
                            <div class="row">
                                <div class="col-2 text-center d-flex align-items-center">
                                    <h6 class="m-0 p-0">JAWAPAN</h6>
                                </div>
                                <div class=" col-10">
                                    <input type="text" name="jawapan[{{ $ppt->id }}]" class="form-control">
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($ppt->jenis_soalan == 'MULTIPLE CHOISE')
                        <div class="col-8 mt-5">
                            <h5>{{ $ppt->soalan }}</h5>
                        </div>
                        <div class="col-8 mt-3">
                            @foreach ($ppt->multiple as $m)
                                <div class="form-check">
                                    <input class="form-check-input" name="jawapan[{{ $ppt->id }}][{{ $m->id }}]"
                                        type="checkbox" value="{{ $m->yang_betul }}" id="c_{{ $m->id }}">
                                    <label class="form-check-label" for="c_{{ $m->id }}">
                                        {{ $m->jawapan }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ($ppt->jenis_soalan == 'SINGLE CHOISE')
                        <div class="col-8 mt-5">
                            <h5>{{ $ppt->soalan }}</h5>
                        </div>
                        <div class="col-8 mt-3">
                            @foreach ($ppt->multiple as $m)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawapan[{{ $ppt->id }}]"
                                        id="flexRadioDefault{{ $m->id }}" value="{{ $m->yang_betul }}">
                                    <label class="form-check-label" for="flexRadioDefault{{ $m->id }}">
                                        {{ $m->jawapan }}
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    @endif
                    @if ($ppt->jenis_soalan == 'TRUE OR FALSE')
                        <div class="col-8 mt-5">
                            <h5>{{ $ppt->soalan }}</h5>
                        </div>
                        <div class="col-8 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawapan[{{ $ppt->id }}]"
                                    id="flexRadioDefault{{ $ppt->id }}" value="Betul">
                                <label class="form-check-label" for="flexRadioDefault{{ $ppt->id }}">
                                    BETUL
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawapan[{{ $ppt->id }}]"
                                    id="flexRadioDefault{{ $ppt->id }}" value="Salah">
                                <label class="form-check-label" for="flexRadioDefault{{ $ppt->id }}">
                                    SALAH
                                </label>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
            <div class="col-8 text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>

@endsection
