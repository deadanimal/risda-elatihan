@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>PROFIL</strong></h1>
            <h5 class="risda-dg">STAF</h5>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <a href="#upload-image" data-bs-toggle="modal" data-bs-target="">
                @if (Auth::user()->gambar_profil == null)
                    <img src="/img/dp.jpg" alt="profile_picture"
                        style="border-radius: 25px; border: 2px solid #73AD21; width:318px; height:337px; object-fit: cover;">
                @else
                    <img src="/{{ Auth::user()->gambar_profil }}" alt="profile_picture"
                        style="border-radius: 25px; border: 2px solid #73AD21; width:318px; height:337px; object-fit: cover;">
                @endif
            </a>

            <div class="modal fade" id="upload-image" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                    <div class="modal-content position-relative">
                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                <h4 class="mb-1" id="title">Muat Naik Gambar </h4>
                            </div>
                            <div class="p-2 pb-0">
                                <form action="/profil/{{ Auth::id() }}" class="dropzone" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="fallback">
                                        <input name="gambar_profil" type="file" multiple />
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-success" type="submit">Muat Naik</button>
                                    </div>
                                </form>
                                {{-- <form action="/profil/{{ Auth::id() }}" method="POST" enctype="multipart/form-data" class="dropzone">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="gambar_profil"/>
                                    </div>
                                    <div class="dropzone dropzone-single p-0" data-dropzone="data-dropzone">
                                        <div class="fallback">
                                            <input type="file" name="gambar_profil" multiple />
                                        </div>
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover dz-complete">
                                                <img class="dz-preview-img"
                                                    src="../../../assets/img/generic/image-file-2.png" alt="..."
                                                    data-dz-thumbnail="" />
                                                <a class="dz-remove text-danger" href="#!" data-dz-remove="data-dz-remove">
                                                    <span class="fas fa-times"></span>
                                                </a>
                                                <div class="dz-progress">
                                                    <span class="dz-upload" data-dz-uploadprogress=""></span>
                                                </div>
                                                <div class="dz-errormessage m-1">
                                                    <span data-dz-errormessage="data-dz-errormessage"></span>
                                                </div>
                                            </div>
                                            <div class="dz-progress">
                                                <span class="dz-upload" data-dz-uploadprogress=""></span>
                                            </div>
                                        </div>
                                        <div class="dz-message" data-dz-message="data-dz-message">
                                            <div class="dz-message-text">
                                                <img class="me-2" src="../../../assets/img/icons/cloud-upload.svg"
                                                    width="25" alt="" />
                                                Muat naik di sini
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-success" type="submit">Muat Naik</button>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pill-home-tab" data-bs-toggle="tab" href="#peribadi" role="tab"
                        aria-controls="peribadi" aria-selected="true">
                        PERIBADI
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pill-profile-tab" data-bs-toggle="tab" href="#kebun" role="tab"
                        aria-controls="kebun" aria-selected="false">
                        PERKHIDMATAN
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pill-contact-tab" data-bs-toggle="tab" href="#akaun-saya" role="tab"
                        aria-controls="akaun-saya" aria-selected="false">
                        AKAUN SAYA
                    </a>
                </li>
            </ul>
            <div class="tab-content border p-3 mt-3" id="pill-myTabContent">
                <div class="tab-pane fade show active" id="peribadi" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col">
                            <h5>MAKLUMAT PERIBADI</h5>
                        </div>
                    </div>
                    <div class="row ms-5 mt-4">
                        <div class="col">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NO. KAD PENGENALAN</label>
                                        <input class="form-control" type="text" value="{{ $user['no_KP'] }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NO. PEKERJA</label>
                                        <input class="form-control" type="text" value="{{ $staf['nopekerja'] }}"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NAMA STAF</label>
                                        <input class="form-control" type="text" value="{{ $user['name'] }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">ALAMAT E-MEL</label>
                                        <input class="form-control" type="text" value="{{ $user['email'] }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NO. TELEFON BIMBIT</label>
                                        <input class="form-control" type="text" value="{{ $profil['notel'] }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NO. TELEFON PEJABAT</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="kebun" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col">
                            <h5>JAWATAN</h5>
                        </div>
                    </div>
                    <div class="row ms-5 mt-4">
                        <div class="col">

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">JAWATAN</label>
                                        <input class="form-control" type="text" value="{{ $staf['Jawatan'] }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">GRED</label>
                                        <input class="form-control" type="text" value="{{ $staf['Gred'] }}" readonly />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <h5>PUSAT TANGGUNGJAWAB</h5>
                        </div>
                    </div>
                    <div class="row ms-5 mt-4">
                        <div class="col">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NAMA PUSAT TANGGUNGJAWAB</label>
                                        <input class="form-control" type="text" value="{{ $staf['NamaPT'] }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <h5>PENYELIA</h5>
                        </div>
                    </div>
                    <div class="row ms-5 mt-4">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NAMA PENYELIA</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">JAWATAN</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">GRED</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">E-MEL</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="akaun-saya" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col">
                            <h5>AKAUN SAYA</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label risda-g">PERANAN</label>
                                <input class="form-control" type="text" value="" readonly />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label risda-g">TAHAP CAPAIAN</label>
                                <input class="form-control" type="text" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label risda-g">TARIKH AKAUN DICIPTA</label>
                                <input class="form-control" type="text"
                                    value="{{ date('d / m / Y', strtotime($user['created_at'])) }}" readonly />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label risda-g">STATUS AKAUN</label>
                                <input class="form-control" type="text" readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-end">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#edit_telefon">
                        Kemaskini No. Telefon Bimbit
                    </button>
                </div>
                <div class="modal fade" id="edit_telefon" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                        <div class="modal-content position-relative">
                            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                    <h4 class="mb-1" id="modalExampleDemoLabel">Kemaskini Nombor Telefon
                                    </h4>
                                </div>
                                <div class="p-4 pb-0">
                                    <form action="/profil/{{ Auth::id() }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" value="{{ $jenis }}" name="jenis">
                                        <div class="mb-3">
                                            <label class="col-form-label risda-g" for="recipient-name">NO. TELEFON
                                                BIMBIT</label>
                                            <input class="form-control" name="telefon" placeholder="01XXXXXXXX"
                                                type="text" maxlength="11"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                        </div>
                                        <div class="modal-footer px-0">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Kemaskini</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
