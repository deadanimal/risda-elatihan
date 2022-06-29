@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">KAMPUNG</h5>
            </div>
        </div>

        <hr class="risda-g">

        <form action="#" id="form_search">
            <div class="row mt-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="row">

                        <div class="col-lg-3">
                            <label class="col-form-label">NEGERI:</label>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <select class="form-select" name="negeri_search" id="negeri_search" onchange="filter()">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($negeri as $n)
                                    @if ($n->status_negeri == '1')
                                        <option value="{{ $n->id }}">{{ $n->Negeri }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3">
                            <label class="col-form-label">DAERAH:</label>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <select class="form-select" id="daerah_search" name="daerah_search" onchange="filter()">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($daerah as $d)
                                    @if ($d->status_daerah == '1')
                                        <option value="{{ $d->id }}">{{ $d->Daerah }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3">
                            <label class="col-form-label">MUKIM:</label>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <select class="form-select" id="mukim_search" name="mukim_search" onchange="filter()">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($mukim as $m)
                                    @if ($m->status_mukim == '1')
                                        <option value="{{ $m->id }}">{{ $m->Mukim }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </form>

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
                                    <form id="form1" action="/utiliti/lokasi/kampung" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">NEGERI</label>
                                            <select class="form-select" name="U_Negeri_ID" id="ngri">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($negeri as $negeri)
                                                    @if ($negeri->status_negeri == '1')
                                                        <option value="{{ $negeri->id }}">{{ $negeri->Negeri }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">DAERAH</label>
                                            <select class="form-select" name="U_Daerah_ID" id="drah">
                                                <option selected="" hidden>Sila Pilih</option>
                                                {{-- @foreach ($daerah as $d)
                                                    @if ($k->status_daerah == '1')
                                                        <option value="{{ $k->id }}">{{ $k->Daerah }}</option>
                                                    @endif
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">MUKIM</label>
                                            <select class="form-select" name="U_Mukim_ID" id="mkim">
                                                <option selected="" hidden>Sila Pilih</option>
                                                {{-- @foreach ($daerah as $d)
                                                    @if ($k->status_daerah == '1')
                                                        <option value="{{ $k->id }}">{{ $k->Daerah }}</option>
                                                    @endif
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD KAMPUNG</label>
                                            <input class="form-control" type="text" name="Kampung_kod" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KAMPUNG</label>
                                            <input class="form-control" type="text" name="Kampung" />
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
                        <table class="table table-striped datatable" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">KOD KAMPUNG</th>
                                    <th class="sort">KAMPUNG</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($kampung as $key => $k)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $k->Kampung_kod }}</td>
                                        <td>{{ $k->Kampung }}</td>
                                        <td>
                                            @if ($k->status_kampung == '1')
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_kampung_{{ $k->id }}">
                                                <i class="fas fa-pen"></i>
                                            </button>

                                            <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_kampung_{{ $k->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_kampung_{{ $k->id }}" tabindex="-1"
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
                                                        <h4 class="mb-1" id="modalExampleDemoLabel">KEMASKINI
                                                        </h4>
                                                    </div>
                                                    <div class="p-4 pb-0">
                                                        <form id="form2"
                                                            action="/utiliti/lokasi/kampung/{{ $k->id }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="col-form-label">NEGERI</label>
                                                                <select class="form-select" name="U_Negeri_ID"
                                                                    id="ngri2">
                                                                    <option selected="" value="{{ $k->U_Negeri_ID }}"
                                                                        hidden>
                                                                        {{ $k->Negeri }}</option>
                                                                    @foreach ($neg2 as $neg)
                                                                        @if ($neg['status_negeri'] == '1')
                                                                            <option value="{{ $neg->id }}">
                                                                                {{ $neg->Negeri }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">DAERAH</label>
                                                                <select class="form-select" name="U_Daerah_ID"
                                                                    id="drah2">
                                                                    <option selected="" value="{{ $k->U_Daerah_ID }}"
                                                                        hidden>
                                                                        {{ $k->Daerah }}</option>
                                                                    {{-- @foreach ($daerah as $d)
                                                                        @if ($k->status_daerah == '1')
                                                                            <option value="{{ $k->id }}">{{ $k->Daerah }}</option>
                                                                        @endif
                                                                    @endforeach --}}
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">MUKIM</label>
                                                                <select class="form-select" name="U_Mukim_ID">
                                                                    <option selected="" value="{{ $k->U_Mukim_ID }}"
                                                                        hidden>
                                                                        {{ $k->Mukim }}</option>
                                                                    {{-- @foreach ($daerah as $d)
                                                                        @if ($k->status_daerah == '1')
                                                                            <option value="{{ $k->id }}">{{ $k->Daerah }}</option>
                                                                        @endif
                                                                    @endforeach --}}
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">KOD KAMPUNG</label>
                                                                <input class="form-control" type="number"
                                                                    name="Kampung_kod" value="{{ $k->Kampung_kod }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">KAMPUNG</label>
                                                                <input class="form-control" type="text" name="Kampung"
                                                                    value="{{ $k->Kampung }}" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">STATUS</label>
                                                                <div class="form-check form-switch">
                                                                    @if ($k->status_kampung == '1')
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
                                    <div class="modal fade" id="delete_kampung_{{ $k->id }}" tabindex="-1"
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
                                                            Anda pasti untuk menghapus {{ $k->Kampung }}?

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST"
                                                            action="/utiliti/lokasi/kampung/{{ $k->id }}">
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

    @foreach ($kampung as $k)
        <div class="modal fade" id="edit_kampung_{{ $k->id }}" tabindex="-1"
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
                            <h4 class="mb-1" id="modalExampleDemoLabel">KEMASKINI
                            </h4>
                        </div>
                        <div class="p-4 pb-0">
                            <form id="form2" action="/utiliti/lokasi/kampung/{{ $k->id }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="col-form-label">NEGERI</label>
                                    <select class="form-select" name="U_Negeri_ID" id="ngri2">
                                        <option selected="" value="{{ $k->U_Negeri_ID }}" hidden>
                                            {{ $k->Negeri }}</option>
                                        @foreach ($neg2 as $neg)
                                            @if ($neg['status_negeri'] == '1')
                                                <option value="{{ $neg->id }}">
                                                    {{ $neg->Negeri }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">DAERAH</label>
                                    <select class="form-select" name="U_Daerah_ID" id="drah2">
                                        <option selected="" value="{{ $k->U_Daerah_ID }}" hidden>
                                            {{ $k->Daerah }}</option>
                                        {{-- @foreach ($daerah as $d)
                                                    @if ($k->status_daerah == '1')
                                                        <option value="{{ $k->id }}">{{ $k->Daerah }}</option>
                                                    @endif
                                                @endforeach --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">MUKIM</label>
                                    <select class="form-select" name="U_Mukim_ID">
                                        <option selected="" value="{{ $k->U_Mukim_ID }}" hidden>
                                            {{ $k->Mukim }}</option>
                                        {{-- @foreach ($daerah as $d)
                                                    @if ($k->status_daerah == '1')
                                                        <option value="{{ $k->id }}">{{ $k->Daerah }}</option>
                                                    @endif
                                                @endforeach --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">KOD KAMPUNG</label>
                                    <input class="form-control" type="text" name="Kampung_kod"
                                        value="{{ $k->Kampung_kod }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">KAMPUNG</label>
                                    <input class="form-control" type="text" name="Kampung"
                                        value="{{ $k->Kampung }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">STATUS</label>
                                    <div class="form-check form-switch">
                                        @if ($k->status_kampung == '1')
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
        <div class="modal fade" id="delete_kampung_{{ $k->id }}" tabindex="-1"
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
                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                <br>
                                Anda pasti untuk menghapus {{ $k->Kampung }}?

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button"
                                data-bs-dismiss="modal">Batal</button>
                            <form method="POST"
                                action="/utiliti/lokasi/kampung/{{ $k->id }}">
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

    <script>
        $('#negeri_search').change(function() {

            $('#form_search select[name=daerah_search]').html("");
            var drh_sc = @json($daerah->toArray());
            console.log(drh_sc);

            let option_new = "";
            $('#form_search select[name=daerah_search]').append(
                `<option value='' hidden>Sila Pilih</option>`);
            drh_sc.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form_search select[name=daerah_search]').append(
                        `<option value=${element.id}>${element.Daerah}</option>`);
                }
            });
        });

        $('#daerah_search').change(function() {

            $('#form_search select[name=mukim_search]').html("");
            var mukim_sc = @json($mukim->toArray());
            console.log(mukim_sc);

            let option_new = "";
            $('#form_search select[name=mukim_search]').append(
                `<option value='' hidden>Sila Pilih</option>`);
            mukim_sc.forEach(element => {
                if (this.value == element.U_Daerah_ID) {
                    $('#form_search select[name=mukim_search]').append(
                        `<option value=${element.id}>${element.Mukim}</option>`);
                }
            });
        });

        $('#ngri').change(function() {

            $('#form1 select[name=U_Daerah_ID]').html("");
            var drh = @json($daerah->toArray());
            console.log(drh);

            let option_new = "";
            $('#form1 select[name=U_Daerah_ID]').append(
                `<option selected hidden>Sila Pilih</option>`);
            drh.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form1 select[name=U_Daerah_ID]').append(
                        `<option value=${element.id}>${element.Daerah}</option>`);
                }
            });
        });

        $('#drah').change(function() {

            $('#form1 select[name=U_Mukim_ID]').html("");
            var mkm = @json($mukim->toArray());
            console.log(mkm);

            let option_new = "";
            $('#form1 select[name=U_Mukim_ID]').append(
                `<option selected hidden>Sila Pilih</option>`);
            mkm.forEach(element => {
                if (this.value == element.U_Daerah_ID) {
                    $('#form1 select[name=U_Mukim_ID]').append(
                        `<option value=${element.id}>${element.Mukim}</option>`);
                }
            });
        });

        $('#ngri2').change(function() {

            $('#form2 select[name=U_Daerah_ID]').html("");
            var drh2 = @json($dae2->toArray());
            console.log(drh2);

            let option_new = "";
            $('#form1 select[name=U_Daerah_ID]').append(
                `<option selected hidden>Sila Pilih</option>`);
            drh2.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form2 select[name=U_Daerah_ID]').append(
                        `<option value=${element.id}>${element.Daerah}</option>`);
                }
            });
        });

        $('#drah2').change(function() {

            $('#form2 select[name=U_Mukim_ID]').html("");
            var mkm2 = @json($muk2->toArray());
            console.log(mkm2);

            let option_new = "";
            $('#form2 select[name=U_Mukim_ID]').append(
                `<option selected hidden>Sila Pilih</option>`);
            mkm2.forEach(element => {
                if (this.value == element.U_Daerah_ID) {
                    $('#form2 select[name=U_Mukim_ID]').append(
                        `<option value=${element.id}>${element.Mukim}</option>`);
                }
            });
        });

        function filter() {
            var id_negeri = $('#negeri_search').val();
            var id_daerah = $('#daerah_search').val();
            var id_mukim = $('#mukim_search').val();

            $.ajax({
                type: 'get',
                url: '/utiliti/kampung/filter',
                data: {
                    'negeri': id_negeri,
                    'daerah': id_daerah,
                    'mukim': id_mukim
                },
                success: function(result) {
                    console.log(result);
                    $('.datatable').dataTable().fnClearTable();
                    $('.datatable').dataTable().fnDestroy();
                    $("#t_normal").html("");
                    let iteration = 1;
                    result.forEach(e => {
                        $("#t_normal").append(`
                        <tr>
                                    <td>` + iteration + `.</td>
                                    <td>${ e.Kampung_kod }</td>
                                    <td>${ e.Kampung }</td>
                                    <td>` +
                        (e.status_kampung == '1' ?
                            '<span class="badge badge-soft-success">Aktif</span>' :
                            '<span class="badge badge-soft-danger">Tidak Aktif</span>') +
                        `</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_kampung_${ e.id }">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_kampung_${ e.id }">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                        `);

                        iteration++;
                    });
                    // console.log(result);
                    $('.datatable').dataTable();
                },
                error: function() {
                    console.log('error');
                },
            });
        }
    </script>
@endsection
