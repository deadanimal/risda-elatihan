<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>RISDA | e-LATIHAN</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/risda_logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/risda_logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/risda_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="/img/risda_logo.png">
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    {{-- <link href="vendors/dropzone/dropzone.min.css" rel="stylesheet" /> --}}
    <meta name="msapplication-TileImage" content="/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="/assets/js/config.js"></script>
    <script src="/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    {{-- <script src="vendors/dropzone/dropzone.min.js"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="/assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="/assets/js/datatables.js"></script>
    <script src="/assets/js/flatpickr.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="/vendors/choices/choices.min.js"></script>
    <link href="/vendors/choices/choices.min.css" rel="stylesheet" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
        rel="stylesheet">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="/vendors/leaflet/leaflet.css" rel="stylesheet">
    <link href="/vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="/vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">
    <link href="/vendors/fullcalendar/main.min.css" rel="stylesheet">
    <link href="/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" type="text/css" href="/assets/css/datatables.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/datatables.min.css" />


    <script>
        var APP_URL = {!! json_encode(url('/')) !!}

        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>
<img src="/img/risda-banner.jpg" alt="banner" width="100%">

<body>
    <style>

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            background: none repeat scroll 0 0 #ffffff75;
        }

        .word {
            position: absolute;
            margin-top: 120px;
            margin-left: 25px;
            font-weight: bold;
        }

        .spinner {
            border: 1px solid transparent;
            border-radius: 3px;
            position: relative;
        }

        .spinner:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 45px;
            height: 45px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 5px solid #009640;
            border-top-color: #ffffff00;
            animation: spinner 0.9s linear infinite;
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

    </style>
    @include('sweet::alert')
    <style>
        .form-control {
            border-color: #009640;
        }

        .risda-dg {
            color: #0F5E31;
        }

        .risda-bg-dg {
            background-color: #0F5E31;
        }

        .risda-g {
            color: #009640;
        }

        .risda-bg-g {
            background-color: #009640;
        }

        .nav-link-risda {
            color: #0F5E31;
        }

        .nav-link-risda.active {
            background-color: #0F5E31;
            color: white;
        }

        .nav-link.active {
            background-color: #0F5E31;
            color: white;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #0F5E31;
        }

        .nav-link {
            display: block;
            padding: 0.5rem 1rem;
            color: #009640;
            -webkit-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
            -o-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: #fff;
            background-color: #0F5E31;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-primary,
        .navbar-vertical .btn-purchase,
        .tox .tox-menu__footer .tox-button:last-child,
        .tox .tox-dialog__footer .tox-button:last-child {
            color: #fff;
            background-color: #009640;
            border-color: #009640;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }

        .btn-primary:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #fff;
            background-color: #0F5E31;
            border-color: #0F5E31;
        }

        .btn-check:focus+.btn-primary,
        .navbar-vertical .btn-check:focus+.btn-purchase,
        .tox .tox-menu__footer .btn-check:focus+.tox-button:last-child,
        .tox .tox-dialog__footer .btn-check:focus+.tox-button:last-child,
        .btn-primary:focus,
        .navbar-vertical .btn-purchase:focus,
        .tox .tox-menu__footer .tox-button:focus:last-child,
        .tox .tox-dialog__footer .tox-button:focus:last-child {
            color: #fff;
            background-color: #009640;
            border-color: #009640;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%), 0 0 0 0 rgb(76 143 233 / 50%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%), 0 0 0 0 rgb(76 143 233 / 50%);
        }

        .btn-outline-primary {
            color: #009640;
            border-color: #009640;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #0F5E31;
            border-color: #0F5E31;
        }

        .nav-link-side {
            /* display: block; */
            padding: 0.5rem 1rem;
            color: #fff;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
            -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .nav-link-side {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .nav-link-side:hover,
        .nav-link-side:focus {
            color: #fff;
            background-color: #0F5E31;
            text-decoration: none;
            border-radius: 5px;
        }

        .nav-link-side.disabled {
            color: #748194;
            pointer-events: none;
            cursor: default;
        }

        li {
            display: list-item;
            color: #009640;
            text-align: -webkit-match-parent;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: var(--falcon-pagination-active-color);
            background-color: #009640;
            border-color: #009640;
        }

        .dropdown-indicator:after {
            content: "";
            display: block;
            position: absolute;
            right: 5 px;
            height: 0.4 rem;
            width: 0.4 rem;
            border-right: 1 px solid white;
            border-bottom: 1 px solid white;
            top: 50%;
            -webkit-transform: translateY(-50%) rotate(45deg);
            -ms-transform: translateY(-50%) rotate(45deg);
            transform: translateY(-50%) rotate(45deg);
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            -webkit-transform-origin: center;
            -ms-transform-origin: center;
            transform-origin: center;
            -webkit-transition-property: border-color, -webkit-transform;
            transition-property: border-color, -webkit-transform;
            -o-transition-property: transform, border-color;
            transition-property: transform, border-color;
            transition-property: transform, border-color, -webkit-transform;
        }

        @media (min-width: 601px) {
            .navbar-vertical.navbar-expand-xl {
                max-width: 350px;
                top: 0;
                height: 100%;
                margin: 0;
            }

            .navbar-vertical.navbar-expand-xl .navbar-collapse {
                width: 100%;
                height: 100%;
                background: #009640;
            }

            .navbar-vertical.navbar-expand-xl .navbar-vertical-content {
                width: 100%;
                height: 100%;
                padding: 0.5rem 0 0 0;
            }

            .navbar-vertical {
                position: absolute;
                background: #009640;
                max-width: 350px;
            }

            .navbar-vertical-content {
                background: #009640;
                width: 350px;
            }

            .navbar-nav {
                background: #009640;
                width: 350px;
            }

            .risda-m {
                margin-left: 350px;
            }

            .navbar-vertical .navbar-collapse .navbar-vertical-content {
                padding: 0 1rem;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                max-height: 100%;
            }
        }

        @media only screen and (max-width: 1024px) {
            .risda-m {
                margin-left: 0px;
            }

            .navbar-vertical {
                position: absolute;
                background: #009640;
                max-width: 100%;
            }

            .navbar-vertical.navbar-expand-xl {
                max-width: 100%;
                top: 40px;
                height: auto;
                margin: 0;

            }

            .navbar-vertical.navbar-expand-xl .navbar-collapse {
                width: 100%;
                height: auto;
                background: #009640;
            }

            .navbar-vertical.navbar-expand-xl .navbar-vertical-content {
                width: 100%;
                height: auto;
                padding: 0.5rem 0 0 0;
            }

            .navbar-vertical {
                position: absolute;
                background: #009640;
                max-width: 100%;
            }

            .navbar-vertical-content {
                background: #009640;
                width: 100%;
            }
        }

        .form-check-input:checked {
            background-color: #009640;
            border-color: #009640;
        }

        .flatpickr-day.selected {
            background-color: #009640;
            border-color: #009640;
        }

        .choices .choices__list--dropdown .choices__item--selectable.is-highlighted {
            background-color: #009640;
            color: var(--falcon-choices-item-selectable-highlighted-bg);
        }
    </style>
    <?php
    use Illuminate\Support\Facades\Auth;
    ?>
    {{-- <nav class="">
        <img src="/img/risda-banner.jpg" alt="banner" width="100%">
    </nav> --}}

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('layouts.risda-side-bar')
            <div class="row">
                {{-- <div class="col-3 p-0" style="background-color: #009640;">
            @include('layouts.risda-side-bar')
          </div> --}}
                {{-- <div class="col p-0" style="background-color:white"> --}}
                <div class="content" style="background: white">
                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                        <span class="navbar-toggle-icon">
                            <span class="toggle-line"></span>
                        </span>
                    </button>

                    <div class=" risda-m">
                        @yield('content')
                    </div>

                    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  @include('sweet::alert') --}}
                </div>
                {{-- </div> --}}
            </div>
        </div>
        <section class="preloader" id="preload2">
            <div class="spinner" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="word">
                <span>Sila Tunggu...</span>
            </div>
        </section>


        <footer class="risda-bg-dg">
            <div class="row p-4">
                <div class="col">
                    <div class="text-600 text-white">
                        Copyright © 2021 SISTEM MAKLUMAT LATIHAN (e-LATIHAN)
                    </div>
                </div>
            </div>
        </footer>

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script>
        $(document).ready(function() {
            $('#preload2').hide();
        });

        $('.up-switch-risda').click(function() {
            $('#preload2').show();
        });

        $(document).load(function() {
            $('#preload2').show();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script src="/vendors/popper/popper.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/vendors/anchorjs/anchor.min.js"></script>
    <script src="/vendors/is/is.min.js"></script>
    <script src="/vendors/chart/chart.min.js"></script>
    <script src="/vendors/leaflet/leaflet.js"></script>
    <script src="/vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    <script src="/vendors/countup/countUp.umd.js"></script>
    <script src="/vendors/echarts/echarts.min.js"></script>
    <script src="/vendors/progressbar/progressbar.min.js"></script>
    <script src="/vendors/fullcalendar/main.min.js"></script>
    <script src="/assets/js/flatpickr.js"></script>
    <script src="/vendors/dayjs/dayjs.min.js"></script>
    <script src="/vendors/fontawesome/all.min.js"></script>
    <script src="/vendors/lodash/lodash.min.js"></script>
    <script src="/vendors/list.js/list.min.js"></script>
    <script src="/assets/js/theme.js"></script>

    <script src="/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            setInterval(() => {
                const today = new Date();
                let day = today.getDate();
                const bulan = ['Januari', 'Februari', 'Mac', 'April', 'May', 'Jun', 'Julai', 'Ogos',
                    'September', 'Oktober', 'November', 'Disember'
                ];
                let month = bulan[today.getMonth()];
                let year = today.getFullYear();
                let h = today.getHours();
                let m = today.getMinutes();
                let s = today.getSeconds();
                if (m < 10) m = "0" + m;
                if (s < 10) s = "0" + s;
                if (day < 10) day = "0" + day;
                document.getElementById("time").innerHTML = h + ":" + m + ":" + s;
                document.getElementById("date").innerHTML =
                    day + " " + month + " " + year;
            }, 1000);



            $('.datatable').DataTable();




            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });

        });
    </script>
</body>



</html>
