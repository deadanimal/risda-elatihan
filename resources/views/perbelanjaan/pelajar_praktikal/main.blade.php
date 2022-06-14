@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERBELANJAAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PELAJAR PRAKTIKAL</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SEMAKAN PERBELANJAAN PELAJAR PRAKTIKAL
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <form action="/perbelanjaan/pelajar-praktikal/carian" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-8 col-lg-10 mb-lg-3 pe-0 pe-lg-3">
                            <label class="col-form-label">KOD PA</label>
                            <input type="text" name="Kod_PA" id="Kod_PA" class="form-control">
                        </div>
                        <div class="col-8 col-lg-10 mb-lg-3 pe-0 pe-lg-3">
                            <label class="col-form-label">KOD PT</label>
                            <select name="kod_pt" class="form-select form-control">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($pusat_tanggungjawab as $pt)
                                    <option value="{{ $pt->kod_PT }}">{{ $pt->kod_PT }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="kod_pt" id="kod_pt" class="form-control"> --}}
                        </div>
                        <div class="col-8 col-lg-10 mb-lg-3 pe-0 pe-lg-3">
                            <label class="col-form-label">KOD OBJEK</label>
                            <select name="kod_objek" class="form-select form-control">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($objek as $obj)
                                    <option value="{{ $obj->kod_Objek }}">{{ $obj->nama_Objek }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="Kod_Objek" id="Kod_Objek" class="form-control"> --}}
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
