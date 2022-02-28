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
                SENARAI PERANAN
            </p>
        </div>
    </div>

    <div class="card mt-5">
        <div class="table-responsive scrollbar">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Bil.</th>
                        <th scope="col">Peranan</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peranan as $key=>$p)
                        <tr>
                            <td>{{ $key+1 }}.</td>
                            <td>{{ $p->name }}</td>
                            <td>
                                <a href="/pengurusan_pengguna/peranan/{{$p->id}}" class="btn btn-primary">Kebenaran</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection