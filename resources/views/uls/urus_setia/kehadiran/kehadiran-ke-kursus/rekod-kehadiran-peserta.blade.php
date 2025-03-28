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
                <p class="h5" style="color: rgb(43,93,53); ">MEREKOD KEHADIRAN </p>
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

        {{-- <div class="row justify-content-center mt-5">
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">KOD NAMA KURSUS</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-4" value="{{ $jadualkursus->kursus_kod_nama_kursus }}"
                        readonly>
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-3" value="{{ $jadualkursus->kursus_nama }}" readonly>
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-3"
                        value="{{ date('d-m-Y', strtotime($jadualkursus->tarikh_mula)) }} - {{ date('d-m-Y', strtotime($jadualkursus->tarikh_tamat)) }}"
                        readonly>
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">HARI</p>
                </div>
                <div class="col-8">
                    <select class="form-select" id="select-hari">
                        <option disabled hidden selected>Pilih</option>
                        <?= $temp = 0 ?>
                        @foreach ($aturcara as $val)
                            @if ($temp != $val->ac_hari)
                                <option value="{{ $val->ac_hari }}">{{ $val->hari }}</option>
                            @endif
                            <?= $temp = $val->ac_hari ?>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">SESI</p>
                </div>
                <div class="col-8">
                    <select class="form-select" id="select-sesi">
                        <option selected value="1">Sesi 1</option>
                        <option value="2">Sesi 2</option>
                    </select>
                </div>
            </div>
        </div> --}}

        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="pt-2 fw-bold">KOD NAMA KURSUS</p>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control mb-4" value="{{ $jadualkursus->kursus_kod_nama_kursus }}"
                            readonly>
                    </div>
                    <div class="col-lg-4">
                        <p class="pt-2 fw-bold">NAMA KURSUS</p>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control mb-3" value="{{ $jadualkursus->kursus_nama }}" readonly>
                    </div>
                    <div class="col-lg-4">
                        <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control mb-3"
                            value="{{ date('d-m-Y', strtotime($jadualkursus->tarikh_mula)) }} - {{ date('d-m-Y', strtotime($jadualkursus->tarikh_tamat)) }}"
                            readonly>
                    </div>
                    <div class="col-lg-4">
                        <p class="pt-2 fw-bold">HARI</p>
                    </div>
                    <div class="col-lg-8">
                        <select class="form-select" id="select-hari">
                            <option disabled hidden selected>Pilih</option>
                            <?= $temp = 0 ?>
                            @foreach ($aturcara as $val)
                                @if ($temp != $val->ac_hari)
                                    <option value="{{ $val->ac_hari }}">{{ $val->hari }}</option>
                                @endif
                                <?= $temp = $val->ac_hari ?>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <p class="pt-2 fw-bold">SESI</p>
                    </div>
                    <div class="col-lg-8">
                        <select class="form-select" id="select-sesi">
                            <option selected value="1">Sesi 1</option>
                            <option value="2">Sesi 2</option>
                        </select>
                    </div>
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
                        {{-- <th scope="col">PUSAT <br> TANGGUNGJAWAB</th>
                        <th scope="col">GRED</th> --}}
                        <th scope="col">STATUS KEHADIRAN <br> SEBELUM KURSUS</th>
                        <th scope="col">STATUS KEHADIRAN</th>
                        <th scope="col">STATUS STAFF</th>
                        <th scope="col">NO. KAD <br> PENGENALAN <br> PENGGANTI</th>
                        <th scope="col">NAMA <br> PENGGANTI</th>
                        <th scope="col">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody id="table-body">

                </tbody>
            </table>
        </div>

    </div>

    @foreach ($list as $l)
        <div class="modal fade" id="modal-rekod-kehadiran_{{ $l->id }}" data-bs-keyboard="false"
            data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal-rekod-kehadiranLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg mt-6" role="document">
                <div class="modal-content border-0">
                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="upd" method="post" id="form_kehadiran_update">
                        @csrf
                        @method('put')
                        <div class="modal-body p-0">
                            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                <p class="mb-1 h4 fw-bold" style="color: rgb(15, 94, 49);" id="modal-rekod-kehadiranLabel">
                                    REKOD
                                    KEHADIRAN</p>
                            </div>
                            <div class="p-4">
                                <div class="row justify-content-center">
                                    <div class="col-8 mb-4">
                                        <div class="col-5 d-inline-flex">
                                            <span class="">STATUS STAF</span>
                                        </div>
                                        <div class="col-6 d-inline-flex">
                                            <select class="form-select cubatry" id="status-staff" name="status_staff">
                                                @if ($l->nama_pengganti == null)
                                                    <option value="Calon Asal" selected hidden>Calon Asal</option>
                                                @else
                                                    <option value="Pengganti" selected hidden>Pengganti</option>
                                                @endif
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
                                            <select class="form-select" name="nama_calon_asal">
                                                <option value="{{ $l->staff->name }}" selected hidden>{{ $l->staff->name }}
                                                </option>
                                                @foreach ($pesertaUls as $pUls)
                                                    <option value="{{ $pUls->name }}">{{ $pUls->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8 mb-4 pengganti">
                                        <div class="col-5 d-inline-flex">
                                            <span class="">NO KAD PENGENALAN PENGGANTI</span>
                                        </div>
                                        <div class="col-6 d-inline-flex">
                                            <input type="text" class="form-control" name="kad_pengenalan_pengganti">
                                        </div>
                                    </div>
                                    <div class="col-8 mb-4 pengganti">
                                        <div class="col-5 d-inline-flex">
                                            <span class="">NAMA PENGGANTI</span>
                                        </div>
                                        <div class="col-6 d-inline-flex">
                                            <input type="text" class="form-control" name="nama_pengganti">
                                        </div>
                                    </div>
                                    <div class="col-8 mb-4">
                                        <div class="col-5 d-inline-flex">
                                            <span class="">STATUS KEHADIRAN</span>
                                        </div>
                                        <div class="col-6 d-inline-flex">
                                            <select class="form-select" name="status_kehadiran">
                                                @if ($l->tarikh_imbasQR == null)
                                                    <option value="TIDAK HADIR" selected hidden>TIDAK HADIR</option>
                                                @else
                                                    <option value="HADIR" selected hidden>HADIR</option>
                                                @endif
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

                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-rekod-ketidakhadiran_{{ $l->id }}" data-bs-keyboard="false"
            data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal-rekod-ketidakhadiranLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg mt-6" role="document">
                <div class="modal-content border-0">
                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="upd2" id="form_kehadiran_update2" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body p-0">
                            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                <p class="mb-1 h4 fw-bold" style="color: rgb(15, 94, 49);"
                                    id="modal-rekod-ketidakhadiranLabel">
                                    Alasan Ketidakhadirann</p>
                            </div>
                            <div class="p-4">
                                <div class="row justify-content-center">
                                    <div class="col-10 mb-4">
                                        <div class="col-5 d-inline-flex">
                                            <span class="">STATUS STAF</span>
                                        </div>
                                        <div class="col-6 d-inline-flex">
                                            <select class="form-select" name="jenis_kehadiran">
                                                <option value="1">KEHADIRAN SEBELUM KURSUS</option>
                                                <option value="2">KEHADIRAN KE KURSUS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-10 mb-4">
                                        <div class="col-5 d-inline-flex">
                                            <span class="">ALASAN</span>
                                        </div>
                                        <div class="col-6 d-inline-flex">
                                            <textarea type="text" class="form-control" rows="3" name="alasan">{{$l->alasan_ketidakhadiran_ke_kursus}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3 text-end">
                                        <button class="btn btn-primary" type="submit"><span class="far fa-save"></span>
                                            Simpan</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        $(document).ready(function() {
            $(".pengganti").hide();
        });

        $(".cubatry").change(function() {
            console.log('b '+this.value);
            if (this.value == "Pengganti") {
                $(".pengganti").show();
            } else {
                $(".pengganti").hide();
            }
        });

        $("#select-hari").change(function() {
            $('.datatable').dataTable().fnClearTable();
            $('.datatable').dataTable().fnDestroy();
            $("#table-body").html("");
            var aturcara = @json($list->toArray());
            var sesi = $("#select-sesi").val();
            var iteration = 1;

            console.log(aturcara);

            aturcara.forEach(e => {
                console.log(this.value);
                let status = 'CALON ASAL';
                let nama_pengganti = '-';
                let ic_pengganti = '-';
                if (e.aturcara.ac_hari == this.value && e.aturcara.ac_sesi == sesi) {
                    if (e.nama_pengganti != null) {
                        status = 'PENGGANTI';
                        nama_pengganti = e.pengganti.name;
                        ic_pengganti = e.pengganti.no_KP;
                    }
                    $("#table-body").append(`
                            <tr>
                                <td>` + iteration + `</td>
                                <td>` + e.staff.no_KP + `</td>
                                <td>` + e.staff.name + `</td>
                                
                                <td>` + (e.status_kehadiran ?? '-') + `</td>
                                <td>` + (e.status_kehadiran_ke_kursus ?? '-') + `</td>
                                <td>` + status + `</td>
                                <td>` + ic_pengganti + `</td>
                                <td>` + nama_pengganti + `</td>
                                <td>
                                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-rekod-kehadiran_` + e.id +
                        `" onclick="kemaskini(` + e.id +
                        `)">Kemaskini</button> 
                                <br>
                        ` + (e.status_kehadiran == "TIDAK HADIR" || e.status_kehadiran_ke_kursus ==
                            "TIDAK HADIR" ? `<button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-rekod-ketidakhadiran_` + e.id + `" onclick="kemaskini2(` + e
                            .id +
                            `)">Alasan Ketidakhadiran</button> ` : ""

                        ) + `
                                </td>
                            </tr>
                `);

                    iteration++;
                }
            });
            $('.datatable').dataTable();
        });


        $("#select-sesi").change(function() {
            $('.datatable').dataTable().fnClearTable();
            $('.datatable').dataTable().fnDestroy();
            $("#table-body").html("");

            var aturcara = @json($list->toArray());
            var hari = $("#select-hari").val();
            var iteration = 1;

            aturcara.forEach(e => {
                
                let status = 'CALON ASAL';
                let nama_pengganti = '-';
                let ic_pengganti = '-';
                if (e.aturcara.ac_sesi == this.value && e.aturcara.ac_hari == hari) {
                    if (e.nama_pengganti != null) {
                        status = 'PENGGANTI';
                        nama_pengganti = e.pengganti.name;
                        ic_pengganti = e.pengganti.no_KP;
                    }
                    $("#table-body").append(`
                    <tr>
                                <td>` + iteration + `</td>
                                <td>` + e.staff.no_KP + `</td>
                                <td>` + e.staff.name + `</td>

                                <td>` + (e.status_kehadiran ?? '') + `</td>
                                <td>` + (e.status_kehadiran_ke_kursus ?? '') + `</td>
                                <td>` + status + `</td>
                                <td>` + ic_pengganti + `</td>
                                <td>` + nama_pengganti + `</td>
                                <td>
                                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-rekod-kehadiran_` + e.id +
                        `" onclick="kemaskini(` + e.id +
                        `)">Kemaskini</button> 
                                <br>
                        ` + (e.status_kehadiran == "TIDAK HADIR" || e.status_kehadiran_ke_kursus ==
                            "TIDAK HADIR" ? `<button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-rekod-ketidakhadiran_` + e.id + `" onclick="kemaskini2(` + e
                            .id +
                            `)">Alasan Ketidakhadiran</button> ` : ""

                        ) + `
                                </td>
                            </tr>
                `);

                    iteration++;
                }
            });
            $('.datatable').dataTable();
            
        });


        function kemaskini(data) {
            $(".upd").attr('action', '/us-uls/kehadiran/ke-kursus/update-rekod-kehadiran-peserta/' +
                data);
        }

        function kemaskini2(data) {
            $(".upd2").attr('action', '/us-uls/kehadiran/ke-kursus/update-rekod-kehadiran-peserta2/' +
                data);
        }
    </script>
@endsection
