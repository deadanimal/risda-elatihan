@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PENGGUNA</p>
                <p class="h5" style="color: rgb(43,93,53); ">SENARAI PENGGUNA</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI PENGGUNA STAF RISDA
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-2">
                            <div class="table-responsive scrollbar m-3">
                                <table class="table datatable table m-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">BIL.</th>
                                            <th scope="col">NO. KAD PENGENALAN</th>
                                            <th scope="col">NAMA</th>
                                            <th scope="col">NO. PEKERJA</th>
                                            <th scope="col">PUSAT TANGGUNGJAWAB</th>
                                            <th scope="col">GRED</th>
                                            <th scope="col">JAWATAN</th>
                                            <th scope="col">EMAIL</th>
                                            <th scope="col">PERANAN</th>
                                            <th scope="col">TARIKH AKAUN DICIPTA</th>
                                            <th scope="col">PENGAKTIFAN AKAUN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staf as $key => $u)
                                            <tr>
                                                <td>{{ $key + 1 }}.</td>
                                                <td>{{ $u->no_KP }}</td>
                                                <td>{{ $u->name }}</td>
                                                <td>{{ $u->no_pekerja }}</td>
                                                <td>{{ $u->pusat_tanggungjawab }}</td>
                                                <td>{{ $u->gred }}</td>
                                                <td>{{ $u->jawatan }}</td>
                                                <td>{{ $u->email }}</td>
                                                <td>{{ $u->jenis_pengguna }}</td>
                                                <td>{{ date('d-m-Y', strtotime($u->created_at)) }}</td>
                                                <td>
                                                    <div class="form-switch">
                                                        <form action="/pengurusan_pengguna/pengguna/pengaktifan/{{$u->id}}" method="post" id="statusForm{{ $u->id }}" class="pengaktifan">
                                                            @csrf
                                                            <input class="form-check-input up-switch-risda" id="active_{{ $u->id }}"
                                                            type="checkbox" value="1"
                                                            {{ isset($u->status_akaun) && $u->status_akaun == '1' ? 'checked' : '' }}
                                                            name="status"
                                                            onchange="document.getElementById('statusForm{{ $u->id }}').submit()" />
                                                        </form>
                                                        {{-- <label class="form-check-label" id="aktif">Aktif</label> --}}
                                                    </div>
                                                    {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit_pengguna_{{ $u->id }}">
                                                        <i class="fas fa-pen"></i>
                                                    </button> --}}
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="edit_pengguna_{{ $u->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                        <label class="col-form-label">PERANAN</label>
                                                                        <select class="form-select"
                                                                            name="jenis_pengguna">
                                                                            <option selected="" hidden
                                                                                value="{{ $u->jenis_pengguna }}">
                                                                                {{ $u->jenis_pengguna }}
                                                                            </option>
                                                                            @foreach ($peranan as $p)
                                                                                <option value="{{ $p->name }}">
                                                                                    {{ $p->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
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

    
@endsection
