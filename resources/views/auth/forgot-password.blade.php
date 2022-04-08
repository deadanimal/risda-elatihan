@extends('layouts.login_base')
@section('content')
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-6 col-xxl-5 py-3 position-relative">
                <div class="card overflow-hidden z-index-1">
                    <div class="card-body p-0">
                        <img src="/img/risda_logo.png" alt="logo" width="15%" class="p-3"
                            style="position: absolute;">
                        <div class="row g-0 h-100 d-flex flex-center">
                            <div class="col-lg-8 d-flex flex-center">
                                <div class="p-5 flex-grow-1">
                                    <div class="row flex-between-center">
                                        <div class="col-auto">
                                            <h3 class="text-primary">Terlupa Kata Laluan?</h3>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <!-- Email Address -->
                                        <div>
                                            <label class="form-label">No Kad Pengenalan Berdaftar</label>

                                            {{-- <input id="email" class="form-control" type="email" name="email"
                                                :value="old('email')" required autofocus /> --}}

                                                <input class="form-control" type="text" name="no_KP"
                                                :value="old('no_KP')" required autofocus />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary">
                                                    Set Semula Kata Laluan
                                                </button>
                                            </div>
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
