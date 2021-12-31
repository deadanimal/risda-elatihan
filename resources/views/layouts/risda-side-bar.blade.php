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
                    <span class=" px-3"><span class="fas fa-calendar-alt"></span> DASHBOARD</span>
                </div>
            </a>
            <a class="nav-link py-0" href="#" role="button">
                <div class="d-flex align-items-center nav-link-side px-0">
                    <span class=" px-3"><span class="fas fa-comments"></span> PENGURUSAN PENGGUNA</span>
                </div>
            </a>
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
