@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">LAPORAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">LAPORAN AM</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    LAPORAN PRESTASI KEHADIRAN PESERTA (ULS)
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
                <table class="table text-center table-bordered datatable " border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th>BIL.</th>
                            <th>BIDANG KURSUS</th>
                            <th>KATEGORI KURSUS
                            <th>KOD NAMA KURSUS</th>
                            <th>NAMA KURSUS</th>
                            <th>TARIKH KURSUS</th>
                            <th>TEMPAT KURSUS</th>
                            <th>ANJURAN</th>
                            <th>BIL.</th>
                            <th>NO KAD PENGENALAN</th>
                            <th>KOD NAMA KURSUS</th>
                            <th>NAMA PEMOHON</th>
                            <th>GRED</th>
                            <th>PUSAT TANGGUNGJAWAB</th>
                            <th>STATUS KEHADIRAN</th>
                            <th>CATATAN</th>
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
