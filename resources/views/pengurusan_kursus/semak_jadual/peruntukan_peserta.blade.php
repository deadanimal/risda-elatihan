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

    <form action="#" method="post">
        @csrf
        <input type="hidden" name="pp_jadual_kursus" value="{{$jadualKursus->id}}">
        <div class="row justify-content-lg-center mt-3">
            <div class="col-lg-10 ">

                <div class="row">
                    <div class="col-lg-2 p-0">
                        <label class="col-form-label">NEGERI</label>
                    </div>
                    <div class="col-lg-10">
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
                    <div class="col-lg-2 p-0">
                        <label class="col-form-label">PUSAT TANGGUNGJAWAB</label>
                    </div>
                    <div class="col-lg-10">
                        <select class="form-select form-control" name="pp_pusat_tanggungjawab" id="pp_pusat_tanggungjawab">
                            <option selected="" aria-placeholder="Sila Pilih" hidden></option>
                            @foreach ($pusat_tanggungjawab as $pt)
                                <option value="{{ $pt->id }}">{{ $pt->nama_PT }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-2 p-0">
                        <label class="col-form-label">PERUNTUKAN CALON</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="pp_peruntukan_calon">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="fas fa-plus"></i> TAMBAH
                </button>
            </div>
        </div>
    </form>

    <div class="row">
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
                                    <a href="/pengurusan_kursus/semak_jadual/edit">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <label class="col-form-label">JUMLAH CALON</label>
                </div>
                <div class="col-lg-6">
                    <input type="text" disabled id="total_calon">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col text-end">
            <a href="#" class="btn btn-primary">Seterusnya</a>
        </div>
    </div>
@endsection
