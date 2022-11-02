@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PESERTA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENCALONAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row mb-3">
            <div class="col-12">
                <p class="h5 fw-bold mt-3">
                    SENARAI CALON PESERTA KURSUS
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <form action="/pengurusan_peserta/pencalonan/senarai_peserta/{{$id}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="pt-2 fw-bold">GRED</p>
                        </div>
                        <div class="col-lg-8">
                            <select name="gred" class="form-control form-select mb-3">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($gred as $g=>$gr)
                                    <option value="{{ $g }}">{{ $g }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <p class="pt-2 fw-bold">PUSAT TANGGUNGJAWAB</p>
                        </div>
                        <div class="col-lg-8">
                            <select name="pt" class="form-control form-select mb-3">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($pusat_tanggungjawab as $pt=>$tp)
                                    <option value="{{ $pt }}">{{ $pt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 text-end">
                        <button class="btn btn-primary" type="submit">Semak</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endsection