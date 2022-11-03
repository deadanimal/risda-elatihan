@extends('layouts.risda-base')
<style>
    td {
        vertical-align: middle;
    }

</style>
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    PENILAIAN KURSUS
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <div class="row">
                    <div class="col-4 mt-2">
                        <h5>TAHUN</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-select tahun" autocomplete="off">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 mt-2">
                        <h5>UNIT LATIHAN</h5>
                    </div>
                    <div class="col-8">
                        @if (auth()->user()->jenis_pengguna == 'Peserta ULS' || auth()->user()->jenis_pengguna == 'Urus Setia ULS')
                            <input type="text" class="form-control" value="Staff" readonly>
                        @else
                            <input type="text" class="form-control" value="Pekebun Kecil" readonly>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="table-responsive scrollbar ">
                    <table class="table datatable text-center">
                        <thead>
                            <tr>
                                <th class="fw-bold text-dark" scope="col">BIL.</th>
                                <th class="fw-bold text-dark" scope="col">KOD NAMA KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">NAMA KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">TARIKH KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">TEMPAT KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">STATUS PELAKSANAAN</th>
                                <th class="fw-bold text-dark" scope="col">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadual_kursus as $jk)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $jk->kursus_kod_nama_kursus }}
                                    </td>
                                    <td>
                                        {{ $jk->kursus_nama }}
                                    </td>
                                    {{-- <td>
                                        {{ $jk->kursus_tempat }}

                                    </td> --}}
                                    <td>
                                        {{-- {{ $jk->kursus_status }} --}}


                                        {{ date('d-m-Y', strtotime($jk->tarikh_mula)) }} <br>
                                        - <br>
                                        {{ date('d-m-Y', strtotime($jk->tarikh_tamat)) }}
                                    </td>
                                    <td>
                                        {{ $jk->tempat->nama_Agensi }}
                                    </td>

                                        {{-- {{ $jk->status_pelaksanaan->Status_Pelaksanaan }} --}}


                                        @if ($jk->tarikh_mula > date('Y-m-d'))
                                            <td>BELUM DILAKSANA</td>

                                        @elseif ($jk->tarikh_tamat < date('Y-m-d'))
                                            <td>SELESAI</td>

                                        @elseif ($jk->tarikh_tamat >= date('Y-m-d'))
                                            <td>SEDANG DILAKSANAKAN</td>

                                        @endif

                                    <td>
                                        <a class="btn btn-primary btn-sm mb-2"
                                            href="/penilaian/penilaian-kursus-us/{{$jk->id}}">

                                            <small> Kemaskini Bahagian A </small>
                                        </a>
                                        {{-- <a class="btn btn-primary btn-sm mb-2"  href="/penilaian/penilaian-kursus/bahagianB/{{$jk->id}}">
                                            <small> Kemaskini Bahagian B</small>
                                        </a>

                                        <a class="btn btn-primary btn-sm"
                                        href="/penilaian/penilaian-kursus/bahagianC/{{$jk->id}}">
                                            <small> Kemaskini Bahagian C </small>
                                        </a>
 --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
