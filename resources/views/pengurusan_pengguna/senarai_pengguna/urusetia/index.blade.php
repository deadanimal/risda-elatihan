@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PENGGUNA</p>
                <p class="h5" style="color: rgb(43,93,53); ">URUSETIA</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI URUSETIA
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center" id="pill-myTab" role="tablist"
                    style="border-bottom:1px solid rgb(146,200,162);">
                    <li class="nav-item"><a class="nav-link active" id="pill-home-tab" data-bs-toggle="tab"
                            href="#pill-tab-home" role="tab" aria-controls="pill-tab-home" aria-selected="true">URUSETIA
                            ULS</a></li>
                    <li class="nav-item"><a class="nav-link" id="pill-profile-tab" data-bs-toggle="tab"
                            href="#pill-tab-profile" role="tab" aria-controls="pill-tab-profile"
                            aria-selected="false">URUSETIA ULPK</a></li>
                </ul>
                <div class="tab-content mt-3" id="pill-myTabContent">
                    <div class="tab-pane fade show active" id="pill-tab-home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-4">
                                    <div class="table-responsive scrollbar">
                                        <table class="table datatable table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Bil.</th>
                                                    <th scope="col">No. Kad Pengenalan</th>
                                                    <th scope="col">Nama Pengguna</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col" class="text-center">Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($urusetia as $key => $p)
                                                    @if ($p->jenis_pengguna == 'Urus Setia ULS')
                                                        <tr>
                                                            <td>{{ $key + 1 }}.</td>
                                                            <td>{{ $p->no_KP }}</td>
                                                            <td>{{ $p->name }}</td>
                                                            <td>{{ $p->email }}</td>
                                                            <td class="text-center">
                                                                <button class="btn btn-primary" type="button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_BK_{{ $p->id }}">
                                                                    <i class="fas fa-pen"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <div class="modal fade" id="edit_BK_{{ $p->id }}"
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
                                                                            action="/pengurusan_pengguna/senarai_pengguna/{{ $p->id }}"
                                                                            method="POST">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="col-form-label">Peranan</label>
                                                                                <select class="form-select"
                                                                                    name="peranan">
                                                                                    <option selected="" hidden
                                                                                        value="{{ $p->jenis_pengguna }}">
                                                                                        {{ $p->jenis_pengguna }}</option>
                                                                                    @foreach ($peranan as $per)
                                                                                        <option value="{{ $per->name }}">
                                                                                            {{ $per->name }}
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
                    <div class="tab-pane fade" id="pill-tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-4">
                                    <div class="table-responsive scrollbar">
                                        <table class="table datatable table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Bil.</th>
                                                    <th scope="col">No. Kad Pengenalan</th>
                                                    <th scope="col">Nama Pengguna</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($urusetia as $key => $p)
                                                    @if ($p->jenis_pengguna == 'Urus Setia ULPK')
                                                        <tr>
                                                            <td>{{ $key + 1 }}.</td>
                                                            <td>{{ $p->no_KP }}</td>
                                                            <td>{{ $p->name }}</td>
                                                            <td>{{ $p->email }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary"><i
                                                                        class="fa-solid fa-pen"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endif
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
