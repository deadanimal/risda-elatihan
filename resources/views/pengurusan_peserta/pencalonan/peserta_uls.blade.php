@extends('layouts.risda-base')

@section('content')
@php
    use App\Models\PencalonanPeserta;
@endphp
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PENGURUSAN PESERTA</p>
                <p class="h5" style="color: rgb(43,93,53); ">PENCALONAN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h5 fw-bold mt-3">
                    SENARAI CALON PESERTA KURSUS
                </p>
            </div>
        </div>

        <form action="/pengurusan_peserta/pencalonan" method="post">
            @csrf
            <input type="hidden" name="jadual" value="{{ $id }}">
            <div class="card mt-3">
                <div class="table-responsive scrollbar m-4">
                    <table class="table datatable table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">Bil.</th>
                                <th scope="col">NO KAD PENGENALAN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">PUSAT TANGGUNGJAWAB</th>
                                <th scope="col">GRED</th>
                                <th scope="col">JUMLAH HARI BERKURSUS SETAHUN</th>
                                <th scope="col">CATATAN</th>
                                <th scope="col">PILIH</th>
                                <th scope="col">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_staf as $key => $p)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $p->no_KP }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->NamaPT }}</td>
                                    <td>{{ $p->Gred }}</td>
                                    <td>{{ $p['hari_berkursus'] }}</td>
                                    <td>{{ $p['catatan'] }}</td>
                                    <td>
                                        <div class="form-check justify-content-center d-flex">
                                            <input class="form-check-input" type="checkbox" name="peserta[]"
                                                value="{{ $p->id }}"/>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/pengurusan_peserta/pencalonan/{{ $id }}/{{ $p->id }}"
                                            class="btn btn-primary">
                                            <i class="far fa-clipboard"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col text-end">
                    <button type="submit" class="btn btn-primary mt-3">Hantar</button>
                </div>
            </div>
        </form>


    </div>
@endsection
