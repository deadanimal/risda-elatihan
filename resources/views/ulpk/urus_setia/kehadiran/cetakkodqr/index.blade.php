@extends('layouts.risda-base')
@section('content')

    <style>
        table>thead>tr {
            border-color: rgb(0, 150, 64);
            vertical-align: middle;
            text-align: center;
        }


        table>tbody>tr {
            vertical-align: middle;
            text-align: center;
            border-color: white;
        }

    </style>

    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53); letter-spacing: 5px;">KEHADIRAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">CETAK KOD QR KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    CETAK QR CODE
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TAHUN</p>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control mb-3 tahun" placeholder="Sila Pilih">
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
        </div>

        {{-- <hr style="color: rgba(81,179,90, 60%);height:2px;"> --}}


        <div class="card mt-5">
            <div class="table-responsive scrollbar p-5">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">BIL.</th>
                            <th scope="col">KOD NAMA <br> KURSUS</th>
                            <th scope="col">NAMA <br> KURSUS</th>
                            <th scope="col">TARIKH <br> KURSUS</th>
                            <th scope="col">TEMPAT KURSUS</th>
                            <th class="text-end" scope="col">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kod1</td>
                            <td>Kursus1</td>
                            <td>1/1/11</td>
                            <td>Dewan1</td>
                            <td class="text-end"><a href="/kehadiran/cetakkodQR/1"
                                    class="btn btn-primary btn-sm">Cetak QR Code</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kod2</td>
                            <td>Kursus2</td>
                            <td>2/2/22</td>
                            <td>Dewan2</td>
                            <td class="text-end"><a href="" class="btn btn-primary btn-sm">Cetak QR Code</a></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                $(".tahun").datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                    autoclose: true,
                });
            });
        </script>

    @endsection
