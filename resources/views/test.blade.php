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
    <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../../assets/js/config.js"></script>
    <script src="../../../vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="../../../vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="../../../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="../../../assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="../../../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../../../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
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


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid">
            <div class="row min-vh-100 flex-center g-0">
                <div class="col-lg-6 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
                        src="../../../assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img
                        class="bg-auth-circle-shape-2" src="../../../assets/img/icons/spot-illustrations/shape-1.png"
                        alt="" width="150">

                    <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="pill-home-tab" data-bs-toggle="tab"
                                href="#pill-tab-home" role="tab" aria-controls="pill-tab-home"
                                aria-selected="true">Home</a></li>
                        <li class="nav-item"><a class="nav-link" id="pill-profile-tab" data-bs-toggle="tab"
                                href="#pill-tab-profile" role="tab" aria-controls="pill-tab-profile"
                                aria-selected="false">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" id="pill-contact-tab" data-bs-toggle="tab"
                                href="#pill-tab-contact" role="tab" aria-controls="pill-tab-contact"
                                aria-selected="false">Contact</a></li>
                    </ul>
                    <div class="tab-content" id="pill-myTabContent">
                        <div class="tab-pane fade show active" id="pill-tab-home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card overflow-hidden z-index-1">
                                <div class="card-body p-0">
                                    <div class="row g-0 h-100 d-flex flex-center">
                                        <div class="col-lg-8 d-flex flex-center">
                                            <div class="p-4 p-md-5 flex-grow-1">
                                                <div class="row flex-between-center">
                                                    <div class="col-auto">
                                                        <h3>Account Login</h3>
                                                    </div>
                                                </div>
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="card-email">Email
                                                            address</label>
                                                        <input class="form-control" id="card-email" type="email" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-flex justify-content-between">
                                                            <label class="form-label"
                                                                for="card-password">Password</label><a
                                                                class="fs--1"
                                                                href="../../../pages/authentication/card/forgot-password.html ">Forgot
                                                                Password?</a>
                                                        </div>
                                                        <input class="form-control" id="card-password"
                                                            type="password" />
                                                    </div>
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="card-checkbox" checked="checked" />
                                                        <label class="form-check-label" for="card-checkbox">Remember
                                                            me</label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                            name="submit">Log in</button>
                                                    </div>
                                                </form>
                                                <div class="position-relative mt-4">
                                                    <hr class="bg-300" />
                                                    <div class="divider-content-center">or log in with</div>
                                                </div>
                                                <div class="row g-2 mt-2">
                                                    <div class="col-sm-6"><a
                                                            class="btn btn-outline-google-plus btn-sm d-block w-100"
                                                            href="#"><span class="fab fa-google-plus-g me-2"
                                                                data-fa-transform="grow-8"></span> google</a></div>
                                                    <div class="col-sm-6"><a
                                                            class="btn btn-outline-facebook btn-sm d-block w-100"
                                                            href="#"><span class="fab fa-facebook-square me-2"
                                                                data-fa-transform="grow-8"></span> facebook</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pill-tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                            Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan
                            four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft
                            beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic. </div>
                        <div class="tab-pane fade" id="pill-tab-contact" role="tabpanel" aria-labelledby="contact-tab">
                            Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic
                            lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork
                            tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica.
                            DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../../../vendors/popper/popper.min.js"></script>
    <script src="../../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../../vendors/anchorjs/anchor.min.js"></script>
    <script src="../../../vendors/is/is.min.js"></script>
    <script src="../../../vendors/fontawesome/all.min.js"></script>
    <script src="../../../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../../../vendors/list.js/list.min.js"></script>
    <script src="../../../assets/js/theme.js"></script>

</body>

</html>
