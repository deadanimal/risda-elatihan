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
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class=" pt-2 fw-bold">KOD NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" value="2021" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KURSUS</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH KEHADIRAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">SESI</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA PESERTA</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NO. KAD PENGENALAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">STATUS STAF</p>
                </div>
                <div class="col-7">
                    <select id="kehadiranQR-select-status" class="form-control mb-3">
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
                    <input type="text" class="form-control mb-3">
                </div>
            </div>
            <div class="col-9 text-end mt-4 ">
                <button type="button" class="btn btn-sm btn-primary" onclick="confirmation()"><span
                        class="far fa-paper-plane"></span>
                    Hantar</button>
            </div>

        </div>


    </div>

    <script>
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

        function confirmation() {
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
                    )
                }
            });

        }
    </script>

@endsection
