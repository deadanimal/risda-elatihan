@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PERBELANJAAN</strong></h1>
                <h5 class="risda-dg">KURSUS</h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SEMAKAN PERBELANJAAN KURSUS
                </p>
            </div>
        </div>

        <div class="row mt-3 ">
            <div class="col">
                <div class="card ">
                    <div class="card-body mx-lg-5">
                        <form action="/perbelanjaan/perbelanjaan-kursus/{{$rafis_risda->id}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row p-3">
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tahun</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Thn_Kew'] }}" name="Thn_Kew">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod PT</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Kod_PT'] }}" name="Kod_PT">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod PA</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Kod_PA'] }}" name="Kod_PA">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod Objek</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Kod_Obj'] }}" name="Kod_Obj">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">No. Pesanan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['No_Pesanan'] }}" name="No_Pesanan">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tarikh Pesanan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ date('d-m-Y', strtotime($rafis['Tkh_Pesanan'])) }}" name="Tkh_Pesanan">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kod Pembekal</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Kod_Pembekal'] }}" name="Kod_Pembekal">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Tujuan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Tujuan'] }}" name="Tujuan">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Rujukan</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Rujukan'] }}" name="Rujukan">
                                </div>
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Jumlah LO (RM)</p>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control mb-2" readonly value="{{ $rafis['Jum_LO'] }}" name="Jum_LO">
                                </div>
    
                                <div class="col-lg-3 pt-lg-2">
                                    <p class="h5">Kursus</p>
                                </div>
                                <div class="col-lg-9">
                                    <select name="jadualkursus_id" class="form-select form-control">
                                        <option value="{{$rafis_risda->jadualkursus_id}}" selected hidden>{{$rafis_risda->jadual_kursus->kursus_nama}}</option>
                                        @foreach ($jadual as $j)
                                            <option value="{{$j->id}}">{{$j->kursus_nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table id="table_negeri" class="table datatable table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">PERIHAL</th>
                                    <th class="sort">QUANTITI PESAN</th>
                                    <th class="sort">HARGA SEUNIT</th>
                                    <th class="sort">JUMLAH</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($rafis['Child'] as $key => $r)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $r['Perihal'] }}</td>
                                        <td>{{ $r['Qty_Pesan'] }}</td>
                                        <td>RM {{ $r['Hrg_Seunit'] }}</td>
                                        <td>RM {{ $r['Jumlah'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.datatable').dataTable({
            "columns": [
                null,
                null,
                null,
                null,
                {
                    "width": "15%"
                }
            ]
        });
    </script>
@endsection
