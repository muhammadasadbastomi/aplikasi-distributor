<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{asset('iziToast/iziToast.css')}}" rel="stylesheet">

    <!-- loader-->
    <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{asset('assets/css/dark-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/light-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/semi-dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/header-colors.css')}}" rel="stylesheet" />
    @yield('css')

    <title>Aplikasi Stok Dan Penjualan Kapal Api Pada PT.Pulau Baru Jaya</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-icon d-xl-none">
                    <i class="bi bi-list"></i>
                </div>
                {{-- <div class="top-navbar d-none d-xl-block">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app-emailbox.html">Email</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">Projects</a>
                        </li>
                        <li class="nav-item d-none d-xxl-block">
                            <a class="nav-link" href="javascript:;">Events</a>
                        </li>
                        <li class="nav-item d-none d-xxl-block">
                            <a class="nav-link" href="app-to-do.html">Todo</a>
                        </li>
                    </ul>
                </div>
                <div class="search-toggle-icon d-xl-none ms-auto">
                    <i class="bi bi-search"></i>
                </div> --}}
                <form class="searchbar d-none d-xl-flex ms-auto">
                    {{-- <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i
                            class="bi bi-search"></i></div>
                    <input class="form-control" type="text" placeholder="Type here to search">
                    <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i
                            class="bi bi-x-lg"></i></div> --}}
                </form>
                <div class="top-navbar-right ms-3">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center gap-1">
                                    @if (Auth::user()->foto == 'ART.png')
                                    <img src="{{asset(Auth::user()->foto)}}" class="user-img" alt="">
                                    @else
                                    <img src="{{asset('storage/user/'.Auth::user()->foto)}}" class="user-img" alt="">
                                    @endif
                                    <div class="user-name d-none d-sm-block">{{Auth::user()->nama}}</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('storage/user/'.Auth::user()->foto)}}" alt=""
                                                class="rounded-circle" width="60" height="60">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">{{Auth::user()->nama}}</h6>
                                                <small class="mb-0 dropdown-user-designation text-secondary">{{Auth::user()->username}}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                {{-- <li>
                                    <a class="dropdown-item" href="pages-user-profile.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li> --}}
                                {{-- <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-gear-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Setting</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index2.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-speedometer"></i></div>
                                            <div class="setting-text ms-3"><span>Dashboard</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-piggy-bank-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Earnings</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-cloud-arrow-down-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Downloads</span></div>
                                        </div>
                                    </a>
                                </li> --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form id="frm-logout" action="{{ route('auth.logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="dropdown-item" type="submit">
                                            <div class="d-flex align-items-center">
                                                <div class="setting-icon"><i class="bi bi-box-arrow-left"></i></div>
                                                <div class="setting-text ms-3"><span>Logout</span></div>
                                            </div>
                                        </button>
                                        {{-- <button type="submit" class="dropdown-item"><i class="fa fa-power-off"></i>
                                            Logout</a> --}}
                                    </form>
                                    {{-- <a class="dropdown-item" href="authentication-signup-with-header-footer.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Logout</span></div>
                                        </div>
                                    </a> --}}
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="projects">
                                    <i class="bi bi-grid-3x3-gap-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="row row-cols-3 gx-2">
                                    <div class="col">
                                        <a href="ecommerce-orders.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-primary bg-gradient">
                                                    <i class="bi bi-cart-plus-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Orders</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-danger bg-gradient">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Users</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="ecommerce-products-grid.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-success bg-gradient">
                                                    <i class="bi bi-bank2"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Products</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="component-media-object.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-orange bg-gradient">
                                                    <i class="bi bi-collection-play-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Media</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="pages-user-profile.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-purple bg-gradient">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Account</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-dark bg-info bg-gradient">
                                                    <i class="bi bi-file-earmark-text-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Docs</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="ecommerce-orders-detail.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-pink bg-gradient">
                                                    <i class="bi bi-credit-card-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Payment</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-bronze bg-gradient">
                                                    <i class="bi bi-calendar-check-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Events</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-dark bg-warning bg-gradient">
                                                    <i class="bi bi-book-half"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Story</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="messages">
                                    <span class="notify-badge">5</span>
                                    <i class="bi bi-messenger"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="p-2 border-bottom m-2">
                                    <h5 class="h5 mb-0">Messages</h5>
                                </div>
                                <div class="header-message-list p-2">
                                    <div class="dropdown-item bg-light radius-10 mb-1">
                                        <form class="dropdown-searchbar position-relative">
                                            <div
                                                class="position-absolute top-50 start-0 translate-middle-y px-3 search-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                            <input class="form-control" type="search" placeholder="Search Messages">
                                        </form>
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-1.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The
                                                    standard chunk of lorem...</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-2.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many
                                                    desktop publishing</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-3.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making
                                                    this the first true</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-4.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Peter Costanzo <span
                                                        class="msg-time float-end text-secondary">3 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">It
                                                    was popularised in the 1960</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-5.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Thomas Wheeler <span
                                                        class="msg-time float-end text-secondary">1 d</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">If
                                                    you are going to use a passage</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-6.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Johnny Seitz <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">All
                                                    the Lorem Ipsum generators</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-1.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The
                                                    standard chunk of lorem...</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-2.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many
                                                    desktop publishing</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('assets/images/avatars/avatar-3.png')}}" alt=""
                                                class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making
                                                    this the first true</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="text-center">View All Messages</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large d-none d-sm-block">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="notifications">
                                    <span class="notify-badge">8</span>
                                    <i class="bi bi-bell-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="p-2 border-bottom m-2">
                                    <h5 class="h5 mb-0">Notifications</h5>
                                </div>
                                <div class="header-notifications-list p-2">
                                    <div class="dropdown-item bg-light radius-10 mb-1">
                                        <form class="dropdown-searchbar position-relative">
                                            <div
                                                class="position-absolute top-50 start-0 translate-middle-y px-3 search-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                            <input class="form-control" type="search" placeholder="Search Messages">
                                        </form>
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-basket2-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New Orders <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You
                                                    have recived new orders</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-people-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New Customers <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5
                                                    new user registered</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i
                                                    class="bi bi-file-earmark-bar-graph-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">24 PDF File <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The
                                                    pdf files generated</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-collection-play-fill"></i>
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Time Response <span
                                                        class="msg-time float-end text-secondary">3 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5.1
                                                    min avarage time response</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-cursor-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New Product Approved <span
                                                        class="msg-time float-end text-secondary">1 d</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Your
                                                    new product has approved</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-gift-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New Comments <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New
                                                    customer comments recived</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-droplet-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New 24 authors<span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24
                                                    new authors joined last week</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-mic-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Your item is shipped <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Successfully
                                                    shipped your item</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-lightbulb-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Defense Alerts <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45%
                                                    less alerts last 4 weeks</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-bookmark-heart-fill"></i>
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">4 New Sign Up <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New
                                                    4 user registartions</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-briefcase-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">All Documents Uploaded <span
                                                        class="msg-time float-end text-secondary">1 mo</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Sussessfully
                                                    uploaded all files</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="text-center">View All Notifications</div>
                                    </a>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Skodash</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-server"></i>
                        </div>
                        <div class="menu-title">Master Data</div>
                    </a>
                    <ul>
                        <li class="{{ Request::is('admin/user/*') ? 'mm-active' : '' }}"> <a href="{{route('admin.user.index')}}"><i class="bi bi-arrow-right-short"></i>User</a>
                        </li>
                        <li class="{{ Request::is('admin/barang/*') ? 'mm-active' : '' }}"> <a href="{{route('admin.barang.index')}}"><i class="bi bi-arrow-right-short"></i>Barang</a>
                        </li>
                        <li class="{{ Request::is('admin/rak/*') ? 'mm-active' : '' }}"> <a href="{{route('admin.rak.index')}}"><i class="bi bi-arrow-right-short"></i>Lokasi/Rak/Bin</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-clipboard-data"></i>
                        </div>
                        <div class="menu-title">Transaksi</div>
                    </a>
                    <ul>
                        <li class="{{ Request::is('admin/pembelian/*') ? 'mm-active' : '' }}"> <a href="{{route('admin.pembelian.index')}}"><i class="bi bi-arrow-right-short"></i>Pembelian</a>
                        </li>
                        <li class="{{ Request::is('admin/stok/*') ? 'mm-active' : '' }}"> <a href="{{route('admin.stok.index')}}"><i class="bi bi-arrow-right-short"></i>Stok</a>
                        </li>
                        <li class="{{ Request::is('admin/penjualan/*') ? 'mm-active' : '' }}"> <a href="{{route('admin.penjualan.index')}}"><i class="bi bi-arrow-right-short"></i>Penjualan</a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-grid"></i>
                        </div>
                        <div class="menu-title">Application</div>
                    </a>
                    <ul>
                        <li> <a href="app-emailbox.html"><i class="bi bi-arrow-right-short"></i>Email</a>
                        </li>
                        <li> <a href="app-chat-box.html"><i class="bi bi-arrow-right-short"></i>Chat Box</a>
                        </li>
                        <li> <a href="app-file-manager.html"><i class="bi bi-arrow-right-short"></i>File Manager</a>
                        </li>
                        <li> <a href="app-to-do.html"><i class="bi bi-arrow-right-short"></i>Todo List</a>
                        </li>
                        <li> <a href="app-invoice.html"><i class="bi bi-arrow-right-short"></i>Invoice</a>
                        </li>
                        <li> <a href="app-fullcalender.html"><i class="bi bi-arrow-right-short"></i>Calendar</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">UI Elements</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-award"></i>
                        </div>
                        <div class="menu-title">Widgets</div>
                    </a>
                    <ul>
                        <li> <a href="widgets-static-widgets.html"><i class="bi bi-arrow-right-short"></i>Static
                                Widgets</a>
                        </li>
                        <li> <a href="widgets-data-widgets.html"><i class="bi bi-arrow-right-short"></i>Data Widgets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-bag-check"></i>
                        </div>
                        <div class="menu-title">eCommerce</div>
                    </a>
                    <ul>
                        <li> <a href="ecommerce-products-list.html"><i class="bi bi-arrow-right-short"></i>Products
                                List</a>
                        </li>
                        <li> <a href="ecommerce-products-grid.html"><i class="bi bi-arrow-right-short"></i>Products
                                Grid</a>
                        </li>
                        <li> <a href="ecommerce-products-categories.html"><i
                                    class="bi bi-arrow-right-short"></i>Categories</a>
                        </li>
                        <li> <a href="ecommerce-orders.html"><i class="bi bi-arrow-right-short"></i>Orders</a>
                        </li>
                        <li> <a href="ecommerce-orders-detail.html"><i class="bi bi-arrow-right-short"></i>Order
                                details</a>
                        </li>
                        <li> <a href="ecommerce-add-new-product.html"><i class="bi bi-arrow-right-short"></i>Add New
                                Product</a>
                        </li>
                        <li> <a href="ecommerce-add-new-product-2.html"><i class="bi bi-arrow-right-short"></i>Add New
                                Product 2</a>
                        </li>
                        <li> <a href="ecommerce-transactions.html"><i
                                    class="bi bi-arrow-right-short"></i>Transactions</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-bookmark-star"></i>
                        </div>
                        <div class="menu-title">Components</div>
                    </a>
                    <ul>
                        <li> <a href="component-alerts.html"><i class="bi bi-arrow-right-short"></i>Alerts</a>
                        </li>
                        <li> <a href="component-accordions.html"><i class="bi bi-arrow-right-short"></i>Accordions</a>
                        </li>
                        <li> <a href="component-badges.html"><i class="bi bi-arrow-right-short"></i>Badges</a>
                        </li>
                        <li> <a href="component-buttons.html"><i class="bi bi-arrow-right-short"></i>Buttons</a>
                        </li>
                        <li> <a href="component-cards.html"><i class="bi bi-arrow-right-short"></i>Cards</a>
                        </li>
                        <li> <a href="component-carousels.html"><i class="bi bi-arrow-right-short"></i>Carousels</a>
                        </li>
                        <li> <a href="component-list-groups.html"><i class="bi bi-arrow-right-short"></i>List Groups</a>
                        </li>
                        <li> <a href="component-media-object.html"><i class="bi bi-arrow-right-short"></i>Media
                                Objects</a>
                        </li>
                        <li> <a href="component-modals.html"><i class="bi bi-arrow-right-short"></i>Modals</a>
                        </li>
                        <li> <a href="component-navs-tabs.html"><i class="bi bi-arrow-right-short"></i>Navs & Tabs</a>
                        </li>
                        <li> <a href="component-navbar.html"><i class="bi bi-arrow-right-short"></i>Navbar</a>
                        </li>
                        <li> <a href="component-paginations.html"><i class="bi bi-arrow-right-short"></i>Pagination</a>
                        </li>
                        <li> <a href="component-popovers-tooltips.html"><i class="bi bi-arrow-right-short"></i>Popovers
                                & Tooltips</a>
                        </li>
                        <li> <a href="component-progress-bars.html"><i class="bi bi-arrow-right-short"></i>Progress</a>
                        </li>
                        <li> <a href="component-spinners.html"><i class="bi bi-arrow-right-short"></i>Spinners</a>
                        </li>
                        <li> <a href="component-notifications.html"><i
                                    class="bi bi-arrow-right-short"></i>Notifications</a>
                        </li>
                        <li> <a href="component-avtars-chips.html"><i class="bi bi-arrow-right-short"></i>Avatrs &
                                Chips</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-cloud-arrow-down"></i>
                        </div>
                        <div class="menu-title">Icons</div>
                    </a>
                    <ul>
                        <li> <a href="icons-line-icons.html"><i class="bi bi-arrow-right-short"></i>Line Icons</a>
                        </li>
                        <li> <a href="icons-boxicons.html"><i class="bi bi-arrow-right-short"></i>Boxicons</a>
                        </li>
                        <li> <a href="icons-feather-icons.html"><i class="bi bi-arrow-right-short"></i>Feather Icons</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Forms & Tables</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-file-earmark-break"></i>
                        </div>
                        <div class="menu-title">Forms</div>
                    </a>
                    <ul>
                        <li> <a href="form-elements.html"><i class="bi bi-arrow-right-short"></i>Form Elements</a>
                        </li>
                        <li> <a href="form-input-group.html"><i class="bi bi-arrow-right-short"></i>Input Groups</a>
                        </li>
                        <li> <a href="form-layouts.html"><i class="bi bi-arrow-right-short"></i>Forms Layouts</a>
                        </li>
                        <li> <a href="form-validations.html"><i class="bi bi-arrow-right-short"></i>Form Validation</a>
                        </li>
                        <li> <a href="form-wizard.html"><i class="bi bi-arrow-right-short"></i>Form Wizard</a>
                        </li>
                        <li> <a href="form-date-time-pickes.html"><i class="bi bi-arrow-right-short"></i>Date
                                Pickers</a>
                        </li>
                        <li> <a href="form-select2.html"><i class="bi bi-arrow-right-short"></i>Select2</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-file-earmark-spreadsheet"></i>
                        </div>
                        <div class="menu-title">Tables</div>
                    </a>
                    <ul>
                        <li> <a href="table-basic-table.html"><i class="bi bi-arrow-right-short"></i>Basic Table</a>
                        </li>
                        <li> <a href="table-advance-tables.html"><i class="bi bi-arrow-right-short"></i>Advance
                                Tables</a>
                        </li>
                        <li> <a href="table-datatable.html"><i class="bi bi-arrow-right-short"></i>Data Table</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Pages</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-lock"></i>
                        </div>
                        <div class="menu-title">Authentication</div>
                    </a>
                    <ul>
                        <li> <a href="authentication-signin.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>Sign In</a>
                        </li>
                        <li> <a href="authentication-signup.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>Sign Up</a>
                        </li>
                        <li> <a href="authentication-signin-with-header-footer.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>Sign In with Header & Footer</a>
                        </li>
                        <li> <a href="authentication-signup-with-header-footer.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>Sign Up with Header & Footer</a>
                        </li>
                        <li> <a href="authentication-forgot-password.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>Forgot Password</a>
                        </li>
                        <li> <a href="authentication-reset-password.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>Reset Password</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="pages-user-profile.html">
                        <div class="parent-icon"><i class="bi bi-person-check"></i>
                        </div>
                        <div class="menu-title">User Profile</div>
                    </a>
                </li>
                <li>
                    <a href="pages-timeline.html">
                        <div class="parent-icon"><i class="bi bi-collection-play"></i>
                        </div>
                        <div class="menu-title">Timeline</div>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-error"></i>
                        </div>
                        <div class="menu-title">Errors</div>
                    </a>
                    <ul>
                        <li> <a href="pages-errors-404-error.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>404 Error</a>
                        </li>
                        <li> <a href="pages-errors-500-error.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>500 Error</a>
                        </li>
                        <li> <a href="pages-errors-coming-soon.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>Coming Soon</a>
                        </li>
                        <li> <a href="pages-blank-page.html" target="_blank"><i
                                    class="bi bi-arrow-right-short"></i>Blank Page</a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="pages-faq.html">
                        <div class="parent-icon"><i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <div class="menu-title">FAQ</div>
                    </a>
                </li>
                <li>
                    <a href="pages-pricing-tables.html">
                        <div class="parent-icon"><i class="bi bi-credit-card-2-front"></i>
                        </div>
                        <div class="menu-title">Pricing Tables</div>
                    </a>
                </li>
                <li class="menu-label">Charts & Maps</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-graph-down"></i>
                        </div>
                        <div class="menu-title">Charts</div>
                    </a>
                    <ul>
                        <li> <a href="charts-apex-chart.html"><i class="bi bi-arrow-right-short"></i>Apex</a>
                        </li>
                        <li> <a href="charts-chartjs.html"><i class="bi bi-arrow-right-short"></i>Chartjs</a>
                        </li>
                        <li> <a href="charts-highcharts.html"><i class="bi bi-arrow-right-short"></i>Highcharts</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-pin-map"></i>
                        </div>
                        <div class="menu-title">Maps</div>
                    </a>
                    <ul>
                        <li> <a href="map-google-maps.html"><i class="bi bi-arrow-right-short"></i>Google Maps</a>
                        </li>
                        <li> <a href="map-vector-maps.html"><i class="bi bi-arrow-right-short"></i>Vector Maps</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Others</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-list-task"></i>
                        </div>
                        <div class="menu-title">Menu Levels</div>
                    </a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bi bi-arrow-right-short"></i>Level
                                One</a>
                            <ul>
                                <li> <a class="has-arrow" href="javascript:;"><i
                                            class="bi bi-arrow-right-short"></i>Level Two</a>
                                    <ul>
                                        <li> <a href="javascript:;"><i class="bi bi-arrow-right-short"></i>Level
                                                Three</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="https://codervent.com/skodash/documentation/index.html" target="_blank">
                        <div class="parent-icon"><i class="bi bi-file-earmark-code"></i>
                        </div>
                        <div class="menu-title">Documentation</div>
                    </a>
                </li>
                <li>
                    <a href="https://themeforest.net/user/codervent" target="_blank">
                        <div class="parent-icon"><i class="bi bi-headset"></i>
                        </div>
                        <div class="menu-title">Support</div>
                    </a>
                </li> --}}
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            @yield('content')


        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/plugins/easyPieChart/jquery.easypiechart.js')}}"></script>
    <script src="{{asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/js/pace.min.js')}}"></script>
    <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('iziToast/iziToast.js')}}"></script>
    <!--app-->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/index.js')}}"></script>

    <script>
        new PerfectScrollbar(".best-product")
     new PerfectScrollbar(".top-sellers-list")
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true
            });
        } );
    </script>
    @include('layouts.alert')
    @include('layouts.alert_error')

    {{-- <script>
        $( ".destroy" ).click(function() {
            const route = $(this).data('route');
            $('#destroyForm').attr('action',route);
        });
    </script>

    <script>
        $(document).ready(function() {
        $(".cetakb").click(function() {
            const route = $(this).data('route');
            $('#bulanForm').attr('action',route);
        });
        });
    </script> --}}
    @yield('script')
    @stack('script')

</body>

</html>