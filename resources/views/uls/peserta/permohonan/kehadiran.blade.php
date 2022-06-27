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
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERMOHONAN KURSUS</p>
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
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->tahun }}" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->kursus_unit_latihan }}" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KOD NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->kursus_kod_nama_kursus }}"
                        readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="{{ $kod_kursus->kursus_nama }}" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3"
                        value="{{ date('d-m-Y', strtotime($kod_kursus->tarikh_mula)) }}" readonly>
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

        {{-- table kehadiran SEBELUM KE KURSUS --}}
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
                        @foreach ($aturcara as $k)
                            <tr>
                                <td class="align-middle">{{ $date[$k->ac_hari - 1] }}</td>
                                <td class="align-middle">{{ $hari[$k->ac_hari - 1] }}</td>
                                <td>{{ $k->ac_sesi }}</td>
                                <td>{{ $k->ac_masa_mula }} - {{ $k->ac_masa_tamat }}</td>
                                @if ($k->status_kehadiran != null)
                                    <td>
                                        {{ $k->status_kehadiran->status_kehadiran }}
                                    </td>
                                    <td>
                                        {{ $k->status_kehadiran['alasan_ketidakhadiran'] ?? '' }}
                                    </td>
                                @else
                                    <td>
                                        <button class="btn btn-primary mx-0" type="button" onclick="" data-bs-toggle="modal"
                                            data-bs-target="#pengesahan-kehadiran-sebelum{{ $k->id }}">Pengesahan
                                            Kehadiran</button>
                                    </td>
                                    <td>
                                        {{ $k->status_kehadiran['alasan_ketidakhadiran'] ?? '' }}
                                    </td>
                                @endif

                            </tr>

                            <div class="modal fade" id="pengesahan-kehadiran-sebelum{{ $k->id }}"
                                data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
                                aria-labelledby="pengesahan-kehadiranLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg mt-6" role="document">
                                    <div class="modal-content border-0">
                                        <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                            <button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-0">
                                            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                <h4 class="mb-1 fw-bold" id="pengesahan-kehadiranLabel"
                                                    style="color: rgb(15,94,49)">PENGESAHAN
                                                    KEHADIRAN</h4>
                                            </div>
                                            <div class="container p-4">
                                                <form method="post" action="/uls/pengesahan_kehadiran">
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
                                                                        <select class="form-control"
                                                                            name="status_kehadiran"
                                                                            onchange="kehadiranalasan2(this,{{ $k->id }})">
                                                                            <option disabled hidden selected>Sila Pilih
                                                                            </option>
                                                                            <option value="HADIR">HADIR
                                                                            </option>
                                                                            <option value="TIDAK HADIR">
                                                                                TIDAK HADIR</option>
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" name="tarikh"
                                                                        value="{{ $date[$k->ac_hari - 1] }}">
                                                                    <input type="hidden" name="sesi"
                                                                        value="{{ $k->ac_sesi }}">
                                                                    <input type="hidden" name="masa"
                                                                        value="{{ $k->ac_masa_mula }}">
                                                                    <input type="hidden" name="jadual_kursus_id"
                                                                        value="{{ $id_jadual }}">
                                                                    <input type="hidden" name="no_pekerja"
                                                                        value="{{ Auth::id() }}">
                                                                    <input type="hidden" name="kod_kursus"
                                                                        value="{{ $k->jadual->kursus_kod_nama_kursus }}">
                                                                    <input type="hidden" name="jadual_kursus_ref"
                                                                        value="{{ $k->id }}">
                                                                    {{-- <input type="hidden" id="kehadiran-update-id"
                                                                    name="id_kehadiran">
                                                                <input type="hidden" id="jenis_kehadiran"
                                                                    name="jenis_kehadiran"> --}}
                                                                </div>
                                                                <div class="col-8 d-inline-flex mt-5">
                                                                    <div class="col-5 d-none"
                                                                        id="alasan-{{ $k->id }}">
                                                                        <p class="h5 mt-1">Alasan</ dp>
                                                                    </div>
                                                                    <div class="col-7 d-none"
                                                                        id="alasan2-{{ $k->id }}">
                                                                        <input type="text" class="form-control"
                                                                            name="alasan_ketidakhadiran">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-end mt-4">
                                                        <button type="submit" class="btn btn-sm btn-primary"><span
                                                                class="far fa-paper-plane"></span>
                                                            Hantar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- table kehadiran KE KURSUS --}}
            <div class="table-responsive scrollbar" id="table-kehadiran-ke-kursus">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">TARIKH</th>
                            <th scope="col">HARI</th>
                            <th scope="col">SESI</th>
                            <th scope="col">MASA</th>
                            <th scope="col">STATUS KEHADIRAN <br> KE KURSUS</th>
                            <th scope="col">ALASAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aturcara as $k)
                            <tr>
                                <td class="align-middle">{{ $date[$k->ac_hari - 1] }}</td>
                                <td class="align-middle">{{ $hari[$k->ac_hari - 1] }}</td>
                                <td>{{ $k->ac_sesi }}</td>
                                <td>{{ $k->ac_masa_mula }} - {{ $k->ac_masa_tamat }}</td>
                                <td>
                                    @if (date('Y-m-d') >= $date[$k->ac_hari - 1])
                                        @if ($k->status_ke_kursus['status_kehadiran_ke_kursus'] == null)
                                            TIDAK HADIR
                                        @elseif($k->status_ke_kursus['status_kehadiran_ke_kursus'] == 'TIDAK HADIR')
                                            TIDAK HADIR
                                        @else
                                            {{ $k->status_ke_kursus['status_kehadiran_ke_kursus'] }}
                                        @endif
                                    @else
                                    @endif

                                </td>
                                <td>
                                    @if (date('Y-m-d') >= $date[$k->ac_hari - 1])
                                        @if ($k->status_ke_kursus['status_kehadiran_ke_kursus'] == null)
                                            <button class="btn btn-primary mx-0" type="button" onclick=""
                                                data-bs-toggle="modal"
                                                data-bs-target="#pengesahan-kehadiran{{ $k->id }}">
                                                Pengesahan Kehadiran
                                            </button>
                                        @else
                                            {{ $k->status_ke_kursus['alasan_ketidakhadiran_ke_kursus'] ?? '' }}
                                        @endif
                                    @else
                                    @endif

                                </td>

                            </tr>

                            <div class="modal fade" id="pengesahan-kehadiran{{ $k->id }}"
                                data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
                                aria-labelledby="pengesahan-kehadiranLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg mt-6" role="document">
                                    <div class="modal-content border-0">
                                        <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                            <button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-0">
                                            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                <h4 class="mb-1 fw-bold" id="pengesahan-kehadiranLabel"
                                                    style="color: rgb(15,94,49)">PENGESAHAN
                                                    KEHADIRAN KE KURSUS</h4>
                                            </div>
                                            <div class="container p-4">
                                                <form method="post" action="/uls/pengesahan_kehadiran">
                                                    @csrf
                                                    <div class="card">
                                                        <div class="card body">
                                                            <div class="row justify-content-center my-5">
                                                                <div class="col-8 d-inline-flex">
                                                                    <div class="col-5">
                                                                        <p class="h5 mt-1">Status Kehadiran</p>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <input type="text" name="status_kehadiran_ke_kursus"
                                                                            id="" value="TIDAK HADIR" class="form-control"
                                                                            readonly>
                                                                        {{-- <select class="form-control"
                                                                            name="status_kehadiran_ke_kursus"
                                                                            onchange="kehadiranalasan(this,{{ $k->id }})">
                                                                            <option disabled hidden selected>Sila Pilih
                                                                            </option>
                                                                            <option value="HADIR">HADIR
                                                                            </option>
                                                                            <option value="TIDAK HADIR">
                                                                                TIDAK HADIR</option>
                                                                        </select> --}}
                                                                    </div>
                                                                    <input type="hidden" name="jenis_input" value="1">
                                                                    <input type="hidden" name="id_keh"
                                                                        value="{{ $k['id'] }}">

                                                                </div>
                                                                <div class="col-8 d-inline-flex mt-5">
                                                                    <div class="col-5"
                                                                        id="alasan-sec-{{ $k->id }}">
                                                                        <p class="h5 mt-1">Alasan</p>
                                                                    </div>
                                                                    <div class="col-7"
                                                                        id="alasan2-sec-{{ $k->id }}">
                                                                        <input type="text" class="form-control"
                                                                            name="alasan_ketidakhadiran_ke_kursus">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-end mt-4">
                                                        <button type="submit" class="btn btn-sm btn-primary"><span
                                                                class="far fa-paper-plane"></span>
                                                            Hantar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

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


        });

        function kehadiranalasan2(el, id) {
            let val = el.value;
            newid = "#alasan-" + id
            newid2 = "#alasan2-" + id
            console.log(val, newid);

            if (val == "TIDAK HADIR") {
                $(newid).removeClass('d-none');
                $(newid2).removeClass('d-none');
            }
            if (val == "HADIR") {
                $(newid).addClass('d-none');
                $(newid2).addClass('d-none');
            }
        }

        function kehadiranalasan(el, id) {
            let val = el.value;
            newid = "#alasan-sec-" + id
            newid2 = "#alasan2-sec-" + id
            console.log(val, newid);

            if (val == "TIDAK HADIR") {
                $(newid).removeClass('d-none');
                $(newid2).removeClass('d-none');
            }
            if (val == "HADIR") {
                $(newid).addClass('d-none');
                $(newid2).addClass('d-none');
            }
        }

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

        // function passdata(data, data2) {
        //     $('#kehadiran-update-id').val(data);
        //     console.log(data2);
        //     $("#jenis_kehadiran").val(data2);
        // }
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
