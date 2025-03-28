@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">KOD KURSUS</h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row mt-5">
            <div class="col">
                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah-negeri">
                    <i class="fas fa-plus"></i> TAMBAH
                </button>
                <div class="modal fade" id="tambah-negeri" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content position-relative">
                            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                    <h4 class="mb-1" id="modalExampleDemoLabel">TAMBAH </h4>
                                </div>
                                <div class="p-4 pb-0">
                                    <form action="/utiliti/kursus/kod_kursus" method="POST" id="form_add">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">UNIT LATIHAN</label>
                                            @role('Urus Setia ULS')
                                            <input type="hidden" name="UL_Kod_Kursus" value="Staf">
                                            <select class="form-select form-control" disabled="true" id="unitlatihan">
                                                <option value="Staf" selected>Staf</option>
                                            </select>
                                            @elserole('Urus Setia UlPK')
                                            <input type="hidden" name="UL_Kod_Kursus" value="Pekebun Kecil">
                                            <select class="form-select form-control" readonly id="unitlatihan">
                                                <option value="Pekebun Kecil" selected>Pekebun Kecil</option>
                                            </select>
                                            @else
                                            <select class="form-select form-control" name="UL_Kod_Kursus" id="unitlatihan">
                                                <option selected="" hidden>Sila Pilih</option>
                                                <option value="Staf">Staf</option>
                                                <option value="Pekebun Kecil">Pekebun Kecil</option>
                                            </select>
                                            @endrole
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">TAHUN</label>
                                            <input class="form-control datepicker" type="text" autocomplete="off"
                                                name="tahun_Kursus" value="{{ $tahun_ini }}" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">TARIKH DAFTAR</label>
                                            <input class="form-control" type="date" name="tarikh_daftar_Kursus"
                                                data-date-format="dd/mm/yyyy" readonly value="{{ $hari_ini }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">BIDANG KURSUS</label>
                                            <select class="form-select form-control" name="U_Bidang_Kursus" id="bid">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($bidangKursus as $BK)
                                                    <option value="{{ $BK->id }}">{{ $BK->nama_Bidang_Kursus }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KATEGORI KURSUS</label>
                                            <select class="form-select form-control" name="U_Kategori_Kursus" id="kat_kur">
                                                <option selected="" hidden>Sila Pilih</option>
                                                {{-- @foreach ($kategoriKursus as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->nama_Kategori_Kursus }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD KURSUS</label>
                                            <input class="form-control" type="text" name="kod_Kursus" id="kod_kur" readonly/>
                                            <input type="hidden" name="no_kod_Kursus" id="no_kod_Kursus">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">TAJUK KURSUS</label>
                                            <input class="form-control" type="text" name="tajuk_Kursus" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">STATUS</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="status" />
                                                <label class="form-check-label">Aktif</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Simpan </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="table-responsive scrollbar m-3">
                        <table class="table datatable table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">UNIT LATIHAN</th>
                                    <th class="sort">KOD KURSUS</th>
                                    <th class="sort">TAJUK KURSUS</th>
                                    <th class="sort">SIRI</th>
                                    <th class="sort">TAHUN</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($kodKursus as $key => $KK)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $KK->UL_Kod_Kursus }}</td>
                                        <td>{{ $KK->kod_Kursus }}</td>
                                        <td>{{ $KK->tajuk_Kursus }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#siri_{{ $KK->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <div class="modal fade" id="siri_{{ $KK->id }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                                                    style="max-width: 500px">
                                                    <div class="modal-content position-relative">
                                                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                            <button
                                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                                <h4 class="mb-1">Siri
                                                                </h4>
                                                            </div>
                                                            <div class="p-3">
                                                                <div class="table-responsive scrollbar text-center">
                                                                    <table class="table table">
                                                                        <thead class="risda-bg-g text-white">
                                                                            <tr>
                                                                                <th class="sort">BIL.</th>
                                                                                <th class="sort">SIRI</th>
                                                                                <th class="sort">NAMA KURSUS</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="bg-white">
                                                                            @foreach ($KK->jadual as $a => $siri)
                                                                            <tr>
                                                                                <td>{{$a+1}}.</td>
                                                                                <td>Siri {{$siri->id_siri}}</td>
                                                                                <td>{{$siri->kursus_nama}}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $KK->tahun_Kursus }}</td>
                                        <td>
                                            @if ($KK->status_Kod_Kursus == '1')
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_BK_{{ $KK->id }}"><i
                                                    class="fas fa-pen"></i></button>
                                            <button class="btn risda-bg-dg text-white btn-sm" type="button"
                                                data-bs-toggle="modal" data-bs-target="#delete_BK_{{ $KK->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <div class="modal fade" id="edit_BK_{{ $KK->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                            style="max-width: 500px">
                                            <div class="modal-content position-relative">
                                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                        <h4 class="mb-1">KEMASKINI
                                                        </h4>
                                                    </div>
                                                    <div class="p-4 pb-0">
                                                        <form action="/utiliti/kursus/kod_kursus/{{ $KK->id }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="col-form-label">UNIT LATIHAN</label>
                                                                <select class="form-select form-control" name="UL_Kod_Kursus">
                                                                    <option selected="" hidden
                                                                        value="{{ $KK->UL_Kod_Kursus }}">
                                                                        {{ $KK->UL_Kod_Kursus }}</option>
                                                                    <option value="Staf">Staf</option>
                                                                    <option value="Pekebun Kecil">Pekebun Kecil</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">TAHUN</label>
                                                                <input class="form-control datepicker" type="text"
                                                                    autocomplete="off" name="tahun_Kursus"
                                                                    value="{{ $KK->tahun_Kursus }}" readonly />

                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">TARIKH DAFTAR</label>
                                                                <input class="form-control" type="date"
                                                                    name="tarikh_daftar_Kursus"
                                                                    data-date-format="dd/mm/yyyy" readonly
                                                                    value="{{ $KK->tarikh_daftar_Kursus }}" />

                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">BIDANG KURSUS</label>
                                                                <select class="form-select form-control" name="U_Bidang_Kursus">
                                                                    <option selected="" hidden
                                                                        value="{{ $KK->U_Bidang_Kursus }}">
                                                                        {{ $KK->bidang->nama_Bidang_Kursus }}</option>
                                                                    @foreach ($bidangKursus as $BK2)
                                                                        <option value="{{ $BK2->id }}">
                                                                            {{ $BK2->nama_Bidang_Kursus }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">KATEGORI KURSUS</label>
                                                                <select class="form-select form-control" name="U_Kategori_Kursus">
                                                                    <option selected="" hidden
                                                                        value="{{ $KK->U_Kategori_Kursus }}">
                                                                        {{ $KK->kategori->nama_Kategori_Kursus }}
                                                                    </option>
                                                                    @foreach ($kategoriKursus as $kat)
                                                                        <option value="{{ $kat->id }}">
                                                                            {{ $kat->nama_Kategori_Kursus }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">KOD KURSUS</label>
                                                                <input class="form-control" name="kod_Kursus" type="text"
                                                                    value="{{ $KK->kod_Kursus }}" readonly />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">TAJUK KURSUS</label>
                                                                <input class="form-control" type="text"
                                                                    name="tajuk_Kursus"
                                                                    value="{{ $KK->tajuk_Kursus }}" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">STATUS</label>
                                                                <div class="form-check form-switch">
                                                                    @if ($KK->status_Kod_Kursus == '1')
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="status" checked="" />
                                                                        <label class="form-check-label">Aktif</label>
                                                                    @else
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="status" />
                                                                        <label class="form-check-label">Aktif</label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button class="btn btn-primary" type="submit">Simpan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete_BK_{{ $KK->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                            style="max-width: 500px">
                                            <div class="modal-content position-relative">
                                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="row">
                                                        <div class="col text-center m-3">
                                                            <i class="far fa-times-circle fa-7x"
                                                                style="color: #ea0606"></i>
                                                            <br>
                                                            Anda pasti untuk menghapus {{ $KK->tajuk_Kursus }}?

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST"
                                                            action="/utiliti/kursus/kod_kursus/{{ $KK->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-primary" type="submit">Hapus
                                                            </button>
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
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $(".datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });

        // pilih UL keluar bidang
        $('#unitlatihan').change(function() {
            $('#form_add select[name=U_Bidang_Kursus]').html("");
            var bid = @json($bidangKursus->toArray());
            console.log(bid);
            let option_new = "";
            $('#form_add select[name=U_Bidang_Kursus]').append(
                `<option selected='' value='' hidden>Sila Pilih</option>`);
            bid.forEach(element => {
                if (this.value == element.UL_Bidang_Kursus) {
                    $('#form_add select[name=U_Bidang_Kursus]').append(
                        `<option value=${element.id} class=${element.kod_Bidang_Kursus}>${element.nama_Bidang_Kursus}</option>`
                    );
                }
            });
        });

        // pilih bidang keluar kategori
        $('#bid').change(function() {
            $('#form_add select[name=U_Kategori_Kursus]').html("");
            var kat_kur = @json($kategoriKursus->toArray());
            console.log(kat_kur);

            let option_new = "";
            $('#form_add select[name=U_Kategori_Kursus]').append(
                `<option value='' hidden>Sila Pilih</option>`);
            kat_kur.forEach(element => {
                if (this.value == element.U_Bidang_Kursus) {
                    $('#form_add select[name=U_Kategori_Kursus]').append(
                        `<option value=${element.id} class=${element.no_kod_KK} nama=${element.kod_Kategori_Kursus}>${element.nama_Kategori_Kursus}</option>`
                    );
                }
            });
        });

        // pilih kategori keluar kodkursus
        $('#kat_kur').change(function() {
            var kod_ul = $('#unitlatihan option:selected').val();
            var kod_bid = $('#kod_bidang option:selected').attr('class');
            var kod_kur = $('#kat_kur option:selected').attr('class');
            var id_kat = $('#kat_kur option:selected').val();
            var nama = $('#kat_kur option:selected').attr('nama');

            if (kod_ul == 'Staf') {
                var kod_staf = @json($bil_staf->toArray());
                console.log(kod_staf.length);
                if (kod_staf.length != 0) {
                    console.log(kod_staf);
                    var bil_kat_kur = 1;
                    kod_staf.forEach(element => {
                        kod_kategori = element.U_Kategori_Kursus;
                        console.log('id kursus = ' + id_kat, 'id kursus dalam db = ' + kod_kategori);
                        if (id_kat == kod_kategori) {
                            if (element.no_kod_Kursus != null) {
                                console.log('masuk', element.no_kod_Kursus);
                                bil_kat_kur = parseInt(element.no_kod_Kursus) + 1;
                            }
                        }
                    })
                    console.log(bil_kat_kur + ' j');
                } else {
                    var bil_kat_kur = 1;
                }
            } else {
                console.log('apa ni');
                var kod_pk = @json($bil_pk->toArray());
                console.log(kod_pk.length);
                if (kod_pk.length != 0) {
                    console.log(kod_pk);
                    var bil_kat_kur = 1;
                    kod_pk.forEach(element => {
                        kod_kategori = element.U_Kategori_Kursus;
                        console.log('id kursus = ' + id_kat, 'id kursus dalam db = ' + kod_kategori);
                        if (id_kat == kod_kategori) {
                            if (element.no_kod_Kursus != null) {
                                console.log('masuk', element.no_kod_Kursus);
                                bil_kat_kur = parseInt(element.no_kod_Kursus) + 1;
                            }
                        }
                    })
                    console.log(bil_kat_kur + ' jpk');
                } else {
                    var bil_kat_kur = 1;
                }
            }


            bil_kat_kur = bil_kat_kur.toLocaleString('en-US', {
                minimumIntegerDigits: 3,
                useGrouping: false
            });

            console.log(bil_kat_kur + ' k');

            var kod_pk = @json($bil_pk);

            $('#kod_kur').val(nama + bil_kat_kur);
            $('#no_kod_Kursus').val(bil_kat_kur);
        });


        $('#bid_upd').change(function() {

            $('#form_upd select[name=U_Kategori_Kursus]').html("");
            var kat_upd = @json($kategoriKursus->toArray());
            console.log(kat_upd);

            let option_new = "";
            kat_upd.forEach(element => {
                if (this.value == element.U_Bidang_Kursus) {
                    $('#form_upd select[name=U_Kategori_Kursus]').append(
                        `<option value=${element.id}>${element.nama_Kategori_Kursus}</option>`);
                }
            });
        });
    </script>
@endsection
