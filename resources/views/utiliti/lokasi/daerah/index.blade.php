@extends('layouts.risda-base')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">DAERAH</h5>
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
                            <select class="form-select form-control" onchange="daerah_fil(this)" required>
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($negeri as $n)
                                    @if ($n->status_negeri == '1')
                                        <option value="{{ $n->U_Negeri_ID }}">{{ $n->Negeri }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- <input class="form-control form-control-sm" type="text" name="search_negeri" /> --}}
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
                                    <form action="/utiliti/lokasi/daerah" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">NEGERI</label>
                                            <select class="form-select form-control" name="U_Negeri_ID">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($negeri as $n)
                                                        @if ($n->status_negeri == '1')
                                                            <option value="{{ $n->U_Negeri_ID}}">{{ $n->Negeri }}</option>
                                                        @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD DAERAH</label>
                                            <input class="form-control" type="text" name="Kod_Daerah"
                                                value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">DAERAH</label>
                                            <input class="form-control" type="text" name="Daerah" />
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
                        <table id="table_daerah" class="table table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">KOD NEGERI</th>
                                    <th class="sort">DAERAH</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white" id="t_normal">
                                @foreach ($daerah as $key => $d)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $d->U_Negeri_ID }}</td>
                                        <td>{{ $d->Daerah }}</td>
                                        <td>
                                            @if ($d->status_daerah == '1')
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_daerah_{{ $d->id }}">
                                                <i class="fas fa-pen"></i>
                                            </button>

                                            <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_daerah_{{ $d->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @foreach ($daerah as $d)
                                <div class="modal fade" id="edit_daerah_{{ $d->id }}" tabindex="-1" role="dialog"
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
                                                    <form action="/utiliti/lokasi/daerah/{{ $d->id }}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="col-form-label">NEGERI</label>
                                                            <select class="form-select form-control" name="U_Negeri_ID">
                                                                <option hidden>Sila Pilih</option>
                                                                @foreach ($negeri as $neg)
                                                                    @if ($neg['status_negeri'] == '1')
                                                                        <option value="{{ $neg->U_Negeri_ID }}">
                                                                            {{ $neg->Negeri }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">KOD DAERAH</label>
                                                            <input class="form-control" type="number" name="U_Daerah_ID"
                                                                value="{{ $d->U_Daerah_ID }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">DAERAH</label>
                                                            <input class="form-control" type="text" name="Daerah"
                                                                value="{{ $d->Daerah }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">STATUS</label>
                                                            <div class="form-check form-switch">
                                                                @if ($d->status_daerah == '1')
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
                                <div class="modal fade" id="delete_daerah_{{ $d->id }}" tabindex="-1" role="dialog"
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
                                                        Anda pasti untuk menghapus {{ $d->Daerah }}?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="/utiliti/lokasi/daerah/{{ $d->id }}">
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
            $('#table_daerah').DataTable();
            $('#t_daerah').hide();
            $('#t_daerah2').show();
        });

        function daerah_fil(el) {
            var id = el.value;

            $.ajax({
                type: 'get',
                url: '/pengurusan_kursus/filter-daerah/' + id,
                data: {
                    'id': id
                },
                success: function(daerah) {
                    $('#table_daerah').dataTable().fnClearTable();
                    $('#table_daerah').dataTable().fnDestroy();

                    $("#t_normal").html("");
                    let iteration = 1;
                    daerah.forEach(element => {
                        $("#t_normal").append(`
                        <tr>
                                    <td>` + iteration + `.</td>
                                    <td>${ element.U_Daerah_ID }</td>
                                    <td>${ element.Daerah }</td>
                                    <td>` +
                        (element.status_daerah == '1' ?
                            '<span class="badge badge-soft-success">Aktif</span>' :
                            '<span class="badge badge-soft-danger">Tidak Aktif</span>') +
                        `</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_daerah_${ element.id }">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_daerah_${ element.id }">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                        `);

                        iteration++;
                    });
                    // console.log(daerah);
                    $('#table_daerah').dataTable();
                },
                error: function() {
                    console.log('success');
                },
            });
        }

        // $('#negeri_search').change(function() {
        //     $('#t_daerah2').hide();
        //     $('#t_daerah').show();

        //     $('#t_daerah').html("");
        //     var drh = @json($daerah->toArray());
        //     console.log(drh);

        //     let option_new = "";
        //     var i = 0;
        //     drh.forEach(element => {

        //         if (this.value == element.U_Negeri_ID) {
        //             console.log(element.id)
        //             $('#t_daerah').append(
        //                 `
        //                         <tr>
        //                             <td>` + (i = i + 1) + `.</td>
        //                             <td>${ element.Daerah_Rkod }</td>
        //                             <td>${ element.Daerah }</td>
        //                             <td>` +
        //                 (element.status_daerah == '1' ?
        //                     '<span class="badge badge-soft-success">Aktif</span>' :
        //                     '<span class="badge badge-soft-danger">Tidak Aktif</span>') +
        //                 `</td>
        //                             <td>
        //                                 <button class="btn btn-primary" type="button" data-bs-toggle="modal"
        //                                     data-bs-target="#edit_daerah_${ element.id }">
        //                                     <i class="fas fa-pen"></i>
        //                                 </button>

        //                                 <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
        //                                     data-bs-target="#delete_daerah_${ element.id }">
        //                                     <i class="fas fa-trash"></i>
        //                                 </button>
        //                             </td>
        //                         </tr>
        //                         <div class="modal fade" id="edit_daerah_${ element.id }" tabindex="-1"
        //                             role="dialog" aria-hidden="true">
        //                             <div class="modal-dialog modal-dialog-centered" role="document"
        //                                 style="max-width: 500px">
        //                                 <div class="modal-content position-relative">
        //                                     <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
        //                                         <button
        //                                             class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
        //                                             data-bs-dismiss="modal" aria-label="Close"></button>
        //                                     </div>
        //                                     <div class="modal-body p-0">
        //                                         <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
        //                                             <h4 class="mb-1" id="modalExampleDemoLabel">KEMASKINI
        //                                             </h4>
        //                                         </div>
        //                                         <div class="p-4 pb-0">
        //                                             <form action="/utiliti/lokasi/daerah/${ element.id }" method="POST">
        //                                                 @method('PUT')
        //                                                 @csrf
        //                                                 <div class="mb-3">
        //                                                     <label class="col-form-label">NEGERI</label>
        //                                                     <select class="form-select" name="U_Negeri_ID">
        //                                                         <option selected="" value="${ element.U_Negeri_ID }"
        //                                                             hidden>${ element.Negeri }</option>
        //                                                         @foreach ($negeri as $neg)
        //                                                             @if ($neg['status_negeri'] == '1')
        //                                                                 <option value="{{ $neg->id }}">
        //                                                                     {{ $neg->Negeri }}</option>
        //                                                             @endif
        //                                                         @endforeach
        //                                                     </select>
        //                                                 </div>
        //                                                 <div class="mb-3">
        //                                                     <label class="col-form-label">KOD DAERAH</label>
        //                                                     <input class="form-control" type="number" name="Daerah_Rkod"
        //                                                         value="${ element.Daerah_Rkod }" readonly />
        //                                                 </div>
        //                                                 <div class="mb-3">
        //                                                     <label class="col-form-label">DAERAH</label>
        //                                                     <input class="form-control" type="text" name="Daerah"
        //                                                         value="${ element.Daerah }" />
        //                                                 </div>
        //                                                 <div class="mb-3">
        //                                                     <label class="col-form-label">STATUS</label>
        //                                                     <div class="form-check form-switch">

        //                                                     </div>
        //                                                 </div>
        //                                                 <div class="modal-footer">
        //                                                     <button class="btn btn-secondary" type="button"
        //                                                         data-bs-dismiss="modal">Batal</button>
        //                                                     <button class="btn btn-primary" type="submit">Simpan
        //                                                     </button>
        //                                                 </div>
        //                                             </form>
        //                                         </div>
        //                                     </div>
        //                                 </div>
        //                             </div>
        //                         </div>`);
        //         }
        //     });
        // });
    </script>
@endsection
