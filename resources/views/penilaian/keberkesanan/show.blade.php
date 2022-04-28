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
        <form action="/penilaian/keberkesananKursus" method="POST">
            @csrf

            {{-- <input type="hidden" name="jadual_kursus_id" value="{{ $jadual_kursus->id }}"> --}}

            <div class="row mt-3 mb-2">
                <div class="col-12 mb-2">
                    <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                    <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN KEBERKESANAN KURSUS</p>
                </div>
            </div>
            <hr style="color: rgba(81,179,90, 60%);height:2px;">

            <div class="row">
                <div class="col-12">
                    <p class="h4 fw-bold mt-3">
                        PENILAIAN KEBERKESANAN KURSUS
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
                        <h6 class="mt-1">1. Tahap pengetahuan/kemahiran yang dimiliki oleh kakitangan dalam mempermudahkan tugas harian</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_keberkesanan->tahap_pengetahuan=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->tahap_pengetahuan==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->tahap_pengetahuan==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->tahap_pengetahuan==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tahap_pengetahuan" value="4" checked="checked">
                        </div>

                        @endif


                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">2.Menyiapkan kerja dalam tempoh atau jangkamasa yang diharapkan.</h6>
                    </div>
                    <div class="col-3">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="1">
                        </div>

                        @if ($penilaian_keberkesanan->tempoh_tugasan=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->tempoh_tugasan==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->tempoh_tugasan==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->tempoh_tugasan==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tempoh_tugasan" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">3.Memberi cadangan, maklumat dan idea untuk memperbaiki mutu kerja atau perkhidmatan</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_keberkesanan->baiki_kerja=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->baiki_kerja==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->baiki_kerja==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->baiki_kerja==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="baiki_kerja" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">4. Bersemangat atau menunjukkan kesungguhan dalam melakukan sesuatu kerja</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_keberkesanan->kesungguhan_kerja=="1")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="1" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->kesungguhan_kerja==="2")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="2" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->kesungguhan_kerja==="3")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="3" checked="checked">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="4">
                        </div>

                        @elseif ($penilaian_keberkesanan->kesungguhan_kerja==="4")
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="1" >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kesungguhan_kerja" value="4" checked="checked">
                        </div>

                        @endif

                    </div>
                </div>

                <div class="col-12 d-inline-flex">
                    <div class="col-9">
                        <h6 class="mt-1">5. Tahap displin yang ditunjukkan terhadap tugas yang dilaksanakan.</h6>
                    </div>
                    <div class="col-3">

                        @if ($penilaian_keberkesanan->tahap_displin=="1")
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

                        @elseif ($penilaian_keberkesanan->tahap_displin==="2")
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

                        @elseif ($penilaian_keberkesanan->tahap_displin==="3")
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

                        @elseif ($penilaian_keberkesanan->tahap_displin==="4")
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
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="prestasi_kerja" value="1">
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

                        @if ($penilaian_keberkesanan->prestasi_kerja=="1")
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

                        @elseif ($penilaian_keberkesanan->prestasi_kerja==="2")
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

                        @elseif ($penilaian_keberkesanan->prestasi_kerja==="3")
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

                        @elseif ($penilaian_keberkesanan->prestasi_kerja==="4")
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


                <div class="col-12 d-inline-flex my-2">
                    <div class="col-9">
                        <h6 class="mt-1">KOMEN</h6>
                    </div>
                    <p>
                    <div class="col-3">
                        <textarea class="form-control" rows="3" cols="9" name="komen_penyelia" readonly>{{$penilaian_keberkesanan->komen_penyelia}}</textarea>
                    </div>
                </p>
                </div>
            </div>


                <div class="col-12 text-end mt-3">
                    <a href="/penilaian/keberkesanan-kursus" class="btn btn-primary" type="submit" id="btnsubmit">
                        Kembali</a>
                </div>
            </div>
        </form>
    </div>


@endsection
