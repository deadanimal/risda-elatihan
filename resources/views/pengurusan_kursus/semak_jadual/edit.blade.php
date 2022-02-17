@extends('layouts.risda-base')
@section('content')
    @php
    use App\Models\BidangKursus;
    use App\Models\KategoriKursus;
    use App\Models\KodKursus;
    use App\Models\StatusPelaksanaan;
    use App\Models\Agensi;
    @endphp
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>PENGURUSAN KURSUS</strong></h1>
            <h5 class="risda-dg">SEMAK JADUAL KURSUS - <span class="risda-g">TAMBAH KURSUS</span></h5>
        </div>
    </div>

    <hr class="risda-g">

    <div class="row">
        <div class="col">
            <h5 class="h3">MAKLUMAT KURSUS</h5>
        </div>
    </div>

    <div class="row justify-content-lg-center mt-3">
        <div class="col-lg-10">
            <form action="/pengurusan_kursus/semak_jadual/{{ $jadual->id }}" method="POST" id="form_add">
                @method('PUT')
                @csrf
                <div class="row mb-2">
                    <div class="col-lg-7">
                        <label class="col-form-label p-0">UNIT LATIHAN</label>
                        <select class="form-select form-control" name="kursus_unit_latihan">
                            <option selected="" hidden value="{{ $jadual->kursus_unit_latihan }}">
                                {{ $jadual->kursus_unit_latihan }}</option>
                            <option value="Staf">Staf</option>
                            <option value="Pekebun Kecil">Pekebun Kecil</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="col-form-label">STATUS</label>
                        @if ($jadual->kursus_status == '1')
                        <div class="form-check form-switch">
                            <input class="form-check-input" checked="" type="checkbox" name="status" />
                            <label class="form-check-label">Aktif</label>
                        </div>
                        @else
                        <div class="form-check form-switch">
                            <input class="form-check-input" checked="" type="checkbox" name="status" />
                            <label class="form-check-label">Aktif</label>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TAHUN</label>
                            <input class="form-control tahun" type="text" name="tahun" id="tahun"
                                value="{{ $jadual->tahun }}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TARIKH DAFTAR</label>
                            <input class="form-control" type="date" name="kursus_tarikh_daftar"
                                value="{{ $jadual->kursus_tarikh_daftar }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">BIDANG KURSUS</label>
                        <select class="form-select form-control" name="kursus_bidang" id="kursus_bidang">
                            <option selected="" hidden value="{{ $jadual->kursus_bidang }}">
                                @php
                                    $bidangKursus = BidangKursus::find($jadual->kursus_bidang);
                                    $bidangKursus = $bidangKursus->nama_Bidang_Kursus;
                                @endphp
                                {{ $bidangKursus }}
                            </option>
                            @foreach ($bidang as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_Bidang_Kursus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">KATEGORI KURSUS</label>
                        <select class="form-select form-control" name="kod_kategori" id="kursus_kategori">
                            <option selected="" hidden value="{{ $jadual->kod_kategori }}">
                                @php
                                    $kategoriKursus = KategoriKursus::find($jadual->kod_kategori);
                                    $kategoriKursus = $kategoriKursus->nama_Kategori_Kursus;
                                @endphp
                                {{ $kategoriKursus }}
                            </option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_Kategori_Kursus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">TAJUK KURSUS</label>
                        <select class="form-select form-control" name="kod_kursus" id="tajuk">
                            <option selected="" hidden value="{{ $jadual->kod_kursus }}">
                                @php
                                    $kodKursus = KodKursus::find($jadual->kod_kursus);
                                    $kodKursus = $kodKursus->tajuk_Kursus;
                                @endphp
                                {{ $kodKursus }}
                            </option>
                            @foreach ($kod_kursus as $t)
                                <option value="{{ $t->id }}">{{ $t->tajuk_Kursus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">SIRI KURSUS</label>
                        <input class="form-control" type="text" name="id_siri" id="siri" value="{{ $jadual->id_siri }}"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="mb-3">
                            <label class="col-form-label">NAMA KURSUS</label>
                            <input class="form-control" type="text" name="kursus_nama" id="nama_kursus"
                                value="{{ $jadual->kursus_nama }}" readonly />
                        </div>
                    </div>
                </div>
                {{-- sini --}}
                <div class="row mb-3">
                    <div class="col">
                        <div class="mb-3">
                            <label class="col-form-label">KOD NAMA KURSUS</label>
                            <input class="form-control" type="text" name="kursus_kod_nama_kursus"
                                value="{{ $jadual->kursus_kod_nama_kursus }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TARIKH MULA KURSUS</label>
                            <input class="form-control" type="date" name="tarikh_mula" id="tm"
                                value="{{ $jadual->tarikh_mula }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TARIKH TAMAT KURSUS</label>
                            <input class="form-control" type="date" name="tarikh_tamat" id="tt"
                                value="{{ $jadual->tarikh_tamat }}" />
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TEMPOH KURSUS</label>
                            <input class="form-control" type="text" name="bilangan_hari" id="tk"
                                value="{{ $jadual->bilangan_hari }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">STATUS PERLAKSANAAN</label>
                            <select class="form-select form-control" name="kursus_status_pelaksanaan">
                                <option selected="" hidden value="{{ $jadual->kursus_status_pelaksanaan }}">
                                    @php
                                        $statusPelaksanaan = StatusPelaksanaan::find($jadual->kursus_status_pelaksanaan);
                                        $statusPelaksanaan = $statusPelaksanaan->Status_Pelaksanaan;
                                    @endphp
                                    {{ $statusPelaksanaan }}
                                </option>
                                @foreach ($status_pelaksanaan as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->Status_Pelaksanaan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">MASA PENDAFTARAN</label>
                            <input class="form-control datetimepicker" name="kursus_masa_pendaftaran" id="timepicker1"
                                type="text" placeholder="H:i"
                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}'
                                value="{{ $jadual->kursus_masa_pendaftaran }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">TARIKH TUTUP TAWARAN</label>
                            <input class="form-control" type="date" name="kursus_tarikh_tutup"
                                value="{{ $jadual->kursus_tarikh_tutup }}" />
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">KOD HRMIS</label>
                            <input class="form-control" type="text" name="kursus_hrmis"
                                value="{{ $jadual->kursus_hrmis }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="col-form-label">JULAT UMUR</label>
                            <div class="row m-0 p-0">
                                <div class="col-lg-4 p-0 m-0">
                                    <input class="form-control" type="text" name="kursus_julat_umur1"
                                        value="{{ $jadual->kursus_julat_umur1 }}" />
                                </div>
                                <div class="col-lg-4 p-0 m-0 text-center">
                                    <span class="risda-g">HINGGA</span>
                                </div>
                                <div class="col-lg-4 p-0 m-0">
                                    <input class="form-control" type="text" name="kursus_julat_umur2"
                                        value="{{ $jadual->kursus_julat_umur2 }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">KUMPULAN SASARAN</label>
                        <select class="form-select form-control" name="kursus_kumpulan_sasaran">
                            <option selected="" hidden value="{{ $jadual->kursus_kumpulan_sasaran }}">Sila Pilih</option>
                            {{-- kumpulan sasaran --}}
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">PENGENDALI LATIHAN</label>
                        <select class="form-select form-control" name="kursus_pengendali_latihan">
                            <option selected="" hidden value="{{ $jadual->kursus_pengendali_latihan }}">Sila Pilih
                            </option>
                            @foreach ($kod_kursus as $pl)
                                <option value="{{ $pl->id }}">{{ $pl->pengendali_latihan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">CATATAN</label>
                        <input type="text" class="form-control" name="kursus_catatan"
                            value="{{ $jadual->kursus_catatan }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">TEMPAT KURSUS</label>
                        <select class="form-select form-control" name="kursus_tempat">
                            <option selected="" hidden value="{{ $jadual->kursus_tempat }}">
                                @php
                                    $tempatKursus = Agensi::find($jadual->kursus_tempat);
                                    $tempatKursus = $tempatKursus->nama_Agensi;
                                @endphp
                                {{ $tempatKursus }}
                            </option>
                            @foreach ($kod_kursus as $tk)
                                <option value="{{ $tk->id }}">{{ $tk->tempat_khusus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">ALAMAT TEMPAT KURSUS</label>
                        <textarea class="form-control" rows="3"
                            name="kursus_alamat_tempat_kursus">{{ $jadual->kursus_alamat_tempat_kursus }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">OBJEKTIF</label>
                        <textarea class="form-control" rows="3"
                            name="kursus_objektif">{{ $jadual->kursus_objektif }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">SILIBUS</label>
                        <input type="text" class="form-control" name="kursus_silibus"
                            value="{{ $jadual->kursus_silibus }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">METODOLOGI</label>
                        <input type="text" class="form-control" name="kursus_metodologi"
                            value="{{ $jadual->kursus_metodologi }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">NO. FT</label>
                        <input type="text" class="form-control" name="kursus_no_ft"
                            value="{{ $jadual->kursus_no_ft }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="col-form-label">STAF YANG BERTANGGUNGJAWAB</label>
                        <input type="text" class="form-control" name="kursus_staf_yang_bertanggungjawab"
                            value="{{ $jadual->kursus_staf_yang_bertanggungjawab }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col text-end">
                        <button type="submit" class="btn btn-primary">Seterusnya</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        });

        $('#unitlatihan').change(function() {

            $('#form_add select[name=kursus_bidang]').html("");
            var bid = @json($bidang->toArray());
            let option_new = "";
            $('#form_add select[name=kursus_bidang]').append(
                `<option selected='' value='' hidden>Sila Pilih</option>`);
            bid.forEach(element => {
                if (this.value == element.UL_Bidang_Kursus) {
                    $('#form_add select[name=kursus_bidang]').append(
                        `<option value=${element.id} class=${element.kod_Bidang_Kursus}>${element.nama_Bidang_Kursus}</option>`
                    );
                }
            });
        });

        $('#kursus_bidang').change(function() {
            $('#form_add select[name=kod_kategori]').html("");
            var kat_kur = @json($kategori->toArray());
            console.log(kat_kur);

            let option_new = "";
            $('#form_add select[name=kod_kategori]').append(
                `<option value='' hidden>Sila Pilih</option>`);
            kat_kur.forEach(element => {
                if (this.value == element.U_Bidang_Kursus) {
                    $('#form_add select[name=kod_kategori]').append(
                        `<option value=${element.id}>${element.nama_Kategori_Kursus}</option>`);
                }
            });
        });

        $('#kursus_kategori').change(function() {
            $('#form_add select[name=kod_kursus]').html("");
            var kod_kur = @json($kod_kursus->toArray());
            console.log(kod_kur);

            let option_new = "";
            $('#form_add select[name=kod_kursus]').append(
                `<option value='' hidden>Sila Pilih</option>`);
            kod_kur.forEach(element => {
                if (this.value == element.U_Kategori_Kursus) {
                    $('#form_add select[name=kod_kursus]').append(
                        `<option value=${element.id} class=${element.kod_Kursus} >${element.tajuk_Kursus}</option>`
                    );
                }
            });
        });

        $('#tajuk').change(function() {
            var tajuk = $('#tajuk option:selected').text();
            var tahun = $('#tahun').val();
            var kod = $('#tajuk option:selected').attr('class');
            var kod_tajuk = $('#tajuk option:selected').val();

            // cari available siri
            var list_siri = @json($jadual->toArray());
            var siri = 1;
            list_siri.forEach(element => {
                var tajuk_list = element.kod_kursus;
                if (tajuk_list === kod_tajuk) {
                    siri = parseInt(element.id_siri) + 1;
                }
            });

            console.log(kod);
            console.log(tajuk, siri, tahun);
            $('#siri').val(siri);
            $('#nama_kursus').val(tajuk + ' ' + 'Siri ' + siri + ' ' + tahun);
            $('#kod_siri_kk').val(kod + siri);
        });

        $('#tm').change(function() {
            var tarikh_mula = $('#tm').val();
            var tarikh_mula = new Date(tarikh_mula);
            var tarikh_tamat = $('#tt').val();
            var tarikh_tamat = new Date(tarikh_tamat);

            var diff = tarikh_tamat - tarikh_mula;
            var tempoh = diff / (1000 * 60 * 60 * 24) + 1;
            console.log(tarikh_tamat, tarikh_mula, tempoh);
            if (isNaN(tempoh)) {
                console.log('check')
                $('#tk').val('');
            } else {
                $('#tk').val(tempoh);
            }

        });

        $('#tt').change(function() {
            var tarikh_mula = $('#tm').val();
            var tarikh_mula = new Date(tarikh_mula);
            var tarikh_tamat = $('#tt').val();
            var tarikh_tamat = new Date(tarikh_tamat);

            var diff = tarikh_tamat - tarikh_mula;
            var tempoh = diff / (1000 * 60 * 60 * 24) + 1;
            console.log(tarikh_tamat, tarikh_mula, tempoh);
            if (isNaN(tempoh)) {
                console.log('check')
                $('#tk').val('');
            } else {
                $('#tk').val(tempoh);
            }

        });
    </script>
@endsection
