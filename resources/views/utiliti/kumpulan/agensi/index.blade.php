@extends('layouts.risda-base')
@section('content')
    @php
    use App\Models\PegawaiAgensi;
    @endphp
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
            <h5 class="risda-dg">SENARAI AGENSI</h5>
        </div>
    </div>

    <hr>

    <form action="#">
        <div class="row mt-3 justify-content-center">

            <div class="col-auto">
                <label class="col-form-label">KATEGORI AGENSI:</label>
            </div>
            <div class="col-5">
                <select class="form-select" name="kategori_search" id="kategori_search">
                    <option selected="" hidden></option>
                    @foreach ($kategori as $n)
                        @if ($n->status_kategori_agensi == '1')
                            <option value="{{ $n->id }}">{{ $n->Kategori_Agensi }}</option>
                        @endif
                    @endforeach
                </select>
                {{-- <input class="form-control form-control-sm" type="text" name="search_negeri" /> --}}
            </div>

        </div>
    </form>

    <div class="row mt-5">
        <div class="col">
            <a class="btn btn-sm btn-primary" href="/utiliti/kumpulan/agensi/create">
                <i class="fas fa-plus"></i> TAMBAH
            </a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="datatable table table-striped" style="width:100%">
                        <thead class="bg-200">
                            <tr>
                                <th class="sort">BIL.</th>
                                <th class="sort">ROC/IC NO.</th>
                                <th class="sort">NAMA</th>
                                <th class="sort">ALAMAT</th>
                                <th class="sort">TELEFON</th>
                                <th class="sort">FAKS</th>
                                <th class="sort">ORANG DIHUBUNGI</th>
                                <th class="sort">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="t_agensi_kategori">

                        </tbody>
                        @foreach ($agensi as $key => $a)
                            <div class="modal fade" id="contact_agensi_{{ $a->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content position-relative">
                                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                            <button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-header">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="risda-dg">
                                                        PEGAWAI UNTUK DIHUBUNGI
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body p-0">
                                            <div class="card">
                                                <div class="card-body">
                                                    @php
                                                        $pegawai = PegawaiAgensi::where('id_agensi', $a->id)->get();
                                                    @endphp

                                                    <div class="row">
                                                        @foreach ($pegawai as $key => $p)
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <label class="col-form-label text-dark">PEGAWAI
                                                                        {{ $key + 1 }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6 text-end">
                                                                    <label class="col-form-label">NO. KAD
                                                                        PENGENALAN</label><br>
                                                                    <label class="col-form-label">NAMA</label><br>
                                                                    <label class="col-form-label">JAWATAN</label><br>
                                                                    <label class="col-form-label">E-MEL</label><br>
                                                                    <label class="col-form-label">TELEFON
                                                                        PEJABAT</label><br>
                                                                    <label class="col-form-label">SAMBUNGAN</label><br>
                                                                    <label class="col-form-label">TELEFON
                                                                        BIMBIT</label><br>
                                                                    <label class="col-form-label">FAKS</label><br>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label
                                                                        class="col-form-label risda-g">{{ $p->no_KP_Pegawai }}</label><br>
                                                                    <label
                                                                        class="col-form-label risda-g">{{ $p->nama_Pegawai }}</label><br>
                                                                    <label
                                                                        class="col-form-label risda-g">{{ $p->jawatan_Pegawai }}</label><br>
                                                                    <label
                                                                        class="col-form-label risda-g">{{ $p->emel_Pegawai }}</label><br>
                                                                    <label
                                                                        class="col-form-label risda-g">{{ $p->telefon_pejabat_Pegawai }}</label><br>
                                                                    <label
                                                                        class="col-form-label risda-g">{{ $p->sambungan_Pegawai }}</label><br>
                                                                    <label
                                                                        class="col-form-label risda-g">{{ $p->telefon_bimbit_Pegawai }}</label><br>
                                                                    <label
                                                                        class="col-form-label risda-g">{{ $p->no_faks_Pegawai }}</label><br>
                                                                </div>
                                                            </div>

                                                            <span
                                                                class="border mt-4 translate-middle-y w-100 start-0"></span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_agensi_{{ $a->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
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
                                                    Anda pasti untuk menghapus {{ $a->nama_agensi }}?

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form method="POST" action="/agensi/{{ $a->id }}">
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
                        <tbody class="bg-white" id="t_normal">
                            @foreach ($agensi as $key => $a)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $a->no_KP_Agensi }}</td>
                                    <td>{{ $a->nama_Agensi }}</td>
                                    <td>{{ $a->alamat_Agensi_baris1 }}</td>
                                    <td>{{ $a->no_Telefon_Agensi }}</td>
                                    <td>{{ $a->no_Faks_Agensi }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#contact_agensi_{{ $a->id }}">
                                            <i class="fas fa-address-book"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="/agensi/{{ $a->id }}/edit" class="btn btn-sm btn-primary"><i
                                                class="fas fa-pen"></i></a>

                                        <button class="btn btn-sm risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_agensi_{{ $a->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="contact_agensi_{{ $a->id }}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content position-relative">
                                            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                <button
                                                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-header">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="risda-dg">
                                                            PEGAWAI UNTUK DIHUBUNGI
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="card">
                                                    <div class="card-body">
                                                        @php
                                                            $pegawai = PegawaiAgensi::where('id_agensi', $a->id)->get();
                                                        @endphp

                                                        <div class="row">
                                                            @foreach ($pegawai as $key => $p)
                                                                <div class="row">
                                                                    <div class="col text-center">
                                                                        <label class="col-form-label text-dark">PEGAWAI
                                                                            {{ $key + 1 }}</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6 text-end">
                                                                        <label class="col-form-label">NO. KAD
                                                                            PENGENALAN</label><br>
                                                                        <label class="col-form-label">NAMA</label><br>
                                                                        <label class="col-form-label">JAWATAN</label><br>
                                                                        <label class="col-form-label">E-MEL</label><br>
                                                                        <label class="col-form-label">TELEFON
                                                                            PEJABAT</label><br>
                                                                        <label class="col-form-label">SAMBUNGAN</label><br>
                                                                        <label class="col-form-label">TELEFON
                                                                            BIMBIT</label><br>
                                                                        <label class="col-form-label">FAKS</label><br>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label
                                                                            class="col-form-label risda-g">{{ $p->no_KP_Pegawai }}</label><br>
                                                                        <label
                                                                            class="col-form-label risda-g">{{ $p->nama_Pegawai }}</label><br>
                                                                        <label
                                                                            class="col-form-label risda-g">{{ $p->jawatan_Pegawai }}</label><br>
                                                                        <label
                                                                            class="col-form-label risda-g">{{ $p->emel_Pegawai }}</label><br>
                                                                        <label
                                                                            class="col-form-label risda-g">{{ $p->telefon_pejabat_Pegawai }}</label><br>
                                                                        <label
                                                                            class="col-form-label risda-g">{{ $p->sambungan_Pegawai }}</label><br>
                                                                        <label
                                                                            class="col-form-label risda-g">{{ $p->telefon_bimbit_Pegawai }}</label><br>
                                                                        <label
                                                                            class="col-form-label risda-g">{{ $p->no_faks_Pegawai }}</label><br>
                                                                    </div>
                                                                </div>

                                                                <span
                                                                    class="border mt-4 translate-middle-y w-100 start-0"></span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="delete_agensi_{{ $a->id }}" tabindex="-1"
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
                                                        Anda pasti untuk menghapus {{ $a->nama_agensi }}?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="/agensi/{{ $a->id }}">
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

    <script>
        $(document).ready(function() {
            $('#t_agensi_kategori').hide();
            $('#t_normal').show();
        });

        $('#kategori_search').change(function() {
            $('#t_normal').hide();
            $('#t_agensi_kategori').show();

            $('#t_agensi_kategori').html("");
            var agen = @json($agensi->toArray());
            console.log(agen);

            let option_new = "";
            var i = 0;
            agen.forEach(element => {

                if (this.value == element.kategori_agensi) {
                    console.log(element.id)
                    $('#t_agensi_kategori').append(
                        `
                                <tr>
                                    <td>` + (i = i + 1) + `.</td>
                                    <td>${ element.no_KP_Agensi }</td>
                                    <td>${ element.nama_Agensi }</td>
                                    <td>${ element.alamat_Agensi_baris1 }</td>
                                    <td>${ element.no_Telefon_Agensi }</td>
                                    <td>${ element.no_Faks_Agensi }</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#contact_agensi_${ element.id }">
                                            <i class="fas fa-address-book"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="/agensi/${ element.id }/edit" class="btn btn-sm btn-primary"><i
                                                class="fas fa-pen"></i></a>

                                        <button class="btn btn-sm risda-bg-dg text-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete_agensi_${ element.id }">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>`);
                }
            });
        });
    </script>
@endsection
