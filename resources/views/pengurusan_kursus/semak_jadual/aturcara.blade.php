@extends('layouts.risda-base')
@section('content')
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
            @for ($i = 1; $i <= $total_hari; $i++)
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
                                            <option value='{{ $j }}'>{{ $j }}</option>
                                        @endfor
                                    </select>
                                    <input type="hidden" name="ac_jadual_kursus" value="{{ $id }}">
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
            @endfor
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
                            @foreach ($aturcara as $ac)
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
        <div class="col-lg-6">
            <a href="/pengurusan_kursus/peruntukan_peserta/{{$id}}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="col-lg-6 text-end">
            <a href="/pengurusan_kursus/nota_rujukan/{{$id}}" class="btn btn-primary">Seterusnya</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var kat_kur = <?php echo $total_hari; ?>;
            for (let i = 1; i <= kat_kur; i++) {
                // const element = array[index];
                console.log(i);
                $('#bil_sesi_' + i).change(function() {

                    var bilangan = this.value;
                    $('#aturan_' + i).html("");
                    for (let j = 1; j <= bilangan; j++) {
                        // const element = array[j];
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
            }

        });
    </script>
@endsection
