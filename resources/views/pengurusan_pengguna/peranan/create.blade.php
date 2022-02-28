@extends('layouts.risda-base')
@section('content')
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
                    TAMBAH PERANAN
                </p>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8">
                        <form action="/pengurusan_pengguna/peranan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="col-form-label">NAMA PERANAN</label>
                                <input class="form-control" type="text" name="name" />
                            </div>
                            <div class="form-group mt-4 text-end">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <a href="/pengurusan_pengguna/peranan" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
