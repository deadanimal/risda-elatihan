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
                    LAPORAN PENILAIAN EJEN PELAKSANA
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-8">
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">JENIS LAPORAN</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">SETAKAT TAHUNAN</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="date" class="form-control">
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

    <a id="downloadpdf" download="" style="display: none"
    href="{{ route('pdf_penilaian_ejen') }}"></a>

    <a id="downloadexcel" style="display: none" href="{{ route('excel_penilaian_ejen') }}"></a>


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
                'laporan.laporan_lain.excel.laporan_penilaian_ejen'
            )
            {{-- <div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th>BIL.</th>
                            <th>NAMA EJEN PELAKSANA</th>
                            <th>BILANGAN PERKHIDMATAN / BEKALAN
                            <th>TAJUK PERKHIDMATAN/BEKALAN</th>
                            <th>JUMLAH HARGA (RM)</th>
                            <th>NILAI PRESTASI (%)</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>



                    <tbody>
                        {{-- @foreach ($ejen as $e)
                            @foreach ($penceramah as )

                            @endforeach
                            <td>{{$agensi->nama_Agensi}}
                        @endforeach
                        </td>


                        @endforeach

                    </tbody>

                </table>
            </div> --}}

        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>


@endsection
