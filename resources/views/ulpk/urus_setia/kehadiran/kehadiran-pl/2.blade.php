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
                    <input type="text" class="form-control mb-4 tahun" autocomplete="OFF">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>

        </div>


        <div class="card my-5">
            <div class="table-responsive scrollbar p-5">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">BIL.</th>
                            <th scope="col">NO KAD PENGENALAN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">PUSAT TANGGUNGJAWAB</th>
                            <th scope="col">KOD<br>KURSUS</th>
                            <th scope="col">NAMA<br>KURSUS</th>
                            <th scope="col">TARIKH<br>KEHADIRAN</th>
                            <th class="text-end" scope="col">PENGESAHAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kursus as $ku)
                        @foreach($kehadiran as $k)

                        <tr>
                          <td
                       <tr>

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
