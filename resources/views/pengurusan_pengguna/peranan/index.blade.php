@extends('layouts.risda-base')
@section('content')
    <div class="container ">
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
                    SENARAI PERANAN
                </p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col text-end">
                {{-- <a href="/pengurusan_pengguna/peranan/create" class="btn btn-primary">Tambah Kumpulan Pengguna</a> --}}
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah-kp">
                    Tambah Kumpulan Pengguna
                </button>
            </div>
            <div class="modal fade" id="tambah-kp" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <form id="form1" action="/pengurusan_pengguna/peranan" method="POST">
                                <div class="row justify-content-center">
                                    <div class="p-4 pb-0 col-lg-7 mb-3">

                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD KUMPULAN PENGGUNA</label>
                                            <input type="text" class="form-control" name="kod_kumpulan">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KUMPULAN PENGGUNA</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary" type="submit">Simpan </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-lg-3">
            <div class="table-responsive scrollbar m-lg-4">
                <table class="table datatable table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10%;">Bil.</th>
                            <th scope="col" style="width: 20%;">Kod Kumpulan Pengguna</th>
                            <th scope="col">Peranan</th>
                            <th scope="col" style="width: 15%;">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peranan as $key => $p)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $p->kod_kumpulan_pengguna }}</td>
                                <td>{{ $p->name }}</td>
                                <td>
                                    <a href="/pengurusan_pengguna/peranan/{{ $p->id }}"
                                        class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete_{{ $p->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete_{{ $p->id }}" tabindex="-1"
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
                                                    Anda pasti untuk menghapus {{ $p->name }}?

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form method="POST" action="/pengurusan_pengguna/peranan/{{ $p->id }}">
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
@endsection
