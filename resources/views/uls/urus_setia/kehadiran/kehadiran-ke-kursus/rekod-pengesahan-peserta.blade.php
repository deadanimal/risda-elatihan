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
                <p class="h5" style="color: rgb(43,93,53); ">MENGESAH KEHADIRAN</p>
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
                    <input type="text" class="form-control mb-4" value="{{ $jadual_kursus->kursus_kod_nama_kursus }}">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-3" value="{{ $jadual_kursus->kursus_nama }}">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control mb-3"
                        value="{{ $jadual_kursus->tarikh_mula }} HINGGA {{ $jadual_kursus->tarikh_tamat }}">
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
                                <option value="{{ $val->ac_hari }}">{{ $val->hari }} - {{ $val->tarikh }}</option>
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
        </div>

        <hr class="my-4" style="color: rgba(81,179,90, 60%);height:1px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI KEHADIRAN PESERTA
                </p>
            </div>
        </div>
        <form method="post" action="{{ route('update-rekod-pengesahan-peserta') }}">
            @csrf
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
            <div class="text-end mt-3">
                {{-- <input type="hidden" name="kod_kursus" value="{{ $kod_kursus->id }}"> --}}
                <button class="btn btn-primary" type="submit"> Sahkan Calon</button>
            </div>
        </form>

    </div>



    <script>
        $("#pengesahan_peserta").click(function() {
            e.preventDefault();
            var form = $(this).parents('form');

            form.submit();
        });

        $("#select-hari").change(function() {
            $('.datatable').dataTable().fnClearTable();
            $('.datatable').dataTable().fnDestroy();
            $("#table-body").html("");
            var aturcara = @json($list->toArray());
            var sesi = $("#select-sesi").val();
            var iteration = 1;

            aturcara.forEach(element => {
                let status = 'CALON ASAL';
                let nama_pengganti = '-';
                let ic_pengganti = '-';
                if (element.aturcara.ac_hari == this.value && element.aturcara.ac_sesi == sesi) {
                    if (element.nama_pengganti != null) {
                        status = 'PENGGANTI';
                        nama_pengganti = element.pengganti.name;
                        ic_pengganti = element.pengganti.no_KP;
                    }
                    $("#table-body").append(`
                            <tr>
                                <td>` + iteration + `</td>
                                <td>` + element.staff.no_KP + `</td>
                                <td>` + element.staff.name + `</td>
                                <td>` + (element.status_kehadiran ?? '-') + `</td>
                                <td>` + (element.status_kehadiran_ke_kursus ?? '-') + `</td>
                                <td>` + status + `</td>
                                <td>` + ic_pengganti + `</td>
                                <td>` + nama_pengganti + `</td>
                                <td>
                                    ` + (element.pengesahan == "BELUM DISAHKAN" ||
                        element.pengesahan == null ?
                        `<input class="form-check-input" name="pengesahan[` + element.id +
                        `]" type="checkbox" />` : 'DISAHKAN') + `
                                </td>
                            </tr>
                `);
                    iteration++;
                }

            });
            $('.datatable').dataTable();
        });
    </script>
@endsection
