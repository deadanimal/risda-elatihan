@extends('layouts.risda-base')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>PERMOHONAN KURSUS</strong></h1>
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
