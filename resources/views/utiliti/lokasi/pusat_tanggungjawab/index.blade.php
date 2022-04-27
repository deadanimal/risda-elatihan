@extends('layouts.risda-base')
@section('content')
@php
    use App\Models\Negeri;
@endphp
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
                <h5 class="risda-dg">PUSAT TANGGUNGJAWAB</h5>
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
                                    <form action="/utiliti/kumpulan/pusat_tanggungjawab" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">KOD PUSAT TANGGUNGJAWAB</label>
                                            <input class="form-control" type="text" name="kod_PT" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">PUSAT TANGGUNGJAWAB</label>
                                            <input class="form-control" type="text" name="nama_PT" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">ALAMAT</label>
                                            <input class="form-control mb-2" type="text" name="alamat_PT_baris1" />
                                            <input class="form-control mb-2" type="text" name="alamat_PT_baris2" />
                                            <input class="form-control mb-2" type="text" name="alamat_PT_baris3" />
                                            <input class="form-control mb-2" type="text" name="alamat_PT_baris4" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">NEGERI</label>
                                            <select class="form-select form-control" name="kod_Negeri_PT">
                                                <option selected="" hidden>Sila Pilih</option>
                                                @foreach ($negeri as $n)
                                                    @if ($n->status_negeri == '1')
                                                        <option value="{{ $n->id }}">{{ $n->Negeri }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">NO. TELEFON</label>
                                            <input class="form-control" type="text" maxlength="11" name="no_Telefon_PT" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">NO. FAKS</label>
                                            <input class="form-control" type="text" maxlength="11" name="no_Faks_PT" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">KETERANGAN</label>
                                            <textarea class="form-control" rows="3" name="keterangan_PT"></textarea>
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
                    <div class="table-responsive scrollbar m-3">
                        <table id="table_negeri" class="table table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">KOD PUSAT TANGGUNGJAWAB</th>
                                    <th class="sort">PUSAT TANGGUNGJAWAB</th>
                                    <th class="sort">STATUS</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($pt_data as $key => $PT)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $PT->kod_PT }}</td>
                                        <td>{{ $PT->nama_PT }}</td>
                                        <td>
                                            @if ($PT->status_PT == '1')
                                                <span class="badge badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#edit_PT_{{ $PT->id }}"><i
                                                    class="fas fa-pen"></i></button>
                                            <button class="btn risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_PT_{{ $PT->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_PT_{{ $PT->id }}" tabindex="-1" role="dialog"
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
                                                        <form action="/utiliti/kumpulan/pusat_tanggungjawab/{{ $PT->id }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="col-form-label">KOD PUSAT TANGGUNGJAWAB</label>
                                                                <input class="form-control" type="number" name="kod_PT"
                                                                    value="{{ $PT->kod_PT }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">PUSAT TANGGUNGJAWAB</label>
                                                                <input class="form-control" type="text" name="nama_PT" value="{{$PT->nama_PT}}"/>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">ALAMAT</label>
                                                                <input class="form-control mb-2" type="text"
                                                                    name="alamat_PT_baris1" value="{{$PT->alamat_PT_baris1}}" />
                                                                <input class="form-control mb-2" type="text"
                                                                    name="alamat_PT_baris2" value="{{$PT->alamat_PT_baris2}}" />
                                                                <input class="form-control mb-2" type="text"
                                                                    name="alamat_PT_baris3" value="{{$PT->alamat_PT_baris3}}" />
                                                                <input class="form-control mb-2" type="text"
                                                                    name="alamat_PT_baris4" value="{{$PT->alamat_PT_baris4}}" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">NEGERI</label>
                                                                <select class="form-select" name="kod_Negeri_PT">
                                                                    <option selected="" hidden value="{{$PT->kod_Negeri_PT}}">
                                                                        @php
                                                                            $nn = Negeri::find($PT->kod_Negeri_PT);
                                                                        @endphp
                                                                        {{$nn->Negeri}}
                                                                    </option>
                                                                    @foreach ($negeri as $n2)
                                                                        @if ($n->status_negeri == '1')
                                                                            <option value="{{ $n2->id }}">
                                                                                {{ $n2->Negeri }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">NO. TELEFON</label>
                                                                <input class="form-control" type="text"
                                                                    name="no_Telefon_PT" value="{{$PT->no_Telefon_PT}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">NO. FAKS</label>
                                                                <input class="form-control" type="text" name="no_Faks_PT" value="{{$PT->no_Faks_PT}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">KETERANGAN</label>
                                                                <textarea class="form-control" rows="3" name="keterangan_PT">{{$PT->keterangan_PT}}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label">STATUS</label>
                                                                <div class="form-check form-switch">
                                                                    @if ($PT->status_PT == '1')
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
                                                                <button class="btn btn-primary" type="submit">Simpan </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete_PT_{{ $PT->id }}" tabindex="-1" role="dialog"
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
                                                            Anda pasti untuk menghapus {{ $PT->Negeri }}?
    
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST" action="/utiliti/kumpulan/pusat_tanggungjawab/{{ $PT->id }}">
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
    </script>
@endsection
