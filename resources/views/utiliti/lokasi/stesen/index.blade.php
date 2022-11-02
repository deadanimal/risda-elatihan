@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">STESEN</h5>
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
                            <select class="form-select form-control" name="negeri_search" onchange="filter()"
                                id="negeri_search">
                                <option value='' selected hidden>Sila Pilih</option>
                                @foreach ($negeri as $n)
                                    @if ($n->status_negeri == '1')
                                        <option rkod="{{$n->Negeri_Rkod}}" value="{{ $n->U_Negeri_ID }}">{{ $n->Negeri }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3">
                            <label class="col-form-label">Pusat Tanggungjawab:</label>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <select class="form-select form-control" onchange="filter()" name="pt_search"
                                id="pt_search">
                                <option value='' selected hidden>Sila Pilih</option>
                                @foreach ($pusat_tanggungjawab as $pt)
                                    @if ($pt->status_PT == '1')
                                        <option value="{{ $pt->kod_PT }}">{{ $pt->nama_PT }}</option>
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
                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#tambah-negeri">
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
                                    <form id="form1" action="/utiliti/lokasi/stesen" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">NEGERI</label>
                                            <select class="form-select form-control" name="U_Negeri_ID" id="negeri_tambah">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($negeri as $n)
                                                    @if ($n->status_negeri == '1')
                                                        <option class="" value="{{ $n->U_Negeri_ID }}">{{ $n->Negeri }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Pusat Tanggungjawab</label>
                                            <select class="form-select form-control" name="Kod_PT"
                                                id="pt_tambah">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($pusat_tanggungjawab as $pt)
                                                    @if ($pt->status_PT == '1')
                                                        <option value="{{ $pt->kod_PT }}">{{ $pt->nama_PT }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD STESEN</label>
                                            <input class="form-control" type="text" name="Stesen_kod" value=""
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">STESEN</label>
                                            <input class="form-control" type="text" name="Stesen" />
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
                                    <th class="sort">KOD STESEN</th>
                                    <th class="sort">STESEN</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($stesen as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->Stesen_kod }}</td>
                                        <td>{{ $s->Stesen }}</td>
                                        <td>
                                            @if ($s->status_stesen == '1')
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_stesen_{{ $s->id }}">
                                                <i class="fas fa-pen"></i>
                                            </button>

                                            <button class="btn risda-bg-dg text-white" type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#delete_stesen_{{ $s->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_stesen_{{ $s->id }}" tabindex="-1"
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
                                                        <form action="/utiliti/lokasi/stesen/{{ $s->id }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="col-form-label">NEGERI</label>
                                                                <select class="form-select" name="U_Negeri_ID">
                                                                    <option selected=""
                                                                        value="{{ $s->U_Negeri_ID }}" hidden>
                                                                        {{ $s->negeri->Negeri }}</option>
                                                                    @foreach ($negeri as $neg)
                                                                        @if ($neg['status_negeri'] == '1')
                                                                            <option value="{{ $neg->id }}">
                                                                                {{ $neg->Negeri }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            {{-- <div class="mb-3">
                                                            <label class="col-form-label">DAERAH</label>
                                                            <select class="form-select" name="U_Daerah_ID"
                                                                id="drah2">
                                                                <option selected=""
                                                                    value="{{ $s->U_Daerah_ID }}" hidden>
                                                                    {{ $s->Daerah }}</option>
                                                                @foreach ($daerah as $d)
                                                                @if ($s->status_daerah == '1')
                                                                    <option value="{{ $s->id }}">{{ $s->Daerah }}</option>
                                                                @endif
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">MUKIM</label>
                                                            <select class="form-select" name="U_Mukim_ID">
                                                                <option selected="" value="{{ $s->U_Mukim_ID }}"
                                                                    hidden>
                                                                    {{ $s->Mukim }}</option>
                                                                @foreach ($daerah as $d)
                                                                @if ($s->status_daerah == '1')
                                                                    <option value="{{ $s->id }}">{{ $s->Daerah }}</option>
                                                                @endif
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">KAMPUNG</label>
                                                            <select class="form-select" name="U_Kampung_ID">
                                                                <option selected=""
                                                                    value="{{ $s->U_Kampung_ID }}" hidden>
                                                                    {{ $s->Kampung }}</option>
                                                                @foreach ($daerah as $d)
                                                                @if ($s->status_daerah == '1')
                                                                    <option value="{{ $s->id }}">{{ $s->Daerah }}</option>
                                                                @endif
                                                            @endforeach
                                                            </select>
                                                        </div> --}}
                                                            <div class="mb-3">
                                                                <label class="col-form-label">KOD STESEN</label>
                                                                <input class="form-control" type="number"
                                                                    name="Stesen_kod" value="{{ $s->Stesen_kod }}"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">STESEN</label>
                                                                <input class="form-control" type="text" name="Stesen"
                                                                    value="{{ $s->Stesen }}" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">STATUS</label>
                                                                <div class="form-check form-switch">
                                                                    @if ($s->status_stesen == '1')
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
                                    <div class="modal fade" id="delete_stesen_{{ $s->id }}" tabindex="-1"
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
                                                            Anda pasti untuk menghapus {{ $s->Stesen }}?

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST"
                                                            action="/utiliti/lokasi/stesen/{{ $s->id }}">
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

    <div id="popup"></div>

    <script>
        function filter() {
            var negeri = $('#negeri_search').val();
            var pusat_tanggungjawab = $('#pt_search').val();
            console.log(negeri, pusat_tanggungjawab);
            $.ajax({
                type: 'get',
                url: '/utiliti/stesen/filter',
                data: {
                    'negeri': negeri,
                    'pusat_tanggungjawab': pusat_tanggungjawab,
                },
                success: function(stesen) {
                    console.log(stesen);
                    $("#t_normal").html("");
                    $("#popup").html("");
                    $('.datatable').dataTable().fnClearTable();
                    $('.datatable').dataTable().fnDestroy();
                    let iteration = 1;

                    stesen.forEach(element => {
                        $("#t_normal").append(`
                        <tr>
                                    <td>` + iteration + `.</td>
                                    <td>${ element.Stesen_kod }</td>
                                    <td>${ element.Stesen }</td>
                                    <td>` +
                            (element.status_stesen == '1' ?
                                '<span class="badge badge-soft-success">Aktif</span>' :
                                '<span class="badge badge-soft-danger">Tidak Aktif</span>') +
                            `</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_stesen_${ element.id }">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_stesen_${ element.id }">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                        `)
                        $("#popup").append(`
                        <div class="modal fade" id="edit_stesen_${ element.id }" tabindex="-1"
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
                                            <form action="/utiliti/lokasi/stesen/${ element.id }"
                                                method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="col-form-label">NEGERI</label>
                                                    <select class="form-select" name="U_Negeri_ID">
                                                        <option selected=""
                                                            value="${ element.U_Negeri_ID }" hidden>
                                                            ${ element.negeri.Negeri }</option>

                                                        @foreach ($negeri as $neg)
                                                            @if ($neg['status_negeri'] == '1')
                                                                <option value="{{ $neg->id }}">
                                                                    {{ $neg->Negeri }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label">PUSAT TANGGUNGJAWAB</label>
                                                    <select class="form-select" name="Kod_PT">
                                                        <option selected=""
                                                            value="${ element.Kod_PT }" hidden>
                                                            ${ element.pusat_tanggungjawab.nama_PT }</option>

                                                            @foreach ($pusat_tanggungjawab as $pt)
                                                                @if ($pt->status_PT == '1')
                                                                    <option value="{{ $pt->kod_PT }}">{{ $pt->nama_PT }}</option>
                                                                @endif
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label">KOD STESEN</label>
                                                    <input class="form-control" type="number"
                                                        name="Stesen_kod" value="${ element.Stesen_kod }"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label">STESEN</label>
                                                    <input class="form-control" type="text" name="Stesen"
                                                        value="${ element.Stesen }" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label">STATUS</label>
                                                    <div class="form-check form-switch">`+
                                                        (element.status_stesen == '1' ? '<input class="form-check-input" type="checkbox" name="status" checked=""/> <label class="form-check-label">Aktif</label>' : '<input class="form-check-input" type="checkbox" name="status"/> <label class="form-check-label">Aktif</label>')
                                                    +`</div>
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
                        <div class="modal fade" id="delete_stesen_${ element.id }" tabindex="-1"
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
                                                Anda pasti untuk menghapus ${ element.Stesen }?

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form method="POST"
                                                action="/utiliti/lokasi/stesen/${ element.id }">
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
                        `);
                        iteration++;
                    });
                    $('.datatable').dataTable();
                    console.log(stesen);
                },
                error: function() {
                    console.log('error');
                },
            });
        }

        $('#negeri_search').change(function() {
            var negeri = $('#negeri_search').val();
            var negeri_rkod = $('#form_search select[name=negeri_search]').children(":selected").attr('rkod');
            console.log('rkod '+negeri_rkod);
            var pt_list = @json($pusat_tanggungjawab->toArray());
            console.log('pt');
            $('#pt_search').html('');
            let option_new = "";
            $('#pt_search').append(`<option value='' hidden selected>Sila Pilih</option>`);

            pt_list.forEach(e => {
                if (negeri_rkod == e.kod_Negeri_PT) {
                    console.log(e.nama_PT);
                    if (e.status_PT == '1') {
                        $('#pt_search').append(`<option value=${e.kod_PT}>${e.nama_PT}</option>`);
                    }
                }
            });
        })
        
    </script>
@endsection
