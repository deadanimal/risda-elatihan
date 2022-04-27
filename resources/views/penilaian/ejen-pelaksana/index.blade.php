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
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN EJEN PELAKSANA</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                   SENARAI KURSUS
                </p>
            </div>
        </div>


        <div class="row justify-content-center mt-5">
            <div class="col-8">
                    <div class="row mb-3">
                        <div class="col-4 mt-2">
                            <h5>NAMA KURSUS</h5>
                        </div>
                        <div class="col-8">
                            {{-- <select  class="form-select" name="nama_kursus" id="kursus" required>
                                    <option hidden>SILA PILIH</option>
                                    @foreach ($kursus as $kursus)
                                        <option value={{$kursus->id}}>{{$kursus->kursus_nama}}</option>
                                    @endforeach
                            {{-- <input type="text" class="form-control" value="{{ $jadual_kursus->kursus_nama }}" readonly>
                            </select> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            {{-- <a href="/penilaian/penilaian-kursus/bahagianA/create/{{$kursus->id}}" class="btn btn-primary mt-3">PAPAR EJEN KURSUS</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row mt-4">
            <div class="col-12">
                <p class="h4 fw-bold">
                    SENARAI EJEN PELAKSANA
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
                                 <th class="fw-bold text-dark" scope="col">KOD NAMA KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">TARIKH MULA KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">TARIKH TAMAT KURSUS</th>
                                <th class="fw-bold text-dark" scope="col">NAMA EJEN PELAKSANA</th>
                                <th class="fw-bold text-dark" scope="col">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($ejen as $e)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{$e->jadual_kursus->kursus_nama}}
                                    </td>


                                    <td>
                                        {{date('d/m/Y', strtotime($e->jadual_kursus->tarikh_mula ))}}
                                    </td>

                                    <td>
                                        {{date('d/m/Y', strtotime($e->jadual_kursus->tarikh_tamat))}}
                                    </td>

                                    <td>
                                        {{ $e->agensi->nama_Agensi }}
                                    </td>

                                    <td>
                                        <a class="btn btn-primary btn-sm mb-2"
                                        href="/penilaian/penilaian-ejen-pelaksana/{{$e->jadual_kursus->id}}">
                                            <small> Mula Penilaian</small>
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="/penilaian/ejen-pelaksana/{{$e->id}}">
                                            <small> Papar Penilaian</small>
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
