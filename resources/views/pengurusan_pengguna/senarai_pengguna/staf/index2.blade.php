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
            <div class="col text-end">
                <a href="/pengurusan_pengguna/pengguna/staf/create" class="btn btn-primary">Daftar Akaun</a>
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
                                            <th scope="col">TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staf as $key => $u)
                                            <tr>
                                                <td>{{ $key + 1 }}.</td>

                                                @if ($u->pengguna != null)
                                                    <td>{{ $u->pengguna->no_KP }}</td>
                                                    <td>{{ $u->pengguna->name }}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>{{ $u->nopekerja }}</td>
                                                <td>{{ $u->NamaPT }}</td>
                                                <td>{{ $u->Gred }}</td>
                                                <td>{{ $u->Jawatan }}</td>

                                                @if ($u->pengguna != null)
                                                    <td>{{ $u->pengguna->email }}</td>
                                                    <td>{{ $u->pengguna->jenis_pengguna }}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <td>{{ date('d-m-Y', strtotime($u->created_at)) }}</td>
                                                <td>
                                                    <div class="form-switch">
                                                        @if ($u->pengguna != null)
                                                            <form
                                                                action="/pengurusan_pengguna/pengguna/pengaktifan/{{ $u->pengguna->id }}"
                                                                method="post" id="statusForm{{ $u->id }}"
                                                                class="pengaktifan">
                                                                @csrf
                                                                <input class="form-check-input up-switch-risda"
                                                                    id="active_{{ $u->pengguna->id }}" type="checkbox"
                                                                    value="1"
                                                                    {{ isset($u->pengguna->status_akaun) && $u->pengguna->status_akaun == '1' ? 'checked' : '' }}
                                                                    name="status"
                                                                    onchange="document.getElementById('statusForm{{ $u->pengguna->id }}').submit()" />
                                                            </form>
                                                        @endif

                                                        {{-- <label class="form-check-label" id="aktif">Aktif</label> --}}
                                                    </div>
                                                    {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit_pengguna_{{ $u->pengguna->id }}">
                                                        <i class="fas fa-pen"></i>
                                                    </button> --}}
                                                </td>
                                                <td>
                                                    @if ($u->pengguna != null)
                                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit_pengguna_{{ $u->pengguna->id }}"><i
                                                                class="fas fa-pen"></i>
                                                        </button>

                                                        <button class="btn risda-bg-dg text-white" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete_{{ $u->pengguna->id }}"><i
                                                                class="fas fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    <form method="POST" action="/pengurusan_pengguna/pengguna/staf/{{$u->pengguna->id}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn p-0 ms-2" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Padam"><span class="text-500 fas fa-trash-alt"></span></button>
                                                    </form>
                                                </td> --}}
                                            </tr>

                                            @if ($u->pengguna != null)
                                                <div class="modal fade" id="edit_pengguna_{{ $u->pengguna->id }}"
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
                                                                        action="/pengurusan_pengguna/pengguna/{{ $u->pengguna->id }}"
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
                                                                            <button class="btn btn-primary"
                                                                                type="submit">Simpan
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_{{ $u->pengguna->id }}"
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
                                                                <div class="row">
                                                                    <div class="col text-center m-3">
                                                                        <i class="far fa-times-circle fa-7x"
                                                                            style="color: #ea0606"></i>
                                                                        <br>
                                                                        Anda pasti untuk menghapus data
                                                                        {{ $u->pengguna->name }} ini?

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <form method="POST"
                                                                        action="/pengurusan_pengguna/pengguna/{{ $u->pengguna->id }}">
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
@endsection
