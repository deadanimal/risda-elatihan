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
                    MATLAMAT BILANGAN KURSUS MENGIKUT BIDANG KURSUS
                </p>
            </div>
        </div>

        <form action="/utiliti/matlamat_tahunan/kursus/carian" method="post">
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
                <a href="/utiliti/matlamat_tahunan/kursus/{{ $jenis['sub'] }}/{{ $tahun }}"
                    class="btn btn-primary">Kemaskini</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="table-responsive scrollbar m-3">
                        <table class="table datatable table text-center m-3">
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
                                @foreach ($carian as $key => $c)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if ($title == 'BIDANG KURSUS')
                                                {{ $c->nama_Bidang_Kursus }}
                                            @elseif ($title == 'KATEGORI KURSUS')
                                                {{ $c->nama_Kategori_Kursus }}
                                            @elseif ($title == 'TAJUK KURSUS')
                                                {{ $c->tajuk_Kursus }}
                                            @elseif ($title == 'PUSAT LATIHAN')
                                                {{ $c->nama }}
                                            @endif
                                        </td>
                                        @foreach ($c->matlamat_kursus_cm as $l => $cm)
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
