@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">PARLIMEN</h5>
            </div>
        </div>

        <hr class="risda-g">

        <form action="#">
            <div class="row mt-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="col-form-label">NEGERI:</label>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <select class="form-select form-control" name="U_Negeri_ID" id="fil_neg" onchange="filter()">
                                <option selected hidden>Sila Pilih</option>
                                @foreach ($negeri as $n)
                                    @if ($n->status_negeri == '1')
                                        <option value="{{ $n->U_Negeri_ID }}">{{ $n->Negeri }}</option>
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
                                    <form action="/utiliti/lokasi/parlimen" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">NEGERI</label>
                                            <select class="form-select form-control" name="U_Negeri_ID">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($negeri as $negeri)
                                                    @if ($negeri->status_negeri == '1')
                                                        <option value="{{ $negeri->U_Negeri_ID }}">{{ $negeri->Negeri }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD PARLIMEN</label>
                                            <input class="form-control" type="text" name="Parlimen_kod" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">PARLIMEN</label>
                                            <input class="form-control" type="text" name="Parlimen" />
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
                                    <th class="sort">KOD PARLIMEN</th>
                                    <th class="sort">PARLIMEN</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($parlimen as $key => $p)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $p->U_Parlimen_ID }}</td>
                                        <td>{{ $p->Parlimen }}</td>
                                        <td>
                                            @if ($p->status_parlimen == '1')
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_parlimen_{{ $p->id }}">
                                                <i class="fas fa-pen"></i>
                                            </button>

                                            <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_parlimen_{{ $p->id }}">
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

    @foreach ($parlimen as $p)
        <div class="modal fade" id="edit_parlimen_{{ $p->id }}" tabindex="-1"
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
                            <form action="/utiliti/lokasi/parlimen/{{ $p->id }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="col-form-label">NEGERI</label>
                                    <select class="form-select form-control" name="U_Negeri_ID" id="{{$p->id}}" onchange="negeri(this)">
                                        <option selected="" value="{{ $p->U_Negeri_ID }}"
                                            hidden>{{ $p->negeri->Negeri }}</option>
                                        @foreach ($neg2 as $neg)
                                            @if ($neg['status_negeri'] == '1')
                                                <option value="{{ $neg->U_Negeri_ID }}">
                                                    {{ $neg->Negeri }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">KOD PARLIMEN</label>
                                    <input class="form-control" type="text"
                                        name="Parlimen_kod" value="{{ $p->U_Parlimen_ID }}" id="parlimen_{{$p->id}}" />
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">PARLIMEN</label>
                                    <input class="form-control" type="text" name="Parlimen"
                                        value="{{ $p->Parlimen }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">STATUS</label>
                                    <div class="form-check form-switch">
                                        @if ($p->status_parlimen == '1')
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
        <div class="modal fade" id="delete_parlimen_{{ $p->id }}" tabindex="-1"
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
                                Anda pasti untuk menghapus {{ $p->Parlimen }}?

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button"
                                data-bs-dismiss="modal">Batal</button>
                            <form method="POST"
                                action="/utiliti/lokasi/parlimen/{{ $p->id }}">
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

        function negeri(e) {
            var id = e.id;
            var negeri_id = e.value;
            
            // $('#parlimen_'+id).val(negeri_id);
            $('#parlimen_'+id).val('');

        }

        function filter() {
            var id_negeri = $('#fil_neg').val();

            $.ajax({
                type: 'get',
                url: '/utiliti/parlimen/filter',
                data: {
                    'negeri': id_negeri
                },
                success: function(result) {
                    $('.datatable').dataTable().fnClearTable();
                    $('.datatable').dataTable().fnDestroy();
                    $("#t_normal").html("");
                    let iteration = 1;
                    result.forEach(e => {
                        $("#t_normal").append(`
                        <tr>
                            <td>`+iteration+`.</td>
                            <td>`+e.U_Parlimen_ID+`</td>
                            <td>`+e.Parlimen+`</td>
                            <td>`+(e.status_parlimen == '1' ? '<span class="badge badge-soft-success">Aktif</span>' : '<span class="badge badge-soft-danger">Tidak Aktif</span>')+`</td>
                            <td>
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#edit_parlimen_`+e.id+`">
                                    <i class="fas fa-pen"></i>
                                </button>

                                <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                    data-bs-target="#delete_parlimen_`+e.id+`">
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
