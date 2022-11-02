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
                    MATLAMAT BILANGAN PESERTA MENGIKUT KATEGORI KURSUS
                </p>
            </div>
        </div>

        <form action="/utiliti/matlamat_tahunan/peserta/carian" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-3 mb-lg-3">
                            <label class="col-form-label">Tahun</label>
                        </div>
                        <div class="col-lg-7 mb-lg-3">
                            <input class="form-control tahun" type="text" name="tahun" autocomplete="off"
                                value="{{ $tahun }}" />
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
                                <option value="negeri">Negeri</option>
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
                <a href="/utiliti/matlamat_tahunan/peserta/{{ $jenis['sub'] }}/{{ $tahun }}"
                    class="btn btn-primary">Kemaskini</a>
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
                                    <th scope="col">JAN</th>
                                    <th scope="col">FEB</th>
                                    <th scope="col">MAC</th>
                                    <th scope="col">APRIL</th>
                                    <th scope="col">MEI</th>
                                    <th scope="col">JUN</th>
                                    <th scope="col">JUL</th>
                                    <th scope="col">OGOS</th>
                                    <th scope="col">SEP</th>
                                    <th scope="col">OKT</th>
                                    <th scope="col">NOV</th>
                                    <th scope="col">DIS</th>
                                    <th scope="col">JUMLAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bidang_h as $b)
                                    <tr class="risda-bg-dg text-white">
                                        <td>{{ $huruf[$loop->iteration - 1] }}.</td>
                                        @if ($b->matlamat_peserta == null)
                                            <td>{{ $b['nama_Bidang_Kursus'] }}</td>
                                            @for ($i = 0; $i < 12; $i++)
                                                <td>0</td>
                                            @endfor
                                            <td>0</td>
                                        @else
                                            <td>{{ $b->matlamat_peserta->nama }}</td>
                                            <td>{{ $b->matlamat_peserta->jan }}</td>
                                            <td>{{ $b->matlamat_peserta->feb }}</td>
                                            <td>{{ $b->matlamat_peserta->mac }}</td>
                                            <td>{{ $b->matlamat_peserta->apr }}</td>
                                            <td>{{ $b->matlamat_peserta->mei }}</td>
                                            <td>{{ $b->matlamat_peserta->jun }}</td>
                                            <td>{{ $b->matlamat_peserta->jul }}</td>
                                            <td>{{ $b->matlamat_peserta->ogos }}</td>
                                            <td>{{ $b->matlamat_peserta->sept }}</td>
                                            <td>{{ $b->matlamat_peserta->okt }}</td>
                                            <td>{{ $b->matlamat_peserta->nov }}</td>
                                            <td>{{ $b->matlamat_peserta->dis }}</td>
                                            <td>{{ $b->matlamat_peserta->jan + $b->matlamat_peserta->feb + $b->matlamat_peserta->mac + $b->matlamat_peserta->apr + $b->matlamat_peserta->mei + +$b->matlamat_peserta->jun + $b->matlamat_peserta->jul + $b->matlamat_peserta->ogos + $b->matlamat_peserta->sept + $b->matlamat_peserta->okt + $b->matlamat_peserta->nov + $b->matlamat_peserta->dis }}
                                            </td>
                                        @endif
                                    </tr>
                                    @if (isset($carian[$b->id]))
                                        @foreach ($carian[$b->id] as $a => $cc)
                                            <tr>
                                                <td>{{ $a + 1 }}.</td>
                                                <td>
                                                    {{ $cc->nama_Kategori_Kursus }}
                                                </td>
                                                @foreach ($cc->matlamat_peserta_cm as $l => $cm)
                                                    <td>{{ $cm }}</td>
                                                @endforeach
                                                <td>{{ $cc->jumlah }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan="15">Tiada Kategori</td>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
