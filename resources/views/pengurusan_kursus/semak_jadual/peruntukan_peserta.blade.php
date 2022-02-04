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
            <h5 class="h3">PERUNTUKAN PESERTA MENGIKUT PUSAT TANGGUNGJAWAB</h5>
        </div>
    </div>

    <form action="/pengurusan_kursus/peruntukan_peserta" method="post">
        @csrf
        <input type="hidden" name="pp_jadual_kursus" value="{{$jadualKursus->id}}">
        <div class="row justify-content-lg-center mt-3">
            <div class="col-lg-10 ">

                <div class="row">
                    <div class="col-lg-3 p-0">
                        <label class="col-form-label">NEGERI</label>
                    </div>
                    <div class="col-lg-9">
                        <select class="form-select  form-control" name="pp_negeri" id="pp_negeri">
                            <option selected="" aria-placeholder="Sila Pilih" hidden></option>
                            @foreach ($negeri as $n)
                                @if ($n->status_negeri == '1')
                                    <option value="{{ $n->id }}">{{ $n->Negeri }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-3 p-0">
                        <label class="col-form-label">PUSAT TANGGUNGJAWAB</label>
                    </div>
                    <div class="col-lg-9">
                        <select class="form-select form-control" name="pp_pusat_tanggungjawab" id="pp_pusat_tanggungjawab">
                            <option selected="" aria-placeholder="Sila Pilih" hidden></option>
                            @foreach ($pusat_tanggungjawab as $pt)
                                <option value="{{ $pt->id }}">{{ $pt->nama_PT }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-3 p-0">
                        <label class="col-form-label">PERUNTUKAN CALON</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="pp_peruntukan_calon">
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fas fa-plus"></i> TAMBAH
                </button>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table datatable table-striped">
                        <thead class="bg-200">
                            <tr>
                                <th class="sort">BIL.</th>
                                <th class="sort">NEGERI</th>
                                <th class="sort">PUSAT TANGGUNGJAWAB (PT)</th>
                                <th class="sort">PERUNTUKAN CALON</th>
                                <th class="sort">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="t_normal">
                            @foreach ($peruntukan_peserta as $key => $pp)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $pp->pp_negeri }}</td>
                                <td>{{ $pp->pp_pusat_tanggungjawab }}</td>
                                <td>{{ $pp->pp_peruntukan_calon }}</td>
                                <td>
                                    <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_{{ $pp->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete_{{ $pp->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
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
                                                    Anda pasti untuk menghapuskan data?

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form method="POST" action="/pengurusan_kursus/peruntukan_peserta/{{ $pp->id }}">
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

    <div class="row mt-4 justify-content-end">
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <label class="col-form-label">JUMLAH CALON</label>
                </div>
                <div class="col-lg-6">
                    <input type="text" disabled value="{{$total_calon}}" class="form-control text-center">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col text-end">
            <a href="/pengurusan_kursus/aturcara/{{$jadualKursus->id}}" class="btn btn-primary">Seterusnya</a>
        </div>
    </div>
@endsection
