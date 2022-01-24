@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
            <h5 class="risda-dg">DUN</h5>
        </div>
    </div>

    <form action="#" id="form_search">
        <div class="row mt-3 justify-content-center">

            <div class="col-auto">
                <label class="col-form-label">NEGERI:</label>
            </div>
            <div class="col-5">
                <select class="form-select" name="negeri_search" id="negeri_search">
                    <option selected="" hidden></option>
                    @foreach ($negeri as $n)
                        @if ($n->status_negeri == '1')
                            <option value="{{ $n->id }}">{{ $n->Negeri }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

        </div>
        <div class="row mt-3 justify-content-center">

            <div class="col-auto">
                <label class="col-form-label">PARLIMEN:</label>
            </div>
            <div class="col-5">
                <select class="form-select" id="parlimen_search" name="parlimen_search">
                    <option selected="" hidden></option>
                    @foreach ($parlimen as $p)
                        @if ($p->status_daerah == '1')
                            <option value="{{ $p->id }}">{{ $p->Daerah }}</option>
                        @endif
                    @endforeach
                </select>
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
                                <form id="form1" action="/utiliti/dun" method="POST">
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
                                        <label class="col-form-label">PARLIMEN</label>
                                        <select class="form-select" name="U_Parlimen_ID">
                                            <option selected="" hidden>Sila Pilih</option>
                                            {{-- @foreach ($daerah as $d)
                                                @if ($d->status_daerah == '1')
                                                    <option value="{{ $d->id }}">{{ $d->Daerah }}</option>
                                                @endif
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">KOD DUN</label>
                                        <input class="form-control" type="number" name="Dun_kod"
                                            value="{{ $bil }}" readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">DUN</label>
                                        <input class="form-control" type="text" name="Dun" />
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
                    <table id="table_dun" class="table table-striped" style="width:100%">
                        <thead class="bg-200">
                            <tr>
                                <th class="sort">BIL.</th>
                                <th class="sort">KOD DUN</th>
                                <th class="sort">DUN</th>
                                <th class="sort">STATUS</th>
                                <th class="sort">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="t_dun_negeri">

                        </tbody>

                        <tbody class="bg-white" id="t_dun_parlimen">

                        </tbody>
                        @foreach ($dun as $d)
                            <div class="modal fade" id="edit_dun_{{ $d->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
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
                                                <form id="form2" action="/utiliti/dun/{{ $d->id }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="col-form-label">NEGERI</label>
                                                        <select class="form-select" name="U_Negeri_ID" id="ngri">
                                                            <option selected="" value="{{ $d->U_Negeri_ID }}" hidden>
                                                                {{ $d->Negeri }}</option>
                                                            @foreach ($neg2 as $neg)
                                                                @if ($neg['status_negeri'] == '1')
                                                                    <option value="{{ $neg->id }}">
                                                                        {{ $neg->Negeri }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">PARLIMEN</label>
                                                        <select class="form-select" name="U_Parlimen_ID">
                                                            <option selected="" value="{{ $d->U_Parlimen_ID }}" hidden>
                                                                {{ $d->Parlimen }}</option>
                                                            {{-- @foreach ($daerah as $d)
                                                            @if ($d->status_daerah == '1')
                                                                <option value="{{ $d->id }}">{{ $d->Daerah }}</option>
                                                            @endif
                                                        @endforeach --}}
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">KOD DUN</label>
                                                        <input class="form-control" type="number" name="Dun_kod"
                                                            value="{{ $d->Dun_kod }}" readonly />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Dun</label>
                                                        <input class="form-control" type="text" name="Dun"
                                                            value="{{ $d->Dun }}" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">STATUS</label>
                                                        <div class="form-check form-switch">
                                                            @if ($d->status_dun == '1')
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
                            <div class="modal fade" id="delete_dun_{{ $d->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
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
                                                    Anda pasti untuk menghapus {{ $d->Dun }}?

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form method="POST" action="/utiliti/dun/{{ $d->id }}">
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
                        <tbody class="bg-white" id="t_normal">
                            @foreach ($dun as $key => $d)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $d->Dun_kod }}</td>
                                    <td>{{ $d->Dun }}</td>
                                    <td>
                                        @if ($d->status_dun == '1')
                                            <span class="badge badge-soft-success">Aktif</span>
                                        @else
                                            <span class="badge badge-soft-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_dun_{{ $d->id }}">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_dun_{{ $d->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit_dun_{{ $d->id }}" tabindex="-1" role="dialog"
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
                                                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                    <h4 class="mb-1" id="modalExampleDemoLabel">KEMASKINI
                                                    </h4>
                                                </div>
                                                <div class="p-4 pb-0">
                                                    <form id="form2" action="/utiliti/dun/{{ $d->id }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="col-form-label">NEGERI</label>
                                                            <select class="form-select" name="U_Negeri_ID" id="ngri">
                                                                <option selected="" value="{{ $d->U_Negeri_ID }}" hidden>
                                                                    {{ $d->Negeri }}</option>
                                                                @foreach ($neg2 as $neg)
                                                                    @if ($neg['status_negeri'] == '1')
                                                                        <option value="{{ $neg->id }}">
                                                                            {{ $neg->Negeri }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">PARLIMEN</label>
                                                            <select class="form-select" name="U_Parlimen_ID">
                                                                <option selected="" value="{{ $d->U_Parlimen_ID }}"
                                                                    hidden>{{ $d->Parlimen }}</option>
                                                                {{-- @foreach ($daerah as $d)
                                                                    @if ($d->status_daerah == '1')
                                                                        <option value="{{ $d->id }}">{{ $d->Daerah }}</option>
                                                                    @endif
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">KOD DUN</label>
                                                            <input class="form-control" type="number" name="Dun_kod"
                                                                value="{{ $d->Dun_kod }}" readonly />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Dun</label>
                                                            <input class="form-control" type="text" name="Dun"
                                                                value="{{ $d->Dun }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">STATUS</label>
                                                            <div class="form-check form-switch">
                                                                @if ($d->status_dun == '1')
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
                                <div class="modal fade" id="delete_dun_{{ $d->id }}" tabindex="-1"
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
                                                        Anda pasti untuk menghapus {{ $d->Dun }}?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="/utiliti/dun/{{ $d->id }}">
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
        $(document).ready(function() {
            $('#table_dun').DataTable();
            $('#t_dun_negeri').hide();
            $('#t_dun_parlimen').hide();
            $('#t_normal').show();
        });
    </script>

    <script>
        $('#negeri_search').change(function() {

            $('#form_search select[name=parlimen_search]').html("");
            var prl_sc = @json($parlimen->toArray());
            console.log(prl_sc);

            let option_new = "";
            $('#form_search select[name=parlimen_search]').append(
                `<option value='' hidden>Sila Pilih</option>`);
            prl_sc.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form_search select[name=parlimen_search]').append(
                        `<option value=${element.id}>${element.Parlimen}</option>`);
                }
            });
        });
        $('#ngri').change(function() {

            $('#form1 select[name=U_Parlimen_ID]').html("");
            var plm = @json($parlimen->toArray());
            console.log(plm);

            let option_new = "";
            plm.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form1 select[name=U_Parlimen_ID]').append(
                        `<option value=${element.id}>${element.Parlimen}</option>`);
                }
            });
        });

        $('#ngri2').change(function() {

            $('#form2 select[name=U_Parlimen_ID]').html("");
            var plm2 = @json($parlimen->toArray());
            console.log(plm2);

            let option_new = "";
            plm2.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form2 select[name=U_Parlimen_ID]').append(
                        `<option value=${element.id}>${element.Parlimen}</option>`);
                }
            });
        });

        $('#negeri_search').change(function() {
            $('#t_normal').hide();
            $('#t_dun_parlimen').hide();
            $('#t_dun_negeri').show();

            $('#t_dun_negeri').html("");
            var dun_tb = @json($dun->toArray());
            console.log(dun_tb);

            let option_new = "";
            var i = 0;
            dun_tb.forEach(element => {

                if (this.value == element.U_Negeri_ID) {
                    $('#t_dun_negeri').append(
                        `
                                <tr>
                                    <td>` + (i = i + 1) + `.</td>
                                    <td>${ element.Dun_kod }</td>
                                    <td>${ element.Dun }</td>
                                    <td>` +
                        (element.status_dun == '1' ?
                            '<span class="badge badge-soft-success">Aktif</span>' :
                            '<span class="badge badge-soft-danger">Tidak Aktif</span>') +
                        `</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_dun_${ element.id }">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_dun_${ element.id }">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>`);
                }
            });
        });

        $('#parlimen_search').change(function() {
            $('#t_normal').hide();
            $('#t_dun_parlimen').show();
            $('#t_dun_negeri').hide();

            $('#t_dun_parlimen').html("");
            var dun_tb2 = @json($dun->toArray());
            console.log(dun_tb2);

            let option_new = "";
            var i = 0;
            dun_tb2.forEach(element => {

                if (this.value == element.U_Parlimen_ID) {
                    console.log('check');
                    $('#t_dun_parlimen').append(
                        `
                        <tr>
                                    <td>` + (i = i + 1) + `.</td>
                                    <td>${ element.Dun_kod }</td>
                                    <td>${ element.Dun }</td>
                                    <td>` +
                        (element.status_dun == '1' ?
                            '<span class="badge badge-soft-success">Aktif</span>' :
                            '<span class="badge badge-soft-danger">Tidak Aktif</span>') +
                        `</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_dun_${ element.id }">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_dun_${ element.id }">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>`);
                }
            });
        });
    </script>
@endsection
