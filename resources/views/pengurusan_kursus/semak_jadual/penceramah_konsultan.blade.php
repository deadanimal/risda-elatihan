@extends('layouts.risda-base')
@section('content')
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
                <h5 class="h3">SENARAI PENCERAMAH / KONSULTAN</h5>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="h5">Tambah Penceramah</h5>
                <hr>
            </div>
            <div class="card-body">
                <form action="/pengurusan_kursus/penceramah_konsultan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pc_jadual_kursus" value="{{ $id }}">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-10 ">
        
                            <div class="row">
                                <div class="col-lg-3 p-0">
                                    <label class="col-form-label">NAMA PENCERAMAH / KONSULTAN</label>
                                </div>
                                <div class="col-lg-9 p-0">
                                    @if ($list_pk == null)
                                        <label class="col-form-label text-danger">KATEGORI "Penceramah" TIADA DIDALAM
                                            SENARAI
                                            AGENSI. SILA TAMBAH DI BAHAGIAN AGENSI (UTILITI->KOD KUMPULAN) UNTUK MENERUSKAN
                                            PENAMBAHAN
                                            JADUAL KURSUS</label>
                                    @else
                                        <select class="form-select  form-control" name="pc_id" id="">
                                            <option selected="" value="" hidden>Sila Pilih</option>
                                            @foreach ($list_pk as $lpk)
                                                <option value="{{ $lpk->id }}">{{ $lpk->nama_Agensi }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
        
                        </div>
                    </div>
        
                    <div class="row mt-4">
                        <div class="col text-end">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="fas fa-plus"></i> TAMBAH
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable table-striped">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">NO. KAD PENGENALAN</th>
                                    <th class="sort">NAMA PENCERAMAH / KONSULTAN</th>
                                    <th class="sort">NO. TELEFON</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($penceramahKonsultan as $key => $pc)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $pc->no_KP_Agensi }}</td>
                                        <td>{{ $pc->nama_Agensi }}</td>
                                        <td>{{ $pc->no_Telefon_Agensi }}</td>

                                        <td>
                                            <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_{{ $pc->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete_{{ $pc->id }}" tabindex="-1" role="dialog"
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
                                                        <form method="POST"
                                                            action="/pengurusan_kursus/penceramah_konsultan/{{ $pc->id }}">
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
            <div class="col-lg-6">
                <a href="/pengurusan_kursus/nota_rujukan/{{ $id }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-lg-6 text-end">
                <a href="/pengurusan_kursus/semak_jadual"
                    class="btn btn-primary">Seterusnya</a>
            </div>
        </div>
    </div>
@endsection
