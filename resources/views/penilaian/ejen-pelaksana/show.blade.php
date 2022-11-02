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
        <form action="/penilaian/ejen-pelaksana" method="POST">
            @csrf

            {{-- <input type="hidden" name="jadual_id" value="{{ $jadual_kursus->id }}"> --}}

            <div class="row mt-3 mb-2">
                <div class="col-12 mb-2">
                    <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                    <p class="h5" style="color: rgb(43,93,53); ">EJEN PELAKSANA</p>
                </div>
            </div>
            <hr style="color: rgba(81,179,90, 60%);height:2px;">

            <div class="row">
                <div class="col-12">
                    <p class="h4 fw-bold mt-3">
                        PENILAIAN EJEN PELAKSANA
                    </p>
                </div>
            </div>

            <div class="col-12 mt-5 d-inline-flex">
                <p class="h5"></p>
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
                <input type="hidden" name="jadual_kursus_id" value="jadual_kursus_id">
                <div class="col-12 mt-5 d-inline-flex">
                    <p class="h5"><span class="h5" style="color: #0F5E31">BAHAGIAN A: KEURUS SETIAAN</span>
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
                        <h6 class="mt-1">1. Jumlah Urus setia yang bertugas adalah bersesuaian</h6>
                    </div>
                    <div class="col-3">
                        @if ($penilaian_ejen->urusetia_sesuai=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="4">
                        </div>

                        @elseif ($penilaian_ejen->urusetia_sesuai==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="4">
                        </div>

                        @elseif ($penilaian_ejen->urusetia_sesuai==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="4">
                        </div>

                        @elseif ($penilaian_ejen->urusetia_sesuai==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="4" checked="checked">
                        </div>

                        @endif

                        {{-- </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="urusetia_sesuai" value="4">
                        </div> --}}
                    </div>
                </div>
                            </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">2. Pematuhan masa bertugas</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->pematuhan_masa=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="4">
                        </div>

                        @elseif ($penilaian_ejen->pematuhan_masa==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="4">
                        </div>

                        @elseif ($penilaian_ejen->pematuhan_masa==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="4">
                        </div>

                        @elseif ($penilaian_ejen->pematuhan_masa==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pematuhan_masa" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">3. Mudah dihubungi dan responsif</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->mudah_dihubungi=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="4">
                        </div>

                        @elseif ($penilaian_ejen->mudah_dihubungi==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="4">
                        </div>

                        @elseif ($penilaian_ejen->mudah_dihubungi==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="4">
                        </div>

                        @elseif ($penilaian_ejen->mudah_dihubungi==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mudah_dihubungi" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">4. Maklumbalas / tindakan ejen pelaksana/pembekal terhadap teguran/laporan/aduan</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->maklumbalas_ejen=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="4">
                        </div>

                        @elseif ($penilaian_ejen->maklumbalas_ejen==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="4">
                        </div>

                        @elseif ($penilaian_ejen->maklumbalas_ejen==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="4">
                        </div>

                        @elseif ($penilaian_ejen->maklumbalas_ejen==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maklumbalas_ejen" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">5. Tahap displin yang ditunjukkan terhadap tugas yang dilaksanakan.</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->tahap_displin=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="4">
                        </div>

                        @elseif ($penilaian_ejen->tahap_displin==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="4">
                        </div>

                        @elseif ($penilaian_ejen->tahap_displin==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="4">
                        </div>

                        @elseif ($penilaian_ejen->tahap_displin==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_displin" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">6. Prestasi kerja yang ditunjukkan oleh pegawai/staf bagi meningkatkan produktiviti perkhidmatan</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->prestasi_kerja=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="4">
                        </div>

                        @elseif ($penilaian_ejen->prestasi_kerja==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="4">
                        </div>

                        @elseif ($penilaian_ejen->prestasi_kerja==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="4">
                        </div>

                        @elseif ($penilaian_ejen->prestasi_kerja==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 mt-5 d-inline-flex">
                    <p class="h5">BAHAGIAN B: BAHAN/ALATAN KURSUS</p>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">1.Kuantiti mencukupi seperti dinyatakan dalam Sebutharga</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->kuantiti_cukup=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kuantiti_cukup==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kuantiti_cukup==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kuantiti_cukup==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kuantiti_cukup" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">2.Kualiti menepati seperti dinyatakan dalam Sebutharga</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->kualiti_menepati=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kualiti_menepati==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kualiti_menepati==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kualiti_menepati==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_menepati" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">3. Dihantar / disediakan dalam tempoh yang ditetapkan</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->tempoh_dihantar=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="4">
                        </div>

                        @elseif ($penilaian_ejen->tempoh_dihantar==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="4">
                        </div>

                        @elseif ($penilaian_ejen->tempoh_dihantar==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="4">
                        </div>

                        @elseif ($penilaian_ejen->tempoh_dihantar==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_dihantar" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>


                <div class="col-12 mt-5 d-inline-flex">
                    <p class="h5">BAHAGIAN C: PENGURUSAN</p>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">1. Mematuhi jadual pelaksanaan</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->patuhi_jadual=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="4">
                        </div>

                        @elseif ($penilaian_ejen->patuhi_jadual==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="4">
                        </div>

                        @elseif ($penilaian_ejen->patuhi_jadual==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="4">
                        </div>

                        @elseif ($penilaian_ejen->patuhi_jadual==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_jadual" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">2. Mematuhi skop perkhidmatan / bekalan</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->patuhi_skop=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="4">
                        </div>

                        @elseif ($penilaian_ejen->patuhi_skop==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="4">
                        </div>

                        @elseif ($penilaian_ejen->patuhi_skop==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="4">
                        </div>

                        @elseif ($penilaian_ejen->patuhi_skop==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="patuhi_skop" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">3. Kualiti perkhidmatan memenuhi ekspektasi</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->kualiti_perkhidmatan=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kualiti_perkhidmatan==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kualiti_perkhidmatan==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kualiti_perkhidmatan==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kualiti_perkhidmatan" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">4. Ketepatan masa mengemukakan dokumen sebutharga, invois, laporan dan dokumen sokongan</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->ketepatan_masa=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="4">
                        </div>

                        @elseif ($penilaian_ejen->ketepatan_masa==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="4">
                        </div>

                        @elseif ($penilaian_ejen->ketepatan_masa==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="4">
                        </div>

                        @elseif ($penilaian_ejen->ketepatan_masa==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ketepatan_masa" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">5. Kerjasama / hubungan yang baik dengan Bahagian Latihan</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_ejen->kerjasama_bahagianLatihan=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kerjasama_bahagianLatihan==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kerjasama_bahagianLatihan==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="4">
                        </div>

                        @elseif ($penilaian_ejen->kerjasama_bahagianLatihan==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kerjasama_bahagianLatihan" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>





            </div>

                <div class="col-10 text-end mt-3">
                    <a href="/penilaian/ejen-pelaksana/" class="btn btn-primary" type="submit" id="btnsubmit">
                        Kembali</a>
                </div>
            </div>
        </form>
    </div>


@endsection
