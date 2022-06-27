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
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGAJIAN LANJUTAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">TAMBAH STAFF YANG MENGIKUTI PENGAJIAN LANJUTAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    MAKLUMAT KEPUTUSAN PEPERIKSAAN
                </p>
            </div>
        </div>

        <form action="/us-uls/tambah-keputusan" method="POST">
            @csrf
            <div class="row justify-content-center my-4">
                <input type="hidden" name="id_pengajian_lanjutan" value="{{ $id_pengajian_lanjutan }}">
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">TAHUN</p>
                    </div>
                    <div class="col-2">
                        <input class="form-select form-control datepicker" placeholder="yyyy" name="tahun" type="text" autocomplete="off" />
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">SEMESTER</p>
                    </div>
                    <div class="col-7">
                        <select class="form-control" name="semester">
                            <option hidden selected="">Sila Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">GPA</p>
                    </div>
                    <div class="col-7">
                        <input type="text" name="gpa" id="gpa" class="form-control mb-3"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">CGPA</p>
                    </div>
                    <div class="col-7">
                        <input class="form-control mb-3" type="text" name="cgpa"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>
                <div class="col-9 d-inline-flex">
                    <div class="col-5">
                        <p class="pt-2 fw-bold">CATATAN</p>
                    </div>
                    <div class="col-7">
                        <textarea rows="3" name="catatan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-9 text-end mt-4">
                    <button class="btn btn-primary btn-sm" type="submit"><span class="fas fa-plus"></span>Tambah</button>
                </div>
            </div>
        </form>

        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="datatable table " style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Bil.</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">GPA</th>
                                    <th scope="col">CGPA</th>
                                    <th scope="col">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keputusan as $py)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $py->tahun }}</td>
                                        <td>{{ $py->semester }}</td>
                                        <td>{{ $py->gpa }}</td>
                                        <td>{{ $py->cgpa }}</td>
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete_{{ $py->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete_{{ $py->id }}" tabindex="-1" role="dialog"
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
                                                            Anda pasti untuk menghapuskan rekod ini?

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST"
                                                            action="/us-uls/pengajian-lanjutan/maklumat-keputusan-peperiksaan/{{ $py->id }}">
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

        <div class="row mt-3">
            <div class="col text-end">
                <a href="/us-uls/pengajian-lanjutan"
                    class="btn btn-primary">Tamat</a>
            </div>
        </div>
    </div>





    <script>
        $(document).ready(function() {
            $(".datepicker").datepicker({
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
                    // Swal.fire(
                    //     'Ditambah!',
                    //     'MAKLUMAT STAF YANG MENGIKUTI PENGAJIAN LANJUTAN TELAH DISIMPAN',
                    //     'success'
                    // )
                    $('#form-yuran').submit();
                }
            });
        }
    </script>
@endsection
