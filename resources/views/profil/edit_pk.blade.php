@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>PROFIL</strong></h1>
            <h5 class="risda-dg">PEKEBUN KECIL</h5>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <img src="/img/dp.jpg" alt="profile_picture" max-width="318px"
                style="border-radius: 25px; border: 2px solid #73AD21;">

            {{-- <div class="modal fade" id="upload-image" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <div class="p-4 pb-0">
                                <div class="dropzone dropzone-single p-0" data-dropzone="data-dropzone"
                                    data-options='{"url":"valid/url","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                                    <div class="fallback"><input type="file" name="file" /></div>
                                    <div class="dz-preview dz-preview-single">
                                        <div class="dz-preview-cover dz-complete"><img class="dz-preview-img"
                                                src="../../../assets/img/generic/image-file-2.png" alt="..."
                                                data-dz-thumbnail="" /><a class="dz-remove text-danger" href="#!"
                                                data-dz-remove="data-dz-remove"><span class="fas fa-times"></span></a>
                                            <div class="dz-progress"><span class="dz-upload"
                                                    data-dz-uploadprogress=""></span></div>
                                            <div class="dz-errormessage m-1"><span
                                                    data-dz-errormessage="data-dz-errormessage"></span></div>
                                        </div>
                                        <div class="dz-progress"><span class="dz-upload"
                                                data-dz-uploadprogress=""></span></div>
                                    </div>
                                    <div class="dz-message" data-dz-message="data-dz-message">
                                        <div class="dz-message-text"><img class="me-2"
                                                src="../../../assets/img/icons/cloud-upload.svg" width="25" alt="" />Muat
                                            naik di sini</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-success" type="button">Muat Naik</button>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                        KEBUN
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
                                        <label class="form-label risda-g">NO. PERMOHONAN (TS)</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NO. KAD PENGENALAN</label>
                                        <input class="form-control" type="text" value="{{ $profil['No_KP'] }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NO. KAD PENGENALAN KIR</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NAMA</label>
                                        <input class="form-control" type="text" value="{{ $profil['Nama_PK'] }}"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">Emel</label>
                                        <input class="form-control" type="text" value="{{ $user['email'] }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">TARIKH LAHIR</label>
                                        <input class="form-control" type="date" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">JANTINA</label>
                                        <input class="form-control" type="text" value="{{ $profil['Jantina'] }}"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">KETURUNAN</label>
                                        <input class="form-control" type="text" value="{{ $profil['Bangsa'] }}"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NO. TELEFON BIMBIT</label>
                                        <input class="form-control" type="text" value="{{ $user['no_telefon'] }}"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">STATUS ISI RUMAH</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">KATEGORI PEKEBUN KECIL</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">SKIM</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">TARAF KESIHATAN</label>
                                        <input class="form-control" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">ALAMAT</label>
                                        <input class="form-control mb-3" type="text"
                                            value="{{ $profil['Nombor'] }}, {{ $profil['Jalan'] }}" readonly />
                                        <input class="form-control mb-3" type="text" value="{{ $profil['Nama_Kampung'] }}"
                                            readonly />
                                        <input class="form-control mb-3" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">POSKOD</label>
                                        <input class="form-control" type="text" value="{{ $profil['Poskod'] }}"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">NEGERI</label>
                                        <input class="form-control" type="text" value="{{ $profil['Negeri'] }}"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">DAERAH</label>
                                        <input class="form-control" type="text" value="{{ $profil['Daerah'] }}"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">MUKIM</label>
                                        <input class="form-control" type="text" value="{{ $profil['Mukim'] }}"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">PARLIMEN</label>
                                        <input class="form-control" type="text" value="" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">DUN</label>
                                        <input class="form-control" type="text" value="" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">KAMPUNG</label>
                                        <input class="form-control" type="text" value="{{ $profil['Kampung'] }}"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label risda-g">SEKSYEN</label>
                                        <input class="form-control" type="text" value="{{ $profil['Seksyen'] }}"
                                            readonly />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="kebun" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col">
                            <h5>MAKLUMAT KEBUN</h5>
                        </div>
                    </div>
                    @foreach ($tanah as $key => $tanah)
                        <div class="row ms-5 mt-4">
                            <div class="col">

                                <div class="row">
                                    <div class="col">
                                        <h5 class="risda-dg">KEBUN {{ $key + 1 }}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">ALAMAT KEBUN</label>
                                            <input class="form-control mb-3" type="text" value="" readonly />
                                            <input class="form-control mb-3" type="text" value="" readonly />
                                            <input class="form-control mb-3" type="text" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">POSKOD</label>
                                            <input class="form-control" type="text" readonly />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">NEGERI</label>
                                            <input class="form-control" type="text" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">DAERAH</label>
                                            <input class="form-control" type="text" readonly />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">MUKIM</label>
                                            <input class="form-control" type="text" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">PARLIMEN</label>
                                            <input class="form-control" type="text" readonly />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">DUN</label>
                                            <input class="form-control" type="text" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">KAMPUNG</label>
                                            <input class="form-control" type="text" readonly />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">SEKSYEN</label>
                                            <input class="form-control" type="text" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">NO. GERAN</label>
                                            <input class="form-control" type="text" value="{{ $tanah['No_Geran'] }}"
                                                readonly />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">NO. LOT</label>
                                            <input class="form-control" type="text" value="{{ $tanah['No_Lot'] }}"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">JENIS TANAMAN</label>
                                            <input class="form-control" type="text" value="{{ $tanah['Syarat'] }}"
                                                readonly />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label risda-g">LUAS KEBUN</label>
                                            <input class="form-control" type="text"
                                                value="{{ $tanah['Luas_Pemilikan'] }}" readonly />
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="akaun-saya" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col">
                            <h5>MAKLUMAT KEBUN</h5>
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
        </div>
    </div>
@endsection
