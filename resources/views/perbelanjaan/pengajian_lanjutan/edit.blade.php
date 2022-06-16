@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PERBELANJAAN</strong></h1>
                <h5 class="risda-dg">PENGAJIAN LANJUTAN</h5>
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
                        <form action="/perbelanjaan/pengajian-lanjutan/{{$rafis_risda->id}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row p-3">
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tahun</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Thn_Kew'] }}" name="Thn_Kew">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod PT</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Kod_PT'] }}" name="Kod_PT">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod PA</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Kod_PA'] }}" name="Kod_PA">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod Objek</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Kod_Objek'] }}" name="Kod_Objek">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">No. DBil</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['No_DBil'] }}" name="No_DBil">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tarikh DBil</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ date('d-m-Y', strtotime($rafis['Tkh_DBil'])) }}" name="Tkh_DBil">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Jenis DBil</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Jenis_DBil'] }}" name="Jenis_DBil">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Keterangan DBil</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Keterangan_DBil'] }}" name="Keterangan_DBil">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Jenis Bill</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Jenis_Bill'] }}" name="Jenis_Bill">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod Pembekal</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Kod_Pembekal'] }}" name="Kod_Pembekal">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tujuan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Perihal'] }}" name="Perihal">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Rujukan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['No_Kew10'] }}" name="No_Kew10">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Amaun Bayar (RM)</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Amaun'] }}" name="Amaun">
                                </div>
    
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Pengajian Lanjutan</p>
                                </div>
                                <div class="col-lg-9">
                                    <select name="pengguna_id" class="form-select form-control">
                                        <option value="{{$rafis_risda['pengguna_id']}}" selected hidden>{{$rafis_risda->pengguna->name}}</option>
                                        @foreach ($peserta as $p)
                                            <option value="{{$p->id}}">{{$p->pengguna->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.datatable').dataTable({
            "columns": [
                null,
                null,
                null,
                null,
                {
                    "width": "15%"
                }
            ]
        });
    </script>
@endsection
