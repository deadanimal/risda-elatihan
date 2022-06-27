@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">BIDANG KURSUS</h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row mt-5">
            <div class="col">
                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah-negeri">
                    <i class="fas fa-plus"></i> TAMBAH
                </button>
                <div class="modal fade" id="tambah-negeri" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content position-relative">
                            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                    <h4 class="mb-1" id="modalExampleDemoLabel">TAMBAH </h4>
                                </div>
                                <div class="p-4 pb-0">
                                    <form action="/utiliti/kursus/bidang_kursus" method="POST" id="create_bidang">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">UNIT LATIHAN</label>
                                            <select class="form-select" name="UL_Bidang_Kursus" id="unitlatihan">
                                                <option selected="" hidden>Sila Pilih</option>
                                                <option value="Staf">Staf</option>
                                                <option value="Pekebun Kecil">Pekebun Kecil</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD BIDANG KURSUS</label>
                                            <input class="form-control" type="text" name="kod_Bidang_Kursus"
                                                id="kod_bid" readonly/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">BIDANG KURSUS</label>
                                            <input class="form-control" type="text" name="nama_Bidang_Kursus" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">STATUS</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="status" />
                                                <label class="form-check-label">Aktif</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Simpan </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table id="table_negeri" class="table table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">UNIT LATIHAN</th>
                                    <th class="sort">KOD BIDANG KURSUS</th>
                                    <th class="sort">BIDANG KURSUS</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($bidangKursus as $key => $bk)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $bk->UL_Bidang_Kursus }}</td>
                                        <td>{{ $bk->kod_Bidang_Kursus }}</td>
                                        <td>{{ $bk->nama_Bidang_Kursus }}</td>
                                        <td>
                                            @if ($bk->status_Bidang_Kursus == '1')
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_BK_{{ $bk->id }}"><i
                                                    class="fas fa-pen"></i></button>
                                            <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_BK_{{ $bk->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_BK_{{ $bk->id }}" tabindex="-1" role="dialog"
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
                                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                        <h4 class="mb-1">KEMASKINI
                                                        </h4>
                                                    </div>
                                                    <div class="p-4 pb-0">
                                                        <form action="/utiliti/kursus/bidang_kursus/{{ $bk->id }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="col-form-label">UNIT LATIHAN</label>
                                                                <select class="form-select" name="UL_Bidang_Kursus">
                                                                    <option selected="" hidden
                                                                        value="{{ $bk->UL_Bidang_Kursus }}">
                                                                        {{ $bk->UL_Bidang_Kursus }}</option>
                                                                    <option value="Staf">Staf</option>
                                                                    <option value="Pekebun Kecil">Pekebun Kecil</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">KOD BIDANG KURSUS</label>
                                                                <input class="form-control" type="number"
                                                                    name="kod_Bidang_Kursus"
                                                                    value="{{ $bk->kod_Bidang_Kursus }}" readonly />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">BIDANG KURSUS</label>
                                                                <input class="form-control" type="text"
                                                                    name="nama_Bidang_Kursus"
                                                                    value="{{ $bk->nama_Bidang_Kursus }}" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">STATUS</label>
                                                                <div class="form-check form-switch">
                                                                    @if ($bk->status_Bidang_Kursus == '1')
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="status" checked="" />
                                                                        <label class="form-check-label">Aktif</label>
                                                                    @else
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="status" />
                                                                        <label class="form-check-label">Aktif</label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button class="btn btn-primary" type="submit">Simpan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete_BK_{{ $bk->id }}" tabindex="-1"
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
                                                            Anda pasti untuk menghapus {{ $bk->nama_Bidang_Kursus }}?

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST"
                                                            action="/utiliti/kursus/bidang_kursus/{{ $bk->id }}">
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
        $(document).ready(function() {
            $('#table_negeri').DataTable();
        });

        $('#unitlatihan').change(function() {
            var ul = this.value;
            $('#kod_bid').html('');
            if (ul == 'Staf') {
                var kod_nom = <?php echo $bil_staf; ?>;
                if (kod_nom < 10) {
                    kod_nom = '0' + kod_nom;
                }
                $('#kod_bid').val(kod_nom);
            } else {
                var kod_nom = <?php echo $bil_pk; ?>;
                if (kod_nom < 10) {
                    kod_nom = '0' + kod_nom;
                }
                $('#kod_bid').val(kod_nom);
            }
        });
    </script>
@endsection
