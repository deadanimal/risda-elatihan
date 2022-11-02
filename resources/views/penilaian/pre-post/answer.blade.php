@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN PRE TEST DAN POST TEST</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    PENILAIAN PRE TEST
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <div class="row">
                    <div class="col-4 mt-2">
                        <h6 class="risda-dg fw-bold">KOD NAMA KURSUS</h6>
                    </div>
                    <div class="col-8">
                        <input class="form-control" type="text"
                            value="{{ $permohonan->jadual->kursus_kod_nama_kursus }}" readonly />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4 mt-2">
                        <h6 class="risda-dg fw-bold">NAMA KURSUS</h6>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control"
                            value="{{ $permohonan->jadual->kursus_nama }}" readonly>
                    </div>
                </div>
                <div class=" row mt-3">
                    <div class="col-4 mt-2">
                        <h6 class="risda-dg fw-bold">TARIKH KURSUS</h6>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($permohonan->jadual->tarikh_mula)) }} Hingga {{ date('d-m-Y', strtotime($permohonan->jadual->tarikh_tamat)) }}" readonly>
                    </div>
                </div>
            </div>

            @if(($permohonan->dinilai_pre==null)&&($permohonan->jadual->kursus_masa_mula_pre_post_test!=null))

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="/penilaian/mula-penilaian-pre-test/{{ $permohonan->jadual->id }}" class="btn btn-primary" id="btn-submit">Mula Penilaian</a>
                </div>
            </div>

            @else

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-secondary" id="btn-submit">Mula Penilaian</a>
                </div>
            </div>

            @endif

        </div>
    </div>
    {{-- <script>
        function selectNamaKursus(el) {
            let val = el.value;
            var permohonan = @json($permohonan->toArray());
            let href = '';
            permohonan.forEach(e => {
                if (e.id == val) {
                    $("#nama_kursus").val(e.jadual_kursus.kursus_nama);
                    $("#tarikh_kursus").val(e.jadual_kursus.tarikh_mula);
                    href = "/penilaian/mula-penilaian-pre-test/" + e.jadual_kursus.id;
                    $("#btn-submit").attr("href", href);
                }
            });
        }
    </script> --}}
@endsection
