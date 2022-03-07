@extends('layouts.risda-base')
@section('content')
@php
    use Illuminate\Support\Facades\Http;
@endphp
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>PENGURUSAN PESERTA</strong></h1>
            <h5 class="risda-dg">SEMAKAN PERMOHONAN</h5>
        </div>
    </div>

    <hr class="risda-g">

    <div class="row justify-content-lg-center mt-3">
        <div class="col-lg-8 ">

            <div class="row mt-3">
                <div class="col-lg-3 p-0">
                    <label class="col-form-label">UNIT LATIHAN:</label>
                </div>
                <div class="col-lg-9 p-0">
                    <select class="form-select  form-control" name="search_UL" id="search_UL">
                        <option selected="" aria-placeholder="Sila Pilih" hidden></option>
                        <option value="Staf">Staf</option>
                        <option value="Pekebun Kecil">Pekebun Kecil</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-3 p-0">
                    <label class="col-form-label">TEMPAT KURSUS:</label>
                </div>
                <div class="col-lg-9 p-0">
                    <input type="text" class="form-control">
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table datatable table-striped" style="width:100%">
                        <thead class="bg-200">
                            <tr>
                                <th class="sort">BIL.</th>
                                <th class="sort">TARIKH DAN MASA DITERIMA</th>
                                <th class="sort">NO. KAD PENGENALAN</th>
                                <th class="sort">NAMA PEMOHON</th>
                                <th class="sort">PUSAT TANGGUNGJAWAB</th>
                                <th class="sort">GRED</th>
                                <th class="sort">KOD KURSUS</th>
                                <th class="sort">NAMA KURSUS</th>
                                <th class="sort">STATUS</th>
                                <th class="sort">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="t_normal">
                            @foreach ($pemohon as $key => $p)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ date('H:i, d/m/Y', strtotime($p->created_at)) }}</td>
                                    <td>{{ $p->no_pekerja }}</td>
                                    <td>{{ $p->no_pekerja}}</td>                            
                                    <td> </td>
                                    <td> </td>
                                    <td>{{ $p->jadualKursus->kursus_kod_nama_kursus }}</td>
                                    <td>{{ $p->jadualKursus->kursus_nama }}</td>
                                    <td>
                                        @if ($p->status_permohonan == 0)
                                            Belum Disemak
                                        @elseif($p->status_permohonan == 1)
                                            Belum Disemak (Sokongan)
                                        @elseif($p->status_permohonan == 2)
                                            Disokong
                                        @elseif($p->status_permohonan == 3)
                                            Tidak Disokong
                                        @elseif($p->status_permohonan == 4)
                                            Lulus
                                        @elseif($p->status_permohonan == 5)
                                            Tidak Lulus
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/permohonan_kursus/semakan_permohonan/{{$p->id}}" class="btn btn-primary btn-sm">Butiran</a>
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delete-{{$p->id}}">Delete</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete-{{ $p->id }}" tabindex="-1"
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
                                                        Anda pasti untuk menghapuskan maklumat ini?

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="/pengurusan_peserta/semakan_pemohon/{{ $p->id }}">
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
        $('.datatable').dataTable({
            "scrollX": true
        });
    </script>
@endsection
