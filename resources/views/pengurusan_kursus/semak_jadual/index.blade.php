@extends('layouts.risda-base')
@section('content')
    @php
    use App\Models\StatusPelaksanaan;
    use App\Models\Agensi;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PENGURUSAN KURSUS</strong></h1>
                <h5 class="risda-dg">SEMAK JADUAL KURSUS</h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row">
            <div class="col">
                <h5 class="h3">JADUAL KURSUS</h5>
            </div>
        </div>

        <div class="row justify-content-lg-center mt-3">
            <div class="col-lg-10 ">

                <div class="row">
                    <div class="col-lg-2 p-lg-0">
                        <label class="col-form-label">UNIT LATIHAN:</label>
                    </div>
                    <div class="col-lg-10">
                        <select class="form-select form-control" onchange="unitlatihan(this)">
                            <option selected hidden disabled>Sila Pilih</option>
                            <option value="Staf">Staf</option>
                            <option value="Pekebun Kecil">Pekebun Kecil</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4 p-lg-0">
                                <label class="col-form-label">TARIKH AWAL:</label>
                            </div>
                            <div class="col-lg-8">
                                <input class="form-control datetimepicker" id="search_TA" type="text"
                                    placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4 p-lg-0">
                                <label class="col-form-label">TARIKH AKHIR:</label>
                            </div>
                            <div class="col-lg-8">
                                <input class="form-control datetimepicker" id="search_TL" type="text"
                                    placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-2 p-lg-0">
                        <label class="col-form-label">TEMPAT KURSUS:</label>
                    </div>
                    <div class="col-lg-10">
                        <select class="form-select form-control" name="search_TK" id="search_TK">
                            <option selected="" aria-placeholder="Sila Pilih" hidden></option>
                            @foreach ($jadual as $t)
                                <option value="{{ $t->kursus_tempat }}">{{ $t->kursus_tempat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <a href="/pengurusan_kursus/semak_jadual/create" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Kursus
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="table-responsive scrollbar m-3">
                        <table class="table datatable table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">KOD NAMA KURSUS</th>
                                    <th class="sort">NAMA KURSUS</th>
                                    <th class="sort">TARIKH KURSUS</th>
                                    <th class="sort">TEMPAT KURSUS</th>
                                    <th class="sort">BILANGAN PESERTA</th>
                                    <th class="sort">STATUS PELAKSANAAN</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($jadual as $key => $j)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $j->kursus_kod_nama_kursus }}</td>
                                        <td>{{ $j->kursus_nama }}</td>
                                        <td>{{ date('d/m/Y', strtotime($j->tarikh_mula)) }} <br>

                                            - <br>

                                            {{ date('d/m/Y', strtotime($j->tarikh_tamat)) }}
                                        <td>
                                            {{$j->tempat->nama_Agensi}}
                                        </td>
                                        <td>{{ $j->bilangan }}</td>
                                            {{-- {{$j->status_pelaksanaan->Status_Pelaksanaan}} --}}
                                            {{-- @if ($j->kursus_status_pelaksanaan==1) --}}

                                            @if ($j->tarikh_mula > date('Y-m-d'))
                                                <td>AKAN DILAKSANAKAN</td>

                                            @elseif ($j->tarikh_tamat < date('Y-m-d'))
                                                <td>TELAH DILAKSANAKAN</td>

                                            @elseif ($j->tarikh_tamat > date('Y-m-d'))
                                                <td>SEDANG DILAKSANAKAN</td>
                                            @endif
                                        {{-- @else --}}

                                        {{-- @endif --}}
                                        <td>
                                            <a href="/pengurusan_kursus/semak_jadual/{{ $j->id }}/edit"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button class="btn btn-sm risda-bg-dg text-white" type="button"
                                                data-bs-toggle="modal" data-bs-target="#delete_BK_{{ $j->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete_BK_{{ $j->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                            style="max-width: 500px">
                                            <div class="modal-content position-relative">
                                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="row">
                                                        <div class="col text-center m-3">
                                                            <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                            <br>
                                                            Anda pasti untuk menghapus {{ $j->kursus_nama }}?

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST"
                                                            action="/pengurusan_kursus/semak_jadual/{{ $j->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-primary" type="submit">Hapus
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function unitlatihan(el) {
            var id = el.value;


            $.ajax({
                type: 'get',
                url: '/pengurusan_kursus/filter-jadual-kursus/' + id,
                data: {
                    'id': id
                },
                success: function(jadual_kursus) {
                    $("#t_normal").html("");
                    let iteration = 1;
                    jadual_kursus.forEach(e => {
                        console.log(e);
                        $("#t_normal").append(`
                          <tr>
                                        <td>` + iteration + `.</td>
                                        <td>` + e.kursus_kod_nama_kursus + `</td>
                                        <td>` + e.kursus_nama + `</td>
                                        <td>` + e.tarikh_mula + `</td>
                                        <td>
                                            `+e.tempat.nama_Agensi+`
                                        </td>
                                        <td>`+e.bilangan+`</td>
                                        <td>
                                            `+e.status_pelaksanaan.Status_Pelaksanaan+`
                                        </td>
                                        <td>
                                            <a href="/pengurusan_kursus/semak_jadual/`+e.id+`/edit"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button class="btn btn-sm risda-bg-dg text-white" type="button"
                                                data-bs-toggle="modal" data-bs-target="#delete_BK_`+e.id+`">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                            </tr>
                                    <div class="modal fade" id="delete_BK_`+e.id+`" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                            style="max-width: 500px">
                                            <div class="modal-content position-relative">
                                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="row">
                                                        <div class="col text-center m-3">
                                                            <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                            <br>
                                                            Anda pasti untuk menghapus `+e.kursus_nama+`?

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST"
                                                            action="/pengurusan_kursus/semak_jadual/`+e.id+`">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-primary" type="submit">Hapus
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                        `);

                        iteration++;
                    });
                },
                error: function() {
                    console.log('success');
                },
            });
        }
    </script>
@endsection
