@extends('layouts.risda-base')
@section('content')
    <div class="container">
        <div class="row mt-3 mb-2">
            <div class="col-12 mb-2">
                <p class="h1 mb-0 fw-bold" style="color: rgb(43,93,53);">LAPORAN</p>
                <p class="h5" style="color: rgb(43,93,53); ">LAPORAN LAIN</p>
            </div>
        </div>
        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="row">
            <div class="col-12">
                <p class="h4 fw-bold mt-3">
                    LAPORAN PENCAPAIAN MATLAMAT KEHADIRAN
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-8">
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <p class="risda-dg h5 mt-2">TARIKH MULA</p>
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <p class="risda-dg h5 mt-2">TARIKH AKHIR</p>
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <p class="risda-dg h5 mt-2">TAHUN</p>
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-select tahun">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <p class="risda-dg h5 mt-2">BULAN</p>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select">
                            @for ($i = 1; $i < 13; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-lg-3 text-center">
                        <p class="risda-dg h5 mt-2">HINGGA</p>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select">
                            @for ($i = 1; $i < 13; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="text-end">
                        <a href="#" class="btn btn-sm btn-primary"> <span class="fas fa-search"></span> Carian</a>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: rgba(81,179,90, 60%);height:2px;">

        <div class="card mt-5">
            <div class="card-body">

                <div class="row justify-content-end">
                    <div class="col-2">
                        <select class="form-select risda-bg-g text-white">
                            <option value="" selected disabled hidden>Cetak</option>
                            <option value="">Excel</option>
                            <option value="">PDF</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive scrollbar mt-3">
                    <table class="table text-center table-bordered" id="data"
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g">
                            <tr>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">BIDANG KURSUS</th>
                                <th colspan="3">BILANGAN KURSUS</th>
                                <th colspan="4">KEHADIRAN</th>
                                <th colspan="5">PERBELANJAAN</th>
                            </tr>
                            <tr>
                                <th>MATLAMAT</th>
                                <th>PENCAPAIAN</th>
                                <th>PERATUS</th>

                                <th>MATLAMAT</th>
                                <th>LELAKI</th>
                                <th>PEREMPUAN</th>
                                <th>JUMLAH</th>

                                <th>PERATUS</th>
                                <th>MATLAMAT</th>
                                <th>PENCAPAIAN</th>
                                <th>BAKI</th>
                                <th>JUMLAH</th>
                            </tr>
                            <tr style="display: none">
                                <th>BIL.</th>
                                <th>BIDANG KURSUS</th>
                                <th></th>
                                <th>BILANGAN KURSUS</th>
                                <th></th>
                                <th></th>
                                <th>KEHADIRAN</th>
                                <th></th>
                                <th></th>
                                <th>PERBELANJAAN</th>
                                <th></th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="display: none; background-color: #009640;">
                                <td></td>
                                <td></td>
                                <td>MATLAMAT</td>
                                <td>PENCAPAIAN</td>
                                <td>PERATUS</td>

                                <td>MATLAMAT</td>
                                <td>LELAKI</td>
                                <td>PEREMPUAN</td>
                                <td>JUMLAH</td>

                                <td>PERATUS</td>
                                <td>MATLAMAT</td>
                                <td>PENCAPAIAN</td>
                                <td>BAKI</td>
                                <td>JUMLAH</td>
                            </tr>
                            @foreach ($bidang_kursus as $bk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bk->nama_Bidang_Kursus }}</td>
                                    <td></td>
                                    <td>{{ count($bk->kodkursus) }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td style="background-color: #009640">
                                    <p style="color: #009640">a</p>
                                </td>
                                <td class="h5 risda-g">
                                    JUMLAH
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');


            $('#data').DataTable({
                searching: true,
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        text: '<span  >Copy</span>',
                        className: 'btn btn-primary btn-xs',
                        titleAttr: 'Copy',
                        footer: true,
                        title: 'LAPORAN'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<span   >Excel</span>',
                        className: 'btn btn-primary btn-xs',
                        titleAttr: 'Excel',
                        footer: true,
                        title: 'LAPORAN'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<span >CSV</span>',
                        className: 'btn btn-primary btn-xs',
                        titleAttr: 'CSV',
                        title: 'LAPORAN'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<span class="btn btn-primary">PDF</span>',
                        className: 'btn btn-primary btn-xs',
                        titleAttr: 'PDF',
                        title: 'LAPORAN',
                        footer: true,
                        orientation: 'landscape',

                        customize: function(doc) {
                            var tblBody = doc.content[1].table.body;
                            for (let i = 0; i < tblBody[0].length; i++) {
                                tblBody[1][i].fillColor = '#009640';
                                tblBody[1][i].color = 'white';
                            }
                            var objLayout = {};
                            objLayout['hLineWidth'] = function(i) {
                                return .8;
                            };
                            objLayout['vLineWidth'] = function(i) {
                                return .5;
                            };
                            objLayout['hLineColor'] = function(i) {
                                return '#aaa';
                            };
                            objLayout['vLineColor'] = function(i) {
                                return '#aaa';
                            };
                            objLayout['paddingLeft'] = function(i) {
                                return 8;
                            };
                            objLayout['paddingRight'] = function(i) {
                                return 8;
                            };
                            doc.content[1].layout = objLayout;

                            doc.content[1].table.widths = ['2%', '20%', '10%', '20%', '10%', '10%',
                                '20%', '10%', '10%', '20%', '10%', '10%', '10%', '10%',
                            ]

                            doc.styles.tableHeader.fontSize = 9,
                                doc.styles.tableHeader.fillColor = '#00A651',
                                doc.styles.tableFooter.fontSize = 9,
                                doc.styles.tableFooter.fillColor = '#00A651',
                                // doc.styles.tableFooter.color = 'black',
                                doc.defaultStyle.alignment = 'center',
                                doc.defaultStyle.fontSize = 9
                        }
                    },
                ],
                "language": {
                    "lengthMenu": "MENU rekod setiap paparan",
                    "zeroRecords": "Maaf - Tiada data dijumpai",
                    "info": "Menunjukkan PAGE daripada PAGES paparan",
                    "infoEmpty": "Tiada rekod dijumpai",
                    "infoFiltered": "(ditapis daripada MAX jumlah rekod)",
                    "sSearch": "Saringan :",
                    "paginate": {
                        "previous": "Sebelum",
                        "next": "Seterusnya"
                    }
                }
            });
        });
    </script>
@endsection
