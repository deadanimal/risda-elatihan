@extends('layouts.welcome-base')
@section('log')
    <div class="col-6 px-sm-0 align-self-center mx-auto py-5">
        <div class="row justify-content-center g-0">
            <div class="col-lg-9">
                <div class="col d-flex justify-content-center text-md-start text-center flex-column">
                    <div class="row">
                        <div class="col text-center">
                            <img src="/img/risda_logo.png" alt="logo" width="30%">
                        </div>
                    </div>
                    <h1 class="text-center mb-0">SISTEM MAKLUMAT LATIHAN</h1>
                    <p class="text-center"><em>(e-LATIHAN)</em></p>
                    <div class="row">
                        <div class="col text-center">
                            <form action="/semak_nric" method="POST">
                                @csrf
                                <label class="form-label">SEMAKAN NO. KAD PENGENALAN</label>
                                <input type="text" class="form-control text-center" name="nric" placeholder="000000000000"
                                    maxlength="12" size="12"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-primary d-grid gap-2">Hantar</button>
                                    {{-- <a href="/login" class="btn btn-outline-danger d-grid gap-2 mt-3">Kembali</a> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
