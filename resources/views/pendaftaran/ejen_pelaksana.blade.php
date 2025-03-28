@extends('layouts.login_base')
@section('content')
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-6 col-xxl-5 py-3 position-relative">
                <div class="card p-4">
                    <img src="/img/risda_logo.png" alt="logo" width="15%" class="p-3"
                        style="position: absolute; top: 8px; left: 16px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="card-header pb-0 mt-5 ">
                                <h3 class="text-primary">Pendaftaran Ejen Pelaksana</h3>
                            </div>
                            <div class="card-body">
                                <form action="/daftar_pengguna" method="POST">
                                    @csrf
                                    <input type="hidden" name="jenis_pengguna" value="ejen pelaksana">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pekebun Kecil</label>
                                        <input class="form-control" name="name" type="text" value="" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">No. Kad Pengenalan</label>
                                        <input class="form-control" name="no_KP" type="text"
                                            value="{{$nric}}" readonly/>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kata Laluan</label>
                                        <input class="form-control" name="password" type="password" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pengesahan Kata Laluan</label>
                                        <input class="form-control" name="password_confirmation" type="password" />
                                    </div>
                                    <div class="row">
                                        <div class="col text-center">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Daftar
                                                    Akaun</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <label class="form-label">Sudah ada akaun? <a href="/login"><span
                                                class="risda-g">Log Masuk Sekarang</span></a></label>
                                    {{-- <a href="/login" class="risda-g">Sudah ada akaun? Log Masuk Sekarang</a> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#info').hide();
            $('#ic').hide();
            $('#em').hide();
            $('#sso').hide();
        });

        $('#id_jenis').change(function() {
            let jenis = this.value;

            if (jenis == 'nric') {
                $('#info').show();
                $('#ic').show();
                $('#em').hide();
                $('#sso').hide();
            } else if (jenis == 'emel') {
                $('#info').show();
                $('#ic').hide();
                $('#em').show();
                $('#sso').hide();
            } else {
                $('#info').hide();
                $('#ic').hide();
                $('#em').hide();
                $('#sso').show();
            }
        });
    </script>
@stop
