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
                    LAPORAN PELAKSANAAN LATIHAN STAF
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
    </div>

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
            <div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " style="vertical-align: middle;border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th rowspan="3">BIL</th>
                            <th rowspan="3">BIDANG KURSUS</th>
                            <th rowspan="3">BIL</th>
                            <th rowspan="3">NAMA KURSUS</th>
                            <th rowspan="3">TARIKH KURSUS</th>
                            <th rowspan="3">TEMPAT KURSUS</th>
                            <th rowspan="3">ANJURAN</th>
                            <th rowspan="3">NO.FT</th>
                            <th colspan="9">BILANGAN PESERTA</th>
                            <th colspan="5">KATEGORI</th>
                        </tr>
                        <tr>
                            <th colspan="3">BILANGAN</th>
                            <th colspan="3">KEHADIRAN</th>
                            <th colspan="3">PERATUS KEHADIRAN</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>E</th>
                        </tr>
                        <tr>
                            <th>LELAKI</th>
                            <th>PEREMPUAN</th>
                            <th>JUMLAH BILANGAN PESERTA</th>
                            <th>LELAKI</th>
                            <th>PEREMPUAN</th>
                            <th>JUMLAH BILANGAN PESERTA</th>
                            <th>LELAKI</th>
                            <th>PEREMPUAN</th>
                            <th>JUMLAH BILANGAN PESERTA</th>
                            <th>PENGURUSAN TERTINGGI</th>
                            <th>GRED 41-54</th>
                            <th>GRED 27-40</th>
                            <th>GRED 17-26</th>
                            <th>GRED 11-16</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>
@endsection
