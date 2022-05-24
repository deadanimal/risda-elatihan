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

        <form action="/us-uls/pengajian-lanjutan/{{ $staf_pl->id }}" method="post">
            @csrf
            <div class="row justify-content-center my-4">
                <div class="col-10 d-inline-flex">
                    <div class="col-4">
                        <p class="pt-2 fw-bold">UNIT LATIHAN</p>
                    </div>
                    <div class="col-6">
                        <input type="text" name="unit_latihan" class="form-control" value="Staf" readonly>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-4">
                        <p class="pt-2 fw-bold">PUSAT TANGGUNGJAWAB</p>
                    </div>
                    <div class="col-6">
                        <select class="form-select" name="pusat_tanggungjawab">
                            <option value="{{ $staf_pl->pusat_tanggungjawab }}" hidden selected>
                                {{ $staf_pl->data_pusat_tanggungjawab->nama_PT }}</option>
                            @foreach ($pusat_tanggungjawab as $pt)
                                <option value="{{ $pt->id }}">{{ $pt->nama_PT }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-4">
                        <p class="pt-2 fw-bold">NAMA STAF</p>
                    </div>
                    <div class="col-6">
                        <select class="form-select" name="staf">
                            <option value="{{ $staf_pl->staf }}" hidden selected>{{ $staf_pl->pengguna->name }}</option>
                            @foreach ($staf as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
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
                        <select class="form-select" name="kategori_pengajian_lanjutan"
                            id="select-kategori-pengajian-lanjutan">
                            <option hidden selected value="{{ $staf_pl->kategori_pengajian_lanjutan }}">
                                @if ($staf_pl->kategori_pengajian_lanjutan == 1)
                                Cuti Belajar - Kursus Jangka Sederhana
                                @elseif($staf_pl->kategori_pengajian_lanjutan == 2)
                                Cuti Belajar - Diploma
                                @elseif($staf_pl->kategori_pengajian_lanjutan == 3)
                                Cuti Belajar - Ijazah
                                @elseif($staf_pl->kategori_pengajian_lanjutan == 4)
                                Cuti Belajar - Sarjana
                                @elseif($staf_pl->kategori_pengajian_lanjutan == 5)
                                Cuti Belajar - Phd
                                @elseif($staf_pl->kategori_pengajian_lanjutan == 6)
                                Sambilan - Diploma
                                @elseif($staf_pl->kategori_pengajian_lanjutan == 7)
                                Sambilan - Ijazah
                                @elseif($staf_pl->kategori_pengajian_lanjutan == 8)
                                Sambilan - Sarjana
                                @elseif($staf_pl->kategori_pengajian_lanjutan == 9)
                                Sambilan - Program Keahlian Badan professional
                                @endif
                            </option>
                            <option value="1" jenis="1">Cuti Belajar - Kursus Jangka Sederhana</option>
                            <option value="2" jenis="1">Cuti Belajar - Diploma</option>
                            <option value="3" jenis="1">Cuti Belajar - Ijazah</option>
                            <option value="4" jenis="1">Cuti Belajar - Sarjana</option>
                            <option value="5" jenis="1">Cuti Belajar - Phd</option>
                            <option value="6" jenis="2">Sambilan - Diploma</option>
                            <option value="7" jenis="2">Sambilan - Ijazah</option>
                            <option value="8" jenis="2">Sambilan - Sarjana</option>
                            <option value="9" jenis="2">Sambilan - Program Keahlian Badan professional</option>
                        </select>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">KEMUDAHAN</p>
                    </div>
                    <div class="col-7">
                        <select class="form-select" name="kemudahan" id="select-kemudahan1">
                            <option disabled hidden selected value="{{ $staf_pl->kemudahan }}">{{ $staf_pl->kemudahan }}
                            </option>
                            <option value="1">CBBP (Dengan Biasiswa)</option>
                            <option value="2">CBBP (Tanpa Biasiswa)</option>
                            <option value="3">CBTG (Dengan Biasiswa)</option>
                            <option value="4">CBTG (Tanpa Biasiswa)</option>
                        </select>
                        <select class="form-select" name="kemudahan" id="select-kemudahan2">
                            <option disabled hidden selected>Sila Pilih</option>
                            <option value="5">Dengan Biasiswa</option>
                            <option value="6">Tanpa Biasiswa</option>
                        </select>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">ANJURAN</p>
                    </div>
                    <div class="col-7">
                        <select class="form-select" name="anjuran">
                            <option disabled hidden selected value="{{ $staf_pl->anjuran }}">{{ $staf_pl->anjuran }}
                            </option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">ALAMAT PENGANJUR</p>
                    </div>
                    <div class="col-7">
                        <textarea rows="3" name="alamat_penganjur" class="form-control mb-3">{{ $staf_pl->alamat_penganjur }}</textarea>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">BIDANG PENGAJIAN</p>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="bidang_pengajian"
                            value="{{ $staf_pl->bidang_pengajian }}">
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TARIKH MULA PENGAJIAN</p>
                    </div>
                    <div class="col-3">
                        <input type="date" name="tarikh_mula_pengajian" class="form-control"
                            value="{{ $staf_pl->tarikh_mula_pengajian }}">
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TARIKH TAMAT PENGAJIAN</p>
                    </div>
                    <div class="col-3">
                        <input type="date" name="tarikh_tamat_pengajian" class="form-control"
                            value="{{ $staf_pl->tarikh_tamat_pengajian }}">
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">STATUS PENGAJIAN LANJUTAN</p>
                    </div>
                    <div class="col-7">
                        <select class="form-select" name="status_pengajian_lanjutan">
                            <option disabled hidden selected value="{{ $staf_pl->status_pengajian_lanjutan }}">
                                @if ($staf_pl->status_pengajian_lanjutan == 1)
                                    Masih di dalam pengajian
                                @elseif($staf_pl->status_pengajian_lanjutan == 2)
                                    Tamat pengajian dengan jaya
                                @elseif($staf_pl->status_pengajian_lanjutan == 3)
                                    Tidak berjaya tamatkan pengajian
                                @elseif($staf_pl->status_pengajian_lanjutan == 4)
                                    Berhenti/Tarik Diri
                                @endif
                            </option>
                            <option value="1">Masih di dalam pengajian</option>
                            <option value="2">Tamat pengajian dengan jaya</option>
                            <option value="3">Tidak berjaya tamatkan pengajian</option>
                            <option value="4">Berhenti/Tarik Diri</option>
                        </select>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">NO. FTCB</p>
                    </div>
                    <div class="col-3">
                        <input type="text" name="no_ftcb" class="form-control" value="{{ $staf_pl->no_ftcb }}">
                    </div>
                </div>

                <div class="col-10 text-end">
                    {{-- <a class="btn btn-primary" href="/us-uls/pengajian-lanjutan-yuran"> Seterusnya</a> --}}
                    <button type="submit" class="btn btn-primary">Seterusnya</button>
                </div>
            </div>
        </form>


    </div>

    <script>
        $(document).ready(function() {
            $("#select-kemudahan1").hide();
            $("#select-kemudahan2").hide();

            $("#select-kategori-pengajian-lanjutan").change(function() {
                let jenis = $('#select-kategori-pengajian-lanjutan option:selected').attr('jenis');
                console.log(jenis);
                if (jenis == 1) {
                    console.log('check1');
                    $("#select-kemudahan1").show();
                    $("#select-kemudahan2").hide();
                }
                if (jenis == 2) {
                    console.log('check2');
                    $("#select-kemudahan1").hide();
                    $("#select-kemudahan2").show();
                }
            });
        });
    </script>
@endsection
