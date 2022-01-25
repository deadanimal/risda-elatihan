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

    /* .nav-link-text {
        color: white;
    }

    .nav-link-text.active {
        color: white;
        background-color: #009640;
    } */

</style>

<div class="p-5">
    <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        <div class="row">
            <div class="col">
                <h5 class="text-white text-center">Selamat Datang</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card risda-bg-dg">

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

                                <div class="modal fade" id="tukar-password" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document"
                                        style="max-width: 500px">
                                        <div class="modal-content position-relative">
                                            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                <button
                                                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/profil/{{ Auth::id() }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body p-0">
                                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                        <h4 class="mb-1" id="modalExampleDemoLabel">Tukar Kata
                                                            Laluan</h4>
                                                    </div>
                                                    <div class="p-4 pb-0">

                                                        <div class="mb-3">
                                                            <label class="col-form-label">Kata Laluan Sekarang:</label>
                                                            <input class="form-control" type="password"
                                                                name="kl_sekarang" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label">Kata Laluan Baru:</label>
                                                            <input class="form-control" type="password"
                                                                name="kl_baru" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-success" type="submit">Tukar Kata Laluan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="col d-grid gap-2">
                                        <button type="submit" class="btn btn-light text-success">Log Keluar</button>
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
        <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label text-white">
                    Menu
                </div>
                <div class="col ps-0">
                    <hr class="mb-0 navbar-vertical-divider" />
                </div>
            </div>
            <a class="nav-link py-0" href="/dashboard" role="button">
                <div class="d-flex align-items-center nav-link-side px-0">
                    <span class="px-3"><span class="fas fa-home"></span> DASHBOARD</span>
                </div>
            </a>

            {{-- Peserta ULS --}}
            @can('UlsPeserta')
                <a class="nav-link py-0 dropdown-indicator" href="#permohonan" role="button" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="permohonan">
                    <div class="d-flex align-items-center nav-link-side px-0">
                        <span class="px-3"><span class="fas fa-file-alt"></span> PERMOHONAN KURSUS</span>
                    </div>
                </a>
                <ul class="nav-item collapse false my-1" id="permohonan">
                    <li class="nav-item">
                        <a class="nav-link py-0" href="#">
                            <div class="d-flex align-items-center nav-link-side">
                                <span class="px-0">KATALOG KURSUS</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-0" href="/uls/permohonan/statuspermohonan">
                            <div class="d-flex align-items-center nav-link-side">
                                <span class="px-0">STATUS PERMOHONAN</span>
                            </div>
                        </a>
                    </li>
                </ul>

            @endcan

            {{-- Peserta ULPK --}}
            @can('UlpkPeserta')
                <a class="nav-link py-0 dropdown-indicator" href="#permohonan" role="button" data-bs-toggle="collapse"
                    aria-expanded="{{ Request::is('ulpk/permohonan/*') ? 'true' : 'false' }}" aria-controls="permohonan">
                    <div class="d-flex align-items-center nav-link-side px-0">
                        <span class="px-3"><span class="fas fa-file-alt"></span> PERMOHONAN KURSUS</span>
                    </div>
                </a>
                <ul class="nav-item collapse {{ Request::is('ulpk/permohonan/*') ? 'show' : 'false' }} my-1"
                    id="permohonan">
                    <li class="nav-item">
                        <a class="nav-link py-0" href="#">
                            <div class="d-flex align-items-center nav-link-side">
                                <span class="px-0">KATALOG KURSUS</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('ulpk/permohonan/statuspermohonan/') ? 'active' : '' }} py-0"
                            href="/ulpk/permohonan/statuspermohonan">
                            <div class="d-flex align-items-center nav-link-side">
                                <span class="px-0">STATUS PERMOHONAN</span>
                            </div>
                        </a>
                    </li>
                </ul>

            @endcan

            @can('UlsUrusSetia')
                <a class="nav-link py-0 dropdown-indicator" href="#kehadiran" role="button" data-bs-toggle="collapse"
                    aria-expanded="{{ Request::is('us-uls/kehadiran/*') ? 'true' : 'false' }}" aria-controls="kehadiran">
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
                <a class="nav-link py-0 {{ Request::is('us-uls/pengajian-lanjutan') ? 'active' : '' }}"
                    href="/us-uls/pengajian-lanjutan" role="button">
                    <div class="d-flex align-items-center nav-link-side px-0">
                        <span class="px-3"><span class="far fa-address-book"></span> PENGAJIAN LANJUTAN</span>
                    </div>
                </a>
            @endcan

            @can('UlpkUrusSetia')
                <a class="nav-link py-0 dropdown-indicator" href="#kehadiran" role="button" data-bs-toggle="collapse"
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
                        <span class="px-3"><span class="far fa-address-book"></span> PENGAJIAN LANJUTAN</span>
                    </div>
                </a>
            @endcan



            <a class="nav-link py-0 dropdown-indicator" href="#utiliti" role="button" data-bs-toggle="collapse"
                aria-expanded="{{ Request::is('utiliti/*') ? 'true' : 'false' }}" aria-controls="utiliti">
                <div class="d-flex align-items-center nav-link-side px-0">
                    <span class=" px-3"><span class="fas fa-clone"></span> UTILITI</span>
                </div>
            </a>
            <ul class="nav-item collapse {{ Request::is('utiliti/*') ? 'show' : 'false' }} my-1" id="utiliti">
                <li class="nav-item">
                    <a class="nav-link py-0 dropdown-indicator" href="#negeri" role="button" data-bs-toggle="collapse"
                        aria-expanded="{{ Request::is('utiliti/lokasi/*') ? 'true' : 'false' }}" aria-controls="negeri">
                        <div class="d-flex align-items-center nav-link-side">
                            <span class="px-0">Kod Lokasi</span>
                        </div>
                    </a>
                    <ul class="nav-item collapse {{ Request::is('utiliti/lokasi/*') ? 'show' : 'false' }} my-1" id="negeri">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/lokasi/negeri') ? 'active' : '' }} py-0" href="/utiliti/lokasi/negeri">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Negeri</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/lokasi/daerah') ? 'active' : '' }} py-0" href="/utiliti/lokasi/daerah">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Daerah</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/lokasi/mukim') ? 'active' : '' }} py-0" href="/utiliti/lokasi/mukim">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Mukim</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/lokasi/parlimen') ? 'active' : '' }} py-0" href="/utiliti/lokasi/parlimen">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Parlimen</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/lokasi/dun') ? 'active' : '' }} py-0" href="/utiliti/lokasi/dun">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Dun</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/lokasi/kampung') ? 'active' : '' }} py-0" href="/utiliti/lokasi/kampung">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Kampung</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/lokasi/seksyen') ? 'active' : '' }} py-0" href="/utiliti/lokasi/seksyen">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Seksyen</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/lokasi/stesen') ? 'active' : '' }} py-0" href="/utiliti/lokasi/stesen">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Stesen</span>
                                </div>
                            </a>

                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a class="nav-link py-0" href="#kumpulan" role="button" data-bs-toggle="collapse" aria-expanded="{{ Request::is('utiliti/kumpulan/*') ? 'true' : 'false' }}" aria-controls="kumpulan">
                        <div class="d-flex align-items-center nav-link-side">
                            <span class="px-0">Kod Kumpulan</span>
                        </div>
                    </a>

                    <ul class="nav-item collapse {{ Request::is('utiliti/kumpulan/*') ? 'show' : 'false' }} my-1" id="kumpulan">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kumpulan/kategori_agensi') ? 'active' : '' }} py-0" href="/utiliti/kumpulan/kategori_agensi">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kategori Agensi</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kumpulan/agensi') ? 'active' : '' }} py-0" href="/utiliti/kumpulan/agensi">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Senarai Agensi</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kumpulan/pusat_tanggungjawab') ? 'active' : '' }} py-0" href="/utiliti/kumpulan/pusat_tanggungjawab">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Pusat Tanggungjawab</span>
                                </div>
                            </a>
        
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-0" href="#julat" role="button" data-bs-toggle="collapse" aria-expanded="{{ Request::is('utiliti/julat/*') ? 'true' : 'false' }}" aria-controls="julat">
                        <div class="d-flex align-items-center nav-link-side">
                            <span class="px-0">Kod Julat</span>
                        </div>
                    </a>
                    <ul class="nav-item collapse {{ Request::is('utiliti/julat/*') ? 'show' : 'false' }} my-1" id="julat">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/julat/julat_tahunan') ? 'active' : '' }} py-0" href="/utiliti/julat/julat_tahunan">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Julat Tahunan</span>
                                </div>
                            </a>
        
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-0" href="#status" role="button" data-bs-toggle="collapse" aria-expanded="{{ Request::is('utiliti/status/*') ? 'true' : 'false' }}" aria-controls="status">
                        <div class="d-flex align-items-center nav-link-side">
                            <span class="px-0">Kod Status</span>
                        </div>
                    </a>
                    <ul class="nav-item collapse {{ Request::is('utiliti/status/*') ? 'show' : 'false' }} my-1" id="status">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/status/status_pelaksanaan') ? 'active' : '' }} py-0" href="/utiliti/status/status_pelaksanaan">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Status Pelaksanaan</span>
                                </div>
                            </a>
        
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-0" href="#generik" role="button" data-bs-toggle="collapse" aria-expanded="{{ Request::is('utiliti/generik/*') ? 'true' : 'false' }}" aria-controls="generik">
                        <div class="d-flex align-items-center nav-link-side">
                            <span class="px-0">Kod Generik</span>
                        </div>
                    </a>

                    <ul class="nav-item collapse {{ Request::is('utiliti/generik/*') ? 'show' : 'false' }} my-1" id="generik">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/generik/agama') ? 'active' : '' }} py-0" href="/utiliti/generik/agama">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Agama</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/generik/bangsa') ? 'active' : '' }} py-0" href="/utiliti/generik/bangsa">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Bangsa</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/generik/sumber') ? 'active' : '' }} py-0" href="/utiliti/generik/sumber">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Sumber</span>
                                </div>
                            </a>
        
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-0" href="#kursus" role="button" data-bs-toggle="collapse" aria-expanded="{{ Request::is('utiliti/kursus/*') ? 'true' : 'false' }}" aria-controls="kursus">
                        <div class="d-flex align-items-center nav-link-side">
                            <span class="px-0">Kod Kursus</span>
                        </div>
                    </a>

                    <ul class="nav-item collapse {{ Request::is('utiliti/kursus/*') ? 'show' : 'false' }} my-1" id="kursus">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kursus/bidang_kursus') ? 'active' : '' }} py-0" href="/utiliti/kursus/bidang_kursus">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Bidang Kursus</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kursus/kategori_kursus') ? 'active' : '' }} py-0" href="/utiliti/kursus/kategori_kursus">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kategori Kursus</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kursus/kod_kursus') ? 'active' : '' }} py-0" href="/utiliti/kursus/kod_kursus">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Kursus</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kursus/gred_pegawai') ? 'active' : '' }} py-0" href="/utiliti/kursus/gred_pegawai">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Gred Pegawai</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kursus/elaun_cuti_kursus') ? 'active' : '' }} py-0" href="/utiliti/kursus/elaun_cuti_kursus">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Elaun/Cuti Kursus</span>
                                </div>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('utiliti/kursus/kod_objek') ? 'active' : '' }} py-0" href="/utiliti/kursus/kod_objek">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Kod Objek</span>
                                </div>
                            </a>
        
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- <a class="nav-link-side dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="email">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-envelope-open"></span></span><span class="nav-link-text ps-1">Email</span>
                </div>
            </a>
            <ul class="nav collapse false" id="email">
                <li class="nav-item"><a class="nav-link" href="../app/email/inbox.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Inbox</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/email/email-detail.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email detail</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/email/compose.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Compose</span>
                        </div>
                    </a>

                </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="events">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1">Events</span>
                </div>
            </a>
            <ul class="nav collapse false" id="events">
                <li class="nav-item"><a class="nav-link" href="../app/events/create-an-event.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create an event</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/events/event-detail.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event detail</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/events/event-list.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event list</span>
                        </div>
                    </a>

                </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="e-commerce">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">E
                        commerce</span>
                </div>
            </a>
            <ul class="nav collapse false" id="e-commerce">
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#product"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product</span>
                        </div>
                    </a>

                    <ul class="nav collapse false" id="product">
                        <li class="nav-item"><a class="nav-link"
                                href="../app/e-commerce/product/product-list.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product
                                        list</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="../app/e-commerce/product/product-grid.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product
                                        grid</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="../app/e-commerce/product/product-details.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product
                                        details</span>
                                </div>
                            </a>

                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#orders"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders</span>
                        </div>
                    </a>

                    <ul class="nav collapse false" id="orders">
                        <li class="nav-item"><a class="nav-link"
                                href="../app/e-commerce/orders/order-list.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order
                                        list</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="../app/e-commerce/orders/order-details.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order
                                        details</span>
                                </div>
                            </a>

                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="../app/e-commerce/customers.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customers</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/e-commerce/customer-details.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customer
                                details</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/e-commerce/shopping-cart.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Shopping cart</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/e-commerce/checkout.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Checkout</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/e-commerce/billing.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Billing</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/e-commerce/invoice.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invoice</span>
                        </div>
                    </a>

                </li>
            </ul>
            <a class="nav-link" href="../app/kanban.html" role="button">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Kanban</span>
                </div>
            </a>
            <a class="nav-link dropdown-indicator" href="#social" role="button" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="social">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-share-alt"></span></span><span class="nav-link-text ps-1">Social</span>
                </div>
            </a>
            <ul class="nav collapse false" id="social">
                <li class="nav-item"><a class="nav-link" href="../app/social/feed.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Feed</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/social/activity-log.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Activity log</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/social/notifications.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Notifications</span>
                        </div>
                    </a>

                </li>
                <li class="nav-item"><a class="nav-link" href="../app/social/followers.html">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Followers</span>
                        </div>
                    </a>

                </li>
            </ul> --}}
        </li>
    </ul>
</div>
