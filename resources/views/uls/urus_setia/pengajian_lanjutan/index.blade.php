@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGAJIAN LANJUTAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">KEHADIRAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI STAF PENGAJIAN LANJUTAN
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-4">
            <div class="col-lg-8 mb-3">
                <div class="row">
                    <div class="col-lg-4 p-lg-0 mb-3">
                        <label class="col-form-label">UNIT LATIHAN:</label>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <input type="text" name="" id="" class="form-control" value="Staf" readonly>
                    </div>

                    <div class="col-lg-4 p-lg-0 mb-3">
                        <label class="col-form-label">PUSAT TANGGUNGJAWAB:</label>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <select class="form-select form-control" onchange="filter()">
                            <option selected hidden disabled>Sila Pilih</option>
                            @foreach ($pusat_tanggungjawab as $pt)
                                <option value="{{$pt->id}}">{{$pt->nama_PT}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-4 p-lg-0 mb-3">
                        <label class="col-form-label">GRED:</label>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <select class="form-select form-control" onchange="filter()">
                            <option selected hidden disabled>Sila Pilih</option>
                            @foreach ($gred as $lol => $ks)
                                <option value="{{ $lol }}">{{ $lol }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-4 p-lg-0 mb-3">
                        <label class="col-form-label">NO. KAD PENGENALAN:</label>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <input type="text" class="form-control" name="nric" placeholder="000000000000" maxlength="12"
                            size="12"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onchange="filter()">
                    </div>

                    <div class="col-lg-4 p-lg-0 mb-3">
                        <label class="col-form-label">NAMA:</label>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <input type="text" name="" id="" class="form-control" onchange="filter()">
                    </div>

                    <div class="col-lg-4 p-lg-0 mb-3">
                        <label class="col-form-label">TAHUN:</label>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <input class="form-control tahun " type="text" name="tahun" id="tahun" autocomplete="off"
                            placeholder="YYYY" onchange="filter()"/>
                    </div>

                    <div class="col-lg-4 p-lg-0 mb-3">
                        <label class="col-form-label">STATUS PENGAJIAN:</label>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <select class="form-select form-control" name="status_pengajian_lanjutan" onchange="filter()">
                            <option disabled hidden selected>Sila Pilih</option>
                            <option value="">Masih di dalam pengajian</option>
                            <option value="">Tamat pengajian dengan jaya</option>
                            <option value="">Tidak berjaya tamatkan pengajian</option>
                            <option value="">Berhenti/Tarik Diri</option>
                        </select>
                    </div>

                    <div class="col-lg-4 p-lg-0 mb-3">
                        <label class="col-form-label">KATEGORI:</label>
                    </div>
                    <div class="col-lg-8 mb-3">
                        <select class="form-select form-control" name="kategori_pengajian_lanjutan" id="select-kategori-pengajian-lanjutan" onchange="filter()">
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
            </div>
        </div>

        <div class="row">
            <div class="col text-end">
                <a href="/us-uls/pengajian-lanjutan/create" class="btn btn-primary">Tambah Staf</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="table-responsive scrollbar m-3">
                        <table class="table datatable table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">NO. KAD PENGENALAN</th>
                                    <th class="sort">NAMA</th>
                                    <th class="sort">JAWATAN</th>
                                    <th class="sort">GRED</th>
                                    <th class="sort">INSTITUT PENGAJIAN TINGGI</th>
                                    <th class="sort">BIDANG PENGAJIAN (MASTER/PHD)</th>
                                    <th class="sort">TARIKH MULA PENGAJIAN</th>
                                    <th class="sort">TARIKH TAMAT PENGAJIAN</th>
                                    <th class="sort">KATEGORI PENGAJIAN</th>
                                    <th class="sort">PEMBIAYAAN</th>
                                    <th class="sort">NAMA PENAJA BIASISWA/INSTITUSI PINJAMAN</th>
                                    <th class="sort">KELULUSAN PEMBIAYAAN (RM)</th>
                                    <th class="sort">JUMLAH PEMBIAYAAN (RM)</th>
                                    <th class="sort">STATUS PENGAJIAN</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($pengajian_lanjutan as $pl)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ($pl->pengguna->no_KP ?? '') }}</td>
                                        <td>{{ ($pl->pengguna->name ?? '') }}</td>
                                        <td>{{ ($pl->data_staf->Jawatan ?? '') }}</td>
                                        <td>{{ ($pl->data_staf->Gred ?? '') }}</td>
                                        <td>{{ ($pl->ipt['nama_Agensi'] ?? '') }}</td>
                                        <td>{{ $pl->bidang_pengajian }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pl->tarikh_mula_pengajian)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pl->tarikh_tamat_pengajian)) }}</td>
                                        <td>
                                            @if ($pl->kategori_pengajian_lanjutan == 1)
                                                Cuti Belajar - Kursus Jangka Sederhana
                                            @elseif($pl->kategori_pengajian_lanjutan == 2)
                                                Cuti Belajar - Diploma
                                            @elseif($pl->kategori_pengajian_lanjutan == 3)
                                                Cuti Belajar - Ijazah
                                            @elseif($pl->kategori_pengajian_lanjutan == 4)
                                                Cuti Belajar - Sarjana
                                            @elseif($pl->kategori_pengajian_lanjutan == 5)
                                                Cuti Belajar - Phd
                                            @elseif($pl->kategori_pengajian_lanjutan == 6)
                                                Sambilan - Diploma
                                            @elseif($pl->kategori_pengajian_lanjutan == 7)
                                                Sambilan - Ijazah
                                            @elseif($pl->kategori_pengajian_lanjutan == 8)
                                                Sambilan - Sarjana
                                            @elseif($pl->kategori_pengajian_lanjutan == 9)
                                                Sambilan - Program Keahlian Badan professional
                                            @endif
                                        </td>
                                        <td>{{ ($pl->perbelanjaan_pl->Perihal ?? '-') }}</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>{{ ($pl->perbelanjaan_pl->Amaun ?? '-') }}</td>
                                        <td>
                                            @if ($pl->status_pengajian_lanjutan == 1)
                                                Masih di dalam pengajian
                                            @elseif($pl->status_pengajian_lanjutan == 2)
                                                Tamat pengajian dengan jaya
                                            @elseif($pl->status_pengajian_lanjutan == 3)
                                                Tidak berjaya tamatkan pengajian
                                            @elseif($pl->status_pengajian_lanjutan == 4)
                                                Berhenti/Tarik Diri
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/us-uls/pengajian-lanjutan/{{ $pl->id }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="/us-uls/pengajian-lanjutan/{{ $pl->id }}/perbelanjaan" class="btn btn-sm btn-primary">
                                                <i class="fas fa-file-invoice-dollar"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
    </div>
@endsection
