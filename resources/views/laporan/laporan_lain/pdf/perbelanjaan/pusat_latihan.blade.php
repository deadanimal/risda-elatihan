 <div class="card mt-5 ">
            <div class="card-header">
                <div class="row justify-content-end">
                    <div class="col-xl-2">
                        <select class="form-select risda-bg-g text-white" onchange="download(this)">
                            <option selected disabled hidden>Cetak</option>
                            <option value="Excel">Excel</option>
                            <option value="Pdf">PDF</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive scrollbar ">
                    <table class="table text-center table-bordered datatable"
                        style="vertical-align: middle;border-color: #00B64E;">
                        <thead class="risda-bg-g">
                            <tr>
                                <th rowspan="2">BIL.</th>
                                <th rowspan="2">PERBELANJAAN (RM)</th>
                                <th colspan="8">TEMPAT</th>
                                <th rowspan="2">JUMLAH (RM)</th>
                            </tr>
                            <tr>
                                <th>IBU PEJABAT</th>
                                <th>IKPK KELANTAN</th>
                                <th>IKPK PERAK</th>
                                <th>KOLEJ RISDA PAHANG</th>
                                <th>UCAM MELAKA</th>
                                <th>SABAH</th>
                                <th>SARAWAK</th>
                                <th>LAIN-LAIN</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>





    <script>
        $(document).ready(function() {
            $("th").addClass('fw-bold text-white');
        });
    </script>
@endsection
