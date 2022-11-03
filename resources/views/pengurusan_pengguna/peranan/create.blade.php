@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PENGGUNA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PERANAN DAN KEBENARAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    TAMBAH PERANAN
                </p>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8">
                        <form id="form1" action="/pengurusan_pengguna/peranan" method="POST" id="form_peranan">
                            <div class="row justify-content-center">
                                @csrf
                                <div class="mb-3">
                                    <label class="col-form-label">KOD KUMPULAN PENGGUNA</label>
                                    <input type="text" class="form-control" name="kod_kumpulan_pengguna">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">KUMPULAN PENGGUNA</label>
                                    <input type="text" class="form-control" id="name_input">
                                    <input type="hidden" name="name" id="real_name">
                                </div>

                                <div class="">
                                    <label class="col-form-label">UNIT LATIHAN</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" value="" />
                                        <label class="form-check-label">Am</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" value="ULS" />
                                        <label class="form-check-label">ULS</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" value="ULPK" />
                                        <label class="form-check-label">ULPK</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <label class="col-form-label">KEBENARAN</label>
                            @foreach ($kebenaran as $key => $k)
                                <div class="row">
                                    <div class="col-6">
                                        <p>{{ $k->name }}</p>
                                    </div>
                                    <div class="col-6 form-switch text-end">
                                        
                                        <input id='switch_{{ $key + 1 }}' class="form-check-input" type='checkbox'
                                            value='1' name='{{ $k->name }}'>
                                    </div>
                                </div>
                            @endforeach

                            <div class="mt-3 col text-end">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                <button class="btn btn-primary" type="submit">Simpan </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $('#name_input').keyup(function () {
            var name = $('#name_input').val();
            var unit = $('input[name="jenis"]:checked').val();
            $('#real_name').val(name+' '+unit);
        })

        $('input[name="jenis"]').click(function () {
            var name = $('#name_input').val();
            var unit = $('input[name="jenis"]:checked').val();
            $('#real_name').val(name+' '+unit);
        })
    </script>
@endsection
