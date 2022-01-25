@extends('layouts.risda-base')
@section('content')
    <style>
        p {
            color: rgb(15, 94, 49);
        }

    </style>

    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53); letter-spacing: 5px;">PERMOHONAN KURSUS</p>
                <p class="h5" style="color: rgb(43,93,53); ">STATUS PERMOHONAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    KEMASKINI KEHADIRAN
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <form action="/uls/kehadiran/update/{{ $kehadiran->id }}" method="post">
                @csrf
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class=" pt-2 fw-bold">KOD NAMA KURSUS</p>
                    </div>
                    <div class="col-7">
                        <input type="text" value="{{ $kod_kursus->kod_Kursus }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">NAMA KURSUS</p>
                    </div>
                    <div class="col-7">
                        <input type="text" value="{{ $kod_kursus->tajuk_Kursus }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                    </div>
                    <div class="col-7">
                        <input type="text" value="{{ $kod_kursus->tarikh_daftar_Kursus }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TARIKH KEHADIRAN</p>
                    </div>
                    <div class="col-7">
                        <input type="text" value="{{ $kehadiran->tarikh }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">SESI</p>
                    </div>
                    <div class="col-7">
                        <input type="text" value="{{ $kehadiran->sesi }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">NAMA PESERTA</p>
                    </div>
                    <div class="col-7">
                        <input type="text" name="nama_peserta" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">NO. KAD PENGENALAN</p>
                    </div>
                    <div class="col-7">
                        <input type="text" name="no_kp_peserta" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">STATUS STAF</p>
                    </div>
                    <div class="col-7">
                        <select id="kehadiranQR-select-status" name="status" class="form-control mb-3">
                            <option selected disabled hidden>Sila Pilih</option>
                            <option value="PENGGANTI">PENGGANTI</option>
                            <option value="CALON ASAL">CALON ASAL</option>
                        </select>
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5 kehadiranQR-input-namacalon">
                        <p class="pt-2 fw-bold">NAMA CALON ASAL</p>
                    </div>
                    <div class="col-7 kehadiranQR-input-namacalon">
                        <select class="form-control mb-3" name="nama_calon_asal">
                            <option disabled hidden>Pilih Nama Calon Asal</option>
                            @foreach ($calonAsal as $ca)
                                <option value="{{ $ca->id }}">{{ $ca->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-9 text-end mt-4 ">
                    <button type="submit" id="btn-submit-kehadiralUlsQr" class="btn btn-sm btn-primary"><span
                            class="far fa-paper-plane"></span>
                        Hantar</button>
                </div>
            </form>
        </div>

        @if (isset($kehadiran->tarikh_imbasQR))


            <!-- Modal -->
            <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <span class="fas fa-exclamation-triangle risda-g"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>
                                            ANDA TELAH MENGEMASKINI KEHADIRAN.
                                            ANDA TIDAK DIBENARKAN MENGEMASKINI
                                            KEHADIRAN LEBIH DARI SATU KALI
                                        </p>
                                        <a href="/dashboard" class="btn btn-primary btn-sm">OK</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        $(window).on('load', function() {
            $('#staticBackdrop').modal('show');
        });
        $(document).ready(function() {
            $(".kehadiranQR-input-namacalon").hide();

            $("#kehadiranQR-select-status").change(function() {
                if (this.value == "PENGGANTI") {
                    $(".kehadiranQR-input-namacalon").show();
                } else {
                    $(".kehadiranQR-input-namacalon").hide();

                }
            });


            $('.table').DataTable();


        });

        $("#btn-submit-kehadiralUlsQr").click(function(e) {
            e.preventDefault();
            var form = $(this).parents('form');

            Swal.fire({
                title: 'ADAKAH ANDA PASTI?',
                text: "ANDA HANYA DIBENARKAN UNTUK MENGEMASKINI KEHADIRAN SATU KALI SAHAJA",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'DISIMPAN!',
                        'KEHADIRAN ANDA TELAH BERJAYA DIKEMASKINI',
                        'success'
                    );
                    setTimeout(() => {
                        form.submit();
                    }, 2000);
                }
            });
        });
    </script>

@endsection
