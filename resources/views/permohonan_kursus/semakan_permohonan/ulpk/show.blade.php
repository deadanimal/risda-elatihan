@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PENGURUSAN PESERTA</strong></h1>
                <h5 class="risda-dg">SEMAKAN PERMOHONAN</h5>
            </div>
        </div>

        <hr class="risda-g">

        <div class="row justify-content-center mt-3">
            <div class="row col-lg-10">
                <div class="card risda-bg-g mb-3">
                    <h5 class="text-white my-2 mx-3">MAKLUMAT PERMOHONAN</h5>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">NO. PERMOHONAN TANAM
                                SEMULA (TS)</label>
                            <input class="form-control" type="text" value="" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">NO. KAD
                                PENGENALAN</label>
                            <input class="form-control" type="text" value="{{ $pengguna->no_KP }}" readonly />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">NO. KAD PENGENALAN
                                KIR</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->U_PIR_ID }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">NAMA</label>
                            <input class="form-control" type="text" value="{{ $pengguna->name }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">TARIKH LAHIR</label>
                            <input class="form-control" type="text" value="{{ $pengguna->tarikh_lahir }}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">JANTINA</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Jantina }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">KETURUNAN</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Bangsa }}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">NO. TELEFON
                                BIMBIT</label>
                            <input class="form-control" type="text" value="" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">STATUS ISI
                                RUMAH</label>
                            <input class="form-control" type="text" value="" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">KATEGORI PEKEBUN
                                KECIL</label>
                            <input class="form-control" type="text" value="" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">SKIM</label>
                            <input class="form-control" type="text" value="" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">TARAF
                                KESIHATAN</label>
                            <input class="form-control" type="text" value="" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">PUSAT
                                TANGGUNGJAWAB</label>
                            <input class="form-control" type="text" value="{{$pengguna->data_pk->Pusat_Tanggungjawab_Lokaliti}}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">ALAMAT RUMAH
                                1</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Nombor }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">ALAMAT RUMAH
                                2</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Jalan }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">ALAMAT RUMAH
                                3</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Nama_Kampung }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">ALAMAT RUMAH
                                4</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Bandar }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">POSKOD</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Poskod }}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">NEGERI</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Negeri }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">DAERAH</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Daerah }}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">MUKIM</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Mukim }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">PARLIMEN</label>
                            <input class="form-control" type="text" value="{{$pengguna->data_pk->Parlimen}}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">DUN</label>
                            <input class="form-control" type="text" value="{{$pengguna->data_pk->Dun}}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">KAMPUNG</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Kampung }}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">SEKSYEN</label>
                            <input class="form-control" type="text" value="{{ $pengguna->data_pk->Seksyen }}" readonly />
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($tanah as $key => $t)
            <div class="row col-lg-10 mt-3">
                <div class="card risda-bg-g mb-3">
                    <h5 class="text-white my-2 mx-3">MAKLUMAT KEBUN {{$key+1}}</h5>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">ALAMAT KEBUN
                                1</label>
                            <input class="form-control" type="text"
                                value="" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">ALAMAT KEBUN
                                2</label>
                            <input class="form-control" type="text"
                                value="" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label risda-g">ALAMAT KEBUN
                                3</label>
                            <input class="form-control" type="text"
                                value="" readonly />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">POSKOD</label>
                            <input class="form-control" type="text"
                                value="" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">NEGERI</label>
                            <input class="form-control" type="text"
                                value="{{ $t['U_Negeri_ID'] }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">DAERAH</label>
                            <input class="form-control" type="text"
                                value="{{ $t['U_Daerah_ID'] }}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">MUKIM</label>
                            <input class="form-control" type="text"
                                value="{{ $t['U_Mukim_ID'] }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">PARLIMEN</label>
                            <input class="form-control" type="text" value="{{$t['U_Parlimen_ID']}}"
                                readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">DUN</label>
                            <input class="form-control" type="text" value="{{$t['U_Dun_ID']}}"
                                readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">KAMPUNG</label>
                            <input class="form-control" type="text"
                                value="{{ $t['U_Kampung_ID'] }}" readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">SEKSYEN</label>
                            <input class="form-control" type="text"
                                value="{{ $t['U_Seksyen_ID'] }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">NO. GERAN</label>
                            <input class="form-control" type="text" value="{{$t['No_Geran']}}"
                                readonly />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">NO. LOT</label>
                            <input class="form-control" type="text" value="{{$t['No_Lot']}}"
                                readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">JENIS TANAMAN</label>
                            @foreach ($t->tanaman as $tanaman)
                            <input class="form-control" type="text"
                            value="{{ $tanaman['Jenis_Tanaman'] }}" readonly />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label risda-g">LUAS KEBUN</label>
                            <input class="form-control" type="text"
                                value="{{ $t['Luas_Pemilikan'] }}" readonly />
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>

        <hr class="risda-g mt-3">

        <div class="row">
            <div class="col">
                <h5>SEMAKAN PERMOHONAN</h5>
            </div>
        </div>
        <div class="row ms-5 mt-4">
            <div class="col">
                <form action="/permohonan_kursus/katalog_kursus/{{ $user->id }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 text-end">
                            <label class="form-label risda-g">STATUS</label>
                        </div>
                        <div class="col-lg-6">

                            <select name="status_permohonan" class="form-control" required
                                oninvalid="this.setCustomValidity('Sila isi bahagian ini')" oninput="setCustomValidity('')">
                                <option value="" hidden selected>Sila Pilih</option>
                                <option value="4">Lulus</option>
                                <option value="5">Tidak Lulus</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-9 text-end">
                            <button type="submit" class="btn btn-primary text-white btn-sm">Hantar</button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
