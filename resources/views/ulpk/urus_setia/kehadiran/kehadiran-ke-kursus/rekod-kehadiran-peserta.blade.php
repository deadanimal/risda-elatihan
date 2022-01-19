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
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53); letter-spacing: 5px;">KEHADIRAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">MEREKOD KEHADIRAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    REKOD KEHADIRAN PESERTA
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">KOD NAMA KURSUS</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-4">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">HARI</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">SESI</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
        </div>

        <hr class="my-4" style="color: rgba(81,179,90, 60%);height:1px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI KEHADIRAN PESERTA
                </p>
            </div>
        </div>

        <div class="table-responsive scrollbar mt-4">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">BIL.</th>
                        <th scope="col">NO. KAD <br> PENGENALAN</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">PUSAT <br> TANGGUNGJAWAB</th>
                        <th scope="col">GRED</th>
                        <th scope="col">STATUS KEHADIRAN <br> SEBELUM KURSUS</th>
                        <th scope="col">STATUS KEHADIRAN</th>
                        <th scope="col">STATUS STAFF</th>
                        <th scope="col">NO. KAD <br> PENGENALAN <br> PENGGANTI</th>
                        <th scope="col">NAMA <br> PENGGANTI</th>
                        <th scope="col">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>HADIR</td>
                        <td>HADIR</td>
                        <td>CALON ASAL</td>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-rekod-kehadiran">kemaskini</button>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>HADIR</td>
                        <td>TIDAK HADIR</td>
                        <td>CALON ASAL</td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary btn-sm m-0 mb-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-rekod-kehadiran">kemaskini</button>
                            <button class="btn btn-primary btn-sm m-0 mb-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-rekod-ketidakhadiran">Alasan Ketidakhadiran</button>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>

    </div>



    <div class="modal fade" id="modal-rekod-kehadiran" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="modal-rekod-kehadiranLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                        <p class="mb-1 h4 fw-bold" style="color: rgb(15, 94, 49);" id="modal-rekod-kehadiranLabel">REKOD
                            KEHADIRAN</p>
                    </div>
                    <div class="p-4">
                        <div class="row justify-content-center">
                            <div class="col-8 mb-4">
                                <div class="col-5 d-inline-flex">
                                    <span class="">STATUS STAF</span>
                                </div>
                                <div class="col-6 d-inline-flex">
                                    <select class="form-select" id="status-staff">
                                        <option value="Calon Asal">Calon Asal</option>
                                        <option value="Pengganti">Pengganti</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8 mb-4">
                                <div class="col-5 d-inline-flex">
                                    <span class="">NAMA CALON ASAL</span>
                                </div>
                                <div class="col-6 d-inline-flex">
                                    <select class="form-select">
                                        <option value="NAMA1">NAMA1</option>
                                        <option value="NAMA2">NAMA2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8 mb-4 pengganti">
                                <div class="col-5 d-inline-flex">
                                    <span class="">NO KAD PENGENALAN PENGGANTI</span>
                                </div>
                                <div class="col-6 d-inline-flex">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-8 mb-4 pengganti">
                                <div class="col-5 d-inline-flex">
                                    <span class="">NAMA PENGGANTI</span>
                                </div>
                                <div class="col-6 d-inline-flex">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-8 mb-4">
                                <div class="col-5 d-inline-flex">
                                    <span class="">STATUS KEHADIRAN</span>
                                </div>
                                <div class="col-6 d-inline-flex">
                                    <select class="form-select">
                                        <option value="HADIR">HADIR</option>
                                        <option value="TIDAK HADIR">TIDAK HADIR</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mt-3 text-end">
                                <button class="btn btn-primary" type="submit"><span class="far fa-save"></span>
                                    Simpan</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-rekod-ketidakhadiran" data-bs-keyboard="false" data-bs-backdrop="static"
        tabindex="-1" aria-labelledby="modal-rekod-ketidakhadiranLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                        <p class="mb-1 h4 fw-bold" style="color: rgb(15, 94, 49);" id="modal-rekod-ketidakhadiranLabel">
                            Alasan Ketidakhadiran</p>
                    </div>
                    <div class="p-4">
                        <div class="row justify-content-center">
                            <div class="col-10 mb-4">
                                <div class="col-5 d-inline-flex">
                                    <span class="">STATUS STAF</span>
                                </div>
                                <div class="col-6 d-inline-flex">
                                    <select class="form-select">
                                        <option value="KEHADIRAN SEBELUM KURSUS">KEHADIRAN SEBELUM KURSUS</option>
                                        <option value="KEHADIRAN KE KURSUS">KEHADIRAN KE KURSUS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-10 mb-4">
                                <div class="col-5 d-inline-flex">
                                    <span class="">ALASAN</span>
                                </div>
                                <div class="col-6 d-inline-flex">
                                    <textarea type="text" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-12 mt-3 text-end">
                                <button class="btn btn-primary" type="submit"><span class="far fa-save"></span>
                                    Simpan</button>
                            </div>

                        </div>
                    </div>
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
