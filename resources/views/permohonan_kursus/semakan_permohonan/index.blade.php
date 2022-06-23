@extends('layouts.risda-base')
@section('content')
    @php
    use Illuminate\Support\Facades\Http;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PENGURUSAN PESERTA</strong></h1>
                <h5 class="risda-dg">SEMAKAN PERMOHONAN</h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row justify-content-lg-center mt-3">
            <div class="col-lg-8 ">

                <div class="row mt-3">
                    <div class="col-lg-3 mb-2">
                        <label class="col-form-label">UNIT LATIHAN:</label>
                    </div>
                    <div class="col-lg-9 mb-2">
                        @role('Urus Setia ULS')
                            <input type="text" name="" id="search_UL" class="form-control" value="Staf" disabled>
                        @elserole('Urus Setia ULPK')
                            <input type="text" name="" id="search_UL" class="form-control" value="Pekebun Kecil" disabled >
                        @else
                            <select name="ul" id="search_UL" class="form-control" onchange="filter()">
                                <option value="" selected hidden>Sila Pilih</option>
                                <option value="Staf">Staf</option>
                                <option value="Pekebun Kecil">Pekebun Kecil</option>
                            </select>
                        @endrole
                    </div>
                    <div class="col-lg-3 mb-2">
                        <label class="col-form-label">TEMPAT KURSUS:</label>
                    </div>
                    <div class="col-lg-9 mb-2">
                        <select name="tempat" id="search_tempat" class="form-control" onchange="filter()">
                            <option value="" selected hidden>Sila Pilih</option>
                            @foreach ($tempat as $t)
                                <option value="{{ $t->id }}">{{ $t->nama_Agensi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <form action="/pengurusan_peserta/semakan_pemohon/pengesahan_pukal" method="post">
                        @csrf

                        <div class="table-responsive scrollbar m-3">
                            <table class="table datatable table-striped" style="width:100%">
                                <thead class="bg-200">
                                    <tr>
                                        <th class="sort">BIL.</th>
                                        <th class="sort">TARIKH DAN MASA DITERIMA</th>
                                        <th class="sort">NO. KAD PENGENALAN</th>
                                        <th class="sort">NAMA PEMOHON</th>
                                        <th class="sort">PUSAT TANGGUNGJAWAB</th>
                                        @role('Urus Setia ULS')
                                            <th class="sort">GRED</th>
                                        @endrole
                                        <th class="sort">KOD KURSUS</th>
                                        <th class="sort">NAMA KURSUS</th>
                                        <th class="sort">STATUS</th>
                                        <th class="sort">TINDAKAN</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white" id="t_normal">

                                    @role('Penyokong')
                                        @foreach ($pemohon as $a => $p)
                                            @if ($p->status_permohonan != 0)
                                                <tr>
                                                    <td>{{ $a + 1 }}.</td>
                                                    <td>{{ date('H:i, d-m-Y', strtotime($p->created_at)) }}</td>
                                                    <td>{{ $p->peserta->no_KP }}</td>
                                                    <td>{{ $p->peserta->name }}</td>
                                                    <td>{{ $p->pusat_tanggungjawab }}</td>
                                                    <td>
                                                        @if ($p->jadual == null)
                                                            <span class="text-danger">Jadual telah dihapuskan</span>
                                                        @else
                                                            {{ $p->jadual->kursus_kod_nama_kursus }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($p->jadual == null)
                                                            <span class="text-danger">Jadual telah dihapuskan</span>
                                                        @else
                                                            {{ $p->jadual->kursus_nama }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($p->status_permohonan == 0)
                                                            Belum Disemak
                                                        @elseif($p->status_permohonan == 1)
                                                            Belum Disemak (Sokongan)
                                                        @elseif($p->status_permohonan == 2)
                                                            Disokong
                                                        @elseif($p->status_permohonan == 3)
                                                            Tidak Disokong
                                                        @elseif($p->status_permohonan == 4)
                                                            Telah Disemak (Penyokong)
                                                        @elseif($p->status_permohonan == 5)
                                                            Telah Disemak (Penyokong)
                                                        @elseif($p->status_permohonan == 6)
                                                            Dicalonkan
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/permohonan_kursus/semakan_permohonan/{{ $p->id }}"
                                                            class="btn btn-primary btn-sm">Butiran</a>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="pemohon"
                                                                value="{{ $p->id }}" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach ($pemohon as $key => $p)
                                            <tr>
                                                <td>{{ $key + 1 }}.</td>
                                                <td>{{ date('H:i, d-m-Y', strtotime($p->created_at)) }}</td>
                                                <td>{{ $p->peserta['no_KP'] }}</td>
                                                <td>{{ $p->peserta['name'] }}</td>
                                                <td>{{ $p->pusat_tanggungjawab }}</td>
                                                <td>
                                                    @if ($p->jadual == null)
                                                        <span class="text-danger">Jadual telah dihapuskan</span>
                                                    @else
                                                        {{ $p->jadual->kursus_kod_nama_kursus }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($p->jadual == null)
                                                        <span class="text-danger">Jadual telah dihapuskan</span>
                                                    @else
                                                        {{ $p->jadual->kursus_nama }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($p->status_permohonan == 0)
                                                        Belum Disemak
                                                    @elseif($p->status_permohonan == 1)
                                                        Belum Disemak (Sokongan)
                                                    @elseif($p->status_permohonan == 2)
                                                        Disokong
                                                    @elseif($p->status_permohonan == 3)
                                                        Tidak Disokong
                                                    @elseif($p->status_permohonan == 4)
                                                        Diluluskan
                                                    @elseif($p->status_permohonan == 5)
                                                        Tidak Lulus
                                                    @elseif($p->status_permohonan == 6)
                                                        Dicalonkan
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/permohonan_kursus/semakan_permohonan/{{ $p->id }}"
                                                        class="btn btn-primary btn-sm">Butiran</a>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input pukal" type="checkbox" name="pemohon[]"
                                                            value="{{ $p->id }}" />
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endrole

                                </tbody>
                            </table>
                        </div>

                        <div class="row m-3" id="pukal">
                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary">Lulus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($pemohon as $key => $p)
        <div class="modal fade" id="delete-{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                <div class="modal-content position-relative">
                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="row">
                            <div class="col text-center m-3">
                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                <br>
                                Anda pasti untuk menghapuskan maklumat ini?

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <form method="POST" action="/pengurusan_peserta/semakan_pemohon/{{ $p->id }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-primary" type="submit">Hapus
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <script>
        $(document).ready(function() {
            $('#pukal').hide();
        })

        $(".pukal").change(function() {
            if (this.checked) {
                $('#pukal').show();
            }
        });

        // function filtering
        function filter() {
            var tempat_kursus = $('#search_tempat').val();
            var unit_latihan = $('#search_UL').val();

            $.ajax({
                type: 'get',
                url: '/pengurusan_peserta/permohonan/filter',
                data: {
                    'tempat_kursus': tempat_kursus,
                    'unit_latihan': unit_latihan
                },
                success: function(result) {
                    console.log(result);
                    $('.datatable').dataTable().fnClearTable();
                    $('.datatable').dataTable().fnDestroy();
                    $("#t_normal").html("");
                    let iteration = 1;
                    
                    result.forEach(e => {
                        var status = ''
                        if (e.status_permohonan == 0) {
                            status = 'Belum Disemak';
                        }
                        else if (e.status_permohonan == 1) {
                            status = 'Belum Disemak (Sokongan)';
                        }
                        else if (e.status_permohonan == 2) {
                            status = 'Disokong';
                        }
                        else if (e.status_permohonan == 3) {
                            status = 'Tidak Disokong';
                        }
                        else if (e.status_permohonan == 4) {
                            status = 'Lulus';
                        }
                        else if (e.status_permohonan == 5) {
                            status = 'Tidak Lulus';
                        }
                        else if (e.status_permohonan == 6) {
                            status = 'Dicalonkan';
                        }

                        var myDate = new Date(e.created_at);

                        let jam = myDate.getHours();
                        if (jam < 10) jam = '0' + jam;

                        let minit = myDate.getMinutes();
                        if (minit < 10) minit = '0' + minit;

                        let hari = myDate.getDate();
                        if (hari < 10) hari = '0' + hari;

                        let bulan = myDate.getMonth()+1;
                        if (bulan < 10) bulan = '0' + bulan;

                        var timeString = jam + ':' + minit + ':' + ' ' + hari + '-' + bulan + '-' + myDate.getFullYear();

                        $("#t_normal").append(`
                        <tr>
                            <td>`+iteration+`.</td>
                            <td>`+timeString+`</td>
                            <td>`+e.peserta.no_KP+`</td>
                            <td>`+e.peserta.name+`</td>
                            <td>`+e.data_staf.NamaPT+`</td>
                            <td>`+(e.jadual == null ? '<span class="text-danger">Jadual telah dihapuskan</span>' : e.jadual.kursus_kod_nama_kursus)+`</td>
                            <td>`+(e.jadual == null ? '<span class="text-danger">Jadual telah dihapuskan</span>' : e.jadual.kursus_nama)+`</td>
                            <td>`+status+`</td>
                            <td>
                                <a href="/permohonan_kursus/semakan_permohonan/`+e.id+`" class="btn btn-primary btn-sm">Butiran
                                </a>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input pukal" type="checkbox" name="pemohon[]"
                                        value="`+e.id+`" />
                                </div>
                            </td>
                        </tr>
                        `);

                        iteration++;
                    });
                    $('.datatable').dataTable();
                },
                error: function() {
                    console.log('error');
                },
            });
        }


    </script>
@endsection
