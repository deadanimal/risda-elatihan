@extends('layouts.risda-base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-0 risda-dg"><strong>LAMAN UTAMA</strong></h1>
            <h5 class="risda-dg">JADUAL TAHUNAN</h5>
        </div>
    </div>

    <hr class="risda-g">

    <div class="row">
        <div class="col-12">
            <p class="h4 fw-bold mt-3">
                SENARAI JADUAL TAHUNAN
            </p>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-2">
                    <label class="col-form-label">Tahun</label>
                </div>
                <div class="col-lg-10 mb-3">
                    <input class="form-control tahun " type="text" name="tahun" id="tahun" autocomplete="off" placeholder="YYYY" onchange="filter(this)"/>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive scrollbar m-3">
                        <table class="table datatable table-striped" style="width:100%">
                            <thead class="bg-200">
                                <tr>
                                    <th class="sort">BIL.</th>
                                    <th class="sort">KOD NAMA KURSUS</th>
                                    <th class="sort">NAMA KURSUS</th>
                                    <th class="sort">TARIKH KURSUS</th>
                                    <th class="sort">TEMPAT KURSUS</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="t_normal">
                                @foreach ($jadual as $key => $jab)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $jab->kursus_kod_nama_kursus }}</td>
                                        <td>{{ $jab->kursus_nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($jab->tarikh_mula)) }} -
                                            {{ date('d-m-Y', strtotime($jab->tarikh_tamat)) }}</td>
                                        <td>
                                            @if ($jab->tempat != null)
                                                {{ $jab->tempat->nama_Agensi }}
                                            @else
                                                check balik
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

    function filter(tahun) {
        var tahun = tahun.value;

        $.ajax({
                type: 'get',
                url: '/dashboard/filter_tahun',
                data: {
                    'tahun': tahun
                },
                success: function(result) {
                    console.log(result);
                    $('.datatable').dataTable().fnClearTable();
                    $('.datatable').dataTable().fnDestroy();
                    $("#t_normal").html("");
                    let iteration = 1;

                    result.forEach(e => {
                        var tm = new Date(e.tarikh_mula);
                        let hari_m = tm.getDate();
                        if (hari_m < 10) hari_m = '0' + hari_m;
                        let bulan_m = tm.getMonth()+1;
                        if (bulan_m < 10) bulan_m = '0' + bulan_m;
                        var tarikh_mula = hari_m + '-' + bulan_m + '-' + tm.getFullYear();

                        var tt = new Date(e.tarikh_tamat);
                        let hari_t = tt.getDate();
                        if (hari_t < 10) hari_t = '0' + hari_t;
                        let bulan_t = tt.getMonth()+1;
                        if (bulan_t < 10) bulan_t = '0' + bulan_t;
                        var tarikh_tamat = hari_t + '-' + bulan_t + '-' + tt.getFullYear();

                        $("#t_normal").append(`
                        <tr>
                            <td>`+iteration+`.</td>
                            <td>`+e.kursus_kod_nama_kursus+`</td>
                            <td>`+e.kursus_nama+`</td>
                            <td>`+tarikh_mula+` - `+tarikh_tamat+`</td>
                            <td>`+(e.tempat.nama_Agensi ?? '-')+`</td>
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