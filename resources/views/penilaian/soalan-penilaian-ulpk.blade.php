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
        <form action="/penilaian/penilaian-kursus-ulpk" method="POST">
            @csrf

            <input type="hidden" name="jadual_id" value="{{ $jadual_kursus->id }}">

            <div class="row mt-3 mb-2">
                <div class="col-12 mb-2">
                    <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                    <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN KURSUS (PESERTA ULPK)</p>
                </div>
            </div>
            <hr style="color: rgba(81,179,90, 60%);height:2px;">

            <div class="row">
                <div class="col-12">
                    <p class="h4 fw-bold mt-3">
                        PENILAIAN KURSUS (PESERTA ULPK)
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
                    <p class="h5">BAHAGIAN A</p>
                </div>
                <div class="col-12 mt-5 d-inline-flex">
                    <p class="h5"><span class="h5" style="color: #0F5E31">PENGISIAN PROGRAM</span>
                    </p>
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
                        <h6 class="mt-1">ISI KANDUNGAN DAN SKOP PROGRAM</h6>
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
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">KOMEN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
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
                        <h6 class="mt-1">KAITAN KANDUNGAN DENGAN PROGRAM</h6>
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
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">KOMEN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
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
                        <h6 class="mt-1">KANDUNGAN PROGRAM DENGAN AKTIVITI PEKEBUN KECIL</h6>
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
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">KOMEN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">ULASAN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-5 d-inline-flex">
                    <p class="h5"><span class="h5" style="color: #0F5E31">PERSEMBAHAN
                            PENCERAMAH</span>
                    </p>
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
                        <h6 class="mt-1">PENYAMPAIAN PENCERAMAH</h6>
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
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">KOMEN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
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
                        <h6 class="mt-1">INTERAKSI DENGAN PESERTA</h6>
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
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">KOMEN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
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
                        <h6 class="mt-1">AKTIVITI-AKTIVITI LATIHAN YANG DIKENDALIKAN</h6>
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
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">KOMEN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">ULASAN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-5 d-inline-flex">
                    <p class="h5"><span class="h5" style="color: #0F5E31">PENILAIAN SETIAP SLOT
                            PROGRAM</span>
                    </p>
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
                        <h6 class="mt-1">SLOT 1</h6>
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
                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">KOMEN</h6>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-5" id="btn-nextpage">
                <div class="col-11 text-end">
                    <button class="btn btn-primary" type="button" onclick="nextpage()">Seterusnya</button>
                </div>
            </div>

            <div class="row justify-content-center mt-4" id="page-2">
                {{-- <div class="col-12 d-inline-flex">
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
                </div> --}}
                <div class="col-12">
                    <p class="h6 fw-bolder">BAHAGIAN B</p>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">1. ADAKAH PROGRAM INI MENCAPAI OBJEKTIF YANG TELAH DITETAPKAN?</h6>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="s2" value="1">
                            <label class="form-check-label">YA</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="s2" value="1">
                            <label class="form-check-label">TIDAK</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <h6 class="mt-1">ULASAN</h6>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">2. ADAKAH MASA YANG DIPERUNTUKAN MENCUKUPI UNTUK MENCAPAI MATLAMAT
                            PROGRAM INI?</h6>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="s2" value="1">
                            <label class="form-check-label">YA</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="s2" value="1">
                            <label class="form-check-label">TIDAK</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">3. YANG PALING SAYA GEMARI DALAM PROGRAM INI?</h6>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">4. YANG SAYA PELAJARI DARI PROGRAM INI?</h6>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">5. APAKAH PERASAAN ANDA SELEPAS MENGHADIRI PROGRAM INI?</h6>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">6. SILA BERIKAN PENILAIAN ANDA MENGENAI TAHAP PENGETAHUANDAN KEMAHIRAN
                            ANDA SEBELUM DAN SELEPAS BERKURSUS DARI SEGI PERKARA BERIKUT:</h6>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            BIL
                                        </th>
                                        <th>
                                            PERKARA
                                        </th>
                                        <th>
                                            % SEBELUM
                                        </th>
                                        <th>
                                            % SELEPAS
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            PENGETAHUAN/SESUATU YANG BARU DARI PROGRAM INI
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            KEMAHIRAN MENYELESAIKAN MASALAH
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">7. SECARA AMNYA, APAKAH IMPAK PROGRAM INI KEPADA DIRI ANDA SENDIRI?</h6>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">8. APAKAH KEKUATAN PROGRAM INI?</h6>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">9. APAKAH KELEMAHAN PROGRAM INI?</h6>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">10. CADANGAN SAYA UNTUK MEMPERBAIKI PROGRAM INI.</h6>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="col-12">
                        <h6 class="mt-1">11. APAKAH KURSUS-KURSUS LAIN YANG DIPERLUKAN UNTUK DIHADIRI DI MASA
                            HADAPAN:</h6>
                    </div>
                    <div class="col-12">
                       a. <textarea class="form-control" rows="3"></textarea>
                       b. <textarea class="form-control" rows="3"></textarea>
                       c. <textarea class="form-control" rows="3"></textarea>
                       d. <textarea class="form-control" rows="3"></textarea>
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
