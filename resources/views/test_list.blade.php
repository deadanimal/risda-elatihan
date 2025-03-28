@extends('layouts.risda-base')
@section('content')
<div class="container">
<a href="/delete_staf" class="btn btn-danger">Remove All Peserta ULS </a> <a href="/add_staf" class="btn btn-warning">add</a> <br><a href="/change_role_uls" class="btn btn-info">Change Peserta ULS</a> <a href="/change_role_sabtm" class="btn btn-info">Change Superadmin BTM</a>

</div>
    {{-- @foreach ($user as $key => $u)
        {{ $u->id }}. {{ $u->no_KP }} ({{ $u->jenis_pengguna }})
        <br>
        <div class="col-lg-5">
            <form action="/update_role/{{ $u->id }}" method="post">
                @method('PUT')
                @csrf
                <select name="peranan" class="form-control">
                    <option value="">Sila Pilih</option>
                    @foreach ($role as $r)
                        <option value="{{ $r->name }}">{{ $r->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Update role</button>
            </form>
        </div>
        <br>
        <form action="/delete/{{ $u->id }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">buang</button>
        </form>
        <br><br>
    @endforeach --}}

    {{-- <form action="/pengurusan_peserta/semakan_pemohon/9" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-warning">Tekan ni</button>
    </form> --}}

    {{-- <div class="row">
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
                                    <tr>
                                        <td>Test</td>
                                        <td>{{ $test->no_KP }}</td>
                                        <td>{{ $test->name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $test->email }}</td>
                                        <td>{{ $test->jenis_pengguna }}</td>
                                        <td>{{ $test->created_at }}</td>
                                        <td>
                                            <div class="form-switch">
                                                <form
                                                    action="/pengurusan_pengguna/pengguna/pengaktifan/{{ $test->id }}"
                                                    method="post" id="statusForm{{ $test->id }}"
                                                    class="pengaktifan">
                                                    @csrf
                                                    <input class="form-check-input up-switch-risda"
                                                        id="active_{{ $test->id }}" type="checkbox" value="1"
                                                        {{ isset($test->status_akaun) && $test->status_akaun == '1' ? 'checked' : '' }}
                                                        name="status"
                                                        onchange="document.getElementById('statusForm{{ $test->id }}').submit()" />
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_pengguna_{{ $test->id }}"><i
                                                    class="fas fa-pen"></i>
                                            </button>

                                            <button class="btn risda-bg-dg text-white" type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#delete_{{ $test->id }}"><i
                                                    class="fas fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="edit_pengguna_{{ $test->id }}"
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
                                                                    action="/pengurusan_pengguna/pengguna/{{ $test->id }}"
                                                                    method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label class="col-form-label">PERANAN</label>
                                                                        <select class="form-select"
                                                                            name="jenis_pengguna">
                                                                            <option selected="" hidden
                                                                                value="{{ $test->jenis_pengguna }}">
                                                                                {{ $test->jenis_pengguna }}
                                                                            </option>
                                                                            @foreach ($role as $p)
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
                                        </td>
                                        <td>
                                            <div class="modal fade" id="delete_{{ $test->id }}" tabindex="-1"
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
                                                                    Anda pasti untuk menghapus data
                                                                    {{ $test->name }} ini?

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form method="POST"
                                                                    action="/pengurusan_pengguna/pengguna/{{ $test->id }}">
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
                                        </td>
                                    </tr>
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

                                                    <label class="form-check-label" id="aktif">Aktif</label>
                                                </div>
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#edit_pengguna_{{ $u->pengguna->id }}">
                                                    <i class="fas fa-pen"></i>
                                                </button>
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
                                            <td>
                                                <form method="POST" action="/pengurusan_pengguna/pengguna/staf/{{$u->pengguna->id}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn p-0 ms-2" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Padam"><span class="text-500 fas fa-trash-alt"></span></button>
                                                </form>
                                            </td>
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
                                                                            @foreach ($role as $p)
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
    </div> --}}

    
@endsection
