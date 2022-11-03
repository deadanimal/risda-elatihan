@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-3">
            <div class="col-12 mb-3">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERMOHONAN KURSUS</p>
                <p class="h5" style="color: rgb(43,93,53)">STATUS PERMOHONAN</p>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row">
            <div class="col">
                <h5 class="h3">NOTA RUJUKAN</h5>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable table-striped">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">NOTA RUJUKAN</th>
                                    <th class="sort">DOKUMEN</th>
                                    <th class="sort">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($nota_rujukan as $key => $nr)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $nr->nr_nota_rujukan }}</td>
                                        <td><a href="/{{ $nr->nr_dokumen }}">{{ $nr->nr_dokumen }}</a></td>
                                        <td>
                                            <a href="/{{ $nr->nr_dokumen }}" download class="btn btn-sm btn-primary">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6 ">
                <a href="/pengurusan_kursus/aturcara/{{ $id }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
