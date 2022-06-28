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

        .choices .choices__list--dropdown .choices__item--selectable.is-highlighted {
            background-color: #009640;
            color: var(--falcon-choices-item-selectable-highlighted-bg);
        }

    </style>
    <div class="container pb-5">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PELAJAR PRAKTIKAL</p>
                <p class="h5" style="color: rgb(43,93,53); ">TAMBAH PELAJAR PRAKTIKAL</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    MAKLUMAT PERIBADI
                </p>
            </div>
        </div>

        <form method="POST" action="/us-uls/PelajarPraktikal">
            @csrf

        <div class="row justify-content-center my-4">
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA PELAJAR</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" name="nama" required>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NO KAD PENGENALAN</p>
                </div>
                <div class="col-7">
                    <input class="form-control" type="text" name="no_kp" maxlength="12" size="12" id="nric"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH LAHIR</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" id="bdate" required readonly>
                    <input type="hidden" class="form-control" name="tarikh_lahir" id="tarikh_lahir" required readonly>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">JANTINA</p>
                </div>
                <div class="col-7">
                    <input type="text" id="gender" class="form-control" readonly>
                    <input type="hidden" name="jantina" id="jantina" class="form-control" readonly>
                    {{-- <select class="form-select" name="jantina">
                        <option disabled hidden selected>Sila Pilih</option>
                        <option value="L">Lelaki</option>
                        <option value="P">Perempuan</option>
                    </select> --}}
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NO TELEFON</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" name="no_tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">E-MEL</p>
                </div>
                <div class="col-7">
                    <input type="email" class="form-control" name="email">

                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">STATUS</p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status"
                        oninvalid="this.setCustomValidity('Sila pilih status.')"
                        oninput="setCustomValidity('')" />
                    <label class="form-check-label">Aktif</label>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TEMPAT LATIHAN PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" name="tempat_praktikal" required>

                </div>
            </div>


            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">ALAMAT RUMAH</p>
                </div>
                <div class="col-7">
                    <input type="text" name="" id="" class="form-control mb-2" placeholder="Baris 1">
                    {{-- <textarea rows="3" class="form-control mb-3" name="alamat"></textarea> --}}
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold"></p>
                </div>
                <div class="col-7">
                    <input type="text" name="" id="" class="form-control mb-2" placeholder="Baris 2">
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold"></p>
                </div>
                <div class="col-7">
                    <input type="text" name="" id="" class="form-control mb-2" placeholder="Baris 3">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">POSKOD</p>
                </div>
                <div class="col-7">
                    <input class="form-control" type="text" name="poskod" maxlength="6" size="6"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">DAERAH</p>
                </div>
                <div class="col-7">
                    {{-- <input type="text" name="daerah" class="form-control"> --}}
                    <select name="daerah" class="form-select form-control">
                        <option hidden>Sila Pilih</option>
                        @foreach ($daerah as $daerah_rumah)
                        <option value="{{$daerah_rumah->id}}">{{$daerah_rumah->Daerah}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NEGERI</p>
                </div>
                <div class="col-7">
                    <select name=negeri class="form-select form-control">
                        <option hidden value="">Sila Pilih</option>
                        <option value="Johor">Johor</option>
                        <option value="Kedah">Kedah</option>
                        <option value="Kelantan">Kelantan</option>
                        <option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
                        <option value="W.P Labuan">W.P Labuan</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                        <option value="Pahang">Pahang</option>
                        <option value="Pulau Pinang">Pulau Pinang</option>
                        <option value="Perak">Perak</option>
                        <option value="Perlis">Perlis</option>
                        <option value="W.P Putrajaya">W.P Putrajaya</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Selangor">Selangor</option>
                        <option value="Terengganu">Terengganu</option>
                    </select>
                </div>
            </div>






        </div>

        <hr style="color: rgba(81,179,90, 60%);height:2px;">


        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    MAKLUMAT PRAKTIKAL
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-4">

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">PERINGKAT PENGAJIAN</p>
                </div>
                <div class="col-7">
                    <select class="form-select form-control" name="tahap_pengajian">
                        <option hidden>SILA PILIH</option>
                        <option value="1">Sijil</option>
                        <option value="2">Diploma</option>
                        <option value="3">Ijazah Sarjana Muda</option>
                    </select>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">BIDANG</p>
                </div>
                <div class="col-7">
                    <input type="text" name="bidang" class="form-control">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH MULA PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <input type="date" name="tarikh_mula" class="form-control">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH AKHIR PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <input type="date" name="tarikh_akhir" class="form-control">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">STATUS PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <select name="status_praktikal" class="form-select form-control">
                        <option hidden>SILA PILIH</option>
                        <option value="1">Sedang Praktikal</option>
                        <option value="2">Telah Tamat Praktikal</option>
                        <option value="3">Berhenti Separuh Jalan</option>
                    </select>
            </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA PUSAT PENGAJIAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" name="nama_ipt">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">ALAMAT</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-2" placeholder="Baris 1">
                    {{-- <textarea rows="3" class="form-control mb-3" name="alamat_ipt"></textarea> --}}
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold"></p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-2" placeholder="Baris 2">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold"></p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control mb-2" placeholder="Baris 3">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">POSKOD</p>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" name="poskod_ipt" maxlength="6" size="6"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">DAERAH</p>
                </div>
                <div class="col-3">
                    <select name="daerah_ipt" class="form-select form-control">
                        <option hidden>Sila Pilih</option>
                        @foreach ($daerah as $daerah_ipt)
                        <option value="{{$daerah_ipt->id}}">{{$daerah_ipt->Daerah}}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" name="daerah_ipt"> --}}

                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NEGERI</p>
                </div>
                <div class="col-7">
                    <select name=negeri_ipt class="form-select form-control">
                        <option hidden value="">Sila Pilih</option>
                        <option value="Johor">Johor</option>
                        <option value="Kedah">Kedah</option>
                        <option value="Kelantan">Kelantan</option>
                        <option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
                        <option value="W.P Labuan">W.P Labuan</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                        <option value="Pahang">Pahang</option>
                        <option value="Pulau Pinang">Pulau Pinang</option>
                        <option value="Perak">Perak</option>
                        <option value="Perlis">Perlis</option>
                        <option value="W.P Putrajaya">W.P Putrajaya</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Selangor">Selangor</option>
                        <option value="Terengganu">Terengganu</option>
                    </select>
                </div>
            </div>


            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KELAYAKAN ELAUN PELAJAR PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="kelayakan_elaun" id="kelayakan-elaun"/>

                        <label class="form-check-label">Ya</label>
                    </div>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KELAYAKAN AWAL PEMBIAYAAN (RM)</p>
                </div>
                <div class="col-3">
                    {{-- <input type="text" class="form-control" name="kelulusan_awal_pembiayaan" id="amaun-elaun"> --}}
                    <input class="form-control" type="text" id="amaun-elaun" name="kelulusan_awal_pembiayaan" maxlength="10" size="10"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                </div>
            </div>

            <div class="col-10 text-end">
                <a href="/us-uls/PelajarPraktikal" class="btn btn-primary" type="submit"> KEMBALI</a>

                <button class="btn btn-primary" type="submit"> HANTAR</button>
            </div>
        </div>


    </div>

    </form>

    <script>
        $(document).ready(function() {
            $("#amaun-elaun").hide();


            $("#kelayakan-elaun").change(function() {
                if (this.value!=null) {
                    $("#amaun-elaun").show();

                }
            });
        });

        $('#nric').change(function () {
            var bday = $('#nric').val();
            var tahun = bday.substr(0,2);
            var bulan = bday.substr(2,2);
            var hari = bday.substr(4,2);

            if (tahun <= 30) {
                $('#bdate').val(hari+'-'+bulan+'-20'+tahun);
            } else {
                $('#bdate').val(hari+'-'+bulan+'-19'+tahun);
            }
            $('#tarikh_lahir').val('19'+tahun+'-'+bulan+'-'+hari);

            let last_number = bday.substr(11,1);
            let remainder = last_number%2;
            console.log(remainder);
            if (remainder == 0) {
                $('#gender').val('Perempuan');
                $('#jantina').val('P');
            } else {
                $('#gender').val('Lelaki');
                $('#jantina').val('L');
            }
        });
    </script>

@endsection
