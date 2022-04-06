@extends('layouts.risda-base')
@section('content')
@php
    use App\Models\KebenaranPeranan;
@endphp
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PENGGUNA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PERANAN DAN KEBENARAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SENARAI KEBENARAN UNTUK {{ $peranan->name }}
                </p>
            </div>
        </div>

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
                                    <form action="/pengurusan_pengguna/peranan/kebenaran" method="POST">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="col-form-label">Kebenaran</label>
                                            <input class="form-control" type="text" name="name" />
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="/pengurusan_pengguna/peranan/{{ $peranan->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="card mt-5">
                <div class="table-responsive scrollbar">
                    <table class="table datatable table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Bil.</th>
                                <th scope="col">Kebenaran</th>
                                <th scope="col">Pengaktifan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kebenaran as $key => $k)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $k->name }}</td>
                                    <td class="align-self-center">
                                        <div class="form-switch">
                                        <input id='switch{{ $k->id }}' class="form-check-input" type='checkbox'
                                            value='1' name='{{ $k->name }}'
                                            @php
                                            $try = KebenaranPeranan::where('role_id', $peranan->id)
                                                ->where('permission_id', $k->id)
                                                ->first();
                                            echo $try == true ? ' checked' : '';
                                            @endphp
                                            >
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col text-end m-3">
                    <a href="/pengurusan_pengguna/peranan" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm">Kemaskini</button>
                </div>
            </div>
        </form>

    </div>
@endsection
