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
                    MATLAMAT BILANGAN PESERTA MENGIKUT BIDANG KURSUS
                </p>
            </div>
        </div>

        <form action="/utiliti/matlamat_tahunan/panggilan_peserta/carian" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-3 mb-lg-3">
                            <label class="col-form-label">Tahun</label>
                        </div>
                        <div class="col-lg-7 mb-lg-3">
                            <input class="form-control tahun" type="text" name="tahun" autocomplete="off" value="{{ $tahun }}"/>
                        </div>

                        <div class="col-lg-3 mb-lg-3">
                            <label class="col-form-label">Jenis Matlamat</label>
                        </div>
                        <div class="col-lg-7 mb-3">
                            <select name="jenis_m" id="jenis_m" class="form-control">
                                <option value="{{ $jenis['val'] }}" selected hidden>{{ $jenis['name'] }}</option>
                                <option value="bidang kursus">Bidang Kursus</option>
                                <option value="kategori kursus">Kategori Kursus</option>
                                <option value="tajuk kursus">Tajuk Kursus</option>
                                <option value="pusat latihan">Pusat Latihan</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-lg-3 ps-lg-0 text-end">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col text-end">
                <a href="/utiliti/matlamat_tahunan/panggilan_peserta/{{$jenis['sub']}}/{{$tahun}}" class="btn btn-primary">Kemaskini</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="table-responsive scrollbar m-3">
                        <table class="table table text-center m-3">
                            <thead style="background-color: #009640; color: white;">
                                <tr>
                                    <th scope="col">BIL.</th>
                                    <th scope="col">{{ $title }}</th>
                                    <th scope="col">JOHOR</th>
                                    <th scope="col">KEDAH</th>
                                    <th scope="col">KELANTAN</th>
                                    <th scope="col">MELAKA</th>
                                    <th scope="col">NEGERI SEMBILAN</th>
                                    <th scope="col">PAHANG</th>
                                    <th scope="col">PERAK</th>
                                    <th scope="col">PERLIS</th>
                                    <th scope="col">PULAU PINANG</th>
                                    <th scope="col">SELANGOR</th>
                                    <th scope="col">TERENGGANU</th>
                                    <th scope="col">SARAWAK</th>
                                    <th scope="col">SABAH</th>
                                    <th scope="col">W.P. KUALA LUMPUR</th>
                                    <th scope="col">JUMLAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carian as $key => $c)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $c->tajuk_Kursus }}
                                        </td>
                                        @foreach ($c->matlamat_negeri_panggilan_cm as $l => $cm)
                                        <td>{{ $cm }}</td>
                                        @endforeach
                                        <td>{{ $c->jumlah }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
