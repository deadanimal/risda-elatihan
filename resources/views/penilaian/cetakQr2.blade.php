@extends('layouts.risda-base')
@section('content')
    <style>
        .qrcode img {
            display: inline !important;
        }

    </style>
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
                    CETAK QR CODE
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="row mt-3">
                    <div class="col-3 d-flex align-items-center">
                        <p class="h6 p-0 m-0 risda-dg">KOD NAMA KURSUS</p>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" value="{{ $jadual_kursus->kursus_kod_nama_kursus }}"
                            readonly>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3 d-flex align-items-center">
                        <p class="h6 p-0 m-0 risda-dg">NAMA KURSUS</p>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" value="{{ $jadual_kursus->kursus_nama }}" readonly>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3 d-flex align-items-center">
                        <p class="h6 p-0 m-0 risda-dg">TARIKH KURSUS</p>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" value="{{ $jadual_kursus->tarikh_mula }}" readonly>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-3 d-flex align-items-center">
                        <p class="h6 p-0 m-0 risda-dg">TEMPAT KURSUS</p>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" value="{{ $jadual_kursus->kursus_tempat }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="table-responsive scrollbar ">
                    <table class="table text-center" style="vertical-align: middle">
                        <thead>
                            <tr>
                                <th class="fw-bold text-dark" scope="col">BIL.</th>
                                <th class="fw-bold text-dark" scope="col">PENILAIAN</th>
                                <th class="fw-bold text-dark" scope="col">KOD QR</th>
                                <th class="fw-bold text-dark" scope="col">CETAK KOD QR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5>1.</h5>
                                </td>
                                <td>
                                    <p class="h5 risda-g">PENILAIAN KURSUS</p>
                                </td>
                                <td>
                                    <div class="qrcode" id="qr1"></div>
                                </td>
                                <td><a href="#" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>2.</h5>
                                </td>
                                <td>
                                    <p class="h5 risda-g">PENILAIAN PRE TEST</p>
                                </td>
                                <td>
                                    <div class="qrcode" id="qr2"></div>
                                </td>
                                <td><a href="#" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>3.</h5>
                                </td>
                                <td>
                                    <p class="h5 risda-g">PENILAIAN POST TEST</p>
                                </td>
                                <td>kod qr</td>
                                <td><a href="#" class="btn btn-primary"><i class="fas fa-print"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var outUrl1 = APP_URL + "/penilaian/penilaian-kursus";
            new QRCode(document.getElementById('qr1'), {
                text: outUrl1,
                width: 90,
                height: 90,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H,
            });

            var outUrl2 = APP_URL + "/penilaian/jawab-pre-post-test";
            new QRCode(document.getElementById('qr2'), {
                text: outUrl2,
                width: 90,
                height: 90,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H,
            });

        });
    </script>
@endsection
