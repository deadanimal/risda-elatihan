@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>PENGURUSAN KURSUS</strong></h1>
            <h5 class="risda-dg">SEMAK JADUAL KURSUS - <span class="risda-g">TAMBAH KURSUS</span></h5>
        </div>
    </div>

    <hr class="risda-g">

    <div class="row">
        <div class="col">
            <h5 class="h3">MAKLUMAT KURSUS</h5>
        </div>
    </div>

    <div class="row justify-content-lg-center mt-3">
        <div class="col-lg-10">
            <form action="#">
                <div class="row mb-2">
                    <div class="col-lg-7">
                        <label class="col-form-label p-0">UNIT LATIHAN</label>
                        <select class="form-select form-control" name="kursus_unit_latihan">
                            <option selected="" hidden>Sila Pilih</option>
                            <option value="Staf">Staf</option>
                            <option value="Pekebun Kecil">Pekebun Kecil</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="col-form-label">STATUS</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" />
                            <label class="form-check-label">Aktif</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TAHUN</label>
                            <input class="form-control" type="text" name="tahun" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TARIKH DAFTAR</label>
                            <input class="form-control" type="date" name="kursus_tarikh_daftar" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">BIDANG KURSUS</label>
                        <select class="form-select form-control" name="kursus_bidang">
                            <option selected="" hidden>Sila Pilih</option>
                            @foreach ($bidang as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_Bidang_Kursus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">KATEGORI KURSUS</label>
                        <select class="form-select form-control" name="kod_kategori">
                            <option selected="" hidden>Sila Pilih</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_Kategori_Kursus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">TAJUK KURSUS</label>
                        <select class="form-select form-control" name="kod_kursus">
                            <option selected="" hidden>Sila Pilih</option>
                            @foreach ($tajuk as $t)
                                <option value="{{ $t->id }}">{{ $t->tajuk_Kursus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">SIRI KURSUS</label>
                        <select class="form-select form-control" name="id_siri">
                            <option selected="" hidden>Sila Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="mb-3">
                            <label class="col-form-label">NAMA KURSUS</label>
                            <input class="form-control" type="text" name="kursus_nama" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="mb-3">
                            <label class="col-form-label">KOD NAMA KURSUS</label>
                            <input class="form-control" type="text" name="kursus_kod_nama_kursus" />
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TARIKH MULA KURSUS</label>
                            <input class="form-control" type="date" name="tarikh_mula" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TARIKH TAMAT KURSUS</label>
                            <input class="form-control" type="date" name="tarikh_tamat" />
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TEMPOH KURSUS</label>
                            <input class="form-control" type="text" name="bilangan_hari" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">STATUS PERLAKSANAAN</label>
                            <select class="form-select form-control" name="kursus_status_pelaksanaan">
                                <option selected="" hidden>Sila Pilih</option>
                                @foreach ($status_pelaksanaan as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->Status_Pelaksanaan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">MASA PENDAFTARAN</label>
                            <input class="form-control datetimepicker" name="kursus_masa_pendaftaran" id="timepicker1" type="text"
                                placeholder="H:i"
                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TARIKH TUTUP TAWARAN</label>
                            <input class="form-control datetimepicker" type="date" name="kursus_tarikh_tutup" />
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">KOD HRMIS</label>
                            <input class="form-control" type="text" name="kursus_hrmis" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">JULAT UMUR</label>
                            <div class="row m-0 p-0">
                                <div class="col-lg-4 p-0 m-0">
                                    <input class="form-control" type="text" name="kursus_julat_umur1" />
                                </div>
                                <div class="col-lg-4 p-0 m-0 text-center">
                                    <span class="risda-g">HINGGA</span>
                                </div>
                                <div class="col-lg-4 p-0 m-0">
                                    <input class="form-control" type="text" name="kursus_julat_umur2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">KUMPULAN SASARAN</label>
                        <select class="form-select form-control" name="kursus_kumpulan_sasaran">
                            <option selected="" hidden>Sila Pilih</option>
                            {{-- kumpulan sasaran --}}
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">PENGENDALI LATIHAN</label>
                        <select class="form-select form-control" name="kursus_pengendali_latihan">
                            <option selected="" hidden>Sila Pilih</option>
                            {{-- pengendali latihan --}}
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
