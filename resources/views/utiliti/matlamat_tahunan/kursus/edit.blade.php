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

        <div class="row">
            <div class="col-12">
                <form action="/utiliti/matlamat_tahunan/kursus" method="post">
                    @if ($status == 'update')
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="card mt-2">
                        <div class="table-responsive scrollbar m-3">
                            <table class="table datatable text-center m-3">
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
                                                    <input type="hidden" name="title[]"
                                                        value="{{ $c->nama_Bidang_Kursus }}">
                                                @elseif ($title == 'KATEGORI KURSUS')
                                                    {{ $c->nama_Kategori_Kursus }}
                                                    <input type="hidden" name="title[]"
                                                        value="{{ $c->nama_Kategori_Kursus }}">
                                                @elseif ($title == 'TAJUK KURSUS')
                                                    {{ $c->tajuk_Kursus }}
                                                    <input type="hidden" name="title[]" value="{{ $c->tajuk_Kursus }}">
                                                @endif
                                            </td>
                                            @foreach ($c->matlamat_kursus_cm as $k => $cm)
                                                <td>
                                                    <input type="text"
                                                        class="form-control form-control-sm line_{{ $key }}"
                                                        name="bulan[{{ $key }}][{{ $k }}]"
                                                        value="{{ $cm }}"
                                                        id="col_{{ $key }}_{{ $k }}"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                </td>
                                            @endforeach
                                            <td id="jumlah_{{ $key }}">{{ $c->jumlah }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let line = @json($carian->toArray());
            for (let i = 0; i < line.length; i++) {
                $('.line_' + i).change(function() {
                    var jum = 0;
                    for (let j = 1; j <= 12; j++) {
                        var bul = parseInt($('#col_' + i + '_' + j).val());
                        jum = jum + bul;
                    }
                    $('#jumlah_' + i).html(jum);
                })

            }

        })
    </script>
@endsection
