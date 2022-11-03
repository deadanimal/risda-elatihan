@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PENGGUNA</p>
                <p class="h5" style="color: rgb(43,93,53); ">SENARAI PENGGUNA</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI PENGGUNA STAF RISDA
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <form action="/pengurusan_pengguna/pengguna/staf" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-8 col-lg-10 mb-lg-3 pe-0 pe-lg-3">
                            <label class="col-form-label">GRED</label>
                            <select name="gred" class="form-select form-control">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($gred as $g=>$gr)
                                    <option value="{{ $g }}">{{ $g }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-8 col-lg-10 mb-lg-3 pe-0 pe-lg-3">
                            <label class="col-form-label">PUSAT TANGGUNGJAWAB</label>
                            <select name="namaPT" class="form-select form-control">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($namaPT as $pt=>$tp)
                                    <option value="{{ $pt }}">{{ $pt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 col-lg-2 mb-lg-3 align-self-end text-end ps-0">
                            <button type="submit" class="btn risda-bg-dg text-white"><i class="fas fa-search"></i>
                                Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
