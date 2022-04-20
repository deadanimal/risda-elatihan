@extends('layouts.risda-base')
@section('content')
    @php
    use App\Models\BidangKursus;
    use App\Models\KategoriKursus;
    use App\Models\MatlamatBilanganKursus;
    @endphp
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
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="{{ $tahun }}" selected hidden>{{ $tahun }}</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
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
                                    @php
                                        $bid = BidangKursus::find($b->id);
                                        $bidang = MatlamatBilanganKursus::where('bidang', $bid->nama_Bidang_Kursus)->first();
                                        if ($bidang != null) {
                                            $bidang_jumlah = $bidang['jan'] + $bidang['feb'] + $bidang['mac'] + $bidang['apr'] + $bidang['mei'] + $bidang['jun'] + $bidang['jul'] + $bidang['ogos'] + $bidang['sept'] + $bidang['okt'] + $bidang['nov'] + $bidang['dis'];
                                        }
                                        // dd($bidang);
                                    @endphp
                                    <tr class="risda-bg-dg text-white">
                                        <td>{{ $huruf[$loop->iteration-1] }}.</td>
                                        @if ($bidang == null)
                                            <td>{{ $bid['nama_Bidang_Kursus'] }}</td>
                                            @for ($i = 0; $i < 12; $i++)
                                                <td>0</td>
                                            @endfor
                                            <td>0</td>
                                        @else
                                            <td>{{ $bidang['bidang'] }}</td>
                                            <td>{{ $bidang['jan'] }}</td>
                                            <td>{{ $bidang['feb'] }}</td>
                                            <td>{{ $bidang['mac'] }}</td>
                                            <td>{{ $bidang['apr'] }}</td>
                                            <td>{{ $bidang['mei'] }}</td>
                                            <td>{{ $bidang['jun'] }}</td>
                                            <td>{{ $bidang['jul'] }}</td>
                                            <td>{{ $bidang['ogos'] }}</td>
                                            <td>{{ $bidang['sept'] }}</td>
                                            <td>{{ $bidang['okt'] }}</td>
                                            <td>{{ $bidang['nov'] }}</td>
                                            <td>{{ $bidang['dis'] }}</td>
                                            <td>{{ $bidang_jumlah }}</td>
                                        @endif
                                    </tr>

                                    @if (isset($kategori_h[$b->id]))
                                        @foreach ($kategori_h[$b->id] as $k)
                                            @php
                                                $kat = KategoriKursus::find($k->id);
                                                $kategori = MatlamatBilanganKursus::where('bidang', $kat->nama_Kategori_Kursus)->first();
                                                if ($kategori != null) {
                                                    $kategori_jumlah = $kategori['jan'] + $kategori['feb'] + $kategori['mac'] + $kategori['apr'] + $kategori['mei'] + $kategori['jun'] + $kategori['jul'] + $kategori['ogos'] + $kategori['sept'] + $kategori['okt'] + $kategori['nov'] + $kategori['dis'];
                                                }
                                                // dd($kategori);
                                            @endphp
                                            <tr class="bg-soft-success">
                                                <td>{{ $huruf_kecil[$loop->iteration-1] }})</td>
                                                @if ($kategori == null)
                                                    <td>{{ $kat['nama_Kategori_Kursus'] }}</td>
                                                    @for ($i = 0; $i < 12; $i++)
                                                        <td>0</td>
                                                    @endfor
                                                    <td>0</td>
                                                @else
                                                    <td>{{ $kategori['bidang'] }}</td>
                                                    <td>{{ $kategori['jan'] }}</td>
                                                    <td>{{ $kategori['feb'] }}</td>
                                                    <td>{{ $kategori['mac'] }}</td>
                                                    <td>{{ $kategori['apr'] }}</td>
                                                    <td>{{ $kategori['mei'] }}</td>
                                                    <td>{{ $kategori['jun'] }}</td>
                                                    <td>{{ $kategori['jul'] }}</td>
                                                    <td>{{ $kategori['ogos'] }}</td>
                                                    <td>{{ $kategori['sept'] }}</td>
                                                    <td>{{ $kategori['okt'] }}</td>
                                                    <td>{{ $kategori['nov'] }}</td>
                                                    <td>{{ $kategori['dis'] }}</td>
                                                    <td>{{ $kategori_jumlah }}</td>
                                                @endif
                                            </tr>
                                            @if (isset($carian[$k->id]))
                                                @foreach ($carian[$k->id] as $a => $cc)
                                                    <tr>
                                                        <td>{{ $a + 1 }}.</td>
                                                        <td>
                                                            {{ $cc->tajuk_Kursus }}
                                                        </td>
                                                        @foreach ($cc->matlamat_kursus_cm as $l => $cm)
                                                            <td>{{ $cm }}</td>
                                                        @endforeach
                                                        <td>{{ $cc->jumlah }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <td colspan="15">Tiada Tajuk</td>
                                            @endif
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
