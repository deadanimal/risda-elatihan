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
                    LAPORAN PENILAIAN PESERTA
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

        <a id="downloadpdf" style="display: none" download="PenilaianPeserta"
        href="pdf-penilaian-peserta">Download</a>
        <a id="downloadexcel" style="display: none" href="excel-penilaian-peserta" download="PenilaianPeserta">Download</a>

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
                @include(
                    'laporan.laporan_lain.excel.laporan_penilaian_peserta' )

            </div>
        </div>






            {{-- <div class="card-body">
                <div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable "
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g" style="vertical-align: middle">

                            <tr>
                                <th>BIL.</th>
                                <th>BIDANG KURSUS</th>
                                <th>NAMA KURSUS</th>
                                <th>KOD NAMA KURSUS</th>
                                <th>TARIKH KURSUS</th>
                                <th>TEMPAT KURSUS</th>
                                <th>ANJURAN</th>
                                <th>NO. FT</th>
                                <th>JUMLAH PESERTA</th>
                                <th>JUMLAH PENILAIAN</th>
                                <th>NAMA KONSULTAN/PENCERAMAH</th>
                                <th>MARKAH %</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($penilaian as $p)
                            <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ($p->kursus->bidang->nama_Bidang_Kursus ?? '-') }}</td>
                                    <td>{{ ($p->kursus->kategori_kursus->nama_Kategori_Kursus ?? '-') }}</td>
                                    <td>{{$p->kursus->kursus_nama}}</td>
                                    <td>{{ ($p->kursus->kod_kursus ?? '-') }}</td>
                                    <td>{{date('d/m/Y', strtotime($p->kursus->tarikh_mula))}}
                                    <br>-<br>{{date('d/m/Y', strtotime($p->kursus->tarikh_tamat))}}</td>
                                    <td>{{($p->kursus->tempat->nama_Agensi?? '-') }} </td>
                                    <td>{{($p->kursus->pengendali->nama_Agensi?? '-') }} </td>
                                    <td>{{$p->kursus->kursus_no_ft}}
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>--}}
        </div>
    </div>


    <script>
        function download(el) {
            let val = el.value;
            if (val == "Pdf") {
                document.getElementById('downloadpdf').click();
            }
            if (val == "Excel") {
                document.getElementById('downloadexcel').click();
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>
@endsection
