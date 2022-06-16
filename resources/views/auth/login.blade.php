@extends('layouts.login_base')
@section('content')
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-6 col-xxl-5 py-3 position-relative">
                <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="pill-home-tab" data-bs-toggle="tab"
                            href="#pill-tab-home" role="tab" aria-controls="pill-tab-home" aria-selected="true">Pekebun
                            Kecil</a></li>
                    <li class="nav-item"><a class="nav-link" id="pill-profile-tab" data-bs-toggle="tab"
                            href="#pill-tab-profile" role="tab" aria-controls="pill-tab-profile" aria-selected="false">Staf
                            RISDA</a></li>
                    <li class="nav-item"><a class="nav-link" id="pill-contact-tab" data-bs-toggle="tab"
                            href="#pill-tab-contact" role="tab" aria-controls="pill-tab-contact" aria-selected="false">Ejen
                            Pelaksana</a></li>
                </ul>
                <div class="tab-content" id="pill-myTabContent">
                    <div class="tab-pane fade show active" id="pill-tab-home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card overflow-hidden z-index-1">
                            <div class="card-body p-0">
                                <img src="/img/risda_logo.png" alt="logo" width="15%" class="p-3"
                                    style="position: absolute">
                                <div class="row g-0 h-100 d-flex flex-center">
                                    <div class="col-lg-8 d-flex flex-center">
                                        <div class="p-5 flex-grow-1">
                                            <div class="row flex-between-center">
                                                <div class="col-auto">
                                                    <h3 class="text-primary">Log Masuk Pekebun Kecil</h3>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <select name="id_type" class="form-control" onchange="tukar()"
                                                    id="pilihan">
                                                    {{-- <option value="" selected hidden>Jenis ID</option> --}}
                                                    <option value="ic">No. Kad Pengenalan</option>
                                                    <option value="email">Email</option>
                                                </select>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <input type="hidden" name="pengguna" value="pk">
                                                <div class="mb-3" id="nric">
                                                    <label class="form-label">No.
                                                        Kad Pengenalan</label>
                                                    <input class="form-control" type="text" name="no_KP"
                                                        :value="old('no_KP')" maxlength="12" size="12"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                </div>
                                                <div class="mb-3" id="emel" style="display:none">
                                                    <label class="form-label">E-mel</label>
                                                    <input class="form-control" type="email" name="email"
                                                        :value="old('email')" autofocus />
                                                </div>
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label">Kata
                                                            Laluan</label>
                                                    </div>
                                                    <input class="form-control" type="password" name="password" required
                                                        autocomplete="current-password" />
                                                </div>
                                                <div class="form-check mb-0">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input class="form-check-input" type="checkbox"
                                                                checked="checked" />
                                                            <label class="form-check-label">Ingati
                                                                Saya</label>
                                                        </div>
                                                        <div class="col-lg-6 text-end">
                                                            <a class="fs--1" href="/lupa_katalaluan">Terlupa Kata
                                                                Laluan?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                        name="submit">Log Masuk</button>
                                                </div>
                                            </form>
                                            <div class="position-relative mt-4">
                                                <hr class="bg-300" />
                                                <div class="divider-content-center">atau log masuk dengan</div>
                                            </div>
                                            <div class="row g-2 mt-2">
                                                <div class="col-sm-6">
                                                    <a class="btn btn-outline-google-plus btn-sm d-block w-100"
                                                        href="{{ url('auth/google') }}"><span
                                                            class="fab fa-google-plus-g me-2"
                                                            data-fa-transform="grow-8"></span> google</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a class="btn btn-outline-facebook btn-sm d-block w-100"
                                                        href="{{ url('auth/facebook') }}"><span
                                                            class="fab fa-facebook-square me-2"
                                                            data-fa-transform="grow-8"></span> facebook</a>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col text-center">
                                                    <a href="/register" class="risda-g">Tiada Akaun? Daftar
                                                        Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pill-tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card overflow-hidden z-index-1">
                            <div class="card-body p-0">
                                <img src="/img/risda_logo.png" alt="logo" width="15%" class="p-3"
                                    style="position: absolute">
                                <div class="row g-0 h-100 d-flex flex-center">
                                    <div class="col-lg-8 d-flex flex-center">
                                        <div class="p-4 p-md-5 flex-grow-1">
                                            <div class="row flex-between-center">
                                                <div class="col-auto">
                                                    <h3 class="text-primary">Log Masuk Staf RISDA</h3>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <input type="hidden" value="staf" name="pengguna">
                                                <div class="mb-3" id="nric">
                                                    <label class="form-label">No.
                                                        Kad Pengenalan</label>
                                                    <input class="form-control" type="text" name="no_KP"
                                                        :value="old('no_KP')" maxlength="12" size="12"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                </div>
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label">Kata
                                                            Laluan</label>
                                                    </div>
                                                    <input class="form-control" type="password" name="password" required
                                                        autocomplete="current-password" />
                                                </div>
                                                <div class="form-check mb-0">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input class="form-check-input" type="checkbox"
                                                                checked="checked" />
                                                            <label class="form-check-label">Ingati
                                                                Saya</label>
                                                        </div>
                                                        <div class="col-lg-6 text-end">
                                                            <a class="fs--1" href="/lupa_katalaluan">Terlupa Kata
                                                                Laluan?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                        name="submit">Log Masuk</button>
                                                </div>
                                            </form>
                                            <div class="position-relative mt-4">
                                                <hr class="bg-300" />
                                                <div class="divider-content-center">atau log masuk dengan</div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col text-center">
                                                    <a href="/register" class="risda-g">Tiada Akaun? Daftar
                                                        Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pill-tab-contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card overflow-hidden z-index-1">
                            <div class="card-body p-0">
                                <img src="/img/risda_logo.png" alt="logo" width="15%" class="p-3"
                                    style="position: absolute">
                                <div class="row g-0 h-100 d-flex flex-center">
                                    <div class="col-lg-8 d-flex flex-center">
                                        <div class="p-4 p-md-5 flex-grow-1">
                                            <div class="row flex-between-center">
                                                <div class="col-auto">
                                                    <h3 class="text-primary">Log Masuk Ejen Pelaksana</h3>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <input type="hidden" value="ep" name="pengguna">
                                                <div class="mb-3" id="nric">
                                                    <label class="form-label">No.
                                                        Kad Pengenalan</label>
                                                    <input class="form-control" type="text" name="no_KP"
                                                        :value="old('no_KP')" maxlength="12" size="12"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                </div>
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label">Kata
                                                            Laluan</label>
                                                    </div>
                                                    <input class="form-control" type="password" name="password" required
                                                        autocomplete="current-password" />
                                                </div>
                                                <div class="form-check mb-0">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input class="form-check-input" type="checkbox"
                                                                checked="checked" />
                                                            <label class="form-check-label">Ingati
                                                                Saya</label>
                                                        </div>
                                                        <div class="col-lg-6 text-end">
                                                            <a class="fs--1" href="/lupa_katalaluan">Terlupa Kata
                                                                Laluan?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                        name="submit">Log Masuk</button>
                                                </div>
                                            </form>

                                            <div class="row mt-3">
                                                <div class="col text-center">
                                                    <a href="/register" class="risda-g">Tiada Akaun? Daftar
                                                        Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tukar() {
            let b = $('#pilihan option:selected').text();

            if (b == 'No. Kad Pengenalan') {
                $('#nric').show().find(':input').attr('required', true);
                $('#emel').hide().find(':input').attr('required', false);;
            } else if (b == 'Email') {
                $('#nric').hide().find(':input').attr('required', false);;
                $('#emel').show().find(':input').attr('required', true);;
            }
        }
    </script>
@stop
