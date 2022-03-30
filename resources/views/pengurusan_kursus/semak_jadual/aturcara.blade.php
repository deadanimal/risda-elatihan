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

        @if ($aturcara == null)
            <div class="row">
                <div class="col">
                    <h5 class="h3">ATURCARA</h5>
                </div>
            </div>

            <div class="row justify-content-lg-center mt-3">
                <div class="col-lg-10 ">
                    <form action="/pengurusan_kursus/aturcara" method="POST" class="px-2 mt-2">
                        @csrf
                        @for ($i = 1; $i <= $total_hari; $i++)
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="card risda-bg-g ">
                                        <h5 class="text-white my-2 mx-3">HARI {{ $i }}</h5>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="col-form-label">BILANGAN SESI</label>
                                            <select class="form-select form-control select-sesi" name="bil_sesi[]"
                                                id="bil_sesi_{{ $i }}">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @for ($j = 1; $j <= 5; $j++)
                                                    <option value='{{ $j }}'>{{ $j }}
                                                    </option>
                                                @endfor
                                            </select>
                                            {{-- <input type="hidden" name="ac_jadual_kursus[]" value="{{ $id }}">
                                            <input type="hidden" name="hari[]" value="{{ $i }}"> --}}
                                        </div>
                                    </div>

                                    <div id="aturan_{{ $i }}">

                                    </div>
                                </div>
                            </div>
                        @endfor
                        <div class="row mt-4">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif

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
                                    <th scope="col">KEMASKINI</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($list_aturcara as $ac)
                                    <tr>
                                        <td>{{ $ac->ac_hari }}</td>
                                        <td>
                                            {{ $ac->ac_sesi }}
                                        </td>
                                        <td>
                                            {{ $ac->ac_masa }}
                                        </td>
                                        <td>
                                            {{ $ac->ac_aturcara }}
                                        </td>

                                        <td>
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#kemaskini_{{$ac->id}}">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <div class="modal fade" id="kemaskini_{{$ac->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content position-relative">
                                                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                                <h4 class="mb-1" id="modalExampleDemoLabel">KEMASKINI</h4>
                                                            </div>
                                                            <div class="p-4">
                                                                <form action="/pengurusan_kursus/aturcara/{{$ac->id}}" method="post">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-6 mb-lg-3">
                                                                            <label class="col-form-label">SESI</label>
                                                                            <input type="text" class="form-control" readonly value="{{$ac->ac_sesi}}" name="ac_sesi">
                                                                        </div>
                                                                        <div class="col-lg-6 mb-lg-3">
                                                                            <label class="col-form-label">MASA</label>
                                                                            <input class="form-control" name="ac_masa" type="time" value="{{$ac->ac_masa}}"/>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label class="col-form-label">ATURCARA</label>
                                                                            <input type="text" class="form-control" name="ac_aturcara" value="{{$ac->ac_aturcara}}">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="ac_jadual_kursus" value="{{$ac->ac_jadual_kursus}}">
                                                                    <input type="hidden" name="hari" value="{{$ac->ac_hari}}">
                                                                    
                                                                    <div class="row">
                                                                        <div class="col text-end">
                                                                            <button type="submit" class="btn btn-primary">Kemaskini</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- @if ($aturcara == null)

                @endif --}}
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
            var id_jadual = @json($id);
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
                                    <input type="text" class="form-control" readonly value="` + j +
                            `" name="ac_sesi[]">
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-form-label">MASA</label>
                                    <input class="form-control" name="ac_masa[]" type="time" placeholder="H:i"/>
                                </div>
                            </div>
                            <input type="hidden" name="ac_jadual_kursus[]" value="`+id_jadual+`">
                            <input type="hidden" name="hari[]" value="`+i+`">
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">ATURCARA</label>
                                    <input type="text" class="form-control" name="ac_aturcara[]">
                                </div>
                            </div>`);

                    }

                });
            }
        });
    </script>
@endsection
