@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">DUN</h5>
            </div>
        </div>
    
        <hr class="risda-g">
    
        <form action="#" id="form_search">
            <div class="row mt-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-3 ">
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
                        <div class="col-lg-3 ">
                            <label class="col-form-label">PARLIMEN:</label>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <select class="form-select form-control" id="parlimen_search" name="parlimen_search" onchange="filter()">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($parlimen as $p)
                                    @if ($p->status_parlimen == '1')
                                        <option value="{{ $p->U_Parlimen_ID }}">{{ $p->Parlimen }}</option>
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
                                    <form id="form1" action="/utiliti/lokasi/dun" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">NEGERI</label>
                                            <select class="form-select" name="Kod_Negeri" id="ngri">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($negeri as $negeri)
                                                    @if ($negeri->status_negeri == '1')
                                                        <option value="{{ $negeri->U_Negeri_ID }}">{{ $negeri->Negeri }}</option>
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
                                            <input class="form-control" type="text" name="U_Dun_ID"
                                                value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
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
                    <div class="table-responsive scrollbar m-3">
                        <table class="table table-striped datatable" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">KOD DUN</th>
                                    <th class="sort">DUN</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($dun as $key => $d)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $d->U_Dun_ID }}</td>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <form action="/utiliti/lokasi/dun/{{ $d->id }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="col-form-label">NEGERI</label>
                                    <select class="form-select form-control" name="U_Negeri_ID" id="{{$d->id}}" onchange="negeri(this)">
                                        <option selected="" value="{{ $d->U_Negeri_ID }}" hidden>
                                            {{ $d->Negeri->Negeri }}</option>
                                        @foreach ($neg2 as $neg)
                                            @if ($neg['status_negeri'] == '1')
                                                <option value="{{ $neg->U_Negeri_ID }}">
                                                    {{ $neg->Negeri }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">PARLIMEN</label>
                                    <select class="form-select form-control" name="U_Parlimen_ID" id="parlimen_{{$d->id}}">
                                        <option selected="" value="{{ $d->U_Parlimen_ID }}" hidden>
                                            {{ $d->Parlimen->Parlimen }}</option>
                                        {{-- @foreach ($daerah as $d)
                                        @if ($d->status_daerah == '1')
                                            <option value="{{ $d->id }}">{{ $d->Daerah }}</option>
                                        @endif
                                    @endforeach --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">KOD DUN</label>
                                    <input class="form-control" type="text" name="U_Dun_ID"
                                        value="{{ $d->U_Dun_ID }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
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
                            <form method="POST" action="/utiliti/lokasi/dun/{{ $d->id }}">
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

            $('#form_search select[name=parlimen_search]').html("");
            var prl_sc = @json($parlimen->toArray());
            console.log(prl_sc);

            let option_new = "";
            $('#form_search select[name=parlimen_search]').append(
                `<option value='' hidden>Sila Pilih</option>`);
            prl_sc.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form_search select[name=parlimen_search]').append(
                        `<option value=${element.U_Parlimen_ID}>${element.Parlimen}</option>`);
                }
            });
        });
        $('#ngri').change(function() {

            $('#form1 select[name=U_Parlimen_ID]').html("");
            var plm = @json($parlimen->toArray());
            console.log(plm);

            let option_new = "";
            $('#form1 select[name=U_Parlimen_ID]').append(
                `<option selected hidden>Sila Pilih</option>`);
            plm.forEach(element => {
                if (this.value == element.U_Negeri_ID) {
                    $('#form1 select[name=U_Parlimen_ID]').append(
                        `<option value=${element.U_Parlimen_ID}>${element.Parlimen}</option>`);
                }
            });
        });

        function negeri(e) {
            var id = e.id;
            var negeri = e.value;
            var parlimen = @json($parlimen->toArray());
            let option_new = "";
            $('#parlimen_'+id).append(
                `<option value="" selected hidden>Sila Pilih</option>`);
            parlimen.forEach(element => {
                if (negeri == element.U_Negeri_ID) {
                    $('#parlimen_'+id).append(
                        `<option value=${element.U_Parlimen_ID}>${element.Parlimen}</option>`);
                }
            });
        }
                                
        function filter() {
            var id_negeri = $('#negeri_search').val();
            var id_parlimen = $('#parlimen_search').val();
            console.log(id_parlimen);

            $.ajax({
                type: 'get',
                url: '/utiliti/dun/filter',
                data: {
                    'negeri': id_negeri,
                    'parlimen': id_parlimen
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
                                    <td>${ e.U_Dun_ID }</td>
                                    <td>${ e.Dun }</td>
                                    <td>` +
                        (e.status_dun == '1' ?
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
