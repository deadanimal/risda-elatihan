@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PESERTA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENCALONAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h5 fw-bold mt-3">
                    SENARAI CALON PESERTA KURSUS
                </p>
            </div>
        </div>

        <div class="row mt-3 ">
            <div class="col-12 col-lg-12">
                <div class="card ">
                    <div class="card-body mx-lg-5">
                        <div class="row p-3">
                            <div class="col-lg-6">
                                <p class="h5">Tahun</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled value="2021">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Staf</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="Staf">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Kod Nama Kursus</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $jadual['kursus_kod_nama_kursus'] }}">
                            </div>
                            <div class="col-lg-6">
                                <p class="h5">Nama Kursus</p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control form-control-sm mb-2" disabled
                                    value="{{ $jadual['kursus_nama'] }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <a href="/pengurusan_peserta/pencalonan/{{ $jadual->id }}/edit" class="btn btn-primary">
                    <i class="fas fa-plus"></i> TAMBAH CALON
                </a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="table-responsive scrollbar m-4">
                <table class="table datatable table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Bil.</th>
                            <th scope="col">NO KAD PENGENALAN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">PUSAT TANGGUNGJAWAB</th>
                            <th scope="col">GRED</th>
                            <th scope="col">STATUS PENCALONAN</th>
                            <th scope="col">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peserta_daftar as $key => $p)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>
                                    {{-- {{ $p->maklumat_peserta->no_KP }} --}}
                                    -
                                </td>
                                <td>
                                    {{-- {{ $p->maklumat_peserta->name }} --}}
                                    -
                                </td>
                                <td>{{ $p->pusat_tanggungjawab }}</td>
                                <td>{{ $p->gred }}</td>
                                <td>{{ $p->status }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $p->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="delete-{{ $p->id }}" tabindex="-1"
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
                                                        Anda pasti untuk menghapus pencalonan ini?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="/pengurusan_peserta/pencalonan/{{$p->id}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-primary" type="submit">
                                                            Hapus
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
