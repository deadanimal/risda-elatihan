<div class="table-responsive scrollbar ">
                <table class="table text-center table-bordered datatable " border-color: #00B64E;">
                    <thead class="risda-bg-g" style="vertical-align: middle">

                        <tr>
                            <th>BIL.</th>
                            <th>NAMA EJEN PELAKSANA</th>
                            <th>BILANGAN PERKHIDMATAN / BEKALAN
                            <th>TAJUK PERKHIDMATAN/BEKALAN</th>
                            <th>JUMLAH HARGA (RM)</th>
                            <th>NILAI PRESTASI (%)</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>



                    <tbody>

                       @foreach ($ejen as $e)
                            @foreach ($e as $p )
                            <tr>
                            <td>{{$p->agensi->nama_Agensi}}</td>
                            @endforeach
                        @endforeach
                            </tr>




                    </tbody>

                </table>
            </div>
