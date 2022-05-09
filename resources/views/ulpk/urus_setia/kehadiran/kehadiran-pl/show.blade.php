@extends('layouts.risda-base')
@section('content')

    <style>
        p {
            color: rgb(15, 94, 49);
        }

        .form-control {
            border-color: rgb(0, 150, 64);
        }

        table>thead>tr {
            background-color: rgb(0, 150, 64);
            color: white;
            border-color: rgb(0, 150, 64);
            vertical-align: middle;
            text-align: center;
        }

        table>tbody>tr {
            border-color: rgb(0, 150, 64);
            vertical-align: middle;

        }

    </style>

    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">KEHADIRAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">KEHADIRAN KE PUSAT LATIHAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    KEHADIRAN KE PUSAT LATIHAN
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">PUSAT LATIHAN</p>
                </div>
                <div class="col-7">
                    <input type="text" style="text-transform: capitalize" class="form-control" value="{{$agensi->nama_Agensi}}" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KEHADIRAN</p>
                </div>
                <div class="col-7">
                    <input type="date" class="form-control mb-3" readonly>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="sort">NAMA KURSUS</th>
                                    <th class="sort">TARIKH</th>
                                    <th class="sort">NAMA PESERTA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($kursus as $kursus)

                                        <td >{{$kursus->kursus_nama}}</td>
                                        <td >{{$kursus->tarikh_mula}}</td>
                                        <td>
                                            @foreach($kursus->kehadiran as $k)
                                                {{$k->user}}
                                            @endforeach
                                        </td>


                                    {{-- <td><a href="us-uls/kehadiran/cetak-pl/{{$agensi->id}}" class="btn btn-sm btn-primary"><span class="fas fa-print"></span></a> --}}

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // $(document).ready(function() {
            //     $('.table').DataTable();
            // });
        </script>
    @endsection
