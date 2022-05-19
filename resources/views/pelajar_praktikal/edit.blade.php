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

        <form method="POST" action="/us-uls/PelajarPraktikal/{{$pelajar->id}}">
            @csrf
            @method('PUT');

        <div class="row justify-content-center my-4">
            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">NAMA PERMOHON</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="nama" value="{{$pelajar->nama}}">
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">NO KAD PENGENALAN</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="no_kp" value="{{$pelajar->no_kp}}" required>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">TARIKH LAHIR</p>
                </div>
                <div class="col-6">
                    <input type="date" class="form-control" name="tarikh_lahir" required value="{{$pelajar->tarikh_lahir}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">JANTINA</p>
                </div>
                <div class="col-6">
                    <select class="form-select" name="jantina">

                        <option @if ($pelajar->jantina == 'L') selected @endif value='L'>Lelaki</option>
                        <option @if ($pelajar->jantina == 'P') selected @endif value='P'>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">NO TELEFON</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="no_tel" value="{{$pelajar->no_tel}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">E-MEL</p>
                </div>
                <div class="col-6">
                    <input type="email" class="form-control" name="email" value="{{$pelajar->email}}">

                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">STATUS</p>
                </div>
                <div class="form-check form-switch">
                    {{-- <input class="form-check-input" type="checkbox" name="status"
                        oninvalid="this.setCustomValidity('Sila pilih status.')"
                        oninput="setCustomValidity('')"  value="{{$pelajar->status}}"/>
                    <label class="form-check-label">Aktif</label> --}}


                    @if ($pelajar->kursus_status == 'on')
                    <div class="form-check form-switch">

                        <input class="form-check-input" checked="" type="checkbox" name="status" />
                        <label class="form-check-label">Aktif</label>
                    </div>
                    @else
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" />
                        <label class="form-check-label">Tidak Aktif</label>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">TEMPAT LATIHAN PRAKTIKAL</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="tempat_praktikal" value="{{$pelajar->tempat_praktikal}}" required>

                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">ALAMAT RUMAH</p>
                </div>
                <div class="col-6">
                    <textarea name="alamat" class="form-control" rows="3" cols="4" required>{{$pelajar->alamat}}</textarea>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">POSKOD</p>
                </div>
                <div class="col-6">
                    <input type="number" name="poskod" class="form-control" value="{{$pelajar->poskod}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">DAERAH</p>
                </div>
                <div class="col-6">
                    <input type="text" name="daerah" class="form-control" value="{{$pelajar->daerah}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-4">
                    <p class="pt-2 fw-bold">NEGERI</p>
                </div>
                <div class="col-6">
                    <select name=negeri class="form-select">
                        <option @if ($pelajar->negeri == 'Johor') selected @endif value='Johor'>Johor</option>
                        <option @if ($pelajar->negeri == 'Kedah') selected @endif value='Kedah'>Kedah</option>
                        <option @if ($pelajar->negeri == 'Kelantan') selected @endif value='Kelantan'>Kelantan</option>
                        <option @if ($pelajar->negeri == 'W.P Kuala Lumpur') selected @endif value='W.P Kuala Lumpur'>W.P Kuala Lumpur</option>
                        <option @if ($pelajar->negeri == 'W.P Labuan') selected @endif value='W.P Labuan'>W.P Labuan</option>
                        <option @if ($pelajar->negeri == 'Melaka') selected @endif value='Melaka'>Melaka</option>
                        <option @if ($pelajar->negeri == 'Negeri Sembilan') selected @endif value='Negeri Sembilan'>Negeri Sembilan</option>
                        <option @if ($pelajar->negeri == 'Pahang') selected @endif value='Pahang'>Pahang</option>
                        <option @if ($pelajar->negeri == 'Pulau Pinang') selected @endif value='Pulau Pinang'>Pulau Pinang</option>
                        <option @if ($pelajar->negeri == 'Perlis') selected @endif value="Perlis">Perlis</option>
                        <option @if ($pelajar->negeri == 'Perak') selected @endif value='Perak'>Perak</option>
                        <option @if ($pelajar->negeri == 'W.P Putrajaya') selected @endif value='W.P Putrajaya'>W.P Putrajaya</option>
                        <option @if ($pelajar->negeri == 'Sabah') selected @endif value='Sabah'>Sabah</option>
                        <option @if ($pelajar->negeri == 'Sarawak') selected @endif value='Sarawak'>Sarawak</option>
                        <option @if ($pelajar->negeri == 'Selangor') selected @endif value='Selangor'>Selangor</option>
                        <option @if ($pelajar->negeri == 'Terengganu') selected @endif value='Terengganu'>Terengganu</option>
                        <option @if ($pelajar->negeri == 'Johor') selected @endif value='Johor'>Johor</option>
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
                    <select class="form-select" name="tahap_pengajian">

                        <option @if ($pelajar->tahap_pengajian == '1') selected @endif value='1'>Sijil</option>
                        <option @if ($pelajar->tahap_pengajian == '2') selected @endif value='2'>Diploma</option>
                        <option @if ($pelajar->tahap_pengajian == '3') selected @endif value='3'>Ijazah</option>

                    </select>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">BIDANG</p>
                </div>
                <div class="col-7">
                    <input type="text" name="bidang" class="form-control" value="{{$pelajar->bidang}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH MULA PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <input type="date" name="tarikh_mula" class="form-control" value="{{$pelajar->tarikh_mula}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">TARIKH AKHIR PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <input type="date" name="tarikh_akhir" class="form-control" value="{{$pelajar->tarikh_akhir}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">STATUS PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <select name="status_praktikal" class="form-select">
                        <option hidden>SILA PILIH</option>
                        <option @if ($pelajar->status_praktikal == '1') selected @endif value="1">Sedang Praktikal</option>
                        <option @if ($pelajar->status_praktikal == '2') selected @endif value="2">Telah Tamat Praktikal</option>
                        <option @if ($pelajar->status_praktikal == '3') selected @endif value="3">Berhenti Separuh Jalan</option>


                    </select>
            </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NAMA PUSAT PENGAJIAN</p>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" name="nama_ipt" value="{{$pelajar->nama_ipt}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">ALAMAT</p>
                </div>
                <div class="col-7">
                    <textarea class="form-control" name="alamat_ipt">{{$pelajar->alamat_ipt}}</textarea>
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">POSKOD</p>
                </div>
                <div class="col-3">
                    <input type="number" class="form-control" name="poskod_ipt" value="{{$pelajar->poskod_ipt}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">DAERAH</p>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="daerah_ipt" value="{{$pelajar->daerah}}">
                </div>
            </div>

            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">NEGERI</p>
                </div>
                <div class="col-7">
                    <select name=negeri_ipt class="form-select">
                        <option @if ($pelajar->negeri_ipt == 'Johor') selected @endif value='Johor'>Johor</option>
                        <option @if ($pelajar->negeri_ipt == 'Kedah') selected @endif value='Kedah'>Kedah</option>
                        <option @if ($pelajar->negeri_ipt == 'Kelantan') selected @endif value='Kelantan'>Kelantan</option>
                        <option @if ($pelajar->negeri_ipt == 'W.P Kuala Lumpur') selected @endif value='W.P Kuala Lumpur'>W.P Kuala Lumpur</option>
                        <option @if ($pelajar->negeri_ipt == 'W.P Labuan') selected @endif value='W.P Labuan'>W.P Labuan</option>
                        <option @if ($pelajar->negeri_ipt == 'Melaka') selected @endif value='Melaka'>Melaka</option>
                        <option @if ($pelajar->negeri_ipt == 'Negeri Sembilan') selected @endif value='Negeri Sembilan'>Negeri Sembilan</option>
                        <option @if ($pelajar->negeri_ipt == 'Pahang') selected @endif value='Pahang'>Pahang</option>
                        <option @if ($pelajar->negeri_ipt == 'Pulau Pinang') selected @endif value='Pulau Pinang'>Pulau Pinang</option>
                        <option @if ($pelajar->negeri_ipt == 'Perlis') selected @endif value="Perlis">Perlis</option>
                        <option @if ($pelajar->negeri_ipt == 'Perak') selected @endif value='Perak'>Perak</option>
                        <option @if ($pelajar->negeri_ipt == 'W.P Putrajaya') selected @endif value='W.P Putrajaya'>W.P Putrajaya</option>
                        <option @if ($pelajar->negeri_ipt == 'Sabah') selected @endif value='Sabah'>Sabah</option>
                        <option @if ($pelajar->negeri_ipt == 'Sarawak') selected @endif value='Sarawak'>Sarawak</option>
                        <option @if ($pelajar->negeri_ipt == 'Selangor') selected @endif value='Selangor'>Selangor</option>
                        <option @if ($pelajar->negeri_ipt == 'Terengganu') selected @endif value='Terengganu'>Terengganu</option>
                        <option @if ($pelajar->negeri_ipt == 'Johor') selected @endif value='Johor'>Johor</option>
                    </select>

                </div>
            </div>


            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KELAYAKAN ELAUN PELAJAR PRAKTIKAL</p>
                </div>
                <div class="col-7">
                    <div class="form-check form-switch">
                        {{-- <input class="form-check-input" type="checkbox" name="kelayakan_elaun"
                            oninvalid="this.setCustomValidity('Sila pilih kelayakan.')"
                            oninput="setCustomValidity('')" value="{{$pelajar->kelayakan_elaun}}" />
                        <label class="form-check-label">Ya</label> --}}

                        @if ($pelajar->status == 'on')
                            <div class="form-check form-switch">
                                <input class="form-check-input" checked="" type="checkbox" name="kelayakan_elaun" />
                                <label class="form-check-label">Ya</label>
                            </div>
                            @else
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="kelayakan_elaun" />
                                <label class="form-check-label">Tidak</label>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="col-10 d-inline-flex">
                <div class="col-5">
                    <p class="pt-2 fw-bold">KELAYAKAN AWAL PEMBIAYAAN (RM)</p>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="kelulusan_awal_pembiayaan" value="{{$pelajar->kelulusan_awal_pembiayaan}}">
                </div>
            </div>

            <div class="col-10 text-end">
                <a href="/us-uls/PelajarPraktikal" class="btn btn-primary" type="submit"> KEMBALI</a>

                <button class="btn btn-primary" type="submit"> HANTAR</button>

            </div>
        </div>


    </div>

    </form>

@endsection
