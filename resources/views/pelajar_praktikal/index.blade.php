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
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PELAJAR PRAKTIKAL</p>

            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI PELAJAR PRAKTIKAL
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
                    <p class="pt-2 fw-bold">STATUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" >
                </div>
            </div>

            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TEMPAT LATIHAN PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>

            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TAHAP PENGAJIAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>

            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA</p>
                </div>
                <div class="col-7">
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
                            <th scope="col">TEMPAT LATIHAN PRAKTIKAL</th>
                            <th scope="col">TARIKH MULA <br> PRAKTIKAL</th>
                            <th scope="col">TARIKH TAMAT <br> PRAKTIKAL</th>
                            <th scope="col">JUMLAH BAYARAN <br>ELAUN</th>
                            <th scope="col">STATUS<br> PRAKTIKAL</th>
                            <th scope="col">STATUS</th>
                            <th class="text-end" scope="col">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelajar as $pelajar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pelajar->no_kp }}</td>
                                <td>{{ $pelajar->nama }}</td>
                                <td>{{ $pelajar->tempat_praktikal }}</td>
                                <td>{{ $pelajar->tarikh_mula }}</td>
                                <td>{{ $pelajar->tarikh_akhir }}</td>
                                <td>{{ $pelajar->kelulusan_awal_pembiayaan}}</td>
                                <td>{{ $pelajar->status_praktikal}}</td>
                                <td>{{ $pelajar->status }}</td>

                                <td class=" text-end">
                                    <a href="/us-uls/PelajarPraktikal/{{$pelajar->id }}/edit"
                                        class="btn btn-primary btn-sm">KEMASKINI</a>

                                    <a href="/us-uls/PelajarPraktikal/{{$pelajar->id }}"
                                            class="btn btn-primary btn-sm">MAKLUMAT ELAUN</a>

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
@endsection
