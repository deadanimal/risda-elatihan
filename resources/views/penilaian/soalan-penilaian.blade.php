@extends('layouts.risda-base')
@section('content')
    <style>
        h6 {
            color: #0F5E31;
        }

        .tab {
            tab-size: 6;
        }

    </style>

    <div class="container">
        <form action="/penilaian/penilaian-kursus" method="POST">
            @csrf

            <input type="hidden" name="jadual_id" value="{{ $jadual_kursus->id }}">

            <div class="row mt-3 mb-2">
                <div class="col-12 mb-2">
                    <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                    <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN KURSUS</p>
                </div>
            </div>
            <hr style="color: rgba(81,179,90, 60%);height:2px;">

            <div class="row">
                <div class="col-12">
                    <p class="h4 fw-bold mt-3">
                        PENILAIAN KURSUS
                    </p>
                </div>
            </div>

            <div class="row justify-content-center mt-4" id="page-1">
                <div class="col-9 d-inline-flex">
                    <div class="col-1">
                        <p class="h6 pt-2">Skala</p>
                    </div>
                    <div class="col-11 rounded text-center" style="background-color: #009640;">
                        <p class="text-white d-inline-flex h6 mt-2">1-Sangat Tidak Setuju</p> &nbsp;&nbsp;
                        <p class="text-white d-inline-flex h6">2-Tidak Setuju</p>&nbsp;&nbsp;
                        <p class="text-white d-inline-flex h6">3-Setuju</p>&nbsp;&nbsp;
                        <p class="text-white d-inline-flex h6">4-Sangat Setuju</p>
                    </div>
                </div>
                <div class="col-12 mt-5 d-inline-flex">
                    <p class="h5">BAHAGIAN A: <span class="h5" style="color: #0F5E31">PENILAIAN
                            KANDUNGAN LATIHAN</span></p>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                    </div>
                    <div class="col-3">
                        <li class="d-inline-flex fw-bold"> 1 &emsp;&nbsp;&nbsp;&nbsp;</li>
                        <li class="d-inline-flex fw-bold"> 2 &emsp;&nbsp;&nbsp;&nbsp;</li>
                        <li class="d-inline-flex fw-bold"> 3 &emsp;&nbsp;&nbsp;</li>
                        <li class="d-inline-flex fw-bold"> 4 </li>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">1. KURSUS INI MENCAPAI OBJECTIF YANG DITETAPKAN</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s1" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s1" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s1" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s1" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">2. KURSUS INI MENINGKATKAN PENGETAHUAN SAYA DALAM BIDANG BERKAITAN</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s2" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s2" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s2" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s2" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">3. KURSUS INI MENINGKATKAN KEMAHIRAN SAYA DALAM BIDANG BERKAITAN</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s3" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s3" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s3" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s3" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">4. ISI KANDUNGAN YANG DIBENTANGKAN BERSESUAIAN DENGAN PROGRAM</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s4" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s4" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s4" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s4" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">5. TOPIK DISUSUN SECARA TERATUR BERSESUAIAN DENGAN PROGRAM</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s5" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s5" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s5" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s5" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">6. SAYA MAMPU MENGHUBUNGKAN TEORI DAN AMALI DI DALAM KURSUS INI</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s6" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s6" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s6" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s6" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">7. PENGETAHUAN DARI PROGRAM INI BOLEH SAYA GUNAKAN DALAM TUGAS HARIAN
                        </h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s7" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s7" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s7" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s7" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">8. TEKNIK LATIHAN (CONTOH : SYARAHAN, AMALI, LAWATAN, PERBINCANGAN
                            KUMPULAN
                            <br>&emsp;
                            YANG DIGUNAKAN DALAM KURSUS INI BERSESUAIAN DENGAN TOPIK YANG DISAMPAIKAN)
                        </h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s8" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s8" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s8" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s8" value="4">
                        </div>
                    </div>
                </div>


                <div class="col-12 mt-5 d-inline-flex">
                    <p class="h5">BAHAGIAN A: <span class="h5" style="color: #0F5E31">PENILAIAN
                            PENGURUSAN PROGRAM</span></p>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                    </div>
                    <div class="col-3">
                        <li class="d-inline-flex fw-bold"> 1 &emsp;&nbsp;&nbsp;&nbsp;</li>
                        <li class="d-inline-flex fw-bold"> 2 &emsp;&nbsp;&nbsp;&nbsp;</li>
                        <li class="d-inline-flex fw-bold"> 3 &emsp;&nbsp;&nbsp;</li>
                        <li class="d-inline-flex fw-bold"> 4 </li>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">1. TEMPOH MASA KURSUS ADALAH BERSESUAIAN</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs1" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs1" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs1" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs1" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">2. TEMPAT PENGINAPAN YANG DISEDIAKAN ADALAH SELESA</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs2" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs2" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs2" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs2" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">3. KUALITI DAN KUANTITI MAKANAN DAN MINUMAN MEMUASKAN</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs3" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs3" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs3" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs3" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">4. SUSUN ATUR BILIK KULIAH BERSESUAIAN DENGAN PROGRAM</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs4" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs4" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs4" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs4" value="4">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">5. URUS SETIA SEDIA MEMBANTU KURSUS DIJALANKAN</h6>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs5" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs5" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs5" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bs5" value="4">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5" id="btn-nextpage">
                <div class="col-11 text-end">
                    <button class="btn btn-primary" type="button" onclick="nextpage()">Seterusnya</button>
                </div>
            </div>

            <div class="row justify-content-center mt-4" id="page-2">
                <div class="col-12 d-inline-flex">
                    <div class="col-1">
                        <p class="h6 pt-3 px-3">Skala</p>
                    </div>
                    <div class="col-11 rounded" style="background-color: #009640;">
                        <div class="row p-2 mt-2 mx-2">
                            <div class="col-6">
                                <p class="text-white h6">1 - Sangat Tidak Memuaskan / Sangat Tidak Berkaitan</p>
                            </div>
                            <div class="col-6">
                                <p class="text-white h6">2 - Tidak Memuaskan / Tidak Berkaitan</p>
                            </div>
                            <div class="col-6">
                                <p class="text-white h6">3 - Memuaskan / Berkaitan</p>
                            </div>
                            <div class="col-6">
                                <p class="text-white h6">4 - Sangat Memuaskan / Sangat Berkaitan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <p class="h6 fw-bolder">BAHAGIAN C: <span class="h6" style="color: #0F5E31">PENILAIAN
                            KANDUNGAN LATIHAN</span></p>
                </div>


                @foreach ($jadual_kursus->penceramah as $p)
                    <input type="hidden" name="penceramah_id[]" value="{{ $p->id }}">
                    <div class="col-7 mt-5">
                        <div class="row mb-2">
                            <div class="col-3">
                                <label for="" class="h6 mt-2">PENCERAMAH {{ $loop->iteration }}</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{ $p->pc_nama }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="" class="h6 mt-2">TOPIK</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" value="{{ $nama_kursus }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-9">
                            </div>
                            <div class="col-3">
                                <li class="d-inline-flex fw-bold"> 1 &emsp;&nbsp;&nbsp;&nbsp;</li>
                                <li class="d-inline-flex fw-bold"> 2 &emsp;&nbsp;&nbsp;&nbsp;</li>
                                <li class="d-inline-flex fw-bold"> 3 &emsp;&nbsp;&nbsp;</li>
                                <li class="d-inline-flex fw-bold"> 4 </li>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="mt-1">1. TOPIK</h6>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs1"
                                                value="1">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs1"
                                                value="2">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs1"
                                                value="3">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs1"
                                                value="4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="mt-1">2. PENCERAMAH</h6>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs2"
                                                value="1">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs2"
                                                value="2">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs2"
                                                value="3">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs2"
                                                value="4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="mt-1">2. KAITAN ISI KANDUNGAN DENGAN KURSUS</h6>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs3"
                                                value="1">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs3"
                                                value="2">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs3"
                                                value="3">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs3"
                                                value="4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="mt-1">2. ULASAN LAIN</h6>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs4"
                                                value="1">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs4"
                                                value="2">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs4"
                                                value="3">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $p->id }}cs4"
                                                value="4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



                <div class="col-12 mt-5">
                    <p class="h6 fw-bolder">BAHAGIAN D: <span class="h6" style="color: #0F5E31">CADANGAN
                            ANDA
                            UNTUK MEMPERBAIKI PROGRAM INI / AKAN DATANG (SILA NYATAKAN)</span></p>
                </div>

                <div class="col-12 mt-3">
                    <div class="row mb-3">
                        <div class="col-1 text-end my-auto">
                            <span class="fw-bold">1.</span>
                        </div>
                        <div class="col-11">
                            <input type="text" class="form-control" name="ds[]">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end my-auto">
                            <span class="fw-bold">2.</span>
                        </div>
                        <div class="col-11">
                            <input type="text" class="form-control" name="ds[]">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end my-auto">
                            <span class="fw-bold">3.</span>
                        </div>
                        <div class="col-11">
                            <input type="text" class="form-control" name="ds[]">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end my-auto">
                            <span class="fw-bold">4.</span>
                        </div>
                        <div class="col-11">
                            <input type="text" class="form-control" name="ds[]">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-1 text-end my-auto">
                            <span class="fw-bold">5.</span>
                        </div>
                        <div class="col-11">
                            <input type="text" class="form-control" name="ds[]">
                        </div>
                    </div>
                </div>

                <div class="col-12 text-end mt-3">
                    <button class="btn btn-primary" type="submit" id="btnsubmit"> <i class="fas fa-arrow-right"></i>
                        Hantar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#page-2").hide();
        });

        function nextpage() {
            $("#page-1").hide();
            $("#btn-nextpage").hide();
            $("#page-2").show();
        }

        $("#btnsubmit").click(function(e) {
            e.preventDefault();
            var form = $(this).parents('form');

            Swal.fire({
                title: '<h5 style="color: rgb(43,93,53);">ADAKAH ANDA PASTI UNTUK MENGHANTAR PENILAIAN KURSUS YANG TELAH DIJAWAB?<h5>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'DISIMPAN!',
                        'PENILAIAN KURSUS TELAH BERJAYA DIHANTAR',
                        'success'
                    );
                    setTimeout(() => {
                        form.submit();
                    }, 2000);
                }
            });


        });
    </script>
@endsection
