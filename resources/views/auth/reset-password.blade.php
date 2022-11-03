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
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <!-- Email Address -->
                                        <div class="mt-2">
                                            <label class="form-label">Emel Yang Berdaftar</label>

                                            <input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-2">
                                            <label class="form-label">Kata Laluan Baru </label>

                                            <input id="password" class="form-control" type="password" name="password" required />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-2">
                                            <label class="form-label">Pengesahan Kata Laluan </label>

                                            <input id="password_confirmation" class="form-control"
                                                                type="password"
                                                                name="password_confirmation" required />
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
