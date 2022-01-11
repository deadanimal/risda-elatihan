@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
            <h5 class="risda-dg">DAERAH</h5>
        </div>
    </div>

    <form action="#">
        <div class="row mt-3 justify-content-center">

            <div class="col-auto">
                <label class="col-form-label">NEGERI:</label>
            </div>
            <div class="col-5">
                <input class="form-control form-control-sm" type="number" name="search_negeri" />
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
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
                                <form action="/utiliti/daerah" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="col-form-label">NEGERI</label>
                                        <select class="form-select" name="U_Negeri_ID">
                                            <option selected="" hidden>Sila Pilih</option>
                                            @foreach ($negeri as $negeri)
                                                @if ($negeri->status == '1')
                                                    <option value="{{ $negeri->id }}">{{ $negeri->Negeri }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">KOD DAERAH</label>
                                        <input class="form-control" type="number" name="Daerah_Rkod"
                                            value="{{ $bil }}" readonly />
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
                <div class="card-body">
                    <table id="table_daerah" class="table table-striped" style="width:100%">
                        <thead class="bg-200">
                            <tr>
                                <th class="sort">BIL.</th>
                                <th class="sort">NEGERI</th>
                                <th class="sort">KOD DAERAH</th>
                                <th class="sort">DAERAH</th>
                                <th class="sort">STATUS</th>
                                <th class="sort">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($daerah as $key => $daerah)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $daerah->Negeri }}</td>
                                    <td>{{ $daerah->Daerah_Rkod }}</td>
                                    <td>{{ $daerah->Daerah }}</td>
                                    <td>
                                        @if ($daerah->status == '1')
                                            <span class="badge badge-soft-success">Aktif</span>
                                        @else
                                            <span class="badge badge-soft-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit_daerah_{{ $daerah->id }}">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_daerah_{{ $daerah->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit_daerah_{{ $daerah->id }}" tabindex="-1" role="dialog"
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
                                                    <form action="/utiliti/daerah/{{ $daerah->id }}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="col-form-label">NEGERI</label>
                                                            <select class="form-select" name="U_Negeri_ID">
                                                                <option selected="" value="{{ $daerah->U_Negeri_ID }}"
                                                                    hidden>{{ $daerah->Negeri }}</option>
                                                                @foreach ($neg2 as $neg)
                                                                    @if ($neg['status'] == '1')
                                                                        <option value="{{ $neg->id }}">
                                                                            {{ $neg->Negeri }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">KOD DAERAH</label>
                                                            <input class="form-control" type="number" name="Daerah_Rkod"
                                                                value="{{ $daerah->Daerah_Rkod }}" readonly />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">DAERAH</label>
                                                            <input class="form-control" type="text" name="Daerah"
                                                                value="{{ $daerah->Daerah }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">STATUS</label>
                                                            <div class="form-check form-switch">
                                                                @if ($negeri->status == '1')
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
                                <div class="modal fade" id="delete_daerah_{{ $daerah->id }}" tabindex="-1"
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
                                                        Anda pasti untuk menghapus {{ $daerah->Daerah }}?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="/utiliti/daerah/{{ $daerah->id }}">
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
            $('#table_daerah').DataTable();
        });
    </script>
@endsection
