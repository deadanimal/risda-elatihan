@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">UTILITI</p>
                <p class="h5" style="color: rgb(43,93,53); ">MATLAMAT TAHUNAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row mb-4">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    MATLAMAT BILANGAN PERBELANJAAN
                </p>
            </div>
        </div>

        <form action="/utiliti/matlamat_tahunan/perbelanjaan/carian" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-3 mb-lg-3">
                            <label class="col-form-label">Tahun</label>
                        </div>
                        <div class="col-lg-7 mb-lg-3">
                            <input class="form-control tahun" type="text" name="tahun" autocomplete="off" placeholder="yyyy"/>
                        </div>
    
                        <div class="col-lg-3 mb-lg-3">
                            <label class="col-form-label">Jenis Matlamat</label>
                        </div>
                        <div class="col-lg-7 mb-3">
                            <select name="jenis_m" id="jenis_m" class="form-control">
                                <option value="" selected hidden>Sila Pilih</option>
                                <option value="bidang kursus">Bidang Kursus</option>
                                <option value="kategori kursus">Kategori Kursus</option>
                                <option value="tajuk kursus">Tajuk Kursus</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-lg-3 ps-lg-0 text-end">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
    </script>
@endsection
