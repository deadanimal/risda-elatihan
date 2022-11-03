@extends('layouts.risda-base')
@section('content')
<style>
    .justify{
        text-align: justify;
    }
    </style>
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
                    LAPORAN PENILAIAN KEBERKESANAN
                </p>
            </div>
        </div>
        <input type="hidden" value={{$kursus->id}}>
            <div class="row justify-content-center my-5">
            <div class="col-8">
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">NAMA KURSUS</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="{{$kursus->kursus_nama}}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">KOD NAMA KURSUS</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="{{$kursus->kodkursus->kod_Kursus}}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">TARIKH KURSUS</p>
                    </div>
                    <div class="col-lg-6">
                        @if($kursus->bilangan_hari==1)
                           <input type="text" class="form-control"value="{{date('d/m/Y', strtotime($kursus->tarikh_mula))}}">
                        @else
                            <input type="text" class="form-control" value="{{date('d/m/Y', strtotime($kursus->tarikh_mula))}} - {{date('d/m/Y', strtotime($kursus->tarikh_tamat))}}">
                        @endif

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">NAMA PENCERAMAH</p>
                    </div>
                    <div class="col-lg-6">
                        {{-- <input type="text" class="form-control"> --}}
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4">
                        <p class="risda-dg h5 mt-2">AGENSI PENCERAMAH</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

        </div>
    </div>

    <a id="downloadpdf" style="display: none" download="kehadiran-peserta"
    href=>Download</a>
<a id="downloadexcel" style="display: none" href="" download="kehadiran-peserta">Download</a>



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
                            <th colspan="11">PENILAIAN KANDUNGAN LATIHAN(PKL)</th>
                            <th colspan="7">PENILAIAN PENGURUSAN PROGRAM(PPP)</th>
                        </tr>

                        <tr>
                            <th>BIL.</th>
                            <th>NAMA PESERTA</th>
                            <th>KURSUS INI MENCAPAI OBJEKTIF DITETAPKAN</th>
                            <th>KURSUS INI MENINGKATKAN PENGETAHUAN SAYA </th>
                            <th>KURSUS INI MENINGKATKAN KEMAHIRAN SAYA</th>
                            <th>ISI KANDUNGAN BERSESUAIAN DENGAN PROGRAM</th>
                            <th>TOPIK DISUSUN TERATUR & SESUAI DENGAN PROGRAM</th>
                            <th>SAYA MAMPU MENGAITKAN TEORI DAN AMALI DI DALAM KURSUS INI </th>
                            <th>PENGETAHUAN KURSUS BOLEH DIGUNAKAN DALAM TUGAS HARIAN</th>
                            <th>TEKNIK LATIHAN</th>
                            <th>PURATA PKL</th>
                            <th>TEMPOH MASA KURSUS BERSESUAIAN</th>
                            <th>TEMPAT PENGINAPAN DISEDIAKAN ADALAH SELESA</th>
                            <th>KUALITI DAN KUANTITI MAKANAN DISEDIAKAN</th>
                            <th>SUSUR ATUR BILIK KULIAH</th>
                            <th>ALAT BANTUAN MENGAJAR ADALAH SESUAI</th>
                            <th>URUSETIA SEDIA MEMBANTU SEPANJANG PROGRAM</th>
                            <th>PURATA PPP</th>

                        </tr>

                        {{-- <tr>
                            <th>KETEPATAN MASA MENGHADIRI KELAS</th>
                            <th>PENGUBARAN DALAM AKTIVITI</th>
                            <th>KOMUNIKASI DAN HORMAT SESAMA PESERTA</th>
                            <th>KEPIMPINAN DIRI</th>
                            <th>KUALITI KERJA</th>
                            <th>PURATA KESELURUHAN</th>
                        </tr> --}}
                    </thead>
                    <tbody>
                        @foreach ($pk as $k)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->kehadiran->staff->name}}</td>
                            <td>{{$k->tahap_pengetahuan}}</td>
                            <td>{{$k->tempoh_tugasan}}</td>
                            <td>{{$k->baiki_kerja}}</td>
                            <td>{{$k->kesungguhan_kerja}}</td>
                            <td>{{$k->tahap_displin}}</td>
                            <td>{{$k->prestasi_kerja}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>


                        </tr>

                        @endforeach


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
