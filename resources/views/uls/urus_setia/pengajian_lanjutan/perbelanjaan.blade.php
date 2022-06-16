@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PENGAJIAN LANJUTAN</strong></h1>
                <h5 class="risda-dg">PERBELANJAAN</h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SEMAKAN PERBELANJAAN PENGAJIAN LANJUTAN
                </p>
            </div>
        </div>

        <div class="row mt-3 ">
            <div class="col">
                <div class="card ">
                    <div class="card-body mx-lg-5">
                        <form action="/perbelanjaan/pengajian-lanjutan" method="post">
                            @csrf
                            <div class="row p-3">
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Pengajian Lanjutan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->pengguna->name }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tahun</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Thn_Kew }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod PT</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Kod_PT }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod PA</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Kod_PA }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod Objek</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Kod_Objek }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">No. DBil</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->No_DBil }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tarikh DBil</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ date('d-m-Y', strtotime($pl->perbelanjaan_pl->Tkh_DBil)) }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Jenis DBil</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Jenis_DBil }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Keterangan DBil</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Keterangan_DBil }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Jenis Bill</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Jenis_Bill }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod Pembekal</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Kod_Pembekal }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tujuan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Perihal}}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Rujukan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->No_Kew10 }}">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Amaun Bayar (RM)</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $pl->perbelanjaan_pl->Amaun }}">
                                </div>

                                <div class="row mt-5">
                                    <div class="col text-center">
                                        <a href="/us-uls/pengajian-lanjutan" class="btn btn-primary">Kembali</a>
                                    </div>
                                </div>
    
                                
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
