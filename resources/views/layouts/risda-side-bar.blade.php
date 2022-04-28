<style>
    .risda-side {
        /* margin-top: 225px; */
        /* padding: 20px; */
        /* width: 350px; */
        /* position: fixed; */
        /* overflow-y: auto;
        top: 0;
        bottom: 0; */
        background-color: #009640;
        color: white;
    }

    .modal {
        position: fixed;
        top: 0;
        right: 0;
        z-index: 10000 !important
            /* width: 100vw;
        height: 100vh; */


    }

    .modal-content {
        z-index: 20000 !important
    }

    /* .nav-link-text {
        color: white;
    }

    .nav-link-text.active {
        color: white;
        background-color: #009640;
    } */

</style>
<script>
    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
    if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
    }
</script>
@php
    use App\Models\Dashboard;
@endphp
<div class="modal fade" id="tukar-password" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/profil/{{ Auth::id() }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">
                            Tukar
                            Kata
                            Laluan</h4>
                    </div>
                    <div class="p-4 pb-0">

                        <div class="mb-3">
                            <label class="col-form-label">Kata Laluan
                                Sekarang:</label>
                            <input class="form-control" type="password" name="kl_sekarang" />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Kata Laluan
                                Baru:</label>
                            <input class="form-control" type="password" name="kl_baru" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success" type="submit">Tukar Kata
                        Laluan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>

    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar" id="checklim">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <div class="row mt-4">
                    <div class="col">
                        <h5 class="text-white text-center">Selamat Datang</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card risda-bg-dg mx-4 mx-lg-0">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-center mb-3">
                                        @if (Auth::user()->gambar_profil == null)
                                            <img src="/img/dp.jpg" alt="profile_picture"
                                                style="border-radius: 25px; border: 2px solid #73AD21; width:108px; height:108.9px; object-fit: cover;">
                                        @else
                                            <img src="/{{ Auth::user()->gambar_profil }}" alt="profile_picture"
                                                style="border-radius: 25px; border: 2px solid #73AD21; width:108px; height:108.9px; object-fit: cover;">
                                        @endif
                                    </div>
                                </div>
                                <h3 class="h5 text-white text-center"><strong>{{ Auth::user()->name }}</strong></h3>
                                <div class="row mt-3">
                                    <div class="col d-grid gap-2">

                                        <a href="/profil" class="btn btn-light text-success">Profil</a>

                                        <a href="#tukar-password" data-bs-toggle="modal"
                                            class="btn btn-light text-success">Tukar Kata Laluan</a>


                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="col d-grid gap-2">
                                                <button type="submit" class="btn btn-light text-success">Log
                                                    Keluar</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="row mt-4 ">
                                    <div class="col text-center">
                                        <span class="h5 text-white" id="date"></span>
                                        <br />
                                        <span class="h5 text-white" id="time"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <li class="nav-item mx-3 mx-md-0">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label text-white">
                            Menu
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link py-0" href="/" role="button">
                        <div class="d-flex align-items-center nav-link-side px-0">
                            <span class="px-3"><span class="fas fa-home"></span> DASHBOARD</span>
                        </div>
                    </a>

                    @can('pengurusan pengguna')
                        <a class="nav-link py-0 dropdown-indicator" href="#pengurusan_pengguna" role="button"
                            data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('pengurusan_pengguna/*') ? 'true' : 'false' }}"
                            aria-controls="kehadiran">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="far fa-address-book"></span> PENGURUSAN
                                    PENGGUNA</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('pengurusan_pengguna/*') ? 'show' : 'false' }} my-1"
                            id="pengurusan_pengguna">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('pengurusan_pengguna/peranan') ? 'active' : '' }} py-0"
                                    href="/pengurusan_pengguna/peranan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">KUMPULAN PENGGUNA</span>
                                    </div>
                                </a>
                                <a class="nav-link py-0 dropdown-indicator" href="#senarai" role="button"
                                    data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('pengurusan_pengguna/pengguna/*') ? 'true' : 'false' }}"
                                    aria-controls="senarai">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">SENARAI PENGGUNA</span>
                                    </div>
                                </a>
                                <ul class="nav-item collapse {{ Request::is('pengurusan_pengguna/pengguna/*') ? 'show' : 'false' }} my-1"
                                    id="senarai">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('pengurusan_pengguna/pengguna/staf') ? 'active' : '' }} py-0"
                                            href="/pengurusan_pengguna/pengguna/staf">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Pengguna Staf</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('pengurusan_pengguna/pengguna/pekebun_kecil') ? 'active' : '' }} py-0"
                                            href="/pengurusan_pengguna/pengguna/pekebun_kecil">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Pengguna Pekebun Kecil</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('pengurusan_pengguna/pengguna/ejen_pelaksana') ? 'active' : '' }} py-0"
                                            href="/pengurusan_pengguna/pengguna/ejen_pelaksana">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Pengguna Ejen Pelaksana</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endcan

                    @can('pengurusan kursus')
                        <a class="nav-link py-0 dropdown-indicator" href="#pengurusan_kursus" role="button"
                            data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('pengurusan_kursus/*') ? 'true' : 'false' }}"
                            aria-controls="pengurusan_kursus">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class=" px-3"><span class="fas fa-clone"></span> PENGURUSAN KURSUS</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('pengurusan_kursus/*') ? 'show' : 'false' }} my-1"
                            id="pengurusan_kursus">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('pengurusan_kursus/*') ? 'active' : '' }} py-0"
                                    href="/pengurusan_kursus/semak_jadual">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Semak Jadual</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    @endcan

                    @if (auth()->user()->can('pencalonan peserta') || auth()->user()->can('semakan permohonan'))
                        <a class="nav-link py-0 dropdown-indicator" href="#pengurusan_peserta" role="button"
                            data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('pengurusan_peserta/*') ? 'true' : 'false' }}"
                            aria-controls="pengurusan_peserta">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class=" px-3"><span class="fas fa-clone"></span> PENGURUSAN
                                    PESERTA</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('pengurusan_peserta/*') ? 'show' : 'false' }} my-1"
                            id="pengurusan_peserta">
                            @can('pencalonan peserta')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_peserta/pencalonan') ? 'active' : '' }} py-0"
                                        href="/pengurusan_peserta/pencalonan">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Pencalonan Peserta</span>
                                        </div>
                                    </a>
                                </li>
                            @endcan
                            @can('semakan permohonan')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_peserta/semakan_permohonan') ? 'active' : '' }} py-0"
                                        href="/pengurusan_peserta/semakan_pemohon">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Semakan Permohonan</span>
                                        </div>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    @endif

                    @can('utiliti')
                        <a class="nav-link py-0 dropdown-indicator" href="#utiliti" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('utiliti/*') ? 'true' : 'false' }}" aria-controls="utiliti">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class=" px-3"><span class="fas fa-clone"></span> UTILITI</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('utiliti/*') ? 'show' : 'false' }} my-1"
                            id="utiliti">
                            <li class="nav-item">
                                <a class="nav-link py-0 dropdown-indicator" href="#negeri" role="button"
                                    data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('utiliti/lokasi/*') ? 'true' : 'false' }}"
                                    aria-controls="negeri">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Kod Lokasi</span>
                                    </div>
                                </a>
                                <ul class="nav-item collapse {{ Request::is('utiliti/lokasi/*') ? 'show' : 'false' }} my-1"
                                    id="negeri">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/negeri') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/negeri">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Negeri</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/daerah') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/daerah">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Daerah</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/mukim') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/mukim">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Mukim</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/parlimen') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/parlimen">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Parlimen</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/dun') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/dun">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Dun</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/kampung') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/kampung">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Kampung</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/seksyen') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/seksyen">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Seksyen</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/stesen') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/stesen">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Stesen</span>
                                            </div>
                                        </a>

                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/lokasi/pusat_tanggungjawab') ? 'active' : '' }} py-0"
                                            href="/utiliti/lokasi/pusat_tanggungjawab">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Pusat Tanggungjawab</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#kumpulan" role="button" data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('utiliti/kumpulan/*') ? 'true' : 'false' }}"
                                    aria-controls="kumpulan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Kod Kumpulan</span>
                                    </div>
                                </a>

                                <ul class="nav-item collapse {{ Request::is('utiliti/kumpulan/*') ? 'show' : 'false' }} my-1"
                                    id="kumpulan">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/kumpulan/kategori_agensi') ? 'active' : '' }} py-0"
                                            href="/utiliti/kumpulan/kategori_agensi">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kategori Agensi</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/kumpulan/agensi') ? 'active' : '' }} py-0"
                                            href="/utiliti/kumpulan/agensi">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Senarai Agensi</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#julat" role="button" data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('utiliti/julat/*') ? 'true' : 'false' }}"
                                    aria-controls="julat">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Kod Julat</span>
                                    </div>
                                </a>
                                <ul class="nav-item collapse {{ Request::is('utiliti/julat/*') ? 'show' : 'false' }} my-1"
                                    id="julat">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/julat/julat_tahunan') ? 'active' : '' }} py-0"
                                            href="/utiliti/julat/julat_tahunan">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Julat Tahunan</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#status" role="button" data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('utiliti/status/*') ? 'true' : 'false' }}"
                                    aria-controls="status">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Kod Status</span>
                                    </div>
                                </a>
                                <ul class="nav-item collapse {{ Request::is('utiliti/status/*') ? 'show' : 'false' }} my-1"
                                    id="status">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/status/status_pelaksanaan') ? 'active' : '' }} py-0"
                                            href="/utiliti/status/status_pelaksanaan">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Status Pelaksanaan</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#generik" role="button" data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('utiliti/generik/*') ? 'true' : 'false' }}"
                                    aria-controls="generik">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Kod Generik</span>
                                    </div>
                                </a>

                                <ul class="nav-item collapse {{ Request::is('utiliti/generik/*') ? 'show' : 'false' }} my-1"
                                    id="generik">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/generik/agama') ? 'active' : '' }} py-0"
                                            href="/utiliti/generik/agama">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Agama</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/generik/bangsa') ? 'active' : '' }} py-0"
                                            href="/utiliti/generik/bangsa">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Bangsa</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/generik/sumber') ? 'active' : '' }} py-0"
                                            href="/utiliti/generik/sumber">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Sumber</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#kursus" role="button" data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('utiliti/kursus/*') ? 'true' : 'false' }}"
                                    aria-controls="kursus">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Kod Kursus</span>
                                    </div>
                                </a>

                                <ul class="nav-item collapse {{ Request::is('utiliti/kursus/*') ? 'show' : 'false' }} my-1"
                                    id="kursus">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/kursus/bidang_kursus') ? 'active' : '' }} py-0"
                                            href="/utiliti/kursus/bidang_kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Bidang Kursus</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/kursus/kategori_kursus') ? 'active' : '' }} py-0"
                                            href="/utiliti/kursus/kategori_kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kategori Kursus</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/kursus/kod_kursus') ? 'active' : '' }} py-0"
                                            href="/utiliti/kursus/kod_kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Kursus</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/kursus/gred_pegawai') ? 'active' : '' }} py-0"
                                            href="/utiliti/kursus/gred_pegawai">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Gred Pegawai</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/kursus/elaun_cuti_kursus') ? 'active' : '' }} py-0"
                                            href="/utiliti/kursus/elaun_cuti_kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Elaun/Cuti Kursus</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/kursus/kod_objek') ? 'active' : '' }} py-0"
                                            href="/utiliti/kursus/kod_objek">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Kod Objek</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#matlamat" role="button" data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('utiliti/matlamat_tahunan/*') ? 'true' : 'false' }}"
                                    aria-controls="matlamat">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Matlamat Tahunan</span>
                                    </div>
                                </a>
                                <ul class="nav-item collapse {{ Request::is('utiliti/matlamat_tahunan/*') ? 'show' : 'false' }} my-1"
                                    id="matlamat">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/matlamat_tahunan/kursus') ? 'active' : '' }} py-0"
                                            href="/utiliti/matlamat_tahunan/kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Matlamat Kursus</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/matlamat_tahunan/peserta') ? 'active' : '' }} py-0"
                                            href="/utiliti/matlamat_tahunan/peserta">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Matlamat Peserta</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/matlamat_tahunan/perbelanjaan') ? 'active' : '' }} py-0"
                                            href="/utiliti/matlamat_tahunan/perbelanjaan">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Matlamat Perbelanjaan</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('utiliti/matlamat_tahunan/panggilan_peserta') ? 'active' : '' }} py-0"
                                            href="/utiliti/matlamat_tahunan/panggilan_peserta">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Matlamat Panggilan Peserta Kursus</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endcan

                    {{-- Peserta ULS --}}

                    @if (auth()->user()->can('katelog kursus') || auth()->user()->can('status permohonan'))
                        @role('Peserta ULS')
                            <a class="nav-link py-0 dropdown-indicator" href="#permohonan" role="button"
                                data-bs-toggle="collapse"
                                aria-expanded="{{ Request::is('uls/permohonan/*') ? 'true' : 'false' }}"
                                aria-controls="permohonan">
                                <div class="d-flex align-items-center nav-link-side px-0">
                                    <span class="px-3"><span class="fas fa-file-alt"></span> PERMOHONAN
                                        KURSUS</span>
                                </div>
                            </a>
                            <ul class="nav-item collapse {{ Request::is('uls/permohonan/*') ? 'show' : 'false' }} my-1"
                                id="permohonan">
                                @can('katelog kursus')
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('uls/permohonan/katelog-kursus') ? 'active' : '' }} py-0"
                                            href="/uls/permohonan/katelog-kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">KATALOG KURSUS</span>
                                            </div>
                                        </a>
                                    </li>
                                @endcan
                                @can('status permohonan')
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('uls/permohonan/statuspermohonan') ? 'active' : '' }} py-0"
                                            href="/uls/permohonan/statuspermohonan">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">STATUS PERMOHONAN</span>
                                            </div>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        @endrole

                        {{-- Peserta ULPK --}}
                        @role('Peserta ULPK')
                            <a class="nav-link py-0 dropdown-indicator" href="#permohonan" role="button"
                                data-bs-toggle="collapse"
                                aria-expanded="{{ Request::is('ulpk/permohonan/*') ? 'true' : 'false' }}"
                                aria-controls="permohonan">
                                <div class="d-flex align-items-center nav-link-side px-0">
                                    <span class="px-3"><span class="fas fa-file-alt"></span> PERMOHONAN
                                        KURSUS</span>
                                </div>
                            </a>
                            <ul class="nav-item collapse {{ Request::is('ulpk/permohonan/*') ? 'show' : 'false' }} my-1"
                                id="permohonan">
                                @can('katelog kursus')
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('ulpk/permohonan/katelog-kursus') ? 'active' : '' }} py-0"
                                            href="/ulpk/permohonan/katelog-kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">KATALOG KURSUS</span>
                                            </div>
                                        </a>
                                    </li>
                                @endcan
                                @can('status permohonan')
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('ulpk/permohonan/statuspermohonan') ? 'active' : '' }} py-0"
                                            href="/ulpk/permohonan/statuspermohonan">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">STATUS PERMOHONAN</span>
                                            </div>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        @endrole
                    @endif

                    @can('kehadiran')
                        <a class="nav-link py-0 dropdown-indicator" href="#kehadiran" role="button"
                            data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('us-uls/kehadiran/*') ? 'true' : 'false' }}"
                            aria-controls="kehadiran">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="far fa-address-book"></span> KEHADIRAN</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('us-uls/kehadiran/*') ? 'show' : 'false' }} my-1"
                            id="kehadiran">
                            <li class="nav-item">
                                <a class="nav-link py-0 dropdown-indicator" href="#kehadiran-ke-kursus" role="button"
                                    data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('us-uls/kehadiran/ke-kursus/*') ? 'true' : 'false' }}"
                                    aria-controls="kehadiran-ke-kursus">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">KEHADIRAN KE KURSUS</span>
                                    </div>
                                </a>
                                <ul class="nav-item collapse {{ Request::is('us-uls/kehadiran/ke-kursus/*') ? 'show' : 'false' }} my-1"
                                    id="kehadiran-ke-kursus">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('us-uls/kehadiran/ke-kursus/merekod-kehadiran') ? 'active' : '' }} py-0"
                                            href="/us-uls/kehadiran/ke-kursus/merekod-kehadiran">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">MEREKOD KEHADIRAN</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-0  {{ Request::is('us-uls/kehadiran/ke-kursus/mengesahkan-kehadiran') ? 'active' : '' }}"
                                            href="/us-uls/kehadiran/ke-kursus/mengesahkan-kehadiran">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">MENGESAHKAN KEHADIRAN</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">KEHADIRAN KE PUSAT LATIHAN</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('us-uls/kehadiran/cetakkodQR') ? 'active' : '' }} py-0"
                                    href="/us-uls/kehadiran/cetakkodQR">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">CETAK KOD QR KURSUS</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">CETAK KOD QR PUSAT LATIHAN</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    @endcan

                    @can('pengajian lanjutan')
                        <a class="nav-link py-0 {{ Request::is('us-uls/pengajian-lanjutan') ? 'active' : '' }}"
                            href="/us-uls/pengajian-lanjutan" role="button">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="far fa-address-book"></span> PENGAJIAN
                                    LANJUTAN</span>
                            </div>
                        </a>
                    @endcan


                    @can('penilaian')
                        <a class="nav-link py-0 dropdown-indicator" href="#penilaian" role="button"
                            data-bs-toggle="collapse" aria-expanded="{{ Request::is('penilaian/*') ? 'true' : 'false' }}"
                            aria-controls="penilaian">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                @if (auth()->user()->jenis_pengguna == 'Peserta ULS' || auth()->user()->jenis_pengguna == 'Peserta ULPK')
                                    <span class="px-3"><span class="fab fa-wpforms"></span> PENILAIAN</span>
                                @else
                                    <span class="px-3"><span class="fab fa-wpforms"></span> PENGURUSAN
                                        PENILAIAN</span>
                                @endif
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('penilaian/*') ? 'show' : 'false' }} my-1"
                            id="penilaian">
                            @can('jawab penilaian')
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="/penilaian/penilaian-kursus">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">PENILAIAN KURSUS</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="/penilaian/jawab-pre-post-test">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">PENILAIAN PRE TEST</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link py-0" href="{{ route('jawab-post.index') }}"> --}}
                                    <a class="nav-link py-0" href="/penilaian/jawab-post-test">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">PENILAIAN POST TEST</span>
                                        </div>
                                    </a>
                                </li>
                            @endcan

                            @can('cipta penilaian')

                                <li class="nav-item">
                                    <a class="nav-link py-0" href="/penilaian/pre-post-test">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">PENILAIAN PRE TEST DAN POST TEST</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link py-0" href="/penilaian/penilaian-kursus/ulpk">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">PENILAIAN KURSUS</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link py-0" href="/penilaian/keberkesanan-kursus">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">PENILAIAN KEBERKESANAN KURSUS</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="/penilaian/ejen-pelaksana">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">PENILAIAN EJEN PELAKSANA</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="/penilaian/cetakQr">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">CETAK KOD QR</span>
                                        </div>
                                    </a>
                                </li>
                            @endcan


                        </ul>
                    @endcan

                    @can('laporan')
                        <a class="nav-link py-0 dropdown-indicator" href="#laporan" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('laporan/*') ? 'true' : 'false' }}" aria-controls="laporan">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="fab fa-wpforms"></span> Laporan</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('laporan/*') ? 'show' : 'false' }} my-1"
                            id="laporan">
                            <li class="nav-item">
                                <a class="nav-link py-0 dropdown-indicator" href="#laporan-am" role="button"
                                    data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('laporan/laporan-am/*') ? 'true' : 'false' }}"
                                    aria-controls="laporan-am">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Laporan Am</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0 dropdown-indicator" href="#laporan-lain" role="button"
                                    data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('laporan/laporan-lain/*') ? 'true' : 'false' }}"
                                    aria-controls="laporan-lain">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">Laporan Lain</span>
                                    </div>
                                </a>
                                <ul class="nav-item collapse {{ Request::is('laporan/laporan-lain/*') ? 'show' : 'false' }} my-1"
                                    id="laporan-lain">

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-pencapaian-matlamat-kehadiran') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-pencapaian-matlamat-kehadiran">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Pencapaian Matlamat Kehadiran</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-perbelanjaan-mengikut-pusat-tanggungjawab') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-perbelanjaan-mengikut-pusat-tanggungjawab">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Perbelanjaan Mengikut Pusat
                                                    Tanggungjawab</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-perbelanjaan-mengikut-lokaliti') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-perbelanjaan-mengikut-lokaliti">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Perbelanjaan Mengikut Lokaliti</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-prestasi-kehadiran-peserta') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-prestasi-kehadiran-peserta">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Prestasi Kehadiran Peserta</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-kehadiran-7-hari-setahun') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-kehadiran-7-hari-setahun">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Kehadiran 7 Hari Setahun</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-ringkasan-penceramah-kursus') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-ringkasan-penceramah-kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Ringkasan Penceramah Kursus</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-pencapaian-latihan-mengikut-negeri') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-pencapaian-latihan-mengikut-negeri">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Pencapaian Latihan Mengikut
                                                    Negeri</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-kehadiran-peserta') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-kehadiran-peserta">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Kehadiran Peserta</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-pelaksanaan-latihan-staf') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-pelaksanaan-latihan-staf">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Pelaksanaan Latihan Staf</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-kewangan-terperinci') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-kewangan-terperinci">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Kewangan Terperinci</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-ringkasan-jenis-kursus') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-ringkasan-jenis-kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Ringkasan Jenis Kursus</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-ringkasan-bidang-kursus') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-ringkasan-bidang-kursus">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Ringkasan Bidang Kursus</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('laporan/laporan-lain/laporan-penilaian-peserta') ? 'active' : '' }} py-0"
                                            href="/laporan/laporan-lain/laporan-penilaian-peserta">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">Laporan Penilaian Peserta</span>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    @endcan

                    @can('UlpkUrusSetia')
                        <a class="nav-link py-0 dropdown-indicator" href="#kehadiran" role="button"
                            data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('us-ulpk/kehadiran/*') ? 'true' : 'false' }}"
                            aria-controls="kehadiran">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="far fa-address-book"></span> KEHADIRAN</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('us-ulpk/kehadiran/*') ? 'show' : 'false' }} my-1"
                            id="kehadiran">
                            <li class="nav-item">
                                <a class="nav-link py-0 dropdown-indicator" href="#kehadiran-ke-kursus" role="button"
                                    data-bs-toggle="collapse"
                                    aria-expanded="{{ Request::is('us-ulpk/kehadiran/ke-kursus/*') ? 'true' : 'false' }}"
                                    aria-controls="kehadiran-ke-kursus">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">KEHADIRAN KE KURSUS</span>
                                    </div>
                                </a>
                                <ul class="nav-item collapse {{ Request::is('us-ulpk/kehadiran/ke-kursus/*') ? 'show' : 'false' }} my-1"
                                    id="kehadiran-ke-kursus">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('us-ulpk/kehadiran/ke-kursus/merekod-kehadiran') ? 'active' : '' }} py-0"
                                            href="/us-ulpk/kehadiran/ke-kursus/merekod-kehadiran">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">MEREKOD KEHADIRAN</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-0  {{ Request::is('us-ulpk/kehadiran/ke-kursus/mengesahkan-kehadiran') ? 'active' : '' }}"
                                            href="/us-ulpk/kehadiran/ke-kursus/mengesahkan-kehadiran">
                                            <div class="d-flex align-items-center nav-link-side">
                                                <span class="px-0">MENGESAHKAN KEHADIRAN</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">KEHADIRAN KE PUSAT LATIHAN</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('us-ulpk/kehadiran/cetakkodQR') ? 'active' : '' }} py-0"
                                    href="/us-ulpk/kehadiran/cetakkodQR">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">CETAK KOD QR KURSUS</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0" href="#">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span class="px-0">CETAK KOD QR PUSAT LATIHAN</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a class="nav-link py-0 {{ Request::is('us-ulpk/pengajian-lanjutan') ? 'active' : '' }}"
                            href="/us-ulpk/pengajian-lanjutan" role="button">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="far fa-address-book"></span> PENGAJIAN
                                    LANJUTAN</span>
                            </div>
                        </a>
                    @endcan



                </li>
                @php
                    $pelawat = Dashboard::where('status', 'masuk')->get();
                    $jumlah_pelawat = count($pelawat);
                @endphp
                <div class="row navbar-vertical-label-wrapper mt-4 mb-2">
                    <span class="text-white text-center"> Jumlah Pelawat: {{$jumlah_pelawat}}</span>
                </div>
            </ul>
        </div>
    </div>
</nav>

<script>
    // (function($) {
    //     var $window = $(window),
    //         $html = $('#checklim');

    //     $window.resize(function resize() {
    //         if ($window.width() < 601) {
    //             return $html.addClass('scrollbar');
    //         }

    //         $html.removeClass('scrollbar');
    //     }).trigger('resize');
    // })(jQuery);
</script>
