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

        @if ($jperm == 0)
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
        @endif

        <div class="row mt-3 justify-content-center">
            <div class="col-lg-10">
                <p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary ms-sm-2 mt-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#jadual" aria-expanded="false" aria-controls="jadual">Jadual Tahunan
                        Ini</span></button>
                </div>
                </p>
                <div class="collapse" id="jadual">
                    <div class="border p-card rounded">
                        <div class="card-body">
                            <div class="table-responsive scrollbar m-3">
                                @if (Auth::user()->jenis_pengguna == 'Urus Setia ULS' || Auth::user()->jenis_pengguna == 'Peserta ULS')
                                    <table class="table datatable table-striped" style="width:100%">
                                        <thead class="bg-200">
                                            <tr>
                                                <th class="sort">BIL.</th>
                                                <th class="sort">KOD NAMA KURSUS</th>
                                                <th class="sort">NAMA KURSUS</th>
                                                <th class="sort">TARIKH KURSUS</th>
                                                <th class="sort">TEMPAT KURSUS</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white" id="t_normal">
                                            @foreach ($jadual_uls as $key => $j)
                                                <tr>
                                                    <td>{{ $key + 1 }}.</td>
                                                    <td>{{ $j->kursus_kod_nama_kursus }}</td>
                                                    <td>{{ $j->kursus_nama }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($j->tarikh_mula)) }} -
                                                        {{ date('d-m-Y', strtotime($j->tarikh_tamat)) }}</td>
                                                    <td>
                                                        {{ $j->tempat->nama_Agensi }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @elseif(Auth::user()->jenis_pengguna == 'Urus Setia ULPK' || Auth::user()->jenis_pengguna == 'Peserta ULPK')
                                    <table class="table datatable table-striped" style="width:100%">
                                        <thead class="bg-200">
                                            <tr>
                                                <th class="sort">BIL.</th>
                                                <th class="sort">KOD NAMA KURSUS</th>
                                                <th class="sort">NAMA KURSUS</th>
                                                <th class="sort">TARIKH KURSUS</th>
                                                <th class="sort">TEMPAT KURSUS</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white" id="t_normal">
                                            @foreach ($jadual_ulpk as $key => $j)
                                                <tr>
                                                    <td>{{ $key + 1 }}.</td>
                                                    <td>{{ $j->kursus_kod_nama_kursus }}</td>
                                                    <td>{{ $j->kursus_nama }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($j->tarikh_mula)) }} -
                                                        {{ date('d-m-Y', strtotime($j->tarikh_tamat)) }}</td>
                                                    <td>
                                                        {{ $j->tempat->nama_Agensi }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @elseif(Auth::user()->jenis_pengguna == 'Admin BTM')
                                    <table class="table datatable table-striped" style="width:100%">
                                        <thead class="bg-200">
                                            <tr>
                                                <th class="sort">BIL.</th>
                                                <th class="sort">KOD NAMA KURSUS</th>
                                                <th class="sort">NAMA KURSUS</th>
                                                <th class="sort">TARIKH KURSUS</th>
                                                <th class="sort">TEMPAT KURSUS</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white" id="t_normal">
                                            @foreach ($jadual as $key => $jab)
                                                <tr>
                                                    <td>{{ $key + 1 }}.</td>
                                                    <td>{{ $jab->kursus_kod_nama_kursus }}</td>
                                                    <td>{{ $jab->kursus_nama }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($jab->tarikh_mula)) }} -
                                                        {{ date('d-m-Y', strtotime($jab->tarikh_tamat)) }}</td>
                                                    <td>
                                                        @if ($jab->tempat != null)
                                                            {{ $jab->tempat->nama_Agensi }}
                                                        @else
                                                            check balik
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>


            </div>






        </div>
    </div>
@endsection
