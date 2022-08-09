@extends('layouts.risda-base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>UTILITI</strong></h1>
            <h5 class="risda-dg">SENARAI AGENSI - <span class="risda-g">Kemaskini AGENSI</span></h5>
        </div>
    </div>

    <hr class="risda-g">

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5>MAKLUMAT AGENSI</h5>
                </div>
            </div>
            <form action="/utiliti/kumpulan/agensi/{{$agensi->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row ms-5 mt-4">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">KATEGORI AGENSI</label>
                                    <select class="form-select form-control" name="kategori_agensi">
                                        <option selected="" hidden value="{{$agensi->kategori_agensi}}">
                                            {{$agensi->kategori->Kategori_Agensi}}
                                        </option>
                                        @foreach ($kategori as $kat)
                                            @if ($kat->status_kategori_agensi == '1')
                                                <option value="{{ $kat->id }}">{{ $kat->Kategori_Agensi }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">ROC / NO. KAD PENGENALAN</label>
                                    <input class="form-control" type="text" name="no_KP_Agensi" value="{{$agensi->no_KP_Agensi}}"/>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-g">KOD PUSAT TANGGUNGJAWAB</label>
                                    <input class="form-control" type="text"/>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">NAMA</label>
                                    <input class="form-control" type="text" name="nama_Agensi" value="{{$agensi->nama_Agensi}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">ALAMAT</label>
                                    <input class="form-control" type="text" name="alamat_Agensi_baris1" value="{{$agensi->alamat_Agensi_baris1}}"/>
                                    <input class="form-control mt-2" type="text" name="alamat_Agensi_baris2" value="{{$agensi->alamat_Agensi_baris2}}"/>
                                    <input class="form-control mt-2" type="text" name="alamat_Agensi_baris3" value="{{$agensi->alamat_Agensi_baris3}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">POSKOD</label>
                                    <input class="form-control" type="text" maxlength="5" name="poskod" value="{{$agensi->poskod}}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">DAERAH</label>
                                    <select class="form-select form-control" name="U_Daerah_ID" id="daerah_form">
                                        <option selected="" hidden value="{{$agensi->U_Daerah_ID}}">
                                            {{$agensi->daerah->Daerah}}
                                        </option>
                                        @foreach ($daerah as $dae)
                                            @if ($dae->status_daerah == '1')
                                                <option value="{{ $dae->U_Daerah_ID }}">{{ $dae->Daerah }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">NEGERI</label>
                                    <select class="form-select form-control" name="U_Negeri_ID" id="negeri_form">
                                        <option selected="" hidden value="{{$agensi->U_Negeri_ID}}">
                                            {{$agensi->negeri->Negeri}}
                                        </option>
                                        @foreach ($negeri as $neg)
                                            @if ($neg->status_negeri == '1')
                                                <option value="{{ $neg->id }}">{{ $neg->Negeri }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">NO. TELEFON</label>
                                    <input class="form-control" type="text" maxlength="11" name="no_Telefon_Agensi" value="{{$agensi->no_Telefon_Agensi}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">NO. FAKS</label>
                                    <input class="form-control" type="text" name="no_Faks_Agensi" value="{{$agensi->no_Faks_Agensi}}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label risda-dg">WEBSITE</label>
                                    <input class="form-control" type="text" name="website_Agensi" value="{{$agensi->website_Agensi}}"/>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col text-end">
                                <button type="submit" class="btn risda-bg-dg text-white">Seterusnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

<script>
    $('#negeri_form').change(function() {
        var id_negeri = this.value;
        var list_daerah = @json($daerah->toArray());

        $('#daerah_form').html('');
        $('#daerah_form').append(`
            <option value="" selected hidden>Sila Pilih</option>
        `);
        list_daerah.forEach(e => {
            if (e.U_Negeri_ID == id_negeri) {
                if (e.status_daerah == '1') {
                    $('#daerah_form').append(`
                        <option value="${e.U_Daerah_ID}">${e.Daerah}</option>
                    `);
                }
            }
        });
    });

    $('#daerah_form').change(function() {
        var id_daerah = this.value;
        var id_negeri = id_daerah.substring(0,2);
        var list_negeri = @json($negeri->toArray());

        $('#negeri_form').html('');
        $('#negeri_form').append(`
            <option value="" selected hidden>Sila Pilih</option>
        `);
        list_negeri.forEach(e => {
            if (e.U_Negeri_ID == id_negeri) {
                if (e.status_negeri == '1') {
                    $('#negeri_form').append(`
                        <option value="${e.U_Negeri_ID}" selected>${e.Negeri}</option>
                    `);
                }
            }
        });
    });
</script>
    

@stop
