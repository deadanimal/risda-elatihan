@extends('layouts.risda-base')
@section('content')
    <style>
        p {
            color: rgb(15, 94, 49);
        }

        table>thead>tr {
            border-color: rgb(0, 150, 64);
            vertical-align: middle;
            text-align: center;
        }


        table>tbody>tr {
            vertical-align: middle;
            text-align: center;
            border-color: white;
        }

        .swal2-title {
            color: #0F5E31;
        }

    </style>
    <div class="container pb-5">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53); letter-spacing: 5px;">PENGAJIAN LANJUTAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">TAMBAH STAFF YANG MENGIKUTI PENGAJIAN LANJUTAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    MAKLUMAT PERBELANJAAN / YURAN
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-4">
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TAHUN</p>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control tahun">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">SEMESTER</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">PERBELANJAAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">JUMLAH (RM)</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NO. RUJUKAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-9 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">CATATAN</p>
                </div>
                <div class="col-7">
                    <textarea rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-9 text-end mt-4">
                <button class="btn btn-primary btn-sm" onclick="confirmations()"><span
                        class="fas fa-plus"></span>Tambah</button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive scrollbar">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">Bil.</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Perbelanjaan</th>
                            <th scope="col">Jumlah <br> (RM)</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a class="btn btn-sm btn-primary"><span class="fas fa-trash-alt"></span></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a class="btn btn-sm btn-primary"><span class="fas fa-trash-alt"></span></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });


        function confirmations() {
            Swal.fire({
                customClass: {
                    title: 'swal2-title',
                    cancelButton: 'swal2-cancel'
                },
                // title: 'Are you sure?',
                title: "ADAKAH ANDA PASTI UNTUK MENAMBAH STAFF!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0F5E31',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Ditambah!',
                        'MAKLUMAT STAF YANG MENGIKUTI PENGAJIAN LANJUTAN TELAH DISIMPAN',
                        'success'
                    )
                }
            });
        }
    </script>

@endsection
