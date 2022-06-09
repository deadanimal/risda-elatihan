@extends('layouts.risda-base')
@section('content')
    <style>
        p {
            color: rgb(15, 94, 49);
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
                    <input type="text" class="form-control mb-3" readonly
                        value="{{ $kod_kursus->kursus_kod_nama_kursus }}">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" readonly value="{{ $kod_kursus->kursus_unit_latihan }}">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" readonly value="{{ $kod_kursus->kursus_nama }}">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" readonly value="{{ $kod_kursus->tarikh_mula }}">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TEMPAT KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" readonly value="{{ $kod_kursus->tempat->nama_Agensi }}">
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="table-responsive scrollbar p-5">
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
                                @foreach ($kehadiran as $k)
                                    {{-- @if ($k->ac_sesi == 1) --}}
                                    <tr>
                                        {{-- <td rowspan="{{$k->temp}}" class="align-middle">{{ $date[$k->ac_hari - 1] }}</td>
                                            <td rowspan="{{$k->temp}}" class="align-middle">{{ $hari[$k->ac_hari - 1] }}</td> --}}
                                        <td class="align-middle">{{ $date[$k->ac_hari - 1] }}</td>
                                        <td class="align-middle">{{ $hari[$k->ac_hari - 1] }}</td>
                                        <td>{{ $k->ac_sesi }}</td>
                                        <td>{{ $k->ac_masa_mula }}</td>
                                        <td>
                                            <div class="qrcode" id="{{ $k->id }}"></div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('printQR', $k->id) }}"><span
                                                    class="fas fa-print"></span></a>
                                        </td>
                                    </tr>

                                    {{-- @else
                                        <tr>
                                            <td>{{ $k->ac_sesi }}</td>
                                            <td>{{ $k->ac_masa }}</td>
                                            <td>
                                                <div class="qrcode" id="{{ $k->id }}"></div>

                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('printQR', $k->id) }}"><span
                                                        class="fas fa-print"></span></a>
                                            </td>
                                        </tr>
                                    @endif --}}
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


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
