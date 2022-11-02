@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN POST TEST</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    PENILAIAN POST TEST
                </p>
                <p class="h5 mt-5">
                    SILA JAWAB SEMUA SOALAN
                </p>
            </div>
        </div>

        <form action="{{ route('simpanPenilaianPost') }}" method="post">
            <div class="row mt-5 justify-content-center">
                @csrf
                <input type="hidden" name="jadual_kursus_id" value="{{ $jadual_kursus->id }}">
                @foreach ($jadual_kursus->posttest as $pt)
                    @if ($pt->status == 'Aktif')
                        @if ($pt->jenis_soalan == 'FILL IN THE BLANK')
                            <div class="col-8">
                                <h5>{{ $loop->index + 1 }}. {{ $pt->soalan }}</h5>
                            </div>
                            <div class="col-8 mt-3">
                                <div class="row">
                                    <div class="col-2 text-center d-flex align-items-center">
                                        <h6 class="m-0 p-0">JAWAPAN</h6>
                                    </div>
                                    <div class=" col-10">
                                        <input type="text" name="jawapan[{{ $pt->id }}]" class="form-control">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($pt->jenis_soalan == 'MULTIPLE CHOICE')
                            <div class="col-8 mt-5">
                                <h5>{{ $loop->index + 1 }}. {{ $pt->soalan }}</h5>
                            </div>
                            <div class="col-8 mt-3">
                                @if ($pt->multiple != null)
                                    @foreach ($pt->multiple as $m)
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                name="jawapan[{{ $pt->id }}][{{ $m->id }}]" type="checkbox"
                                                value="{{ $m->yang_betul }}" id="c_{{ $m->id }}">
                                            <label class="form-check-label" for="c_{{ $m->id }}">
                                                {{ $m->jawapan }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                        @if ($pt->jenis_soalan == 'SINGLE CHOICE')
                            <div class="col-8 mt-5">
                                <h5>{{ $loop->index + 1 }}. {{ $pt->soalan }}</h5>
                            </div>
                            <div class="col-8 mt-3">
                                @if ($pt->multiple != null)
                                    @foreach ($pt->multiple as $m)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="jawapan[{{ $pt->id }}]"
                                                id="flexRadioDefault{{ $m->id }}" value="{{ $m->yang_betul }}">
                                            <label class="form-check-label" for="flexRadioDefault{{ $m->id }}">
                                                {{ $m->jawapan }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                        @if ($pt->jenis_soalan == 'TRUE OR FALSE')
                            <div class="col-8 mt-5">
                                <h5>{{ $loop->index + 1 }}. {{ $pt->soalan }}</h5>
                            </div>
                            <div class="col-8 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawapan[{{ $pt->id }}]"
                                        id="flexRadioDefault{{ $pt->id }}" value="Betul">
                                    <label class="form-check-label" for="flexRadioDefault{{ $pt->id }}">
                                        BETUL
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawapan[{{ $pt->id }}]"
                                        id="flexRadioDefault{{ $pt->id }}" value="Salah">
                                    <label class="form-check-label" for="flexRadioDefault{{ $pt->id }}">
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
