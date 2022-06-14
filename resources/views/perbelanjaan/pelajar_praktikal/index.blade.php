@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PERBELANJAAN</strong></h1>
                <h5 class="risda-dg">PELAJAR PRAKTIKAL</h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    SEMAKAN PERBELANJAAN PELAJAR PRAKTIKAL
                </p>
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
                                    <th class="sort" style="width: 40px">AMAUN BAYAR</th>
                                    <th class="sort">NO DBIL</th>
                                    <th class="sort">KOD PEMBEKAL</th>
                                    <th class="sort">PERIHAL</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($rafis as $key => $r)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>RM {{ $r['Amaun'] }}</td>
                                        <td>{{ $r['No_DBil'] }}</td>
                                        <td>{{ $r['Kod_Pembekal'] }}</td>
                                        <td>{{ $r['Perihal'] }}</td>
                                        <td>
                                            <a href="/perbelanjaan/pelajar-praktikal/butiran/{{$r['Thn_Kew']}}/{{$r['Kod_PA']}}/{{$r['Kod_Objek']}}/{{$r['No_DBil']}}" class="btn btn-primary">Butiran</a>
                                        </td>
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
                {
                    "width": "15%"
                },
                null,
                null,
                null,
                null
            ]
        });
    </script>
@endsection
