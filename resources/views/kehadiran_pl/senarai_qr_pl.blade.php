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
                <p class="h5" style="color: rgb(43,93,53); ">MEREKOD DAN MENGESAHKAN KEHADIRAN</p>
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

        <div class="row justify-content-center mt-5">
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">TAHUN</p>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control mb-4 tahun" placefolder="2022" autocomplete="OFF">
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
                            <th scope="col">NAMA PUSAT LATIHAN</th>
                            <th scope="col">ALAMAT PUSAT LATIHAN</th>
                            <th class="text-end" scope="col">KOD QR</th>
                            <th class="text-end" scope="col">CETAK KOD QR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agensi as $agensi)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$agensi->nama_Agensi}}</td>
                            <td>{{$agensi->alamat_Agensi_baris1}} {{$agensi->alamat_Agensi_baris2}} {{$agensi->alamat_Agensi_baris3}}
                                <br>{{$agensi->poskod}} {{$agensi->daerah->Daerah}}, {{$agensi->negeri->Negeri}}</td>
                            <td>
                                    <div class="qrcode" id="{{$agensi->id}}"></div>
                            </td>
                            <td class=" text-end">
                                <a href="/us-uls/kehadiran/cetak-pl/{{$agensi->id}}" class="btn btn-sm btn-primary"><span class="fas fa-print"></span></a>
                                </td>
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


    <script>
        $(document).ready(function() {
            let qr = $(".qrcode");
            jQuery.each(qr, function(key, val) {
                var outUrl = APP_URL + "/kehadiran_ke_pl/create/ " + val.id;
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
