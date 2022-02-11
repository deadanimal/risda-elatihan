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
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">KEHADIRAN</p>
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
                    <input type="text" class="form-control mb-3 tahun" placeholder="Sila Pilih" id="tahun"
                        autocomplete="off">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                </div>
                <div class="col-7">
                    <input type="text" value="Staff" class="form-control mb-3" readonly>
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
                        @foreach ($kod_kursus as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->kod_Kursus }}</td>
                                <td>{{ $k->tajuk_Kursus }}</td>
                                <td>{{ $k->tarikh_daftar_Kursus }}</td>
                                <td>{{ $k->tempat_khusus }}</td>
                                <td class="text-end"><a href="/us-uls/kehadiran/cetakkodQR/{{ $k->id }}"
                                        class="btn btn-primary btn-sm">Cetak QR Code</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                // $("#tahun").datepicker({
                //     format: "yyyy",
                //     viewMode: "years",
                //     minViewMode: "years",
                //     autoclose: true,

                // });

                $('.tahun').bind('onSelect', function() {
                    console.log("a");
                });
            });
        </script>

    @endsection
