@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PESERTA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENCALONAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    PENCALONAN PESERTA
                </p>
            </div>
        </div>

        <div class="row mt-3 ">
            <div class="col">
                <div class="card ">
                    <div class="card-body mx-lg-5">
                        <div class="row p-3">
                            <div class="col-lg-3">
                                <p class="h5">Tahun</p>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-sm mb-2" disabled value="2022">
                            </div>
                            <div class="col-lg-3">
                                <p class="h5">Unit Latihan</p>
                            </div>
                            <div class="col-lg-9">
                                @role('Urus Setia ULS')
                                    <input type="text" class="form-control form-control-sm mb-2" disabled value="Staf" disabled>
                                    @elserole('Urus Setia ULPK')
                                    <input type="text" class="form-control form-control-sm mb-2" disabled value="Pekebun Kecil"
                                        disabled>
                                @else
                                    <select name="" id="" class="form-control">
                                        <option value="" hidden selected>Sila Pilih</option>
                                        <option value="Staf">Staf</option>
                                        <option value="Pekebun Kecil">Pekebun Kecil</option>
                                    </select>
                                @endrole
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="table-responsive scrollbar m-3">
                <table class="table datatable table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Bil.</th>
                            <th scope="col">KOD NAMA KURSUS</th>
                            <th scope="col">NAMA KURSUS</th>
                            <th scope="col">TARIKH KURSUS</th>
                            <th scope="col">TEMPAT KURSUS</th>
                            <th scope="col">STATUS PELAKSANAAN</th>
                            <th scope="col">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadual as $key => $p)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $p->kursus_kod_nama_kursus }}</td>
                                <td>{{ $p->kursus_nama }}</td>
                                <td>{{ date('d-m-Y', strtotime($p->tarikh_mula)) }} -
                                    {{ date('d-m-Y', strtotime($p->tarikh_tamat)) }}</td>
                                <td>{{ $p->tempat->nama_Agensi }}</td>
                                @if ($j->tarikh_mula > date('Y-m-d'))
                                    <td>BELUM DILAKSANA</td>
                                @elseif ($j->tarikh_tamat < date('Y-m-d'))
                                    <td>SELESAI</td>
                                @elseif ($j->tarikh_tamat >= date('Y-m-d'))
                                    <td>SEDANG DILAKSANAKAN</td>
                                @endif
                                <td>
                                    <a href="/pengurusan_peserta/pencalonan/{{ $p->id }}" class="btn btn-primary">
                                        <i class="far fa-clipboard"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        $('#unit_latihan').change(function {
            var pilih = $('#UL_choice').value();

        })
    </script>
@endsection
