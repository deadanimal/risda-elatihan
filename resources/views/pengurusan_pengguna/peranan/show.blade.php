@extends('layouts.risda-base')
@section('content')
@php
    use App\Models\KebenaranPeranan;
@endphp
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
                    SENARAI KEBENARAN UNTUK {{ $peranan->name }}
                </p>
            </div>
        </div>

        <form action="/pengurusan_pengguna/peranan/{{ $peranan->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="card mt-5">
                <div class="table-responsive scrollbar">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">Bil.</th>
                                <th scope="col">Kebenaran</th>
                                <th scope="col">Pengaktifan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kebenaran as $key => $k)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $k->name }}</td>
                                    <td>
                                        <input id='switch{{ $k->id }}' class="form-check-input" type='checkbox'
                                            value='1' name='{{ $k->name }}'
                                            @php
                                            $try = KebenaranPeranan::where('role_id', $peranan->id)
                                                ->where('permission_id', $k->id)
                                                ->first();
                                            echo $try == true ? ' checked' : '';
                                            @endphp
                                            >
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col text-end m-3">
                    <a href="/pengurusan_pengguna/peranan" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm">Kemaskini</button>
                </div>
            </div>
        </form>

    </div>
@endsection
