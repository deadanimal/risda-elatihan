@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PENGGUNA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENGGUNA</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI STAF
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center" id="pill-myTab" role="tablist"
                    style="border-bottom:1px solid rgb(146,200,162);">
                    <li class="nav-item">
                        <a class="nav-link active" id="pill-pentadbiran-tab" data-bs-toggle="tab"
                            href="#pill-tab-pentadbiran" role="tab" aria-controls="pill-tab-pentadbiran"
                            aria-selected="true">
                            PENTADBIRAN
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pill-urusetia-tab" data-bs-toggle="tab" href="#pill-tab-urusetia"
                            role="tab" aria-controls="pill-tab-urusetia" aria-selected="false">
                            URUSETIA
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pill-peserta-tab" data-bs-toggle="tab" href="#pill-tab-peserta"
                            role="tab" aria-controls="pill-tab-peserta" aria-selected="false">
                            PESERTA
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="pill-myTabContent">
                    <div class="tab-pane fade show active" id="pill-tab-pentadbiran" role="tabpanel"
                        aria-labelledby="pentadbiran-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-2">
                                    <div class="table-responsive scrollbar m-3">
                                        <table class="table datatable table-bordered text-center m-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">BIL.</th>
                                                    <th scope="col">NO. KAD PENGENALAN</th>
                                                    <th scope="col">NAMA PENGGUNA</th>
                                                    <th scope="col">EMAIL PENGGUNA</th>
                                                    <th scope="col">JENIS PENGGUNA</th>
                                                    <th scope="col">TINDAKAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staf as $key => $u)
                                                    @if ($u->jenis_pengguna != 'Urus Setia ULS' && $u->jenis_pengguna != 'Peserta ULS')
                                                        <tr>
                                                            <td>{{ $key + 1 }}.</td>
                                                            <td>{{ $u->no_KP }}</td>
                                                            <td>{{ $u->name }}</td>
                                                            <td>{{ $u->email }}</td>
                                                            <td>{{ $u->jenis_pengguna }}</td>
                                                            <td>
                                                                <button class="btn btn-primary" type="button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_pengguna_{{ $u->id }}">
                                                                    <i class="fas fa-pen"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <div class="modal fade" id="edit_pengguna_{{ $u->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                                            style="max-width: 500px">
                                                            <div class="modal-content position-relative">
                                                                <div
                                                                    class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
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
                                                                        <form
                                                                            action="/pengurusan_pengguna/pengguna/{{ $u->id }}"
                                                                            method="POST">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="col-form-label">PERANAN</label>
                                                                                <select class="form-select"
                                                                                    name="jenis_pengguna">
                                                                                    <option selected="" hidden
                                                                                        value="{{ $u->jenis_pengguna }}">
                                                                                        {{ $u->jenis_pengguna }}
                                                                                    </option>
                                                                                    @foreach ($peranan as $p)
                                                                                        <option
                                                                                            value="{{ $p->name }}">
                                                                                            {{ $p->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                <button class="btn btn-primary"
                                                                                    type="submit">Simpan </button>
                                                                            </div>
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
                    <div class="tab-pane fade" id="pill-tab-urusetia" role="tabpanel" aria-labelledby="urusetia-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-2">
                                    <div class="table-responsive scrollbar m-3">
                                        <table class="table datatable table-bordered text-center m-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">BIL.</th>
                                                    <th scope="col">NO. KAD PENGENALAN</th>
                                                    <th scope="col">NAMA PENGGUNA</th>
                                                    <th scope="col">EMAIL PENGGUNA</th>
                                                    <th scope="col">JENIS PENGGUNA</th>
                                                    <th scope="col">TINDAKAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staf as $key2 => $us)
                                                    @if ($us->jenis_pengguna == 'Urus Setia ULS')
                                                        <tr>
                                                            <td>{{ $key2 + 1 }}.</td>
                                                            <td>{{ $us->no_KP }}</td>
                                                            <td>{{ $us->name }}</td>
                                                            <td>{{ $us->email }}</td>
                                                            <td>{{ $us->jenis_pengguna }}</td>
                                                            <td>
                                                                <button class="btn btn-primary" type="button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_pengguna_{{ $us->id }}">
                                                                    <i class="fas fa-pen"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <div class="modal fade" id="edit_pengguna_{{ $us->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                                            style="max-width: 500px">
                                                            <div class="modal-content position-relative">
                                                                <div
                                                                    class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
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
                                                                        <form
                                                                            action="/pengurusan_pengguna/pengguna/{{ $us->id }}"
                                                                            method="POST">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="col-form-label">PERANAN</label>
                                                                                <select class="form-select"
                                                                                    name="jenis_pengguna">
                                                                                    <option selected="" hidden
                                                                                        value="{{ $us->jenis_pengguna }}">
                                                                                        {{ $us->jenis_pengguna }}
                                                                                    </option>
                                                                                    @foreach ($peranan as $p)
                                                                                        <option
                                                                                            value="{{ $p->name }}">
                                                                                            {{ $p->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                <button class="btn btn-primary"
                                                                                    type="submit">Simpan </button>
                                                                            </div>
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

                    <div class="tab-pane fade" id="pill-tab-peserta" role="tabpanel" aria-labelledby="peserta-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-2">
                                    <div class="table-responsive scrollbar m-3">
                                        <table class="table datatable table-bordered text-center m-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">BIL.</th>
                                                    <th scope="col">NO. KAD PENGENALAN</th>
                                                    <th scope="col">NAMA PENGGUNA</th>
                                                    <th scope="col">EMAIL PENGGUNA</th>
                                                    <th scope="col">JENIS PENGGUNA</th>
                                                    <th scope="col">TINDAKAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staf as $key3 => $pes)
                                                    @if ($pes->jenis_pengguna == 'Peserta ULS')
                                                        <tr>
                                                            <td>{{ $key3 + 1 }}.</td>
                                                            <td>{{ $pes->no_KP }}</td>
                                                            <td>{{ $pes->name }}</td>
                                                            <td>{{ $pes->email }}</td>
                                                            <td>{{ $pes->jenis_pengguna }}</td>
                                                            <td>
                                                                <button class="btn btn-primary" type="button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_pengguna_{{ $pes->id }}">
                                                                    <i class="fas fa-pen"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <div class="modal fade" id="edit_pengguna_{{ $pes->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                                            style="max-width: 500px">
                                                            <div class="modal-content position-relative">
                                                                <div
                                                                    class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
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
                                                                        <form
                                                                            action="/pengurusan_pengguna/pengguna/{{ $pes->id }}"
                                                                            method="POST">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="col-form-label">PERANAN</label>
                                                                                <select class="form-select"
                                                                                    name="jenis_pengguna">
                                                                                    <option selected="" hidden
                                                                                        value="{{ $pes->jenis_pengguna }}">
                                                                                        {{ $pes->jenis_pengguna }}
                                                                                    </option>
                                                                                    @foreach ($peranan as $p)
                                                                                        <option
                                                                                            value="{{ $p->name }}">
                                                                                            {{ $p->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary"
                                                                                    type="button"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                <button class="btn btn-primary"
                                                                                    type="submit">Simpan </button>
                                                                            </div>
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
                </div>

            </div>
        </div>

    </div>
@endsection
