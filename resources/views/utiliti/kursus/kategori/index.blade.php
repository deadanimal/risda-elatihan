@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
            <h5 class="risda-dg">KATEGORI KURSUS</h5>
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
                                <form action="/utiliti/kursus/kategori_kursus" method="POST" id="form1">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="col-form-label">UNIT LATIHAN</label>
                                        <select class="form-select" name="UL_Kategori_Kursus" id="unitlatihan">
                                            <option selected="" hidden>Sila Pilih</option>
                                            <option value="Staf">Staf</option>
                                            <option value="Pekebun Kecil">Pekebun Kecil</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">BIDANG KURSUS</label>
                                        <select class="form-select" name="U_Bidang_Kursus" id="kod_bidang">
                                            <option selected="" hidden>Sila Pilih</option>
                                            {{-- @foreach ($bidangKursus as $BK)
                                                <option value="{{ $BK->id }}">{{ $BK->nama_Bidang_Kursus }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">JENIS LATIHAN</label>
                                        <select class="form-select" name="jenis_Kategori_Kursus" id="jenis_kategori">
                                            <option selected="" hidden>Sila Pilih</option>
                                            <option value="Dalaman">Dalaman</option>
                                            <option value="Luaran">Luaran</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">KOD KATEGORI KURSUS</label>
                                        <input class="form-control" type="text" name="kod_Kategori_Kursus" id="kod_kat" />
                                        <input type="hidden" name="no_kod_KK" id="no_kod_KK">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">KATEGORI KURSUS</label>
                                        <input class="form-control" type="text" name="nama_Kategori_Kursus" />
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
                <div class="card-body">
                    <table id="table_negeri " class="table datatable table-striped" style="width:100%">
                        <thead class="bg-200">
                            <tr>
                                <th class="sort">BIL.</th>
                                <th class="sort">UNIT LATIHAN</th>
                                <th class="sort">KOD KATEGORI KURSUS</th>
                                <th class="sort">KATEGORI KURSUS</th>
                                <th class="sort">STATUS</th>
                                <th class="sort">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($kategoriKursus as $key => $KK)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $KK->UL_Kategori_Kursus }}</td>
                                    <td>{{ $KK->kod_Kategori_Kursus }}</td>
                                    <td>{{ $KK->nama_Kategori_Kursus }}</td>
                                    <td>
                                        @if ($KK->status_Kategori_Kursus == '1')
                                            <span class="badge badge-soft-success">Aktif</span>
                                        @else
                                            <span class="badge badge-soft-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_BK_{{ $KK->id }}"><i
                                                class="fas fa-pen"></i></button>
                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_BK_{{ $KK->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit_BK_{{ $KK->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                                    <form action="/utiliti/kursus/kategori_kursus/{{ $KK->id }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="col-form-label">UNIT LATIHAN</label>
                                                            <select class="form-select form-control"
                                                                name="UL_Kategori_Kursus">
                                                                <option selected="" hidden
                                                                    value="{{ $KK->UL_Kategori_Kursus }}">
                                                                    {{ $KK->UL_Kategori_Kursus }}</option>
                                                                <option value="Staf">Staf</option>
                                                                <option value="Pekebun Kecil">Pekebun Kecil</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">BIDANG KURSUS</label>
                                                            <select class="form-select form-control" name="U_Bidang_Kursus">
                                                                <option selected="" hidden
                                                                    value="{{ $KK->U_Bidang_Kursus }}">
                                                                    {{ $KK->nama_Bidang_Kursus }}</option>
                                                                @foreach ($bidangKursus as $bk2)
                                                                    <option value="{{ $bk2->id }}">
                                                                        {{ $bk2->nama_Bidang_Kursus }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">JENIS LATIHAN</label>
                                                            <select class="form-select" name="jenis_Kategori_Kursus"
                                                                id="jenis_kategori">
                                                                <option selected=""
                                                                    value="{{ $KK->jenis_Kategori_Kursus }}" hidden>
                                                                    {{ $KK->jenis_Kategori_Kursus }}</option>
                                                                <option value="Dalaman">Dalaman</option>
                                                                <option value="Luaran">Luaran</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">KOD KATEGORI KURSUS</label>
                                                            <input class="form-control" type="text"
                                                                name="kod_Kategori_Kursus"
                                                                value="{{ $KK->kod_Kategori_Kursus }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">KATEGORI KURSUS</label>
                                                            <input class="form-control" type="text"
                                                                name="nama_Kategori_Kursus"
                                                                value="{{ $KK->nama_Kategori_Kursus }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">STATUS</label>
                                                            <div class="form-check form-switch">
                                                                @if ($KK->status_Kategori_Kursus == '1')
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
                                                            <button class="btn btn-primary" type="submit">Simpan </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="delete_BK_{{ $KK->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
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
                                                        <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                        <br>
                                                        Anda pasti untuk menghapus {{ $KK->nama_kategori_Kursus }}?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST"
                                                        action="/utiliti/kursus/kategori_kursus/{{ $KK->id }}">
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

    <script>
        $('#unitlatihan').change(function() {

            $('#form1 select[name=U_Bidang_Kursus]').html("");
            var bid = @json($bidangKursus->toArray());

            let option_new = "";
            $('#form1 select[name=U_Bidang_Kursus]').append(
                `<option selected='' value='' hidden>Sila Pilih</option>`);
            bid.forEach(element => {
                if (this.value == element.UL_Bidang_Kursus) {
                    $('#form1 select[name=U_Bidang_Kursus]').append(
                        `<option value=${element.id} class=${element.kod_Bidang_Kursus}>${element.nama_Bidang_Kursus}</option>`
                    );
                }
            });
        });

        $('#kod_bidang').change(function() {
            var kod_ul = $('#unitlatihan option:selected').val();
            var kod_bid = $('#kod_bidang option:selected').attr('class');
            var kod_jenis = $('#jenis_kategori option:selected').val();
            var id_bid = $('#kod_bidang option:selected').val();
            id_bid = parseInt(id_bid);
            id_bid = id_bid.toLocaleString('en-US', {
                minimumIntegerDigits: 2,
                useGrouping: false
            });
            var kod_ds = @json($bil_ds->toArray());
            var bil_ds = 1;
            console.log(kod_jenis);
            if (kod_jenis !== "Sila Pilih") {
                if (kod_ds.length != 0) {
                    console.log('a');
                    kod_ds.forEach(element => {
                        kod_bidang = element.U_Bidang_Kursus.toLocaleString('en-US', {
                            minimumIntegerDigits: 2,
                            useGrouping: false
                        });

                        console.log('check = ' + id_bid, kod_bidang);
                        if (id_bid == kod_bidang) {
                            console.log('b');
                            if (element.no_kod_KK != null) {
                                console.log('c');
                                bil_ds = parseInt(element.no_kod_KK) + 1;
                            }
                        }
                    });
                }
                bil_ds = bil_ds.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                });
                console.log('last = ' + bil_ds);

                var kod_ls = @json($bil_ls->toArray());
                var bil_ls = 1;
                if (kod_ls.length != 0) {
                    kod_ls.forEach(element => {
                        kod_bidang = element.U_Bidang_Kursus.toLocaleString('en-US', {
                            minimumIntegerDigits: 2,
                            useGrouping: false
                        });
                        if (id_bid == kod_bidang) {
                            bil_ls = parseInt(element.no_kod_KK) + 1;
                        }
                    });
                }

                bil_ls = bil_ls.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                });

                var kod_pk = @json($bil_pk);
                var bil_pk = 1;
                if (kod_pk.length != 0) {
                    console.log(kod_pk);
                    kod_pk.forEach(element => {
                        kod_bidang = element.U_Bidang_Kursus.toLocaleString('en-US', {
                            minimumIntegerDigits: 2,
                            useGrouping: false
                        });
                        console.log('kod id_bid = '+id_bid, 'kod kod_bidang = '+kod_bidang);
                        if (id_bid == kod_bidang) {
                            console.log('no kk'+element.no_kod_KK);
                            bil_pk = parseInt(element.no_kod_KK) + 1;
                        }
                    });
                }

                bil_pk = bil_pk.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                });

                if (kod_ul == 'Staf') {
                    if (kod_jenis == 'Dalaman') {
                        $('#kod_kat').val('DS' + kod_bid + bil_ds);
                        $('#no_kod_KK').val(bil_ds);
                    } else {
                        $('#kod_kat').val('LS' + kod_bid + bil_ls);
                        $('#no_kod_KK').val(bil_ls);
                    }
                } else {
                    $('#kod_kat').val('PK' + kod_bid + bil_pk);
                    $('#no_kod_KK').val(bil_pk);
                }
            }
        });

        $('#jenis_kategori').change(function() {
            var kod_ul = $('#unitlatihan option:selected').val();
            var kod_bid = $('#kod_bidang option:selected').attr('class');
            var kod_jenis = $('#jenis_kategori option:selected').val();
            var id_bid = $('#kod_bidang option:selected').val();
            id_bid = parseInt(id_bid);
            id_bid = id_bid.toLocaleString('en-US', {
                minimumIntegerDigits: 2,
                useGrouping: false
            });
            var kod_ds = @json($bil_ds->toArray());
            var bil_ds = 1;
            console.log(kod_bid);
            if (typeof kod_bid !== "undefined") {
                if (kod_ds.length != 0) {
                    console.log('a');
                    kod_ds.forEach(element => {
                        kod_bidang = element.U_Bidang_Kursus.toLocaleString('en-US', {
                            minimumIntegerDigits: 2,
                            useGrouping: false
                        });

                        console.log('check = ' + id_bid, kod_bidang);
                        if (id_bid == kod_bidang) {
                            console.log('b');
                            if (element.no_kod_KK != null) {
                                console.log('c');
                                bil_ds = parseInt(element.no_kod_KK) + 1;
                            }
                        }
                    });
                }
                bil_ds = bil_ds.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                });
                console.log('last = ' + bil_ds);

                var kod_ls = @json($bil_ls->toArray());
                var bil_ls = 1;
                if (kod_ls.length != 0) {
                    kod_ls.forEach(element => {
                        kod_bidang = element.U_Bidang_Kursus.toLocaleString('en-US', {
                            minimumIntegerDigits: 2,
                            useGrouping: false
                        });
                        if (id_bid == kod_bidang) {
                            bil_ls = parseInt(element.no_kod_KK) + 1;
                        }
                    });
                }

                bil_ls = bil_ls.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                });

                var kod_pk = @json($bil_pk->toArray());
                var bil_pk = 1;
                if (kod_pk.length != 0) {
                    console.log(kod_pk);
                    kod_pk.forEach(element => {
                        kod_bidang = element.U_Bidang_Kursus.toLocaleString('en-US', {
                            minimumIntegerDigits: 2,
                            useGrouping: false
                        });
                        console.log('kod id_bid = '+id_bid, 'kod kod_bidang = '+kod_bidang);
                        if (id_bid == kod_bidang) {
                            console.log('no kk'+element.no_kod_KK);
                            bil_pk = parseInt(element.no_kod_KK) + 1;
                        }
                    });
                }

                bil_pk = bil_pk.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                });

                if (kod_ul == 'Staf') {
                    if (kod_jenis == 'Dalaman') {
                        $('#kod_kat').val('DS' + kod_bid + bil_ds);
                        $('#no_kod_KK').val(bil_ds);
                    } else {
                        $('#kod_kat').val('LS' + kod_bid + bil_ls);
                        $('#no_kod_KK').val(bil_ls);
                    }
                } else {
                    $('#kod_kat').val('PK' + kod_bid + bil_pk);
                    $('#no_kod_KK').val(bil_pk);
                }
            }
        });
    </script>


@endsection
