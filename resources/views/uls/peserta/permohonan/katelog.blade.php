@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERMOHONAN KURSUS</p>
                <p class="h5" style="color: rgb(43,93,53); ">KATELOG KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    KEHADIRAN KE KURSUS
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KATEGORI KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="" readonly>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            @for ($i = 0; $i < 12; $i++)
                <div class="col-4 mb-5">
                    <div class="card overflow-hidden" style="width: 18rem;">
                        <div class="card-img-top">
                            <img class="img-fluid" src="/img/katelog-card-bg.jpg" />
                        </div>
                        <div class="card-img-overlay">
                            <p class="fw-bold text-center text-white mt-4 mb-0">NAMA KURSUS</p>
                            <p class="h4 fw-bold text-center text-white">AGROMAKANAN</p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a class="btn btn-primary btn-sm" href="#!">Go somewhere</a>
                    </div>
                </div>
            @endfor
        </div>


    </div>
@endsection
