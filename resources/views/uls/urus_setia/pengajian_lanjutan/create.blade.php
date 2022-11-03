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

        <form action="/us-uls/pengajian-lanjutan" method="post">
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
                        <select class="form-select form-control" name="pusat_tanggungjawab" id="namapt">
                            <option disabled hidden selected>Sila Pilih</option>
                            @foreach ($pusat_tanggungjawab as $pt => $lol)
                                <option value="{{ $pt }}">{{ $pt }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-4">
                        <p class="pt-2 fw-bold">NAMA STAF</p>
                    </div>
                    <div class="col-6">
                        <select class="form-select form-control" name="staf" id="nama_staf">
                            <option disabled hidden selected>Sila Pilih</option>
                            @foreach ($staf as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
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
                        <select class="form-select form-control" name="kategori_pengajian_lanjutan" id="select-kategori-pengajian-lanjutan">
                            <option disabled hidden selected>Sila Pilih</option>
                            <option value="1">Cuti Belajar - Kursus Jangka Sederhana</option>
                            <option value="2">Cuti Belajar - Diploma</option>
                            <option value="3">Cuti Belajar - Ijazah</option>
                            <option value="4">Cuti Belajar - Sarjana</option>
                            <option value="5">Cuti Belajar - Phd</option>
                            <option value="6">Sambilan - Diploma</option>
                            <option value="7">Sambilan - Ijazah</option>
                            <option value="8">Sambilan - Sarjana</option>
                            <option value="9">Sambilan - Program Keahlian Badan professional</option>
                        </select>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">KEMUDAHAN</p>
                    </div>
                    <div class="col-7">
                        <select class="form-select form-control" name="kemudahan" id="select-kemudahan1">
                            <option disabled hidden selected>Sila Pilih</option>
                            <option value="1">CBBP (Dengan Biasiswa)</option>
                            <option value="2">CBBP (Tanpa Biasiswa)</option>
                            <option value="3">CBTG (Dengan Biasiswa)</option>
                            <option value="4">CBTG (Tanpa Biasiswa)</option>
                        </select>
                        <select class="form-select form-control" name="kemudahan" id="select-kemudahan2">
                            <option disabled hidden selected>Sila Pilih</option>
                            <option value="5">Dengan Biasiswa</option>
                            <option value="6">Tanpa Biasiswa</option>
                        </select>
                    </div>
                </div>
                @if ($ipt == null)
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">Institut Pengajian Tinggi</p>
                    </div>
                    <div class="col-7">
                        <label class="text-danger">Sila tambah kategori "Institut Pengajian Tinggi (IPT)" di bahagian Utiliti Agensi.</label>
                    </div>
                </div>
                @else
                    <div class="col-10 d-inline-flex">
                        <div class="col-5">
                            <p class="pt-2 fw-bold">Institut Pengajian Tinggi</p>
                        </div>
                        <div class="col-7">
                            <select class="form-select form-control" name="anjuran" id="ipt">
                                <option disabled hidden selected>Sila Pilih</option>
                                @foreach ($ipt as $i)
                                    <option value="{{$i->id}}">{{$i->nama_Agensi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">ALAMAT PENGANJUR</p>
                    </div>
                    <div class="col-7">
                        <textarea rows="3" name="alamat_penganjur" class="form-control mb-3" id="alamat_ipt"></textarea>
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">BIDANG PENGAJIAN</p>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="bidang_pengajian">
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TARIKH MULA PENGAJIAN</p>
                    </div>
                    <div class="col-3">
                        <input type="date" name="tarikh_mula_pengajian" class="form-control">
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TARIKH TAMAT PENGAJIAN</p>
                    </div>
                    <div class="col-3">
                        <input type="date" name="tarikh_tamat_pengajian" class="form-control">
                    </div>
                </div>
                <div class="col-10 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">STATUS PENGAJIAN LANJUTAN</p>
                    </div>
                    <div class="col-7">
                        <select class="form-select form-control" name="status_pengajian_lanjutan">
                            <option disabled hidden selected>Sila Pilih</option>
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
                        <input type="text" name="no_ftcb" class="form-control">
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
                if ((this.value == 1) || (this.value == 2) || (this.value == 3) || (this.value == 4) || (this.value == 5)) {
                    $("#select-kemudahan1").show();
                    $("#select-kemudahan2").hide();
                }
                if ((this.value == 6) || (this.value == 7) || (this.value == 8) || (this.value == 9)) {
                    $("#select-kemudahan1").hide();
                    $("#select-kemudahan2").show();
                }
            });
        });

        $('#ipt').change(function () {
            var idipt = $('#ipt').val();
            var ipt = @json($ipt->toArray());
            
            ipt.forEach(e => {
                if (e.id == idipt) {
                    $('#alamat_ipt').val(e.alamat_Agensi_baris1);
                }
            });
        });

        $('#namapt').change(function(){
            var pt = $('#namapt').val();
            var user = @json($list_staf->toArray());

            $('#nama_staf').html("");
            let option_new = "";
            $('#nama_staf').append(
                `<option selected='' value='' hidden>Sila Pilih</option>`);

            user.forEach(e => {
                if (e.NamaPT == pt) {
                    $('#nama_staf').append(
                `<option value='`+e.id_pengguna+`'>`+e.pengguna.name+`</option>`);
                }
            });
        });
    </script>
@endsection
