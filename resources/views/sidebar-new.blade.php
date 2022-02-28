<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../assets/js/config.js"></script>
    <script src="../vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="../vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="../assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
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

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
                <script>
                    var navbarStyle = localStorage.getItem("navbarStyle");
                    if (navbarStyle && navbarStyle !== 'transparent') {
                        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                    }
                </script>
                <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">

                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                    class="toggle-line"></span></span></button>

                    </div>
                    <div style=""></div>
                </div>
                <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                    <div class="navbar-vertical-content scrollbar">
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
                                                        <img src="/{{ Auth::user()->gambar_profil }}"
                                                            alt="profile_picture"
                                                            style="border-radius: 25px; border: 2px solid #73AD21; width:108px; height:108.9px; object-fit: cover;">
                                                    @endif
                                                </div>
                                            </div>
                                            <h3 class="h5 text-white text-center">
                                                <strong>{{ Auth::user()->name }}</strong></h3>
                                            <div class="row mt-3">
                                                <div class="col d-grid gap-2">

                                                    <a href="/profil" class="btn btn-light text-success">Profil</a>

                                                    <a href="#tukar-password" data-bs-toggle="modal"
                                                        class="btn btn-light text-success">Tukar Kata Laluan</a>

                                                    <div class="modal fade" id="tukar-password" tabindex="-1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                                            style="max-width: 500px">
                                                            <div class="modal-content position-relative">
                                                                <div
                                                                    class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                                    <button
                                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="/profil/{{ Auth::id() }}"
                                                                    method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="modal-body p-0">
                                                                        <div
                                                                            class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                                            <h4 class="mb-1"
                                                                                id="modalExampleDemoLabel">Tukar Kata
                                                                                Laluan</h4>
                                                                        </div>
                                                                        <div class="p-4 pb-0">

                                                                            <div class="mb-3">
                                                                                <label class="col-form-label">Kata
                                                                                    Laluan Sekarang:</label>
                                                                                <input class="form-control"
                                                                                    type="password"
                                                                                    name="kl_sekarang" />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="col-form-label">Kata
                                                                                    Laluan Baru:</label>
                                                                                <input class="form-control"
                                                                                    type="password" name="kl_baru" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary" type="button"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button class="btn btn-success"
                                                                            type="submit">Tukar Kata Laluan
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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
                            <li class="nav-item">
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard"
                                    role="button" data-bs-toggle="collapse" aria-expanded="true"
                                    aria-controls="dashboard">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-chart-pie"></span></span><span
                                            class="nav-link-text ps-1">Dashboard</span>
                                    </div>
                                </a>
                                <ul class="nav collapse show" id="dashboard">
                                    <li class="nav-item"><a class="nav-link" href="../index.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Default</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../dashboard/analytics.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Analytics</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="../dashboard/crm.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">CRM</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../dashboard/e-commerce.html">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">E
                                                    commerce</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../dashboard/project-management.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Management</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link active" href="../dashboard/saas.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">SaaS</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <!-- label-->
                                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                    <div class="col-auto navbar-vertical-label">App
                                    </div>
                                    <div class="col ps-0">
                                        <hr class="mb-0 navbar-vertical-divider" />
                                    </div>
                                </div>
                                <!-- parent pages--><a class="nav-link" href="../app/calendar.html" role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-calendar-alt"></span></span><span
                                            class="nav-link-text ps-1">Calendar</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link" href="../app/chat.html" role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-comments"></span></span><span
                                            class="nav-link-text ps-1">Chat</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#email" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-envelope-open"></span></span><span
                                            class="nav-link-text ps-1">Email</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="email">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/email/inbox.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Inbox</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/email/email-detail.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Email detail</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/email/compose.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Compose</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#events" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-calendar-day"></span></span><span
                                            class="nav-link-text ps-1">Events</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="events">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/events/create-an-event.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Create an event</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/events/event-detail.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Event detail</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/events/event-list.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Event list</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#e-commerce"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="e-commerce">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-shopping-cart"></span></span><span
                                            class="nav-link-text ps-1">E commerce</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="e-commerce">
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#product"
                                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Product</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="product">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../app/e-commerce/product/product-list.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Product list</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../app/e-commerce/product/product-grid.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Product grid</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../app/e-commerce/product/product-details.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Product details</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#orders"
                                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Orders</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="orders">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../app/e-commerce/orders/order-list.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Order list</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../app/e-commerce/orders/order-details.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Order details</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/e-commerce/customers.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Customers</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/e-commerce/customer-details.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Customer details</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/e-commerce/shopping-cart.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Shopping cart</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/e-commerce/checkout.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Checkout</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/e-commerce/billing.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Billing</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/e-commerce/invoice.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Invoice</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link" href="../app/kanban.html" role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fab fa-trello"></span></span><span
                                            class="nav-link-text ps-1">Kanban</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#social" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-share-alt"></span></span><span
                                            class="nav-link-text ps-1">Social</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="social">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/social/feed.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Feed</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/social/activity-log.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Activity log</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/social/notifications.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Notifications</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../app/social/followers.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Followers</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <!-- label-->
                                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                    <div class="col-auto navbar-vertical-label">Pages
                                    </div>
                                    <div class="col ps-0">
                                        <hr class="mb-0 navbar-vertical-divider" />
                                    </div>
                                </div>
                                <!-- parent pages--><a class="nav-link" href="../pages/starter.html"
                                    role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-flag"></span></span><span
                                            class="nav-link-text ps-1">Starter</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link" href="../pages/landing.html"
                                    role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-globe"></span></span><span
                                            class="nav-link-text ps-1">Landing</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#authentication"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="authentication">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-lock"></span></span><span
                                            class="nav-link-text ps-1">Authentication</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="authentication">
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#simple"
                                            data-bs-toggle="collapse" aria-expanded="false"
                                            aria-controls="authentication">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Simple</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="simple">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/simple/login.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Login</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/simple/logout.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Logout</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/simple/register.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Register</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/simple/forgot-password.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Forgot password</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/simple/confirm-mail.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Confirm mail</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/simple/reset-password.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Reset password</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/simple/lock-screen.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Lock screen</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#card"
                                            data-bs-toggle="collapse" aria-expanded="false"
                                            aria-controls="authentication">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Card</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="card">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/card/login.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Login</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/card/logout.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Logout</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/card/register.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Register</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/card/forgot-password.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Forgot password</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/card/confirm-mail.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Confirm mail</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/card/reset-password.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Reset password</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/card/lock-screen.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Lock screen</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#split"
                                            data-bs-toggle="collapse" aria-expanded="false"
                                            aria-controls="authentication">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Split</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="split">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/split/login.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Login</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/split/logout.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Logout</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/split/register.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Register</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/split/forgot-password.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Forgot password</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/split/confirm-mail.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Confirm mail</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/split/reset-password.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Reset password</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../pages/authentication/split/lock-screen.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Lock screen</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/authentication/wizard.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Wizard</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../#authentication-modal" data-bs-toggle="modal">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Modal</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#user" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-user"></span></span><span
                                            class="nav-link-text ps-1">User</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="user">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/user/profile.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Profile</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/user/settings.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Settings</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#pricing"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="pricing">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-tags"></span></span><span
                                            class="nav-link-text ps-1">Pricing</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="pricing">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/pricing/pricing-default.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Pricing default</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/pricing/pricing-alt.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Pricing alt</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#faq" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="faq">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-question-circle"></span></span><span
                                            class="nav-link-text ps-1">Faq</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="faq">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/faq/faq-basic.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Faq basic</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/faq/faq-alt.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Faq alt</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/faq/faq-accordion.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Faq accordion</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#errors" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="errors">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-exclamation-triangle"></span></span><span
                                            class="nav-link-text ps-1">Errors</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="errors">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/errors/404.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">404</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/errors/500.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">500</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#miscellaneous"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="miscellaneous">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-thumbtack"></span></span><span
                                            class="nav-link-text ps-1">Miscellaneous</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="miscellaneous">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/miscellaneous/associations.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Associations</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/miscellaneous/invite-people.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Invite people</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../pages/miscellaneous/privacy-policy.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Privacy policy</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <!-- label-->
                                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                    <div class="col-auto navbar-vertical-label">Modules
                                    </div>
                                    <div class="col ps-0">
                                        <hr class="mb-0 navbar-vertical-divider" />
                                    </div>
                                </div>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#forms" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-file-alt"></span></span><span
                                            class="nav-link-text ps-1">Forms</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="forms">
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#basic"
                                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Basic</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="basic">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/basic/form-control.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Form control</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/basic/input-group.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Input group</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/basic/select.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Select</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/basic/checks.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Checks</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/basic/range.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Range</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/basic/layout.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Layout</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#advance"
                                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Advance</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="advance">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/advance/advance-select.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Advance select</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/advance/date-picker.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Date picker</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/advance/editor.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Editor</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/advance/emoji-button.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Emoji button</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/advance/file-uploader.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">File uploader</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/forms/advance/rating.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Rating</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/forms/floating-labels.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Floating labels</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/forms/wizard.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Wizard</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/forms/validation.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Validation</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#tables" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-table"></span></span><span
                                            class="nav-link-text ps-1">Tables</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="tables">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/tables/basic-tables.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Basic tables</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/tables/advance-tables.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Advance tables</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/tables/bulk-select.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Bulk select</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#charts" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="charts">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-chart-line"></span></span><span
                                            class="nav-link-text ps-1">Charts</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="charts">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/charts/chartjs.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Chartjs</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#eCharts"
                                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="charts">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">ECharts</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="eCharts">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/line-charts.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Line charts</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/bar-charts.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Bar charts</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/candlestick-charts.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Candlestick charts</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/geo-map.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Geo map</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/scatter-charts.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Scatter charts</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/pie-charts.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Pie charts</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/radar-charts.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Radar charts</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/heatmap-charts.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Heatmap charts</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/charts/echarts/how-to-use.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">How to use</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#icons" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="icons">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-shapes"></span></span><span
                                            class="nav-link-text ps-1">Icons</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="icons">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/icons/font-awesome.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Font awesome</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/icons/bootstrap-icons.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Bootstrap icons</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/icons/feather.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Feather</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/icons/material-icons.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Material icons</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#maps" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="maps">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-map"></span></span><span
                                            class="nav-link-text ps-1">Maps</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="maps">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/maps/google-map.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Google map</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/maps/leaflet-map.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Leaflet map</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#components"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="components">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-puzzle-piece"></span></span><span
                                            class="nav-link-text ps-1">Components</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="components">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/accordion.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Accordion</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/alerts.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Alerts</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/anchor.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Anchor</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/animated-icons.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Animated icons</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/background.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Background</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/badges.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Badges</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/breadcrumbs.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Breadcrumbs</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/buttons.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Buttons</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/calendar.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Calendar</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/cards.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Cards</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#carousel"
                                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Carousel</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="carousel">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/carousel/bootstrap.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Bootstrap</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/carousel/swiper.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Swiper</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/collapse.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Collapse</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/cookie-notice.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Cookie notice</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/countup.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Countup</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/draggable.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Draggable</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/dropdowns.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Dropdowns</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/list-group.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">List group</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/modals.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Modals</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator"
                                            href="#navs-_and_-Tabs" data-bs-toggle="collapse" aria-expanded="false"
                                            aria-controls="components">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Navs &amp; Tabs</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="navs-_and_-Tabs">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/navs-and-tabs/navs.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Navs</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/navs-and-tabs/navbar.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Navbar</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/navs-and-tabs/vertical-navbar.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Vertical navbar</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/navs-and-tabs/top-navbar.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Top navbar</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/navs-and-tabs/combo-navbar.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Combo navbar</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/navs-and-tabs/tabs.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Tabs</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#pictures"
                                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Pictures</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="pictures">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/pictures/avatar.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Avatar</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/pictures/images.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Images</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/pictures/figures.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Figures</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/pictures/hoverbox.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Hoverbox</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/pictures/lightbox.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Lightbox</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator"
                                            href="#progress-bar" data-bs-toggle="collapse" aria-expanded="false"
                                            aria-controls="components">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Progress bar</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="progress-bar">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/progress-bar/basic.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Basic</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/progress-bar/advance.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Advance</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/pagination.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Pagination</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/popovers.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Popovers</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/scrollspy.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Scrollspy</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/search.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Search</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/sidepanel.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Sidepanel</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/spinners.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Spinners</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/toasts.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Toasts</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/tooltips.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Tooltips</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/components/typed-text.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Typed text</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#videos"
                                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Videos</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="videos">
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/videos/embed.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Embed</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="../modules/components/videos/plyr.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Plyr</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#utilities"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="utilities">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-fire"></span></span><span
                                            class="nav-link-text ps-1">Utilities</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="utilities">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/borders.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Borders</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/clearfix.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Clearfix</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/colors.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Colors</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/colored-links.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Colored links</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/display.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Display</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/flex.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Flex</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/float.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Float</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/grid.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Grid</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/overlayscrollbars.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Overlayscrollbars</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/position.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Position</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/spacing.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Spacing</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/sizing.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Sizing</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/stretched-link.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Stretched link</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/text-truncation.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Text truncation</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/typography.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Typography</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/vertical-align.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Vertical align</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../modules/utilities/visibility.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Visibility</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link" href="../widgets.html" role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-poll"></span></span><span
                                            class="nav-link-text ps-1">Widgets</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#multi-level"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="multi-level">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-layer-group"></span></span><span
                                            class="nav-link-text ps-1">Multi level</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="multi-level">
                                    <li class="nav-item"><a class="nav-link dropdown-indicator"
                                            href="#level-two" data-bs-toggle="collapse" aria-expanded="false"
                                            aria-controls="multi-level">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Level two</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="level-two">
                                            <li class="nav-item"><a class="nav-link" href="../#!.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Item 1</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="../#!.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Item 2</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator"
                                            href="#level-three" data-bs-toggle="collapse" aria-expanded="false"
                                            aria-controls="multi-level">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Level three</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="level-three">
                                            <li class="nav-item"><a class="nav-link" href="../#!.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Item 3</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link dropdown-indicator"
                                                    href="#item-4" data-bs-toggle="collapse" aria-expanded="false"
                                                    aria-controls="level-three">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Item 4</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                                <ul class="nav collapse false" id="item-4">
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="../#!.html">
                                                            <div class="d-flex align-items-center"><span
                                                                    class="nav-link-text ps-1">Item 5</span>
                                                            </div>
                                                        </a>
                                                        <!-- more inner pages-->
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="../#!.html">
                                                            <div class="d-flex align-items-center"><span
                                                                    class="nav-link-text ps-1">Item 6</span>
                                                            </div>
                                                        </a>
                                                        <!-- more inner pages-->
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link dropdown-indicator"
                                            href="#level-four" data-bs-toggle="collapse" aria-expanded="false"
                                            aria-controls="multi-level">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Level four</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                        <ul class="nav collapse false" id="level-four">
                                            <li class="nav-item"><a class="nav-link" href="../#!.html">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Item 6</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                            </li>
                                            <li class="nav-item"><a class="nav-link dropdown-indicator"
                                                    href="#item-7" data-bs-toggle="collapse" aria-expanded="false"
                                                    aria-controls="level-four">
                                                    <div class="d-flex align-items-center"><span
                                                            class="nav-link-text ps-1">Item 7</span>
                                                    </div>
                                                </a>
                                                <!-- more inner pages-->
                                                <ul class="nav collapse false" id="item-7">
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="../#!.html">
                                                            <div class="d-flex align-items-center"><span
                                                                    class="nav-link-text ps-1">Item 8</span>
                                                            </div>
                                                        </a>
                                                        <!-- more inner pages-->
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link dropdown-indicator"
                                                            href="#item-9" data-bs-toggle="collapse"
                                                            aria-expanded="false" aria-controls="item-7">
                                                            <div class="d-flex align-items-center"><span
                                                                    class="nav-link-text ps-1">Item 9</span>
                                                            </div>
                                                        </a>
                                                        <!-- more inner pages-->
                                                        <ul class="nav collapse false" id="item-9">
                                                            <li class="nav-item"><a class="nav-link"
                                                                    href="../#!.html">
                                                                    <div class="d-flex align-items-center"><span
                                                                            class="nav-link-text ps-1">Item 10</span>
                                                                    </div>
                                                                </a>
                                                                <!-- more inner pages-->
                                                            </li>
                                                            <li class="nav-item"><a class="nav-link"
                                                                    href="../#!.html">
                                                                    <div class="d-flex align-items-center"><span
                                                                            class="nav-link-text ps-1">Item 11</span>
                                                                    </div>
                                                                </a>
                                                                <!-- more inner pages-->
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <!-- label-->
                                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                    <div class="col-auto navbar-vertical-label">Documentation
                                    </div>
                                    <div class="col ps-0">
                                        <hr class="mb-0 navbar-vertical-divider" />
                                    </div>
                                </div>
                                <!-- parent pages--><a class="nav-link"
                                    href="../documentation/getting-started.html" role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-rocket"></span></span><span
                                            class="nav-link-text ps-1">Getting started</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#customization"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="customization">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-wrench"></span></span><span
                                            class="nav-link-text ps-1">Customization</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="customization">
                                    <li class="nav-item"><a class="nav-link"
                                            href="../documentation/customization/configuration.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Configuration</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../documentation/customization/styling.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Styling</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../documentation/customization/dark-mode.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Dark mode</span><span
                                                    class="badge rounded-pill ms-2 badge-soft-success">New</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="../documentation/customization/plugin.html">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Plugin</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                                <!-- parent pages--><a class="nav-link" href="../documentation/gulp.html"
                                    role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fab fa-gulp"></span></span><span
                                            class="nav-link-text ps-1">Gulp</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link" href="../documentation/design-file.html"
                                    role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-palette"></span></span><span
                                            class="nav-link-text ps-1">Design file</span>
                                    </div>
                                </a>
                                <!-- parent pages--><a class="nav-link" href="../changelog.html" role="button">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-code-branch"></span></span><span
                                            class="nav-link-text ps-1">Changelog</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false"
                        aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                class="toggle-line"></span></span></button>
                </nav>

                @for ($i = 0; $i < 50; $i++)
                <div class="row g-3">
                    <div class="col-xxl-9">
                      <div class="card rounded-3 overflow-hidden h-100">
                        <div class="card-body bg-line-chart-gradient d-flex flex-column justify-content-between">
                          <div class="row align-items-center g-0">
                            <div class="col light">
                              <h4 class="text-white mb-0">Today $764.39</h4>
                              <p class="fs--1 fw-semi-bold text-white">Yesterday <span class="opacity-50">$684.87</span></p>
                            </div>
                            <div class="col-auto d-none d-sm-block">
                              <select class="form-select form-select-sm mb-3" id="dashboard-chart-select">
                                <option value="all">All Payments</option>
                                <option value="successful" selected="selected">Successful Payments</option>
                                <option value="failed">Failed Payments</option>
                              </select>
                            </div>
                          </div>
                          <div class="echart-line-payment" style="height:200px" data-echart-responsive="true"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row g-3">
                        <div class="col-md-4 col-xxl-12">
                          <div class="card h-100">
                            <div class="card-body">
                              <div class="row flex-between-center g-0">
                                <div class="col-6 d-lg-block flex-between-center">
                                  <h6 class="mb-2 text-900">Active Users</h6>
                                  <h4 class="fs-3 fw-normal text-700 mb-0">765k</h4>
                                </div>
                                <div class="col-auto h-100">
                                  <div style="height:50px;min-width:80px;" data-echarts='{"xAxis":{"show":false,"boundaryGap":false},"series":[{"data":[3,7,6,8,5,12,11],"type":"line","symbol":"none"}],"grid":{"right":"0px","left":"0px","bottom":"0px","top":"0px"}}'></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-xxl-12">
                          <div class="card h-100">
                            <div class="card-body">
                              <div class="row flex-between-center">
                                <div class="col d-md-flex d-lg-block flex-between-center">
                                  <h6 class="mb-md-0 mb-lg-2">Revenue</h6><span class="badge rounded-pill badge-soft-success"><span class="fas fa-caret-up"></span> 61.8%</span>
                                </div>
                                <div class="col-auto">
                                  <h4 class="fs-3 fw-normal text-700" data-countup='{"endValue":82.18,"decimalPlaces":2,"suffix":"M","prefix":"$"}'>0</h4>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-xxl-12">
                          <div class="card h-100">
                            <div class="card-body">
                              <div class="row flex-between-center">
                                <div class="col d-md-flex d-lg-block flex-between-center">
                                  <h6 class="mb-md-0 mb-lg-2">Conversion</h6><span class="badge rounded-pill badge-soft-primary"><span class="fas fa-caret-up"></span> 29.4%</span>
                                </div>
                                <div class="col-auto">
                                  <h4 class="fs-3 fw-normal text-primary" data-countup='{"endValue":28.5,"decimalPlaces":2,"suffix":"%"}'>0</h4>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endfor
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../vendors/chart/chart.min.js"></script>
    <script src="../vendors/countup/countUp.umd.js"></script>
    <script src="../vendors/progressbar/progressbar.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="../vendors/echarts/echarts.min.js"></script>
    <script src="../vendors/dayjs/dayjs.min.js"></script>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../assets/js/theme.js"></script>

</body>

</html>
