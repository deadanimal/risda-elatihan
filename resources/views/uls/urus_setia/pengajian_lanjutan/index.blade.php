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
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGAJIAN LANJUTAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">TAMBAH STAFF YANG MENGIKUTI PENGAJIAN LANJUTAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    MAKLUMAT STAFF
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-4">
            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">PUSAT TANGGUNGJAWAB</p>
                </div>
                <div class="col-6">
                    <select class="form-select">
                        <option disabled hidden selected>Sila Pilih</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">NAMA STAFF</p>
                </div>
                <div class="col-6">
                    <select class="form-select">
                        <option disabled hidden selected>Sila Pilih</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>

        <hr style="color: rgba(81,179,90, 60%);height:2px;">


        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    MAKLUMAT PENGAJIAN LANJUTAN
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-4">
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KATEGORI PENGAJIAN LANJUTAN</p>
                </div>
                <div class="col-7">
                    <select class="form-select" id="select-kategori-pengajian-lanjutan">
                        <option disabled hidden selected>Sila Pilih</option>
                        <option value="1">Cuti Belajar - Kursus Jangka Sederhana</option>
                        <option value="1">Cuti Belajar - Diploma</option>
                        <option value="1">Cuti Belajar - Ijazah</option>
                        <option value="1">Cuti Belajar - Sarjana</option>
                        <option value="1">Cuti Belajar - Phd</option>
                        <option value="2">Sambilan - Diploma</option>
                        <option value="2">Sambilan - Ijazah</option>
                        <option value="2">Sambilan - Sarjana</option>
                        <option value="2">Sambilan - Program Keahlian Badan professional</option>
                    </select>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KEMUDAHAN</p>
                </div>
                <div class="col-7">
                    <select class="form-select" id="select-kemudahan1">
                        <option disabled hidden selected>Sila Pilih</option>
                        <option value="">CBBP (Dengan Biasiswa)</option>
                        <option value="">CBBP (Tanpa Biasiswa)</option>
                        <option value="">CBTG (Dengan Biasiswa)</option>
                        <option value="">CBTG (Tanpa Biasiswa)</option>
                    </select>
                    <select class="form-select" id="select-kemudahan2">
                        <option disabled hidden selected>Sila Pilih</option>
                        <option value="">Dengan Biasiswa</option>
                        <option value="">Tanpa Biasiswa</option>
                    </select>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">ANJURAN</p>
                </div>
                <div class="col-7">
                    <select class="form-select">
                        <option disabled hidden selected>Sila Pilih</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">ALAMAT PENGANJUR</p>
                </div>
                <div class="col-7">
                    <textarea rows="3" class="form-control mb-3"></textarea>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">BIDANG PENGAJIAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH MULA PENGAJIAN</p>
                </div>
                <div class="col-3">
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH TAMAT PENGAJIAN</p>
                </div>
                <div class="col-3">
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">STATUS PENGAJIAN LANJUTAN</p>
                </div>
                <div class="col-7">
                    <select class="form-select">
                        <option disabled hidden selected>Sila Pilih</option>
                        <option value="">Masih di dalam pengajian</option>
                        <option value="">Tamat pengajian dengan jaya</option>
                        <option value="">Tidak berjaya tamatkan pengajian</option>
                        <option value="">Berhenti/Tarik Diri</option>
                    </select>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NO. FTCB</p>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="col-10 text-end">
                <a class="btn btn-primary" href="/us-uls/pengajian-lanjutan-yuran"> Seterusnya</a>
            </div>
        </div>


    </div>

    <script>
        $(document).ready(function() {
            $("#select-kemudahan1").hide();
            $("#select-kemudahan2").hide();

            $("#select-kategori-pengajian-lanjutan").change(function() {
                if (this.value == 1) {
                    $("#select-kemudahan1").show();
                    $("#select-kemudahan2").hide();
                }
                if (this.value == 2) {
                    $("#select-kemudahan1").hide();
                    $("#select-kemudahan2").show();
                }
            });
        });
    </script>

@endsection
