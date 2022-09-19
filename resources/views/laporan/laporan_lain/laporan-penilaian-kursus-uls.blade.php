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
                    LAPORAN PENILAIAN KURSUS(ULS)
                </p>
            </div>
        </div>

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
                        <p class="risda-dg h5 mt-2">TARIKH KURSUS</p>

                    </div>
                    <div class="col-lg-6">
                        {{-- <input type="date" class="form-control"> --}}

                        <input type="date" class="form-control" value="{{$kursus->tarikh_mula}}" >

                    </div>
                </div>

                {{-- <div class="row mt-4">
                    <div class="col-lg-10 text-end">
                        <a href="#" class="btn btn-sm btn-primary"> <span class="fas fa-search"></span> Carian</a>
                    </div>
                </div> --}}
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
                            <th rowspan="3">BIL.</th>
                            <th rowspan="3">NAMA </th>
                            <th colspan="7">KEHADIRAN PESERTA</th>
                            <th rowspan="3">JUMLAH</th>
                            <th rowspan="3">PERATUSAN KEHADIRAN</th>
                        </tr>

                        <tr>
                            <th colspan="2">HARI 1</th>
                            <th colspan="2">HARI 2</th>
                            <th colspan="3">HARI 3</th>
                        </tr>
                        <tr>
                            <th>SESI 1 </th>
                            <th>SESI 2 </th>

                            <th>SESI 1 </th>
                            <th>SESI 2 </th>

                            <th>SESI 1 </th>
                            <th>SESI 2 </th>
                            <th>SESI 3</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
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
                        <tr>
                            <td colspan="2">JUMLAH KEHADIRAN PESERTA</td>
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
                        <tr>
                            <td colspan="2">JUMLAH KESELURUHAN PESERTA</td>
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
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th rowspan="2">BIL.</th>
                            <th rowspan="2">NAMA PESERTA</th>
                            <th colspan="9">BAHAGIAN A: PENILAIAN KANDUNGAN LATIHAN</th>
                            <th colspan="7">BAHAGIAN B: PENILAIAN PENGURUSAN PROGRAM</th>
                        </tr>

                        <tr><small>
                            <th>KURSUS INI MENCAPAI OBJEKTIF YANG DITETAPKAN</th>
                            <th>KURSUS INI MENINGKATKAN PENGETAHUAN SAYA DALAM BIDANG BERKAITAN. </th>
                            <th>KURSUS INI MENINGKATKAN KEMAHIRAN SAYA DALAM BIDANG BERKAITAN</th>
                            <th>ISI KANDUNGAN YANG DIBENTANGKAN BERSESUAIAN DENGAN PROGRAM</th>
                            <th>TOPIK DISUSUN SECARA TERATUR BERSESUAIAN DENGAN PROGRAM</th>
                            <th>SAYA MAMPU MENGHUBUNGKAN TEORI DAN AMALI DI DALAM KURSUS INI</th>
                            <th>PENGETAHUAN DARI PROGRAM INI BOLEH SAYA GUNAKAN DALAM TUGAS SEHARIAN</th>
                            <th>TEKNIK LATIHAN</th>
                            <th>PURATA PENILAIAN KANDUNGAN LATIHAN</th>

                            <th>TEMPOH MASA KURSUS ADALAH BERSESUAIAN</th>
                            <th>TEMPAT PENGINAPAN YANG DISEDIAKAN ADALAH SELESA</th>
                            <th>KUALITI DAN KUANTITI MAKANAN DAN MINUMAN MEMUASKAN</th>
                            <th>SUSUN ATUR BILIK KULIAH BERSESUAIAN DENGAN PROGRAM</th>
                            <th>ALAT BANTUAN MENGAJAR BERSESUAIAN DENGAN PROGRAM</th>
                            <th>URUSETIA SEDIA MEMBANTU SEPANJANG KURSUS DIJALANKAN</th>
                            <th>PURATA PENILAIAN PENGURUSAN PROGRAM</th>
                            </small>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>


        <div class="card-body">
            <div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th rowspan="2">BIL.</th>
                            <th rowspan="2">NAMA PESERTA</th>
                            <th colspan="6">BAHAGIAN C: PENILAIAN PENCERAMAH</th>
                        </tr>

                        <tr>
                            <small>
                            <th>NAMA PENCERAMAH</th>
                            <th>NAMA TOPIK</th>
                            <th>1.TOPIK</th>
                            <th>2.PENCERAMAH</th>
                            <th>3.KAITAN ISI KANDUNGAN DENGAN KURSUS</th>
                            <th>4.ULASAN LAIN</th>
                            </small>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th rowspan="2">BIL.</th>
                            <th rowspan="2">NAMA PESERTA</th>
                            <th colspan="9">BAHAGIAN A: PENILAIAN KANDUNGAN LATIHAN</th>
                            <th colspan="7">BAHAGIAN B: PENILAIAN PENGURUSAN PROGRAM</th>
                        </tr>

                        <tr><small>
                            <th>KURSUS INI MENCAPAI OBJEKTIF YANG DITETAPKAN</th>
                            <th>KURSUS INI MENINGKATKAN PENGETAHUAN SAYA DALAM BIDANG BERKAITAN. </th>
                            <th>KURSUS INI MENINGKATKAN KEMAHIRAN SAYA DALAM BIDANG BERKAITAN</th>
                            <th>ISI KANDUNGAN YANG DIBENTANGKAN BERSESUAIAN DENGAN PROGRAM</th>
                            <th>TOPIK DISUSUN SECARA TERATUR BERSESUAIAN DENGAN PROGRAM</th>
                            <th>SAYA MAMPU MENGHUBUNGKAN TEORI DAN AMALI DI DALAM KURSUS INI</th>
                            <th>PENGETAHUAN DARI PROGRAM INI BOLEH SAYA GUNAKAN DALAM TUGAS SEHARIAN</th>
                            <th>TEKNIK LATIHAN</th>
                            <th>PURATA PENILAIAN KANDUNGAN LATIHAN</th>

                            <th>TEMPOH MASA KURSUS ADALAH BERSESUAIAN</th>
                            <th>TEMPAT PENGINAPAN YANG DISEDIAKAN ADALAH SELESA</th>
                            <th>KUALITI DAN KUANTITI MAKANAN DAN MINUMAN MEMUASKAN</th>
                            <th>SUSUN ATUR BILIK KULIAH BERSESUAIAN DENGAN PROGRAM</th>
                            <th>ALAT BANTUAN MENGAJAR BERSESUAIAN DENGAN PROGRAM</th>
                            <th>URUSETIA SEDIA MEMBANTU SEPANJANG KURSUS DIJALANKAN</th>
                            <th>PURATA PENILAIAN PENGURUSAN PROGRAM</th>
                            </small>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>


        <div class="card-body">
            <div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">
                        <tr>
                            <th>CADANGAN UNTUK MEMBAIKI PROGRAM INI / AKAN DATANG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="5"></td>
                        </tr>
                        <tr>
                            <td rowspan="5"></td>
                        </tr>

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
