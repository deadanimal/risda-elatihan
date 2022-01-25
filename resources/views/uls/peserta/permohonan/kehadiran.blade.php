@extends('layouts.risda-base')
@section('content')

    <style>
        table>thead>tr {
            border-color: rgb(0, 150, 64);
            background-color: rgb(0, 150, 64);
            color: white;
            vertical-align: middle;
        }

        table>tbody>tr {
            border-color: rgb(0, 150, 64);
            vertical-align: middle;
        }

    </style>

    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53); letter-spacing: 5px;">PERMOHONAN KURSUS</p>
                <p class="h5" style="color: rgb(43,93,53); ">STATUS PERMOHONAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    KEHADIRAN KE KURSUS
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TAHUN</p>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->tahun_Kursus }}" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->UL_Kod_Kursus }}" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KOD NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->kod_Kursus }}" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->tajuk_Kursus }}" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->tarikh_daftar_Kursus }}" readonly>
                </div>
            </div>

        </div>

        <hr style="color: rgba(81,179,90, 60%);height:2px;">
        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">STATUS</p>
                </div>
                <div class="col-7">
                    <select class="form-control" id="select-in-premohonan">
                        <option disabled selected hidden class=" text-secondary"> SILA PILIH </option>
                        <option value="1">KEHADIRAN SEBELUM KURSUS</option>
                        <option value="2">KEHADIRAN KE KURSUS</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="table-responsive scrollbar rounded" id="table-kehadiran-sebelum-kursus">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">TARIKH</th>
                            <th scope="col">HARI</th>
                            <th scope="col">SESI</th>
                            <th scope="col">MASA</th>
                            <th scope="col">STATUS KEHADIRAN <br> SEBELUM KURSUS</th>
                            <th scope="col">ALASAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kehadiran as $k)

                            @if ($k->sesi == 1)
                                <tr>
                                    <td rowspan="2" class="align-middle">{{ $k->tarikh }}</td>
                                    <td rowspan="2" class="align-middle">{{ $hari[$loop->index / 2] }}</td>
                                    <td>{{ $k->sesi }}</td>
                                    <td>{{ $k->masa }}</td>
                                    <td>
                                        @if ($k->status_kehadiran == null)
                                            <button class="btn btn-primary mx-0" type="button"
                                                onclick="passdata({{ $k->id }})" data-bs-toggle="modal"
                                                data-bs-target="#pengesahan-kehadiran">Pengesahan
                                                Kehadiran</button>

                                        @else
                                            {{ $k->status_kehadiran }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($k->alasan_ketidakhadiran == null)
                                            Null
                                        @else
                                            {{ $k->alasan_ketidakhadiran }}
                                        @endif
                                    </td>
                                </tr>

                            @else
                                <tr>
                                    <td>{{ $k->sesi }}</td>
                                    <td>{{ $k->masa }}</td>
                                    <td>
                                        @if ($k->status_kehadiran == null)
                                            <button class="btn btn-primary mx-0" type="button"
                                                onclick="passdata({{ $k->id }})" data-bs-toggle="modal"
                                                data-bs-target="#pengesahan-kehadiran">Pengesahan
                                                Kehadiran</button>
                                        @else
                                            {{ $k->status_kehadiran }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($k->alasan_ketidakhadiran == null)
                                            Null
                                        @else
                                            {{ $k->alasan_ketidakhadiran }}
                                        @endif
                                    </td>
                                </tr>
                            @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-responsive scrollbar" id="table-kehadiran-ke-kursus">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">TARIKH</th>
                            <th scope="col">HARI</th>
                            <th scope="col">SESI</th>
                            <th scope="col">MASA</th>
                            <th scope="col">STATUS KEHADIRAN <br> SEBELUM KURSUS</th>
                            <th scope="col">ALASAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kehadiran as $k)

                            @if ($k->sesi == 1)
                                <tr>
                                    <td rowspan="2" class="align-middle">{{ $k->tarikh }}</td>
                                    <td rowspan="2" class="align-middle">{{ $hari[$loop->index / 2] }}</td>
                                    <td>{{ $k->sesi }}</td>
                                    <td>{{ $k->masa }}</td>
                                    <td>
                                        @if ($k->status_kehadiran == null)
                                            <button class="btn btn-primary mx-0" type="button"
                                                onclick="passdata({{ $k->id }})" data-bs-toggle="modal"
                                                data-bs-target="#pengesahan-kehadiran">Pengesahan
                                                Kehadiran</button>

                                        @else
                                            {{ $k->status_kehadiran }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($k->alasan_ketidakhadiran == null)
                                            Null
                                        @else
                                            {{ $k->alasan_ketidakhadiran }}
                                        @endif
                                    </td>
                                </tr>

                            @else
                                <tr>
                                    <td>{{ $k->sesi }}</td>
                                    <td>{{ $k->masa }}</td>
                                    <td>
                                        @if ($k->status_kehadiran == null)
                                            <button class="btn btn-primary mx-0" type="button"
                                                onclick="passdata({{ $k->id }})" data-bs-toggle="modal"
                                                data-bs-target="#pengesahan-kehadiran">Pengesahan
                                                Kehadiran</button>
                                        @else
                                            {{ $k->status_kehadiran }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($k->alasan_ketidakhadiran == null)
                                            Null
                                        @else
                                            {{ $k->alasan_ketidakhadiran }}
                                        @endif
                                    </td>
                                </tr>
                            @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="pengesahan-kehadiran" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="pengesahan-kehadiranLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-6" role="document">
            <div class="modal-content border-0">
                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                        <h4 class="mb-1 fw-bold" id="pengesahan-kehadiranLabel" style="color: rgb(15,94,49)">PENGESAHAN
                            KEHADIRAN</h4>
                    </div>
                    <div class="container p-4">
                        <form method="post" action="/permohonan/kehadiran">
                            @csrf
                            <div class="card">
                                <div class="card body">
                                    <div class="row justify-content-center my-5">
                                        <div class="col-8 d-inline-flex">
                                            <div class="col-5">
                                                <p class="h5 mt-1">Status
                                                    Kehadiran</p>
                                            </div>
                                            <div class="col-7">
                                                <select class="form-control" id="kehadiran-select"
                                                    name="status_kehadiran">
                                                    <option disabled hidden selected>Sila Pilih
                                                    </option>
                                                    <option value="HADIR">HADIR
                                                    </option>
                                                    <option value="TIDAK HADIR">
                                                        TIDAK HADIR</option>
                                                </select>
                                            </div>
                                            <input type="hidden" class="kehadiran-update-id" name="id_kehadiran">
                                        </div>
                                        <div class="col-8 d-inline-flex mt-5">
                                            <div class="col-5 kehadiran-alasan">
                                                <p class="h5 mt-1">Alasan</p>
                                            </div>
                                            <div class="col-7 kehadiran-alasan">
                                                <input type="text" class="form-control" name="alasan_ketidakhadiran">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button id="btn-submit-pengesahan" type="submit" class="btn btn-sm btn-primary"><span
                                        class="far fa-paper-plane"></span>
                                    Hantar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $(".kehadiran-alasan").hide();
            $("#table-kehadiran-ke-kursus").hide();
            $("#table-kehadiran-sebelum-kursus").hide();


            $("#select-in-premohonan").change(function() {
                if (this.value == 1) {
                    $("#table-kehadiran-sebelum-kursus").show();
                    $("#table-kehadiran-ke-kursus").hide();
                } else if (this.value == 2) {
                    $("#table-kehadiran-sebelum-kursus").hide();
                    $("#table-kehadiran-ke-kursus").show();
                }
            });


            $("#kehadiran-select").change(function() {
                if (this.value == "TIDAK HADIR") {
                    $(".kehadiran-alasan").show();
                } else {
                    $(".kehadiran-alasan").hide();
                }

            });


        });

        $('#btn-submit-pengesahan').on('click', function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
                title: 'ADAKAH ANDA PASTI?',
                text: "ANDA HANYA DIBENARKAN UNTUK MENGESAHAKAN KEHADIRAN SEBELUM KE KURSUS SATU KALI SAHAJA",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'DISIMPAN!',
                        'ALASAN KETIDAKHADIRAN ANDA TELAH DIKEMASKINI',
                        'success'
                    );
                    setTimeout(() => {
                        form.submit();
                    }, 2000);
                }
            });

        });

        function passdata(data) {
            $('.kehadiran-update-id').val(data);
        }
    </script>

    <script>
        function kemaskinialasan() {

            Swal.fire({
                title: 'ADAKAH ANDA PASTI?',
                text: "ANDA HANYA DIBENARKAN UNTUK MENGEMASKINI ALASAN KETIDAKHADIRAN SATU KALI SAHAJA",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'DISIMPAN!',
                        'ALASAN KETIDAKHADIRAN ANDA TELAH DIKEMASKINI',
                        'success'
                    )
                }
            });
        }

        function pengesahan() {

            Swal.fire({
                title: 'ADAKAH ANDA PASTI?',
                text: "ANDA HANYA DIBENARKAN UNTUK pengesahan SATU KALI SAHAJA",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire(
                        'DISIMPAN!',
                        'ALASAN KETIDAKHADIRAN ANDA TELAH DIKEMASKINI',
                        'success'
                    )
                }
            });
        }
    </script>
@endsection
