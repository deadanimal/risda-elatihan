@extends('layouts.risda-base')
<style>
    .choices .choices__list--dropdown .choices__item--selectable.is-highlighted {
        background-color: #009640;
        color: var(--falcon-choices-item-selectable-highlighted-bg);
    }
</style>
@section('content')
    <div class="container">
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
                <form action="/pengurusan_kursus/semak_jadual" method="POST" id="form_add">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-lg-7">
                            <label class="col-form-label p-0">UNIT LATIHAN</label>
                            <select class="form-select form-control" name="kursus_unit_latihan" id="unitlatihan" required
                                oninvalid="this.setCustomValidity('Sila pilih unit latihan.')"
                                oninput="setCustomValidity('')">

                                <option value="" selected hidden>Sila Pilih</option>
                                <option value="Staf">Staf</option>
                                <option value="Pekebun Kecil">Pekebun Kecil</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label class="col-form-label">STATUS</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status"
                                    oninvalid="this.setCustomValidity('Sila pilih status.')"
                                    oninput="setCustomValidity('')" />
                                <label class="form-check-label">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="col-form-label">TAHUN</label>
                                <input class="form-control tahun" type="text" name="tahun" id="tahun"
                                    value="{{ $tahun_ini }}" readonly required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="col-form-label">TARIKH DAFTAR</label>
                                <input class="form-control" type="date" name="kursus_tarikh_daftar"
                                    value="{{ $hari_ini }}" readonly required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">BIDANG KURSUS</label>
                            <select class="form-select form-control" name="kursus_bidang" id="kursus_bidang" required
                                oninvalid="this.setCustomValidity('Sila pilih bidang kursus.')"
                                oninput="setCustomValidity('')">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($bidang as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_Bidang_Kursus }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">KATEGORI KURSUS</label>
                            <select class="form-select form-control" name="kod_kategori" id="kursus_kategori" required
                                oninvalid="this.setCustomValidity('Sila pilih kategori kursus.')"
                                oninput="setCustomValidity('')">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_Kategori_Kursus }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">TAJUK KURSUS</label>
                            <select class="form-select form-control" name="kod_kursus" id="tajuk" required
                                oninvalid="this.setCustomValidity('Sila pilih tajuk kursus.')"
                                oninput="setCustomValidity('')">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($kod_kursus as $t)
                                    <option value="{{ $t->id }}">{{ $t->tajuk_Kursus }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">SIRI KURSUS</label>
                            <input type="number" name="id_siri" id="siri" class="form-control" min="1"
                                max="99" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="col-form-label">NAMA KURSUS</label>
                                <input class="form-control" type="text" name="kursus_nama" id="nama_kursus"
                                    value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="col-form-label">KOD NAMA KURSUS</label>
                                <input class="form-control" type="text" name="kursus_kod_nama_kursus"
                                    id="kod_siri_kk" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="col-form-label">TARIKH MULA KURSUS</label>
                                <input class="form-control" type="date" name="tarikh_mula" id="tm"
                                    min="<?php echo date('Y-m-d'); ?>" required
                                    oninvalid="this.setCustomValidity('Sila pilih tarikh mula.')"
                                    oninput="setCustomValidity('')" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="col-form-label">TARIKH TAMAT KURSUS</label>
                                <input class="form-control" type="date" name="tarikh_tamat" id="tt" required
                                    oninvalid="this.setCustomValidity('Sila pilih tarikh tamat.')"
                                    oninput="setCustomValidity('')" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="col-form-label">TEMPOH KURSUS (HARI)</label>
                                <input class="form-control" type="text" name="bilangan_hari" id="tk"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                {{-- <label class="col-form-label">STATUS PERLAKSANAAN</label>
                                <select class="form-select form-control" name="kursus_status_pelaksanaan" required
                                    oninvalid="this.setCustomValidity('Sila pilih status pelaksanaan.')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected hidden>Sila Pilih</option>
                                    @foreach ($status_pelaksanaan as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->Status_Pelaksanaan }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="col-form-label">MASA PENDAFTARAN</label>
                                {{-- <input class="form-control datetimepicker" name="kursus_masa_pendaftaran" id="timepicker1"
                                    type="text" placeholder="H:i"
                                    data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' /> --}}
                                <input class="form-control" name="kursus_masa_pendaftaran" type="time"
                                    placeholder="H:i" required
                                    oninvalid="this.setCustomValidity('Sila pilih masa pendaftaran.')"
                                    oninput="setCustomValidity('')" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="col-form-label">TARIKH TUTUP TAWARAN</label>
                                <input class="form-control" type="date" name="kursus_tarikh_tutup"
                                    min="<?php echo date('Y-m-d'); ?>" required
                                    oninvalid="this.setCustomValidity('Sila pilih tarikh tutup tawaran.')"
                                    oninput="setCustomValidity('')" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="col-form-label">KOD HRMIS</label>
                                <input class="form-control" type="text" name="kursus_hrmis" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3" id="julat_umur">
                                <label class="col-form-label">JULAT UMUR</label>
                                <div class="row m-0 p-0">
                                    <div class="col-lg-4 p-0 m-0">
                                        <input class="form-control" type="text" name="kursus_julat_umur1" />
                                    </div>
                                    <div class="col-lg-4 p-0 m-0 text-center">
                                        <span class="risda-g">HINGGA</span>
                                    </div>
                                    <div class="col-lg-4 p-0 m-0">
                                        <input class="form-control" type="text" name="kursus_julat_umur2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3" id="kump_sasaran">
                        <div class="col">
                            <label class="col-form-label">KUMPULAN SASARAN</label>
                            <select class="form-select js-choice form-control" multiple="multiple" size="1"
                                name="kursus_kumpulan_sasaran[]"
                                data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option value="" hidden>Sila Pilih</option>
                                @foreach ($kumpulan_sasaran as $lol => $ks)
                                    <option value="{{ $lol }}">{{ $lol }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">PENGENDALI LATIHAN</label>
                            <select class="form-select form-control" name="kursus_pengendali_latihan" required
                                oninvalid="this.setCustomValidity('Sila pilih pengendali latihan.')"
                                oninput="setCustomValidity('')">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($pengendali as $pl)
                                    @if ($pl->kategori->Kategori_Agensi != 'Tempat Kursus')
                                        <option value="{{ $pl->id }}">{{ $pl->nama_Agensi }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">CATATAN</label>
                            <input type="text" class="form-control" name="kursus_catatan">
                        </div>
                    </div>
                    @if ($tempat == null)
                        <div class="row mb-3">
                            <div class="col">
                                <label class="col-form-label">TEMPAT KURSUS</label>
                                <label class="col-form-label text-danger font-italic">KATEGORI "Tempat Kursus" TIADA
                                    DIDALAM
                                    SENARAI
                                    AGENSI. SILA TAMBAH DI BAHAGIAN AGENSI (UTILITI->KOD KUMPULAN) UNTUK MENERUSKAN
                                    PENAMBAHAN
                                    JADUAL KURSUS</label>
                            </div>
                        </div>
                    @else
                        <div class="row mb-3">
                            <div class="col">
                                <label class="col-form-label">TEMPAT KURSUS</label>
                                <select class="form-select form-control" name="kursus_tempat" id="tempat" required
                                    oninvalid="this.setCustomValidity('Sila pilih tempat kursus.')"
                                    oninput="setCustomValidity('')">
                                    <option value="" selected hidden>Sila Pilih</option>
                                    @foreach ($tempat as $tk)
                                        <option value="{{ $tk->id }}">{{ $tk->nama_Agensi }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="col-form-label">ALAMAT TEMPAT KURSUS</label>
                                <textarea class="form-control" rows="3" name="kursus_alamat_tempat_kursus" id="alamat"></textarea>
                            </div>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">OBJEKTIF</label>
                            <textarea class="form-control" rows="3" name="kursus_objektif" required
                                oninvalid="this.setCustomValidity('Sila nyatakan objektif kursus.')" oninput="setCustomValidity('')"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">SILIBUS</label>
                            <input type="text" class="form-control" name="kursus_silibus">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">METODOLOGI</label>
                            <input type="text" class="form-control" name="kursus_metodologi">
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">NOTA RUJUKAN</label>
                            <input type="file" class="form-control" name="nota_rujukan">
                        </div>
                    </div> --}}
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">NO. FT</label>
                            <input type="text" class="form-control" name="kursus_no_ft">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="col-form-label">STAF YANG BERTANGGUNGJAWAB</label>
                            {{-- <input type="text" class="form-control" name="kursus_staf_yang_bertanggungjawab"> --}}
                            <select name="kursus_staf_yang_bertanggungjawab" class="form-control">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($staf_bertanggungjawab as $sb)
                                    <option value="{{ $sb->pengguna->name }}">{{ $sb->pengguna->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if ($tempat == null)
                        <div class="row mb-3">
                            <div class="col text-end">
                                <button type="submit" class="btn btn-secondary" disabled>Seterusnya</button>
                            </div>
                        </div>
                    @else
                        <div class="row mb-3">
                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary">Seterusnya</button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
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
            var unit = $('#unitlatihan').val();
            console.log(unit);
            if (unit == 'Staf') {
                $('#julat_umur').hide();
                $('#kump_sasaran').show();
            } else if (unit == 'Pekebun Kecil') {
                $('#julat_umur').show();
                $('#kump_sasaran').hide();
            }

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
            var list_siri = @json($list_jadual->toArray());
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
        // check balik bwh ni
        $('#tempat').change(function() {
            var tempatkursus = $('#tempat').val();
            console.log(tempatkursus);
            // var check = @json($tempat->toArray());
            var list_tempat = @json($tempat->toArray());
            var list_negeri = @json($negeri->toArray());
            var list_daerah = @json($daerah->toArray());
            var alamat = '';
            list_tempat.forEach(element => {
                if (tempatkursus == element.id) {
                    alamat = element.alamat_Agensi_baris1;
                    poskod = element.poskod;
                    kod_daerah = element.U_Daerah_ID;
                    kod_negeri = element.U_Negeri_ID;

                    list_negeri.forEach(element2 => {
                        if (kod_negeri == element2.U_Negeri_ID) {
                            negeri = element2.Negeri;
                        }
                    });

                    list_daerah.forEach(element3 => {
                        if (kod_daerah == element3.U_Daerah_ID) {
                            daerah = element3.Daerah;
                        }
                    });
                }
            });
            console.log(alamat, poskod, negeri, daerah);
            $('#alamat').val(alamat + ', ' + poskod + ' ' + daerah + ', ' + negeri);
        });
    </script>
@endsection
