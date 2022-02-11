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
            <h5 class="h3">NOTA RUJUKAN</h5>
        </div>
    </div>

    <form action="/pengurusan_kursus/nota_rujukan" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="nr_jadual_kursus" value="{{ $id }}">
        <div class="row justify-content-lg-center mt-3">
            <div class="col-lg-10 ">

                <div class="row">
                    <div class="col-lg-3 p-0">
                        <label class="col-form-label">NOTA RUJUKAN</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" name="nr_nota_rujukan" class="form-control">
                        {{-- <select class="form-select  form-control" name="nr_nota_rujukan" id="nr_nota_rujukan">
                            <option selected="" aria-placeholder="Sila Pilih" hidden></option>
                        </select> --}}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-3 p-0">
                        <label class="col-form-label">MUAT NAIK DOKUMEN</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="file" class="form-control" name="nr_dokumen">
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
                                <th class="sort">NOTA RUJUKAN</th>
                                <th class="sort">DOKUMEN</th>
                                <th class="sort">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="t_normal">
                            @foreach ($notaRujukan as $key => $nr)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $nr->nr_nota_rujukan }}</td>
                                    <td><a href="/{{ $nr->nr_dokumen }}">{{ $nr->nr_dokumen }}</a></td>
                                    <td>
                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_{{ $nr->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete_{{ $nr->id }}" tabindex="-1" role="dialog"
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
                                                    <form method="POST" action="/pengurusan_kursus/nota_rujukan/{{ $nr->id }}">
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

    <div class="row mt-3">
        <div class="col text-end">
            <a href="/pengurusan_kursus/penceramah_konsultan/{{$id}}" class="btn btn-primary">Seterusnya</a>
        </div>
    </div>
@endsection
