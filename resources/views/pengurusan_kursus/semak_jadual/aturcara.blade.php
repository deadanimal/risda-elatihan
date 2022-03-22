@extends('layouts.risda-base')
@section('content')
    @php
    use App\Models\Aturcara;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PENGURUSAN KURSUS</strong></h1>
                <h5 class="risda-dg">SEMAK JADUAL KURSUS - <span class="risda-g">TAMBAH KURSUS</span></h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row">
            <div class="col">
                <h5 class="h3">ATURCARA</h5>
            </div>
        </div>

        <div class="row justify-content-lg-center mt-3">
            <div class="col-lg-10 ">
                {{-- @for ($i = 1; $i <= $total_hari; $i++) --}}

                @foreach ($aturcara as $list)
                    @for ($l = 1; $l <= 1; $l++)
                        @for ($m = 0; $m < 1; $m++)
                            @for ($i = $list[$m]->ac_hari; $i <= $list[$m]->ac_hari; $i++)
                                @if ($list[$m]->ac_hari != $i)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="card risda-bg-g ">
                                                <h5 class="text-white my-2 mx-3">HARI {{ $i }}</h5>
                                            </div>
                                            <form action="/pengurusan_kursus/aturcara" method="POST" class="px-2 mt-2">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="col-form-label">BILANGAN SESI</label>
                                                        <select class="form-select form-control select-sesi" name="bil_sesi"
                                                            id="bil_sesi_{{ $i }}">
                                                            <option selected="" hidden>Sila Pilih</option>
                                                            @for ($j = 1; $j <= 5; $j++)
                                                                <option value='{{ $j }}'>{{ $j }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                        <input type="hidden" name="ac_jadual_kursus"
                                                            value="{{ $id }}">
                                                        <input type="hidden" name="hari" value="{{ $i }}">
                                                    </div>
                                                </div>

                                                <div id="aturan_{{ $i }}">

                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                @else
                                    {{--  --}}

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="card risda-bg-g ">
                                                <h5 class="text-white my-2 mx-3">HARI {{ $i }}</h5>
                                            </div>
                                            <form action="/pengurusan_kursus/aturcara" method="POST" class="px-2 mt-2">
                                                @csrf
                                                @php
                                                    $test = Aturcara::where('ac_jadual_kursus', $id)
                                                        ->where('ac_hari', $i)
                                                        ->get();
                                                    $bil = count($test);
                                                @endphp
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="col-form-label">BILANGAN SESI</label>
                                                        <input type="number" class="form-control" name="bil_sesi" id="bil_{{ $i }}" value="{{ $bil }}">
                                                        {{-- <select class="form-select form-control select-sesi" name="bil_sesi"
                                                            id="bil_{{ $i }}">
                                                            <option value="{{ $bil }}" selected hidden>
                                                                {{ $bil }}</option>
                                                            @for ($j = 1; $j <= 5; $j++)
                                                                <option value='{{ $j }}'>{{ $j }}
                                                                </option>
                                                            @endfor
                                                        </select> --}}
                                                        <input type="hidden" name="ac_jadual_kursus"
                                                            value="{{ $id }}">
                                                        <input type="hidden" name="hari" value="{{ $i }}">
                                                    </div>
                                                </div>
                                                @foreach ($test as $jap)
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="col-form-label">SESI</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $jap->ac_sesi }}" name="ac_sesi[]">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="col-form-label">MASA</label>
                                                            <input class="form-control" name="ac_masa[]" type="time"
                                                                placeholder="H:i" value="{{ $jap->ac_masa }}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="col-form-label">ATURCARA</label>
                                                            <input type="text" class="form-control" name="ac_aturcara[]"
                                                                value="{{ $jap->ac_aturcara }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div id="tambah_{{ $i }}">

                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-6">
                                                        <button type="button" class="btn btn-primary"
                                                            id="add_aturcara_{{ $i }}">Tambah</button>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                    {{--  --}}
                                    {{-- <div class="row mb-3">
                            <div class="col">
                                <div class="card risda-bg-g ">
                                    <h5 class="text-white my-2 mx-3">HARI {{ $i }}</h5>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="col-form-label">Maklumat telah disimpan. <a href="#"
                                                class="btn btn-primary">Kemaskini</a></label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                                @endif
                            @endfor
                        @endfor
                    @endfor
                @endforeach
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h5 class="h3">RINGKASAN ATURCARA</h5>
            </div>
        </div>

        <div class="row justify-content-lg-center mt-3">
            <div class="col-lg-10 ">
                <div class="card mt-3">
                    <div class="table-responsive scrollbar stripe">
                        <table class="table table-bordered text-center ">
                            <thead class="risda-bg-g text-white">
                                <tr>
                                    <th scope="col">HARI</th>
                                    <th scope="col">SESI</th>
                                    <th scope="col">MASA</th>
                                    <th scope="col">ATURCARA</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($list_aturcara as $ac)
                                    <tr>
                                        <td>{{ $ac->ac_hari }}</td>
                                        <td>{{ $ac->ac_sesi }}</td>
                                        <td>{{ $ac->ac_masa }}</td>
                                        <td>{{ $ac->ac_aturcara }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-6">
                <a href="/pengurusan_kursus/peruntukan_peserta/{{ $id }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-6 text-end">
                <a href="/pengurusan_kursus/nota_rujukan/{{ $id }}" class="btn btn-primary">Seterusnya</a>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var kat_kur = @json($total_hari);
            var list_dah_ada = @json($list_aturcara->toArray());
            console.log(list_dah_ada);
            for (let i = 1; i <= kat_kur; i++) {
                // const element = array[index];
                console.log(i);
                $('#bil_sesi_' + i).change(function() {

                    var bilangan = this.value;
                    $('#aturan_' + i).html("");
                    for (let j = 1; j <= bilangan; j++) {
                        $('#aturan_' + i).append(
                            `<div class="row">
                                <div class="col-lg-6">
                                    <label class="col-form-label">SESI</label>
                                    <input type="text" class="form-control" readonly value="` + j + `" name="ac_sesi[]">
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-form-label">MASA</label>
                                    <input class="form-control" name="ac_masa[]" type="time" placeholder="H:i"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">ATURCARA</label>
                                    <input type="text" class="form-control" name="ac_aturcara[]">
                                </div>
                            </div>`);

                    }

                });

                
                $('#add_aturcara_' + i).click(function() {
                    var bil = $('#bil_' + i).val();
                    bilangan = parseInt(bil) + 1;
                    console.log(bilangan);
                    $('#tambah_' + i).append(`<div class="row">
                                <div class="col-lg-6">
                                    <label class="col-form-label">SESI</label>
                                    <input type="text" class="form-control" name="ac_sesi[]" readonly value='` +
                        bilangan + `'>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-form-label">MASA</label>
                                    <input class="form-control" name="ac_masa[]" type="time" placeholder="H:i"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">ATURCARA</label>
                                    <input type="text" class="form-control" name="ac_aturcara[]">
                                </div>
                            </div>`);
                    
                    $('#bil_'+i).val(bilangan);
                    
                });
            }
        });
    </script>
@endsection
