@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">MUKIM</h5>
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
                            <select class="form-select form-control" name="negeri_search" id="negeri_search" onchange="filter()">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($negeri as $n)
                                    @if ($n->status_negeri == '1')
                                        <option value="{{ $n->U_Negeri_ID }}">{{ $n->Negeri }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
        
                        <div class="col-lg-3">
                            <label class="col-form-label">DAERAH:</label>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <select class="form-select form-control" name="daerah_search" id="daerah_search" onchange="filter()">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($daerah as $d)
                                    @if ($d->status_daerah == '1')
                                        <option value="{{ $d->U_Daerah_ID }}">{{ $d->Daerah }}</option>
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
                                    <form id="form1" action="/utiliti/lokasi/mukim" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">NEGERI</label>
                                            <select class="form-select form-control" name="U_Negeri_ID" id="ngri">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($negeri as $negeri)
                                                    @if ($negeri->status_negeri == '1')
                                                        <option value="{{ $negeri->U_Negeri_ID }}">{{ $negeri->Negeri }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">DAERAH</label>
                                            <select class="form-select form-control" name="U_Daerah_ID">
                                                <option selected="" hidden>Sila Pilih</option>
                                                {{-- @foreach ($daerah as $d)
                                                @if ($d->status_daerah == '1')
                                                    <option value="{{ $d->id }}">{{ $d->Daerah }}</option>
                                                @endif
                                            @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD MUKIM</label>
                                            <input class="form-control" type="text" name="Mukim_Rkod"
                                                value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">MUKIM</label>
                                            <input class="form-control" type="text" name="Mukim" />
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
                        <table class="datatable table table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">KOD MUKIM</th>
                                    <th class="sort">MUKIM</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($mukim as $key => $m)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $m->U_Mukim_ID }}</td>
                                        <td>{{ $m->Mukim }}</td>
                                        <td>
                                            @if ($m->status_mukim == '1')
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_mukim_{{ $m->id }}">
                                                <i class="fas fa-pen"></i>
                                            </button>

                                            <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_mukim_{{ $m->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            @foreach ($mukim as $m)
                                <div class="modal fade" id="edit_mukim_{{ $m->id }}" tabindex="-1"
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
                                                    <form action="/utiliti/lokasi/mukim/{{ $m->id }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="col-form-label">NEGERI</label>
                                                            <select class="form-select form-control" name="U_Negeri_ID" id="{{$m->id}}" onchange="negeri(this)">
                                                                <option selected="" value="{{ $m->U_Negeri_ID }}" hidden>
                                                                    {{ $m->negeri->Negeri }}</option>
                                                                @foreach ($neg2 as $neg)
                                                                    @if ($neg['status_negeri'] == '1')
                                                                        <option value="{{ $neg->U_Negeri_ID }}">
                                                                            {{ $neg->Negeri }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">DAERAH</label>
                                                            <select class="form-select form-control" name="U_Daerah_ID" id="daerah_{{$m->id}}">
                                                                <option selected="" value="{{ $m->U_Daerah_ID }}" hidden>
                                                                    {{ $m->daerah->Daerah }}</option>
                                                                {{-- @foreach ($daerah as $d)
                                                            @if ($d->status_daerah == '1')
                                                                <option value="{{ $d->id }}">{{ $d->Daerah }}</option>
                                                            @endif
                                                        @endforeach --}}
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">KOD MUKIM</label>
                                                            <input class="form-control" type="number" name="Mukim_Rkod"
                                                                value="{{ $m->U_Mukim_ID }}" readonly />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">MUKIM</label>
                                                            <input class="form-control" type="text" name="Mukim"
                                                                value="{{ $m->Mukim }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">STATUS</label>
                                                            <div class="form-check form-switch">
                                                                @if ($m->status_mukim == '1')
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
                                <div class="modal fade" id="delete_mukim_{{ $m->id }}" tabindex="-1"
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
                                                        Anda pasti untuk menghapus {{ $m->Mukim }}?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="/utiliti/lokasi/mukim/{{ $m->id }}">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // $('#table_mukim').DataTable();

            $('#t_search').hide();
            $('#t_normal').show();
        });
    </script>

    <script>
        $('#negeri_search').change(function() {

            $('#form_search select[name=daerah_search]').html("");
            var drh_sc = @json($daerah->toArray());
            console.log(drh_sc);

            let option_new = "";
            $('#form_search select[name=daerah_search]').append(
                `<option value="" selected hidden>Sila Pilih</option>`);
            drh_sc.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form_search select[name=daerah_search]').append(
                        `<option value=${element.U_Daerah_ID}>${element.Daerah}</option>`);
                }
            });
        });

        $('#ngri').change(function() {

            $('#form1 select[name=U_Daerah_ID]').html("");
            var drh = @json($daerah->toArray());
            console.log(drh);

            let option_new = "";
            $('#form1 select[name=U_Daerah_ID]').append(
                `<option value="" selected hidden>Sila Pilih</option>`);
            drh.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form1 select[name=U_Daerah_ID]').append(
                        `<option value=${element.U_Daerah_ID}>${element.Daerah}</option>`);
                }
            });
        });
        
        function negeri(e) {
            var id = e.id;
            var negeri_id = e.value;
            var drh = @json($daerah->toArray());

            let option_new = "";
            $('#daerah_'+id).append(
                `<option value="" selected hidden>Sila Pilih</option>`);
            drh.forEach(element => {
                if (negeri_id == element.U_Negeri_ID) {
                    $('#daerah_'+id).append(
                        `<option value=${element.U_Daerah_ID}>${element.Daerah}</option>`);
                }
            });
        }

        function filter() {
            var id_negeri = $('#negeri_search').val();
            var id_daerah = $('#daerah_search').val();
            console.log(id_daerah, id_negeri);

            $.ajax({
                type: 'get',
                url: '/utiliti/mukim/filter',
                data: {
                    'negeri': id_negeri,
                    'daerah': id_daerah
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
                                    <td>${ e.U_Mukim_ID }</td>
                                    <td>${ e.Mukim }</td>
                                    <td>` +
                        (e.status_mukim == '1' ?
                            '<span class="badge badge-soft-success">Aktif</span>' :
                            '<span class="badge badge-soft-danger">Tidak Aktif</span>') +
                        `</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_dun_${ e.id }">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_dun_${ e.id }">
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
