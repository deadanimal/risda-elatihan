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
                    LAPORAN KEWANGAN TERPERINCI
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-8">
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">TARIKH MULA</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">TARIKH AKHIR</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="date" class="form-control">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-10 text-end">
                        <a href="#" class="btn btn-sm btn-primary"> <span class="fas fa-search"></span> Carian</a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <a id="downloadpdf" style="display: none" href="{{ route('pdf_kewangan_terperinci') }}"></a>

        <a id="downloadexcel" style="display: none" href="{{ route('excel_kewangan_terperinci') }}"></a>

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
                    'laporan.laporan_lain.excel.laporan_kewangan_terperinci'
                )
                {{-- <div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable "
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g" style="vertical-align: middle">

                            <tr>
                                <th>BIL</th>
                                <th>BIDANG KURSUS</th>
                                <th>BIL</th>
                                <th>NAMA KURSUS</th>
                                <th>TARIKH KURSUS</th>
                                <th>ANJURAN</th>
                                <th>NO. FT</th>
                                <th>BIL. PESERTA HADIR</th>
                                <th>PERUNTUKAN</th>
                                <th>PERBELANJAAN</th>
                                <th>TANGGUNGAN</th>
                                <th>BAKI</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div> --}}

            </div>
        </div>
    </div>

    <script>
        function download(el) {
            let val = el.value;
            if (val == "Pdf") {
                document.getElementById('downloadpdf').click();
            }
            if (val == "Excel") {
                document.getElementById('downloadexcel').click();
            }
        }
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>

@endsection
