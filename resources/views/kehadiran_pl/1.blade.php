@extends('layouts.risda-base')
@section('content')
    <style>
        p {
            color: rgb(15, 94, 49);
        }

        table>thead>tr {
            border-color: rgb(0, 150, 64);
            vertical-align: middle;
            text-align: center;
        }


        table>tbody>tr {
            vertical-align: middle;
            text-align: center;
            border-color: rgb(0, 150, 64);
        }

    </style>
    <div class="container pb-5">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">KEHADIRAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">REKOD KEHADIRAN </p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    KEHADIRAN PESERTA KE PUSAT LATIHAN
                </p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">PUSAT LATIHAN</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control mb-4 tahun" autocomplete="OFF" value="{{$agensi->nama_Agensi}}">
                </div>
            </div>
            <div class="col-8 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">TARIKH KEHADIRAN</p>
                </div>
                <div class="col-6">
                    <input type="date" class="form-control mb-3">
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col">
                <a href="/kehadiran_ke_pl/create/{{$agensi->id}}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Kehadiran
                </a>
            </div>
        </div>


        <div class="card my-5">
            <div class="table-responsive scrollbar p-5">
                <form action="/kehadiran-pl/pengesahan" method="post">
                    @csrf
                    {{-- @method('PUT') --}}
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">BIL</th>
                            <th scope="col">NO KAD PENGENALAN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">NAMA KURSUS </th>
                            <th scope="col">TARIKH KEHADIRAN</th>
                            <th scope="col">PENGESAHAN</th>

                        </tr>
                    </thead>
                     <tbody>

                    @foreach($kehadiran_pl as $k)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->peserta->no_KP}}</td>
                            <td>{{$k->peserta->name}}</td>
                            <td>{{$k->kursus->kursus_nama}}</td>
                            <td>{{date('d-m-Y', strtotime($k->created_at))}} <br> {{date('H:i:s', strtotime($k->created_at))}}</td>

                                @if($k->pengesahan_kehadiran_pl===null)
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input pukal" type="checkbox" name="pengesahan[]"
                                            value="{{ $k->id }}" />
                                    </div>
                                </td>
                                @else
                                    <td class="risda-g fw-bold" style="text-transform:capitalize">
                                        {{$k->pengesahan_kehadiran_pl}}
                                     </td>

                                @endif

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="row m-3" id="pukal">
                <div class="col text-end">
                    <button type="submit" class="btn btn-primary">Pengesahan</button>
                </div>
            </div>
        </form>
        </div>

    </div>


        <script>
        $(document).ready(function() {
            $('#pukal').hide();
        })

        $(".pukal").change(function() {
            if (this.checked) {
                $('#pukal').show();
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });
    </script>
@endsection
