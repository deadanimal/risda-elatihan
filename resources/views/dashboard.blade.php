@extends('layouts.risda-base')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>LAMAN UTAMA</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-4 mb-2">
                <div class="card" style="background-color:#0F5E31;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7 text-center">
                                <h3 class="h5 text-white mb-0">KURSUS BULAN INI</h3>
                            </div>
                            <div class="col-5 text-center">
                                <h3 class="text-white mb-0">{{ $bulan_ini }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="background-color:#0F5E31;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7 text-center">
                                <h3 class="h5 text-white mb-0">KURSUS BULAN LALU</h3>
                            </div>
                            <div class="col-5 text-center">
                                <h3 class="text-white mb-0">{{ $bulan_lalu }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-lg-4 mb-2">
                <div class="card" style="background-color:#0F5E31;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7 text-center">
                                <h3 class="h5 text-white mb-0">KURSUS BULAN HADAPAN</h3>
                            </div>
                            <div class="col-5 text-center">
                                <h3 class="text-white mb-0">{{ $bulan_depan }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-8">
                <div class="card risda-bg-g">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="text-white mb-0">JUMLAH PERMOHONAN TAHUN SEMASA:</h5>
                            </div>
                            <div class="col-2 text-end">
                                <h5 class="text-white mb-0">{{ $permohonan_tahun_ini }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-lg-8">
                <div class="card risda-bg-g">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="text-white mb-0">JUMLAH KEHADIRAN PESERTA KURSUS:</h5>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-4 text-end">
                                <h5 class="text-white mb-0">STAF - </h5>
                            </div>
                            <div class="col-2 text-end">
                                <h5 class="text-white mb-0">{{ $kehadiran_staf }} </h5>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-4 text-end">
                                <h5 class="text-white mb-0">PEKEBUN KECIL - </h5>
                            </div>
                            <div class="col-2 text-end">
                                <h5 class="text-white mb-0">{{ $kehadiran_pk }} </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
