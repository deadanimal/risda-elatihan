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
                <p class="h5" style="color: rgb(43,93,53); ">LAPORAN PERBELANJAAN</p>
            </div>
        </div>
        <hr class="risda-g">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    LAPORAN PERBELANJAAN MENGIKUT KATEGORI
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
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">BIDANG</th>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">KURSUS</th>
                                <th colspan="3">BILANGAN PESERTA</th>
                                <th rowspan="2">NO LOT.</th>
                                <th rowspan="2">PERUNTUKAN (RM)</th>
                                <th colspan="11">PERBELANJAAN (RM)</th>
                                <th rowspan="2">JUMLAH (RM)</th>
                                <th rowspan="2">TANGGUNGAN (RM)</th>
                                <th rowspan="2">BAKI (RM)</th>
                            </tr>
                            <tr>
                                <th>LELAKI</th>
                                <th>PEREMPUAN</th>
                                <th>JUMLAH</th>
                                <th>ELAUN MAKAN</th>
                                <th>MAKAN/MINUM</th>
                                <th>ELAUN PENCERAMAH</th>
                                <th>ALATAN INPUT</th>
                                <th>NOTA ALAT TULIS</th>
                                <th>DOBI</th>
                                <th>PENYELENGGARAAN DALAMAN</th>
                                <th>SEWA KENDERAAN</th>
                                <th>BAYARAN KONSULTAN</th>
                                <th>PENGINAPAN</th>
                                <th>INSURANS</th>
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
