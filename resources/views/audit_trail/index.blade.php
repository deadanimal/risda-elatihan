@extends('layouts.risda-base')
@section('content')
<div class="container">
    
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>AUDIT TRAIL</strong></h1>
            <h5 class="risda-dg">JEJAK AUDIT</h5>
        </div>
    </div>

    <hr class="risda-g">

    
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table datatable table-striped" style="width:100%">
                        <thead class="bg-200">
                            <tr>
                                <th class="sort">BIL.</th>
                                <th class="sort">TARIKH</th>
                                <th class="sort">MASA</th>
                                <th class="sort">PERKARA</th>
                                <th class="sort">PENGGUNA</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($auditTrail as $key => $at)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{date('d-m-Y', strtotime($at->created_at))}}</td>
                                    <td>{{date('H:i', strtotime($at->created_at))}}</td>
                                    <td>{{$at->butiran}}</td>
                                    <td>{{$at->pengguna->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
