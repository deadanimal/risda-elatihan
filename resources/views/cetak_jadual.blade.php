
    @php
    use App\Models\StatusPelaksanaan;
    use App\Models\Agensi;
    @endphp

<style>
    table, td, th {
      border: 1px solid #ddd;
      text-align: left;
    }

    table{
      width: 100%;
    }

    th, td {
      padding: 5px;
    }

    .center {
    text-align: center;
    }
  </style>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-0 risda-dg"><strong>PENGURUSAN KURSUS</strong></h1>
                <h5 class="risda-dg">JADUAL KURSUS</h5>
            </div>
        </div>

        <hr>

                        <table>

                                <tr class="center">
                                    <th>BIL.</th>
                                    <th>KOD NAMA KURSUS</th>
                                    <th>NAMA KURSUS</th>
                                    <th>TARIKH KURSUS</th>
                                    <th>TEMPAT KURSUS</th>
                                    <th>BILANGAN PESERTA</th>
                                    <th>STATUS PELAKSANAAN</th>
                                </tr>

                                @foreach ($kursus as $key => $j)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $j->kursus_kod_nama_kursus }}</td>
                                        <td>{{ $j->kursus_nama }}</td>
                                        <td class="center">{{ date('d-m-Y', strtotime($j->tarikh_mula)) }} <br>

                                            - <br>

                                            {{ date('d-m-Y', strtotime($j->tarikh_tamat)) }}
                                        <td>
                                            {{$j->tempat->nama_Agensi}}
                                        </td>
                                        <td class="center">{{ $j->bilangan }}</td>
                                            {{-- {{$j->status_pelaksanaan->Status_Pelaksanaan}} --}}
                                            {{-- @if ($j->kursus_status_pelaksanaan==1) --}}

                                            @if ($j->tarikh_mula > date('Y-m-d'))
                                                <td class="center">BELUM DILAKSANA</td>

                                            @elseif ($j->tarikh_tamat < date('Y-m-d'))
                                                <td class="center">SELESAI</td>

                                            @elseif ($j->tarikh_tamat >= date('Y-m-d'))
                                                <td class="center">SEDANG DILAKSANAKAN</td>
                                            @endif
                                        {{-- @else --}}

                                        {{-- @endif --}}

                                    </tr>
                                @endforeach
                        </table>


