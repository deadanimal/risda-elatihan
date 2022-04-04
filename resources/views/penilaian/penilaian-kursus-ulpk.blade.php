@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN KURSUS (PESERTA ULPK)</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    PENILAIAN KURSUS (PESERTA ULPK)
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KOD NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input class="form-control" type="text"
                        value="{{ $permohonan->jadual->kursus_kod_nama_kursus ?? 'Tiada' }}" readonly />
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input class="form-control" type="text" value="{{ $permohonan->jadual->kursus_nama ?? 'Tiada' }}"
                        readonly />
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-7">
                    @if ($permohonan == null)
                        <input type="text" class="form-control mb-3" value="Tiada" readonly />
                    @else
                        <input type="text" class="form-control mb-3"
                            value="{{ date('d-m-Y', strtotime($permohonan->jadual->tarikh_mula)) }} hingga {{ date('d-m-Y', strtotime($permohonan->jadual->tarikh_tamat)) }}"
                            readonly />
                    @endif
                </div>
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                @if ($permohonan == null)
                    <button class="btn btn-primary" disabled>Mula Penilaian</button>
                @else
                    <a class="btn btn-primary" href="/penilaian/penilaian-kursus-ulpk/{{ $permohonan->jadual->id }}"
                        id="btn_start">Mula Penilaian</a>
                @endif
            </div>
        </div>

    </div>

    {{-- <script>
        function find(v) {
            var val = v.value;
            let permohonan = @json($permohonan->toArray());
            let id;
            permohonan.forEach(e => {
                if (e.id == val) {
                    console.log(e);
                    $("#nama_kursus").val(e.jadual.kursus_nama);
                    $("#tarikh_kursus").val(e.jadual.tarikh_mula);
                    id = e.jadual.id;
                }
            });

            var btn = document.getElementById('btn_start');

            btn.setAttribute("href", "/penilaian/penilaian-kursus/" + id);


            // btn.href =  + val;

        }
    </script> --}}
@endsection
