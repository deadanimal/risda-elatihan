@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    PENILAIAN KURSUS
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KOD NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <select class="form-select mb-3" onchange="find(this)">
                        <option selected disabled hidden>Pilih</option>
                        @foreach ($jadual_kursus as $jk)
                            <option value="{{ $jk->kod_kursus }}">{{ $jk->kod_kursus }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="" id="nama_kursus" readonly>
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3" value="" id="tarikh_kursus" readonly>
                </div>
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <a class="btn btn-primary" href="#" id="btn_start">Mula Penilaian</a>
            </div>
        </div>

    </div>

    <script>
        function find(v) {
            var val = v.value;
            let jadual_kursus = @json($jadual_kursus->toArray());
            let kod_kursus = @json($kod_kursus->toArray());
            kod_kursus.forEach(e => {
                if (e.kod_Kursus == val) {
                    $("#nama_kursus").val(e.tajuk_Kursus);
                }
            });

            jadual_kursus.forEach(e => {
                if (e.kod_kursus == val) {
                    $("#tarikh_kursus").val(e.tarikh_mula);
                }
            });

            var btn = document.getElementById('btn_start');

            btn.setAttribute("href", "/penilaian/penilaian-kursus/" + val);


            // btn.href =  + val;

        }
    </script>
@endsection
