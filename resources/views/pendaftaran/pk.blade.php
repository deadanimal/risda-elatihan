@extends('layouts.login_base')
@section('content')
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-6 col-xxl-5 py-3 position-relative">
                <div class="card p-4">
                    <div class="card-header">
                        <h3 class="h5">Pendaftaran Pekebun Kecil</h3>
                    </div>
                    <div class="card-body">
                        <form action="/daftar_pengguna" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" >Nama Pekebun Kecil</label>
                                <input class="form-control" name="name" type="text" value="{{$data['Nama_PK']}}" readonly/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >No. Kad Pengenalan</label>
                                <input class="form-control" name="no_KP" type="text" value="{{$data['No_KP']}}" readonly/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >E-mel</label>
                                <input class="form-control" type="email" name="email"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Kata Laluan</label>
                                <input class="form-control" name="password" type="password"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Pengesahan Kata Laluan</label>
                                <input class="form-control" name="password_confirmation" type="password"/>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Hantar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
