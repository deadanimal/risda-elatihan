@extends('layouts.welcome-base')
@section('log')
<div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
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
                <div class="mt-3">
                    <a href="/login" class="btn btn-primary d-grid gap-2">Log Masuk</a>
                    <a href="/register" class="btn btn-outline-primary d-grid gap-2 mt-3">Daftar
                        Akaun</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection