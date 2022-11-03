@extends('layouts.risda-base')
@section('content')
    <style>
        p {
            color: rgb(15, 94, 49);
        }

        table>thead>tr {
            border-color: rgb(0, 150, 64);
            vertical-align: middle;
            text-align: center;
        }


        table>tbody>tr {
            vertical-align: middle;
            text-align: center;
            border-color: rgb(0, 150, 64);
        }

    </style>
    <div class="container pb-5">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">KEHADIRAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">MEREKOD KEHADIRAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    KEHADIRAN PESERTA
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">TAHUN</p>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control mb-4 tahun" autocomplete="OFF" placeholder="yyyy">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                </div>
                <div class="col-6">
                    @role('Urus Setia ULS')
                        {{-- <input type="text" class="form-control mb-3" value="Peserta ULS"> --}}
                        <select name="" id="" class="form-control">
                            <option value="" selected hidden>Sila Pilih</option>
                            <option value="Staf">Staf</option>
                            <option value="Pekebun Kecil">Pekebun Kecil</option>
                        </select>
                        @elserole('Urus Setia ULPK')
                        <input type="text" class="form-control mb-3" value="Peserta ULPK">
                    @endrole
                </div>
            </div>

        </div>


        <div class="card my-5">
            <div class="table-responsive scrollbar p-5">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">BIL.</th>
                            <th scope="col">KOD KURSUS</th>
                            <th scope="col">NAMA KURSUS</th>
                            <th scope="col">TARIKH MULA KURSUS</th>
                            <th scope="col">TARIKH TAMAT KURSUS</th>
                            <th scope="col">STATUS <br> PELAKSANAAN</th>
                            <th class="text-end" scope="col">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadual_kursus as $jadual)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jadual->kursus_kod_nama_kursus }}</td>
                                <td>{{ $jadual->kursus_nama }}</td>
                                <td>{{ date('d-m-Y', strtotime($jadual->tarikh_mula)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($jadual->tarikh_tamat)) }}</td>

                                    @if ($jadual->tarikh_mula > date('Y-m-d'))
                                        <td class="risda-g fw-bold">BELUM DILAKSANA</td>

                                    @elseif ($jadual->tarikh_tamat < date('Y-m-d'))
                                        <td class="risda-g fw-bold">SELESAI</td>

                                    @elseif ($jadual->tarikh_tamat >= date('Y-m-d'))
                                        <td class="risda-g fw-bold">SEDANG DILAKSANAKAN</td>
                                    @endif

                                <td class=" text-end"><a href="{{ route('rekod-kehadiran-peserta', $jadual->id) }}"
                                        class="btn btn-primary btn-sm">REKOD KEHADIRAN</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script>
        $(document).ready(function() {
            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
    </script>
@endsection
