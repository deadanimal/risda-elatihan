@extends('layouts.risda-base')
@section('content')

    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">LAPORAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">LAPORAN LAIN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    LAPORAN PENILAIAN KURSUS(ULS)
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-8">
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">NAMA KURSUS</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="{{$kursus->kursus_nama}}" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">TARIKH KURSUS</p>

                    </div>
                    <div class="col-lg-6">
                        @if($kursus->bilangan_hari==1)
                        <input type="text" class="form-control"value="{{date('d/m/Y', strtotime($kursus->tarikh_mula))}}" readonly>
                     @else
                         <input type="text" class="form-control" value="{{date('d/m/Y', strtotime($kursus->tarikh_mula))}} - {{date('d/m/Y', strtotime($kursus->tarikh_tamat))}}" readonly>
                     @endif

                    </div>
                </div>

                {{-- <div class="row mt-4">
                    <div class="col-lg-10 text-end">
                        <a href="#" class="btn btn-sm btn-primary"> <span class="fas fa-search"></span> Carian</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <a id="downloadpdf" style="display: none" download="Laporan Penilaian Pre Test dan Post Test"
    href="{{ route('pdf_penilaian_kursus', $kursus->id) }}">Download</a>
    <a id="downloadexcel" style="display: none" href="{{ route('excel_penilaian_kursus', $kursus->id) }}" download="Laporan Penilaian Pre Test dan Post Test">Download</a>



<hr style="color: rgba(81,179,90, 60%);height:2px;">

<div class="card mt-5 ">
    <div class="card-header">
        <div class="row justify-content-end">
            <div class="col-xl-2">
                <select class="form-select risda-bg-g text-white" onchange="download(this)">
                    <option selected disabled hidden>Cetak</option>
                    <option value="Excel">Excel</option>
                    <option value="Pdf">PDF</option>
                </select>
            </div>
        </div>
    </div>

        <div class="card-body">
            @include(
                'laporan.laporan_lain.excel.penilaian.laporan-penilaian-kursus')

        </div>

    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>


@endsection
