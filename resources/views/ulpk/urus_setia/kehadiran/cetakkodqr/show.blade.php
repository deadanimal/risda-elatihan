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
                <p class="h5" style="color: rgb(43,93,53); ">CETAK KOD QR KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    CETAK KOD QR
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KOD NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3 tahun">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TEMPAT KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
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
                                    <th class="sort">TARIKH.</th>
                                    <th class="sort">HARI</th>
                                    <th class="sort">SESI</th>
                                    <th class="sort">MASA</th>
                                    <th class="sort">KOD QR</th>
                                    <th class="sort">CETAK KOD QR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="2">02-04-2021</td>
                                    <td rowspan="2">PERTAMA</td>
                                    <td>1</td>
                                    <td>8-9</td>
                                    <td></td>
                                    <td><a href="" class="btn btn-sm btn-primary"><span class="fas fa-print"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>9-10</td>
                                    <td></td>
                                    <td><a href="" class="btn btn-sm btn-primary"><span class="fas fa-print"></span></a>
                                </tr>
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
