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
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERMOHONAN KURSUS</p>
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
            <form action="/uls/kehadiran/update/{{ $aturcara->id }}" method="post">
                @csrf
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class=" pt-2 fw-bold">KOD NAMA KURSUS</p>
                    </div>
                    <div class="col-7">
                        <input type="text" name="jadual_kursus" readonly value="{{ $jadual->kursus_kod_nama_kursus }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">NAMA KURSUS</p>
                    </div>
                    <div class="col-7">
                        <input type="text" readonly value="{{ $jadual->kursus_nama }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                    </div>
                    <div class="col-7">
                        <input type="text" readonly value="{{ date('d/m/Y', strtotime($jadual->tarikh_mula)) }} - {{ date('d/m/Y', strtotime($jadual->tarikh_tamat)) }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TARIKH KEHADIRAN</p>
                    </div>
                    <div class="col-7">
                        <input type="text" name="tarikh_kehadiran" readonly value="{{ $tarikh[$aturcara->ac_hari-1] }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">SESI</p>
                    </div>
                    <div class="col-7">
                        <input type="text" readonly name="sesi" value="{{ $aturcara->ac_sesi }}" class="form-control mb-3">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">NAMA PESERTA</p>
                    </div>
                    <div class="col-7">
                        {{-- <input type="text" name="nama_peserta" class="form-control mb-3" value=""> --}}
                        <select name="nama_peserta" class="form-control" id="nama_peserta">
                            <option value="" selected hidden>Sila Pilih</option>
                            @foreach ($permohonan as $pemohon)
                                <option value="{{$pemohon->peserta->id}}">{{$pemohon->peserta->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">NO. KAD PENGENALAN</p>
                    </div>
                    <div class="col-7">
                        <input type="text" readonly name="no_kp_peserta" class="form-control mb-3" id="ic_numb">
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
                        <p class="pt-2 fw-bold">NAMA PENGGANTI</p>
                    </div>
                    <div class="col-7 kehadiranQR-input-namacalon">
                        <select class="form-control mb-3" name="nama_pengganti">
                            <option selected value="" hidden>Sila Pilih</option>
                            @foreach ($calonAsal as $ca)
                                <option value="{{ $ca->id }}">{{ $ca->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="hidden" name="jadual_kursus_id" value="{{$jadual->id}}">
                <div class="col-9 text-end mt-4 ">
                    <button type="submit" id="btn-submit-kehadiralUlsQr" class="btn btn-sm btn-primary"><span
                            class="far fa-paper-plane"></span>
                        Hantar</button>
                </div>
            </form>
        </div>

        @if (isset($aturcara->tarikh_imbasQR))
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
                    form.submit();
                    // Swal.fire(
                    //     'DISIMPAN!',
                    //     'KEHADIRAN ANDA TELAH BERJAYA DIKEMASKINI',
                    //     'success'
                    // );
                    // setTimeout(() => {
                    //     form.submit();
                    // }, 2000);
                }
            });
        });

        $('#nama_peserta').change(function() {
            var id_user = $('#nama_peserta').val();
            var list_pemohon = @json($permohonan->toArray());

            list_pemohon.forEach(lp => {
                if (lp.peserta.id == id_user) {
                    $('#ic_numb').val(lp.peserta.no_KP)
                }
            });
        });
    </script>

@endsection
