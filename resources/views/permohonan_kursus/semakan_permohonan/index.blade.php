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
                            <input type="text" name="" id="" class="form-control" value="Staf" disabled>
                            @elserole('Urus Setia ULPK')
                            <input type="text" name="" id="" class="form-control" value="Pekebun Kecil" disabled>
                        @else
                            <select name="ul" id="unit_latihan" class="form-control">
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
                        <select name="tempat" id="tempat" class="form-control">
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
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">

                                @role('Penyokong')
                                    @foreach ($pemohon as $a => $p)
                                        @if ($p->status_permohonan != 0)
                                            <tr>
                                                <td>{{ $a + 1 }}.</td>
                                                <td>{{ date('H:i, d/m/Y', strtotime($p->created_at)) }}</td>
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
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/permohonan_kursus/semakan_permohonan/{{ $p->id }}"
                                                        class="btn btn-primary btn-sm">Butiran</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    @elserole('Urus Setia ULS')
                                    @foreach ($staf as $b => $s)
                                        <tr>
                                            <td>{{ $b + 1 }}.</td>
                                            <td>{{ date('H:i, d/m/Y', strtotime($s->created_at)) }}</td>
                                            <td>{{ $s->peserta->no_KP }}</td>
                                            <td>{{ $s->peserta->name }}</td>
                                            <td>{{ $s->pusat_tanggungjawab }}</td>
                                            <td>{{ $s->gred }}</td>
                                            <td>
                                                @if ($s->jadual == null)
                                                    <span class="text-danger">Jadual telah dihapuskan</span>
                                                @else
                                                    {{ $s->jadual->kursus_kod_nama_kursus }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($s->jadual == null)
                                                    <span class="text-danger">Jadual telah dihapuskan</span>
                                                @else
                                                    {{ $s->jadual->kursus_nama }}
                                                @endif

                                            </td>
                                            <td>
                                                @if ($s->status_permohonan == 0)
                                                    Belum Disemak
                                                @elseif($s->status_permohonan == 1)
                                                    Belum Disemak (Sokongan)
                                                @elseif($s->status_permohonan == 2)
                                                    Disokong
                                                @elseif($s->status_permohonan == 3)
                                                    Tidak Disokong
                                                @elseif($s->status_permohonan == 4)
                                                    Lulus
                                                @elseif($s->status_permohonan == 5)
                                                    Tidak Lulus
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/permohonan_kursus/semakan_permohonan/{{ $s->id }}"
                                                    class="btn btn-primary btn-sm">Butiran</a>
                                                {{-- <form action="/permohonan_kursus/semakan_permohonan/{{$p->id}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">buang</button>
                                                    </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    @elserole('Urus Setia ULPK')
                                    @foreach ($pekebun_kecil as $c => $pk)
                                        <tr>
                                            <td>{{ $c + 1 }}.</td>
                                            <td>{{ date('H:i, d/m/Y', strtotime($pk->created_at)) }}</td>
                                            <td>{{ $pk->peserta->no_KP }}</td>
                                            <td>{{ $pk->peserta->name }}</td>
                                            <td>{{ $pk->pusat_tanggungjawab }}</td>
                                            <td>
                                                @if ($pk->jadual == null)
                                                    <span class="text-danger">Jadual telah dihapuskan</span>
                                                @else
                                                    {{ $pk->jadual->kursus_kod_nama_kursus }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pk->jadual == null)
                                                    <span class="text-danger">Jadual telah dihapuskan</span>
                                                @else
                                                    {{ $pk->jadual->kursus_nama }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pk->status_permohonan == 0)
                                                    Belum Disemak
                                                @elseif($pk->status_permohonan == 1)
                                                    Belum Disemak (Sokongan)
                                                @elseif($pk->status_permohonan == 2)
                                                    Disokong
                                                @elseif($pk->status_permohonan == 3)
                                                    Tidak Disokong
                                                @elseif($pk->status_permohonan == 4)
                                                    Lulus
                                                @elseif($pk->status_permohonan == 5)
                                                    Tidak Lulus
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/permohonan_kursus/semakan_permohonan/{{ $pk->id }}"
                                                    class="btn btn-primary btn-sm">Butiran</a>
                                                {{-- <form action="/permohonan_kursus/semakan_permohonan/{{$p->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">buang</button>
                                            </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($pemohon as $key => $p)
                                        <tr>
                                            <td>{{ $key + 1 }}.</td>
                                            <td>{{ date('H:i, d/m/Y', strtotime($p->created_at)) }}</td>
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
                                                    Lulus
                                                @elseif($p->status_permohonan == 5)
                                                    Tidak Lulus
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/permohonan_kursus/semakan_permohonan/{{ $p->id }}"
                                                    class="btn btn-primary btn-sm">Butiran</a>
                                                {{-- <form action="/permohonan_kursus/semakan_permohonan/{{$p->id}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">buang</button>
                                        </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endrole
                                @foreach ($pemohon as $key => $p)
                                    <div class="modal fade" id="delete-{{ $p->id }}" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                            style="max-width: 500px">
                                            <div class="modal-content position-relative">
                                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
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
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST"
                                                            action="/pengurusan_peserta/semakan_pemohon/{{ $p->id }}">
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
                            </tbody>

                            <tbody class="bg-white" id="table_sort_ul"></tbody>
                            <tbody class="bg-white" id="table_sort_tempat"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_sort_ul').hide();
            $('#table_sort_tajuk').hide();
        })

        $('#unit_latihan').change(function() {
            $('#table_sort_ul').html('');
            $('#table_sort_ul').show();
            $('#t_normal').hide();
            $('#table_sort_tajuk').hide();

            let unit = this.value;
            let list_pemohon = @json($pemohon->toArray());
            var i = 0;
            let test = '';

            console.log('test');
            list_pemohon.forEach(a => {
                let b = a.jadual_kursus.kursus_unit_latihan;
                console.log(a);
                if (b == unit) {
                    if (a.status_permohonan == 0) {
                        test = 'Belum Disemak'
                    } else if (a.status_permohonan == 1) {
                        test = 'Belum Disemak (Sokongan)'
                    } else if (a.status_permohonan == 2) {
                        test = 'Disokong'
                    } else if (a.status_permohonan == 3) {
                        test = 'Tidak Disokong'
                    } else if (a.status_permohonan == 4) {
                        test = 'Lulus'
                    } else if (a.status_permohonan == 5) {
                        test = 'Tidak Lulus'
                    }

                    if (a.pusat_tanggungjawab == undefined) {
                        a.pusat_tanggungjawab = '-';
                    }
                    $('#table_sort_ul').append(
                        `<tr>
                            <td>` + (i = i + 1) + `.</td>
                            <td>` + a.tarikh + `</td>
                            <td>` + a.peserta.no_KP + `</td>
                            <td>` + a.peserta.name + `</td>
                            <td>` + a.gred + `</td>
                            <td>` + a.pusat_tanggungjawab + `</td>
                            <td>` + a.jadual_kursus.kursus_kod_nama_kursus + `</td>
                            <td>` + a.jadual_kursus.kursus_nama + `</td>
                            <td>` + test + `</td>
                            <td>
                                <a href="/permohonan_kursus/semakan_permohonan/` + a.id + `"
                                    class="btn btn-primary btn-sm">Butiran</a>
                            </td>
                        </tr>
                        `
                    );
                }
            });
        });

        $('#tempat').change(function() {
            $('#t_normal').hide();
            $('#table_sort_ul').hide();
            $('#table_sort_tempat').show();
            $('#table_sort_tempat').html('');

            let unit = this.value;
            let list_pemohon = @json($pemohon->toArray());
            var i = 0;
            let test = '';

            console.log(unit);
            list_pemohon.forEach(a => {
                let b = a.jadual_kursus.kursus_tempat;
                console.log(a);
                if (b == unit) {
                    if (a.status_permohonan == 0) {
                        test = 'Belum Disemak'
                    } else if (a.status_permohonan == 1) {
                        test = 'Belum Disemak (Sokongan)'
                    } else if (a.status_permohonan == 2) {
                        test = 'Disokong'
                    } else if (a.status_permohonan == 3) {
                        test = 'Tidak Disokong'
                    } else if (a.status_permohonan == 4) {
                        test = 'Lulus'
                    } else if (a.status_permohonan == 5) {
                        test = 'Tidak Lulus'
                    }

                    if (a.pusat_tanggungjawab == undefined) {
                        a.pusat_tanggungjawab = '-';
                    }
                    $('#table_sort_tempat').append(
                        `<tr>
                            <td>` + (i = i + 1) + `.</td>
                            <td>` + a.tarikh + `</td>
                            <td>` + a.peserta.no_KP + `</td>
                            <td>` + a.peserta.name + `</td>
                            <td>` + a.pusat_tanggungjawab + `</td>
                            <td>` + a.jadual_kursus.kursus_kod_nama_kursus + `</td>
                            <td>` + a.jadual_kursus.kursus_nama + `</td>
                            <td>` + test + `</td>
                            <td>
                                <a href="/permohonan_kursus/semakan_permohonan/` + a.id + `"
                                    class="btn btn-primary btn-sm">Butiran</a>
                            </td>
                        </tr>
                        `
                    );
                }
            });
        })
    </script>
@endsection
