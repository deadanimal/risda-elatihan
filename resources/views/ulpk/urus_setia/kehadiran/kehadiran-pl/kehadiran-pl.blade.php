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
                {{-- <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">KEHADIRAN</p> --}}
                <p class="h5" style="color: rgb(43,93,53); ">PUSAT LATIHAN</p>
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
                    <input type="text" class="form-control mb-3" value="Pekebun Kecil" readonly>
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
                            <th scope="col">NAMA KURSUS</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">TINDAKAN</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agensi as $pl)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pl->nama_Agensi }}</td>
                                <td>{{ $pl->alamat_Agensi_baris1 }} <br> {{ $pl->alamat_Agensi_baris2 }} <br>
                                    {{ $pl->alamat_Agensi_baris3 }}</td>
                                <td class=" text-end"><a href="/us-uls/kehadiran/kehadiran-pl/{{ $pl->id }}"
                                        class="btn btn-primary btn-sm">SENARAI KEHADIRAN</a></td>
                        @endforeach

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
                    autoclose: true,
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                let qr = $(".qrcode");
                jQuery.each(qr, function(key, val) {
                    var outUrl = APP_URL + "/uls/kehadiran/" + val.id;
                    new QRCode(document.getElementById(val.id), {
                        text: outUrl,
                        width: 90,
                        height: 90,
                        colorDark: "#000000",
                        colorLight: "#ffffff",
                        correctLevel: QRCode.CorrectLevel.H
                    });
                });
            });
        </script>
    @endsection
