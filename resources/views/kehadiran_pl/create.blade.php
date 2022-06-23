@extends('layouts.risda-base')
@section('content')
    <style>
        p {
            color: rgb(15, 94, 49);
        }

        .form-control,
        .form-select {
            border-color: rgb(0, 150, 64);
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
    <div class="container-fluid pb-5">
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
                    KEHADIRAN KE PUSAT LATIHAN
                </p>
            </div>
        </div>

        <form action="/kehadiran_pl" method="POST">
            @csrf

                <div class="row justify-content-center mt-5">



                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="agensi_id" value="{{$agensi->id}}">

                    <div class="col-8 d-inline-flex">
                        <div class="col-4">
                            <p class="pt-2 fw-bold">NO KAD PENGENALAN</p>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control mb-3" value="{{Auth::user()->no_KP}}" readonly>
                        </div>
                    </div>

                    <div class="col-8 d-inline-flex">
                        <div class="col-4">
                            <p class="pt-2 fw-bold">NAMA PESERTA</p>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control mb-3" value="{{Auth::user()->name}}" readonly>
                        </div>
                    </div>


                    <div class="col-8 d-inline-flex">
                        <div class="col-4">
                            <p class="pt-2 fw-bold">NAMA PUSAT LATIHAN</p>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control mb-3" value="{{$agensi->nama_Agensi}}" readonly>
                        </div>
                    </div>

                    <div class="col-8 d-inline-flex">
                        <div class="col-4">
                            <p class="pt-2 fw-bold">TARIKH KEHADIRAN</p>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control mb-3" value="{{date('d/m/Y',strtotime($hari_ini))}}" readonly>
                        </div>
                    </div>


                    <div class="col-8 d-inline-flex">
                        <div class="col-4">
                            <p class="pt-2 fw-bold">NAMA KURSUS</p>
                        </div>
                        <div class="col-8">
                            <select name="jadual_kursus_id" class="form-select mb-3" required>
                                <option hidden>Sila Pilih</option>
                                @foreach($kursus as $k)
                                <option style="text-transform:capitalize" value="{{$k->id}}">{{$k->kursus_nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
            </div>

        </div>





    <script>
        $(document).ready(function() {
            $(".pengganti").hide();

            $("#status-staff").change(function() {
                if (this.value == "Pengganti") {
                    $(".pengganti").show();
                } else {
                    $(".pengganti").hide();
                }
            });
        });
    </script>
@endsection
