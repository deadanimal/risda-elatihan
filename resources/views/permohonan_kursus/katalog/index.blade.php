@extends('layouts.risda-base')
<style>
    .back-status {
        background-color: red;
        border-radius: 10px;
    }

</style>
@section('content')
    @php
    use App\Models\Agensi;
    @endphp
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);  ">PERMOHONAN KURSUS</p>
                <p class="h5" style="color: rgb(43,93,53); ">KATALOG KURSUS</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    KEHADIRAN KE KURSUS
                </p>
            </div>
        </div>

        <form action="" id="katalog_sort">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="pt-2 fw-bold">KATEGORI KURSUS</p>
                        </div>
                        <div class="col-lg-6">
                            <select name="kategori" id="kategori_kursus" class="form-control form-select mb-3">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_Kategori_Kursus }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <p class="pt-2 fw-bold">NAMA KURSUS</p>
                        </div>
                        <div class="col-lg-6">
                            <select name="tajuk" id="tajuk_kursus" class="form-control form-select mb-3">
                                <option value="" selected hidden>Sila Pilih</option>
                                @foreach ($tajuk as $t)
                                    <option value="{{ $t->id }}">{{ $t->kursus_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <div class="row mt-5" id="katalog_normal">
            @foreach ($jadual as $j)
                <div class="col-lg-4 mb-5">
                    <div class="card risda-bg-g">
                        <div class="card-img-top">
                            <img class="img-fluid" src="/img/katelog-card-bg.png"
                                style="width:100%; max-height: 165; opacity: 50%; filter: brightness(50%);">
                        </div>
                        <div class="card-img-overlay pt-0">
                            @if ($j->kursus_tarikh_tutup > date('Y-m-d'))
                                <div class="row justify-content-end">
                                    <div class="col-4"
                                        style="background-color: #EDC500; border-bottom-left-radius: 10px; height: 3em;">
                                        <p class="fw-bold text-end text-white my-2">DIBUKA</p>
                                    </div>
                                </div>
                            @else
                                @if ($j->tarikh_tamat < date('Y-m-d'))
                                    <div class="row justify-content-end">
                                        <div class="col-4"
                                            style="background-color: gray; border-bottom-left-radius: 10px; height: 3em;">
                                            <p class="fw-bold text-end text-white my-2">SELESAI</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="row justify-content-end">
                                        <div class="col-4"
                                            style="background-color: red; border-bottom-left-radius: 10px; height: 3em;">
                                            <p class="fw-bold text-end text-white my-2">DITUTUP</p>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            <p class="fw-bold text-center text-white mt-3 mb-0">NAMA KURSUS</p>
                            <p class="h4 fw-bold text-center text-white">{{ $j->kursus_nama }}</p>
                        </div>
                        <div class="card-body my-2 py-0">
                            <p class="card-text my-0 p-0 text-white">KOD KURSUS</p>
                            <h5 class="card-title my-0 p-0 text-white">{{ $j->kursus_kod_nama_kursus }}</h5>
                        </div>
                        <div class="card-body my-2 mt-0 py-0">
                            <p class="card-text my-0 p-0 text-white">TARIKH KURSUS</p>
                            <h5 class="card-title my-0 p-0 text-white">{{ date('d/m/Y', strtotime($j->tarikh_mula)) }} -
                                {{ date('d/m/Y', strtotime($j->tarikh_tamat)) }}</h5>
                        </div>
                        <div class="card-body my-2 mt-0 py-0 mb-3">
                            <p class="card-text my-0 p-0 text-white">TEMPAT KURSUS</p>
                            <h5 class="card-title my-0 p-0 text-white">
                                @php
                                    $tempat = Agensi::find($j->kursus_tempat);
                                    $tempat_kursus = $tempat->nama_Agensi;
                                @endphp
                                {{ $tempat_kursus }}
                            </h5>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a class="btn btn-primary btn-sm"
                            href="/permohonan_kursus/katalog_kursus/{{ $j->id }}">Maklumat Lanjut</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-5" id="katalog_katkur"></div>

        <div class="row mt-5" id="katalog_tajuk"></div>
    </div>

    <script>
        $('#kategori_kursus').change(function() {

            $('#katalog_sort select[name=tajuk]').html("");
            var tajuk = @json($tajuk->toArray());

            let option_new = "";
            $('#katalog_sort select[name=tajuk]').append(
                `<option selected='' value='' hidden>Sila Pilih</option>`);
            tajuk.forEach(element => {
                
                if (this.value == element.kod_kategori) {
                    $('#katalog_sort select[name=tajuk]').append(
                        `<option value=${element.id}>${element.kursus_nama}</option>`
                    );
                }
            });
        });


        // ada salah bawah ni
        $('#kategori_kursus').change(function() {
            $('#katalog_normal').hide();
            $('#katalog_nama').hide();
            $('#katalog_katkur').show();

            $('#katalog_katkur').html("");
            var list_jadual = @json($jadual->toArray());

            let option_new = "";
            var i = 0;
            var nama_tempat = '';
            list_jadual.forEach(element => {

                if (this.value == element.kod_kategori) {
                    var list_tempat = @json($lokasi->toArray());

                    list_tempat.forEach(element2 => {
                        if (element.kursus_tempat == element2.id) {
                            nama_tempat = element2.nama_Agensi;
                        }
                    });
                    $('#katalog_katkur').append(
                        `
                        <div class="col-4 mb-5">
                            <div class="card overflow-hidden" style="width: 18rem;">
                                <div class="card-img-top">
                                    <img class="img-fluid" src="/img/katelog-card-bg.jpg" />
                                </div>
                                <div class="card-img-overlay">
                                    {{-- <p class="fw-bold text-end text-white mb-0">STATUS</p> --}}
                                    <p class="fw-bold text-center text-white mt-3 mb-0">NAMA KURSUS</p>
                                    <p class="h4 fw-bold text-center text-white">${element.kursus_nama}</p>
                                </div>
                                <div class="card-body my-2 py-0">
                                    <p class="card-text my-0 p-0">KOD KURSUS</p>
                                    <h5 class="card-title my-0 p-0">${element.kursus_kod_nama_kursus}</h5>
                                </div>
                                <div class="card-body my-2 mt-0 py-0">
                                    <p class="card-text my-0 p-0">TARIKH KURSUS</p>
                                    <h5 class="card-title my-0 p-0">{{ date('d/m/Y', strtotime(`+element.tarikh_mula+`)) }} -
                                        {{ date('d/m/Y', strtotime(`+element.tarikh_tamat+`)) }}</h5>
                                </div>
                                <div class="card-body my-2 mt-0 py-0">
                                    <p class="card-text my-0 p-0">TEMPAT KURSUS</p>
                                    <h5 class="card-title my-0 p-0">
                                        ` + nama_tempat + `
                                    </h5>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a class="btn btn-primary btn-sm"
                                    href="/permohonan_kursus/katalog_kursus/${element.id}">Maklumat Lanjut</a>
                            </div>
                        </div>
                    `
                    );
                }
            });
        });

        $('#tajuk_kursus').change(function(){
            $('#katalog_normal').hide();
            $('#katalog_tajuk').show();
            $('#katalog_katkur').hide();

            $('#katalog_tajuk').html("");
            var list_jadual = @json($jadual->toArray());

            let option_new = "";
            var i = 0;
            var nama_tempat = '';
            list_jadual.forEach(element => {

                if (this.value == element.id) {
                    var list_tempat = @json($lokasi->toArray());

                    list_tempat.forEach(element2 => {
                        if (element.kursus_tempat == element2.id) {
                            nama_tempat = element2.nama_Agensi;
                        }
                    });
                    $('#katalog_tajuk').append(
                        `
                        <div class="col-4 mb-5">
                            <div class="card overflow-hidden" style="width: 18rem;">
                                <div class="card-img-top">
                                    <img class="img-fluid" src="/img/katelog-card-bg.jpg" />
                                </div>
                                <div class="card-img-overlay">
                                    {{-- <p class="fw-bold text-end text-white mb-0">STATUS</p> --}}
                                    <p class="fw-bold text-center text-white mt-3 mb-0">NAMA KURSUS</p>
                                    <p class="h4 fw-bold text-center text-white">${element.kursus_nama}</p>
                                </div>
                                <div class="card-body my-2 py-0">
                                    <p class="card-text my-0 p-0">KOD KURSUS</p>
                                    <h5 class="card-title my-0 p-0">${element.kursus_kod_nama_kursus}</h5>
                                </div>
                                <div class="card-body my-2 mt-0 py-0">
                                    <p class="card-text my-0 p-0">TARIKH KURSUS</p>
                                    <h5 class="card-title my-0 p-0">{{ date('d/m/Y', strtotime(`+element.tarikh_mula+`)) }} -
                                        {{ date('d/m/Y', strtotime(`+element.tarikh_tamat+`)) }}</h5>
                                </div>
                                <div class="card-body my-2 mt-0 py-0">
                                    <p class="card-text my-0 p-0">TEMPAT KURSUS</p>
                                    <h5 class="card-title my-0 p-0">
                                        ` + nama_tempat + `
                                    </h5>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a class="btn btn-primary btn-sm"
                                    href="/permohonan_kursus/katalog_kursus/${element.id}">Maklumat Lanjut</a>
                            </div>
                        </div>
                    `
                    );
                }
            });
        })
    </script>
@endsection
