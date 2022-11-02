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
                    KEMASKINI SOALAN PRE TEST
                </p>
            </div>
        </div>

        <form action="/penilaian/pre-post-test/{{ $prepost->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row justify-content-center">
                <div class="col-8 mb-3">
                    <label for="">Jenis Soalan</label>
                    <input type="text" name="jenis_soalan" class="form-control" value="{{ $prepost->jenis_soalan }}"
                        readonly>
                </div>
                <div class="col-8 mb-3">
                    <label for="">Soalan</label>
                    <textarea class="form-control mb-3" rows="4" name="soalan" required>{{ $prepost->soalan }}</textarea>
                </div>
                <div class="col-8 mb-3">
                    <label for="">Status</label>
                    <select class="form-select mb-3" name="status" required>
                        <option selected hidden value="{{ $prepost->status }}">{{ $prepost->status }}</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tak Aktif">Tak Aktif</option>
                    </select>
                </div>
                @if ($prepost->jenis_soalan == 'FILL IN THE BLANK')
                    <div class="col-8 mb-3">
                        <label for="">Jawapan</label>
                        <textarea class="form-control mb-3" rows="4" name="jawapanA">{{ $prepost->jawapan }}</textarea>
                    </div>
                @elseif ($prepost->jenis_soalan == 'MULTIPLE CHOICE')
                    <div class="col-8 mb-3">
                        <label for="">Jawapan</label>
                        @foreach ($prepost->multiple as $m)
                            <div class="row my-2">
                                <div class="col-auto">
                                    @if ($m->yang_betul == 'betul')
                                        <input type="checkbox" name="checkbetul[{{ $m->id }}]" value="{{ $m->id }}"
                                            class="form-check-input" checked>
                                    @else
                                        <input type="checkbox" name="checkbetul[{{ $m->id }}]" value="{{ $m->id }}"
                                            class="form-check-input">
                                    @endif
                                </div>
                                <div class="col-11">
                                    <input type="text" name="jawapanMultiple[{{ $m->id }}]" class="form-control"
                                        value="{{ $m->jawapan }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @elseif ($prepost->jenis_soalan == 'SINGLE CHOICE')
                    <div class="col-8 mb-3">
                        <label for="">Jawapan</label>
                        @foreach ($prepost->multiple as $m)
                            <div class="row my-2">
                                <div class="col-auto">
                                    @if ($m->yang_betul == 'betul')
                                        <input type="radio" name="checkbetul" value="{{ $m->id }}"
                                            class="form-check-input" checked>
                                    @else
                                        <input type="radio" name="checkbetul" value="{{ $m->id }}"
                                            class="form-check-input">
                                    @endif
                                </div>
                                <div class="col-11">
                                    <input type="text" name="jawapanMultiple[{{ $m->id }}]" class="form-control"
                                        value="{{ $m->jawapan }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-8 mb-3">
                        <label for="">Jawapan</label>
                        @if ($prepost->jawapan == 'Betul')
                            <div class="form-check mb-3">
                                <input class="form-check-input" value="Betul" type="radio" name="jawapanD"
                                    id="customRadio_true" checked>
                                <label class="custom-control-label" for="customRadio_true">Betul</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" value="Salah" type="radio" name="jawapanD"
                                    id="customRadio_false">
                                <label class="custom-control-label" for="customRadio_false">Salah</label>
                            </div>
                        @else
                            <div class="form-check mb-3">
                                <input class="form-check-input" value="Betul" type="radio" name="jawapanD"
                                    id="customRadio_true">
                                <label class="custom-control-label" for="customRadio_true">Betul</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" value="Betul" type="radio" name="jawapanD"
                                    id="customRadio_false" checked>
                                <label class="custom-control-label" for="customRadio_false">Salah</label>
                            </div>
                        @endif
                    </div>
                @endif
                {{-- @if ($prepost->multiple == null)
                    <div class="col-8 mb-3">
                        <label for="">Jawapan</label>
                        <input type="text" name="jawapan" class="form-control" value="{{ $prepost->jawapan }}">
                    </div>
                @endif --}}

                <div class="col-8 text-end mt-3">
                    <button class="btn btn-primary" type="submit"><i class="far fa-save"></i>
                        Simpan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
