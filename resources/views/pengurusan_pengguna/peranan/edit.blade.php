@extends('layouts.risda-base')
@section('content')
@php
    use App\Models\KebenaranPeranan;
@endphp
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PENGGUNA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PERANAN DAN KEBENARAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    TUKAR NAMA UNTUK {{ $role->name }}
                </p>
            </div>
        </div>

        <form action="/pengurusan_pengguna/peranan/tukar_nama/{{ $role->id }}" method="post">
            @method('POST')
            @csrf
            <div class="row">
                <input type="text" name="name" value="{{$role->name}}" class="form-control">
            </div>

            <div class="row">
                <div class="col text-end m-3">
                    <a href="/pengurusan_pengguna/peranan" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm">Kemaskini</button>
                </div>
            </div>
        </form>

    </div>
@endsection
