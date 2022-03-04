@extends('layouts.risda-base')
@section('content')
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
                EDIT SOALAN
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-8 mb-3">
            <label for="">Jenis Soalan</label>
            <input type="text" name="jenis_soalan" class="form-control" value="{{ $prepost->jenis_soalan }}">
        </div>
        <div class="col-8 mb-3">
            <label for="">Soalan</label>
            <input type="text" name="soalan" class="form-control" value="{{ $prepost->soalan }}">
        </div>
        <div class="col-8 mb-3">
            <label for="">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $prepost->status }}">
        </div>
        @foreach ($prepost->multiple as $m)
            <div class="col-8 mb-3">
                <label for="">Jawapan</label>
                <input type="text" name="jawapan" class="form-control" value="{{ $m->jawapan }}">
            </div>
        @endforeach
        @if ($prepost->multiple == null)
            <div class="col-8 mb-3">
                <label for="">Jawapan</label>
                <input type="text" name="jawapan" class="form-control" value="{{ $prepost->jawapan }}">
            </div>
        @endif
    </div>
@endsection
