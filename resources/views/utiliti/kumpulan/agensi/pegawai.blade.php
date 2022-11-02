@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
            <h5 class="risda-dg">SENARAI AGENSI - <span class="risda-g">TAMBAH AGENSI</span></h5>
            <span class="border position-absolute mt-4 translate-middle-y w-100 start-0"></span>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5>PEGAWAI UNTUK DIHUBUNGI</h5>
                </div>
            </div>
            <form action="/pegawai_agensi" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="hidden" value="{{ $id_agensi }}" name="id_agensi">
                    </div>
                </div>
                <div class="row ms-5 mt-4">
                    <div class="col">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">NO. KAD PENGENALAN</label>
                                    <input class="form-control" type="text" maxlength="12" name="no_KP_Pegawai" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">NAMA</label>
                                    <input class="form-control" type="text" name="nama_Pegawai" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">JAWATAN</label>
                                    <input class="form-control" type="text" name="jawatan_Pegawai" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">EMEL</label>
                                    <input class="form-control" type="text" name="emel_Pegawai" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">TELEFON PEJABAT</label>
                                    <input class="form-control" type="text" maxlength="11"
                                        name="telefon_pejabat_Pegawai" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">SAMBUNGAN</label>
                                    <input class="form-control" type="text" name="sambungan_Pegawai" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">TELEFON BIMBIT</label>
                                    <input class="form-control" type="text" maxlength="11"
                                        name="telefon_bimbit_Pegawai" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">FAKS</label>
                                    <input class="form-control" type="text" name="no_faks_Pegawai" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-end">
                                <button type="submit" class="btn risda-bg-dg text-white">
                                    <i class="fas fa-plus"></i> TAMBAH
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="table_daerah" class="table table-striped" style="width:100%">
                        <thead class="bg-200">
                            <tr>
                                <th class="sort">BIL.</th>
                                <th class="sort">NAMA</th>
                                <th class="sort">JAWATAN</th>
                                <th class="sort">NO. TELEFON</th>
                                <th class="sort">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($pegawai as $key => $p)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $p->nama_Pegawai }}</td>
                                    <td>{{ $p->jawatan_Pegawai }}</td>
                                    <td>{{ $p->telefon_bimbit_Pegawai }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary"><i class="fas fa-pen"></i></a>

                                        <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_agensi_{{ $p->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete_agensi_{{ $p->id }}" tabindex="-1"
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
                                                        Anda pasti untuk menghapus {{ $p->nama_Pegawai }}?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="/pegawai_agensi/{{ $p->id }}">
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

    <div class="row">
        <div class="col text-end">
            <a href="/agensi" class="btn text-white risda-bg-dg mt-3"><i class="far fa-plus-square"></i> SIMPAN</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_daerah').DataTable();
        });
    </script>
@endsection
