@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PENGGUNA</p>
                <p class="h5" style="color: rgb(43,93,53); ">DAFTAR AKAUN PENGGUNA</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row mb-4">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    DAFTAR AKAUN
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <form action="/pengurusan_pengguna/pengguna" method="post">
                    @csrf
                    <input type="hidden" name="jenis_pengguna" value="ep">
                    <div class="row">
                        <div class="col-lg-10 mb-lg-3">
                            <label class="col-form-label">NO. KAD PENGENALAN</label>
                            <input class="form-control" type="text" name="sec_nric" id="sec_nric" maxlength="12" />
                        </div>
                        <div class="col-lg-10 mb-lg-3">
                            <label class="col-form-label">NAMA</label>
                            <input class="form-control" type="text" name="name" />
                        </div>
                        <div class="col-lg-10 mb-lg-3">
                            <label class="col-form-label">E-MEL</label>
                            <input class="form-control" type="text" name="email" />
                        </div>
                        @role('Superadmin BTM')
                        <div class="col-lg-10 mb-lg-3">
                            <label class="col-form-label">JENIS EJEN PELAKSANA</label>
                            <select name="jenis_pengguna_2" class="form-control">
                                <option value="" selected hidden>Sila Pilih</option>
                                <option value="Ejen Pelaksana ULS">Ejen Pelaksana ULS</option>
                                <option value="Ejen Pelaksana ULPK">Ejen Pelaksana ULPK</option>
                            </select>
                        </div>
                        @endrole
                    </div>

                    <div class="col-lg-10">
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn risda-bg-dg text-white" data-bs-toggle="modal"
                                        data-bs-target="#kepastian">Simpan</button>
                                </div>
                                <div class="modal fade" id="kepastian" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content position-relative">
                                            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                <button
                                                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="rounded-top-lg pt-3 ps-4 pe-6 bg-light">
                                                    <h4 class="mb-1" id="modalExampleDemoLabel">Pengesahan </h4>
                                                </div>
                                                <div class="p-4">
                                                    <h5 class="risda-g text-center">
                                                        E-MEL AKAUN TELAH TERCIPTA AKAN DIHANTAR
                                                        KEPADA EJEN PELAKSANA. ADAKAH ANDA PASTI UNTUK
                                                        MENDAFTARKAN AKAUN EJEN PELAKSANA?
                                                    </h5>
                                                    <div class="row mt-4">
                                                        <div class="col-6 text-end mx-0 px-1">
                                                            <button type="submit"
                                                                class="btn risda-bg-dg text-white">Ya</button>
                                                        </div>
                                                        <div class="col-6 mx-0 px-1">
                                                            <button class="btn btn-outline-primary " type="button"
                                                                data-bs-dismiss="modal">Tidak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid gap-2">
                                    <a href="/pengurusan_pengguna/pengguna/pekebun_kecil"
                                        class="btn btn-outline-primary">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
