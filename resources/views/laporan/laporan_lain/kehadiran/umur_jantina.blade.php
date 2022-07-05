@extends('layouts.risda-base')
<style>
    th{
        vertical-align: middle;
    }
</style>
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">LAPORAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">LAPORAN KEHADIRAN</p>
            </div>
        </div>
        <hr class="risda-g">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    LAPORAN KEHADIRAN MENGIKUT UMUR DAN JANTINA
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

        <hr class="risda-g">

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
                    <table class="table text-center table-bordered datatable"
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g">
                            <tr>
                                <th rowspan="3">BIL.</th>
                                <th rowspan="3">PUSAT LATIHAN / PUSAT TANGGUNGJAWAB</th>
                                <th colspan="15">BILANGAN KURSUS</th>
                            </tr>
                            <tr>
                                <th colspan="5">LELAKI</th>
                                <th colspan="5">PEREMPUAN</th>
                                <th colspan="5">JUMLAH KESELURUHAN</th>
                            </tr>
                            <tr>
                                <th>19-40 TAHUN</th>
                                <th>41-65 TAHUN</th>
                                <th>66-70 TAHUN</th>
                                <th>71 TAHUN DAN KEATAS</th>
                                <th>JUMLAH</th>
                                <th>19-40 TAHUN</th>
                                <th>41-65 TAHUN</th>
                                <th>66-70 TAHUN</th>
                                <th>71 TAHUN DAN KEATAS</th>
                                <th>JUMLAH</th>
                                <th>19-40 TAHUN</th>
                                <th>41-65 TAHUN</th>
                                <th>66-70 TAHUN</th>
                                <th>71 TAHUN DAN KEATAS</th>
                                <th>JUMLAH</th>
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
