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
                    MATLAMAT BILANGAN PESERTA MENGIKUT {{ $title }}
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/utiliti/matlamat_tahunan/peserta" method="post">
                    @if ($status == 'update')
                        @method('PUT')
                    @endif
                    @csrf
                    <input type="hidden" name="jenis" value="{{ $jenis['sub'] }}">
                    <div class="card mt-2">
                        <div class="table-responsive scrollbar m-3">
                            <table class="table text-center m-3">
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
                                                <input type="hidden" name="title[]" value="{{ $c->tajuk_Kursus }}">
                                                <input type="hidden" name="id_title[]" value="{{ $c->id }}">
                                                @if ($status == 'update')
                                                    <input type="hidden" name="id_mt[]"
                                                        value="{{ $c->matlamat_negeri_peserta->id }}">
                                                @endif
                                            </td>
                                            @foreach ($c->matlamat_negeri_peserta_cm as $k => $cm)
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
