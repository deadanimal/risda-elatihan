<div class="table-responsive scrollbar ">
    <table class="table text-center table-bordered datatable " border-color: #00B64E;">
        <thead class="risda-bg-g" style="vertical-align: middle">
           <tr>
                <th rowspan="2">BIL.</th>
                <th rowspan="2">NAMA PESERTA</th>
                <th colspan="2">KEPUTUSAN PENILAIAN (%)</th>

            </tr>
            <tr>
                <th>PRE TEST</th>
                <th>POST TEST</th>
            </tr>
        </thead>
        {{-- <tbody>
            @foreach ($pretest as $pretest)
            @foreach ($posttest as $posttest)

            <tr>
                <td>{{$loop->iteration}}.</td>
                <td>{{$pretest->peserta->name}}</td>
                <td style="text-align: center;">{{$pretest->markah}}</td>
                <td style="text-align: center;">{{$posttest->markah}}</td>


            </tr>
            @endforeach
            @endforeach

             <tr>

                <td colspan="2"><b>BILANGAN PESERTA MENDAPAT MARKAH MELEBIHI 61%</b></td>
                <td ></td>
                <td ></td>
            </tr>
            <tr>
                <td colspan="2"><b>JUMLAH KESELURUHAN PESERTA</b></td>
                <td ></td>
                <td ></td>
            </tr>
            <tr>
                <td colspan="2"><b>PERATUSAN LULUS</b></td>
                <td ></td>
                <td ></td>

            </tr>
            <tr>
                <td colspan="2"><b>PERATUSAN GAGAL</b></td>
                <td ></td>
                <td ></td>
            </tr>
        </tbody> --}}
    </table>
</div>
