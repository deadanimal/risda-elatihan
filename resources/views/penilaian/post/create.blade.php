@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">PENILAIAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENILAIAN PRE TEST DAN POST TEST</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    TAMBAH SOALAN POST TEST
                </p>
            </div>
        </div>

        <form action="{{ route('post-test.store') }}" method="post">
            @csrf
            <input type="hidden" name="jadual_kursus_id" value="{{ $jk_id }}">
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col-3 mt-2">
                    <p class="h5 risda-dg">KATEGORI JAWAPAN</p>
                </div>
                <div class="col-8">
                    <select class="form-select mb-3" onchange="kategori(this)" name="jenis">
                        <option selected disabled hidden>SILA PILIH</option>
                        <option value="A">FILL IN THE BLANK</option>
                        <option value="B">MULTIPLE CHOICE</option>
                        <option value="C">SINGLE CHOICE</option>
                        <option value="D">TRUE OR FALSE</option>
                    </select>
                </div>
                <div class="col-1"></div>
                <div class="col-3 mt-2">
                    <p class="h5 risda-dg">SOALAN</p>
                </div>
                <div class="col-8">
                    <textarea class="form-control mb-3" rows="4" name="soalan" required></textarea>
                </div>
                <div class="col-1"></div>
                <div class="col-3 mt-2">
                    <p class="h5 risda-dg">STATUS SOALAN</p>
                </div>
                <div class="col-8">
                    <select type="text" class="form-select mb-3" name="status_soalan" required>
                        <option selected disabled hidden>SILA PILIH</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tak Aktif">Tak Aktif</option>
                    </select>
                </div>
                <div class="col-1"></div>
                <div class="col-3 mt-2">
                    <p class="h5 risda-dg">PILIHAN JAWAPAN</p>
                </div>
                <div class="col-8" id="jawapan">



                </div>

            </div>

            <div class="row mt-3">
                <div class="text-end">
                    <button class="btn btn-primary" type="submit" id="btnSubmit"><i class="far fa-save"></i>
                        Simpan</button>
                </div>
            </div>

        </form>
    </div>

    <script>
        // $("#btnSubmit").click(function(e) {
        //     e.preventDefault();
        //     var form = $(this).parents('form');
        //     Swal.fire({
        //         icon: 'success',
        //         title: 'SOALAN PRE TEST / POST TEST KURSUS TELAH BERJAYA DISIMPAN',
        //         showConfirmButton: false,
        //         color: '#0F5E31',
        //         timer: 1500
        //     }).then(() => {
        //         form.submit();
        //     })
        // });

        function hapus(e) {
            e.closest(".col-12").remove();
        }

        function kategori(el) {

            $("#jawapan").html('');
            let val = el.value;

            if (val == "A") {
                $("#jawapan").append(`
                <div class="col-12">
                    <textarea class="form-control mb-3" rows="4" name="jawapanA"></textarea>
                </div>
                `);
            }
            if (val == "B") {
                $("#jawapan").append(`
                  <div id="mc">
                    <div class="col-12 mb-3">
                        <input type="hidden" id="multiple-iteration" value="1">
                        <div class="row">
                            <div class="col-1 text-center">
                                <input type="checkbox" name="check-0" value="true" class="form-check-input">
                            </div>
                            <div class="col-11">
                                <input type="text" name="jawapanMultiple[]" class="form-control">
                            </div>
                        </div>
                        <div class="text-end mt-1">
                            <button type="button" onclick="hapus(this)" class="btn btn-primary btn-sm"><i
                                    class="fas fa-trash-alt"></i>
                                Hapus</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-end mt-2">
                    <button class="btn btn-primary btn-sm" type="button" onclick="tambahMultiple()"><span
                            class="fas fa-plus"></span>
                        Tambah</button>
                </div>
                `);
            }
            if (val == "C") {
                $("#jawapan").append(`
                  <div id="sc">
                    <div class="col-12 mb-3">
                        <input type="hidden" id="multiple-iteration" value="1">
                        <div class="row">
                            <div class="col-1 text-center">
                                <input type="radio" name="check-betul" value="true" class="form-check-input">
                            </div>
                            <div class="col-11">
                                <input type="text" name="jawapanMultiple[0]" class="form-control">
                            </div>
                        </div>
                        <div class="text-end mt-1">
                            <button type="button" onclick="hapus(this)" class="btn btn-primary btn-sm"><i
                                    class="fas fa-trash-alt"></i>
                                Hapus</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-end mt-2">
                    <button class="btn btn-primary btn-sm" type="button" onclick="tambahMultiple()"><span
                            class="fas fa-plus"></span>
                        Tambah</button>
                </div>
                `);
            }
            if (val == "D") {
                $("#jawapan").append(`
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawapanD" id="flexRadioDefault1" value="Betul">
                        <label class="form-check-label" for="flexRadioDefault1">
                            BETUL
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawapanD" id="flexRadioDefault2" value="Salah">
                        <label class="form-check-label" for="flexRadioDefault2">
                            SALAH
                        </label>
                    </div>
                `);
            }
        }


        function tambahMultiple() {

            let iteration = $("#multiple-iteration").val();


            $("#mc").append(`
             <div class="col-12 mb-3">
                        <input type="hidden" id="multiple-iteration" value="` + iteration + `">
                        <div class="row">
                            <div class="col-1 text-center">
                                <input type="checkbox" name="check-` + iteration + `" value="true" class="form-check-input">
                            </div>
                            <div class="col-11">
                                <input type="text" name="jawapanMultiple[` + iteration + `]" class="form-control">
                            </div>
                        </div>
                        <div class="text-end mt-1">
                            <button type="button" onclick="hapus(this)" class="btn btn-primary btn-sm"><i
                                    class="fas fa-trash-alt"></i>
                                Hapus</button>
                        </div>
                    </div>
            `);

            $("#sc").append(`
             <div class="col-12 mb-3">
                        <input type="hidden" id="multiple-iteration" value="` + iteration + `">
                        <div class="row">
                            <div class="col-1 text-center">
                                <input type="radio" name="check-betul" value="true" class="form-check-input">
                            </div>
                            <div class="col-11">
                                <input type="text" name="jawapanMultiple[` + iteration + `]" class="form-control">
                            </div>
                        </div>
                        <div class="text-end mt-1">
                            <button type="button" onclick="hapus(this)" class="btn btn-primary btn-sm"><i
                                    class="fas fa-trash-alt"></i>
                                Hapus</button>
                        </div>
                    </div>
            `);

            iteration++;
            $("#multiple-iteration").val(iteration);
        }
    </script>
@endsection
