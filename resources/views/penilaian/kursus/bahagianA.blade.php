@extends('layouts.risda-base')
@section('content')
    <style>
        h5 {
            color: #0F5E31;
        }

    </style>
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    PENILAIAN KURSUS
                </p>
            </div>
        </div>


        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <form method="POST" action="/penilaian/penilaian-kursus/{{ $jadual_kursus->id }}/save">

                    {{-- @method('POST') --}}
                    @csrf

                    <div class="row my-3">
                        <div class="col-4 mt-2">
                            <h5>KOD NAMA KURSUS</h5>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" value="{{ $jadual_kursus->kursus_kod_nama_kursus }}"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 mt-2">
                            <h5>NAMA KURSUS</h5>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" value="{{ $jadual_kursus->kursus_nama }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 mt-2">
                            <h5>TARIKH KURSUS</h5>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" value="{{date('d-m-Y', strtotime($jadual_kursus->tarikh_mula))}} - {{date('d-m-Y', strtotime($jadual_kursus->tarikh_tamat))}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 mt-2">
                            <h5>TEMPAT KURSUS</h5>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" value="{{ $agensi->nama_Agensi}}"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 mt-2">
                            <h5>MASA MULA</h5>
                        </div>
                        @if ($jadual_kursus->masa_mula_penilaian_kursus != null)
                            <div class="col-4">
                                <input type="time" class="form-control" name="masa_mula_penilaian_kursus"
                                    value="{{ $jadual_kursus->masa_mula_penilaian_kursus }}">
                            </div>
                        @else
                            <div class="col-4">
                                <input type="time" class="form-control" name="masa_mula_penilaian_kursus">
                            </div>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 mt-2">
                            <h5>MASA TAMAT</h5>
                        </div>
                        @if ($jadual_kursus->masa_tamat_penilaian_kursus != null)
                            <div class="col-4">
                                <input type="time" class="form-control" name="masa_tamat_penilaian_kursus"
                                    value="{{ $jadual_kursus->masa_tamat_penilaian_kursus }}">
                            </div>
                        @else
                            <div class="col-4">
                                <input type="time" class="form-control" name="masa_tamat_penilaian_kursus">
                            </div>
                        @endif
                    </div>
                    <div class="row mt-3">
                        <div class="text-end">
                            <button class="btn btn-primary" type="submit"><i class="far fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row mt-4">
            <div class="col-12">
                <p class="h4 fw-bold">
                    SENARAI SOALAN BAHAGIAN A
                </p>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="table-responsive scrollbar ">
                    <table class="table datatable text-center">
                        <thead>
                            <tr>
                                <th class="fw-bold text-dark" scope="col">BIL.</th>
                                <th class="fw-bold text-dark" scope="col">KATEGORI SOALAN</th>
                                <th class="fw-bold text-dark" scope="col">SOALAN</th>
                                <th class="fw-bold text-dark" scope="col">STATUS</th>
                                <th class="fw-bold text-dark" scope="col">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penilaianKursus as $penilaianKursus)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $penilaianKursus->kategori_soalan}}
                                    </td>


                                    <td>
                                        {{ $penilaianKursus->soalan }}
                                    </td>


                                    <td>
                                        {{ $penilaianKursus->status_soalan }}
                                    </td>
                                    <td>
                                        <a href="/penilaian/penilaian-kursus-us/{{$penilaianKursus->id}}/edit"
                                            class="btn btn-sm btn-primary">Kemaskini</a>
                                        <form action="/penilaian/penilaian-kursus-us/{{$penilaianKursus->id}}" method="post"
                                            class="d-inline-flex">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" id="submit-del"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-end">
                <a href="/penilaian/penilaian-kursus/bahagianA/create/{{$jadual_kursus->id}}" class="btn btn-primary mt-3"><span
                        class="fas fa-plus"></span> Tambah Soalan</a>
            </div>
        </div>


    </div>

    <script>
        $("#submit-del").click(function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
                title: 'ADAKAH ANDA PASTI?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Dibuang!',
                        'Data tersebut telah berjaya dibuang',
                        'success'
                    );
                    setTimeout(() => {
                        form.submit();
                    }, 2000);
                }
            })
        });
    </script>
@endsection
