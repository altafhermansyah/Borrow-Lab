<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BorrowLab</title>
    <link rel="shortcut icon" type="image/png" href="images/logos/favicon.png" />
    <link rel="stylesheet" href="css/styles.min.css" />
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

    <style>
        .square-btn {
            width: 170px;
            height: 170px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            margin: 0;
        }
    </style>

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/" class="text-nowrap logo-img">
                        <h2 class="fw-bolder text-primary mb-0"><i class="fab fa-slack me-2"></i> BorrowLab</h2>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar mt-3" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="home" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'staff')
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Manage</span>
                            </li>
                            <li class="sidebar-item mt-2">
                                <a class="sidebar-link" href="items" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-devices-2"></i>
                                    </span>
                                    <span class="hide-menu">Items</span>
                                </a>
                            </li>
                            <li class="sidebar-item mt-2">
                                <a class="sidebar-link" href="student" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-user"></i>
                                    </span>
                                    <span class="hide-menu">Students</span>
                                </a>
                            </li>
                            <li class="sidebar-item mt-2">
                                <a class="sidebar-link" href="category" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-category-2"></i>
                                    </span>
                                    <span class="hide-menu">Categories</span>
                                </a>
                            </li>
                            <li class="sidebar-item mt-2">
                                <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-file-description"></i>
                                    </span>
                                    <span class="hide-menu">Loans</span>
                                </a>
                            </li>
                        @elseif (Auth::user()->role == 'student')
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Features</span>
                            </li>
                            <li class="sidebar-item mt-2">
                                <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-arrow-bar-down"></i>
                                    </span>
                                    <span class="hide-menu">Borrow</span>
                                </a>
                            </li>
                            <li class="sidebar-item mt-2">
                                <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-arrow-bar-up"></i>
                                    </span>
                                    <span class="hide-menu">Return</span>
                                </a>
                            </li>
                            <li class="sidebar-item mt-2">
                                <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-history"></i>
                                    </span>
                                    <span class="hide-menu">History</span>
                                </a>
                            </li>
                        @endif

                        <hr>
                        <li class="sidebar-item mt-3">
                            <a href="{{ route('logout') }}" class="btn btn-outline-danger mt-auto d-block"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="images/profile/user-1.jpg" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <div class="text-center py-2">
                                            <strong class="me-2">{{ Auth::user()->name }}</strong>
                                            <small>-</small>
                                            <small class="ms-2">{{ Auth::user()->role }}</small>
                                        </div>
                                        <a href="{{ route('logout') }}"
                                            class="btn btn-outline-danger mx-3 mt-2 d-block"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="main">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($message = Session::get('update'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($message = Session::get('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @yield('main')
                    {{-- <div class="row">
                        <div class="col-lg-12 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-header">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Welcome, {{ Auth::user()->name }}</h5>
                                    <p class="card-text text-center">You are logged in as a {{ Auth::user()->role }}.
                                    </p>
                                    <p class="card-text text-center mx-auto col-md-10">Welcome to BorrowLab the
                                        Computer
                                        Lab
                                        Equipment
                                        Lending System!
                                        We're glad to have you here. Feel free to explore our collection of equipment
                                        and
                                        make your reservations easily. If you need any assistance, don't hesitate to
                                        reach
                                        out to us. Happy browsing!</p>
                                    <div class="say mt-1">
                                        @if (Auth::user()->role == 'staff')
                                            <p class="card-text text-center">You have access to manage the
                                                students and the items listed below. Make sure to handle the data
                                                responsibly.
                                            </p>
                                        @else
                                            <p class="card-text text-center">You can enjoy a variety of features
                                                available
                                                below. Take your time to explore and utilize them for your academic
                                                needs.
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                @if (Auth::user()->role = 'staff')
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <div class="row text-center">
                                            <div class="col-md-3 text-center">
                                                <button
                                                    class="btn btn-lg square-btn m-1 fw-bolder btn-success d-flex flex-column align-items-center justify-content-center">
                                                    <i class="ti ti-devices-2 mb-1" style="font-size: 1.8rem"></i>
                                                    <span>ITEMS</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <button
                                                    class="btn btn-lg square-btn m-1 fw-bolder btn-secondary d-flex flex-column align-items-center justify-content-center">
                                                    <i class="ti ti-user mb-1" style="font-size: 1.8rem"></i>
                                                    <span>STUDENTS</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <button
                                                    class="btn btn-lg square-btn m-1 fw-bolder btn-danger d-flex flex-column align-items-center justify-content-center">
                                                    <i class="ti ti-category-2 mb-1" style="font-size: 1.8rem"></i>
                                                    <span>CATEGORY</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <button
                                                    class="btn btn-lg square-btn m-1 fw-bolder btn-warning d-flex flex-column align-items-center justify-content-center">
                                                    <i class="ti ti-file-description mb-1"
                                                        style="font-size: 1.8rem"></i>
                                                    <span>LOANS</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <div class="row text-center">
                                            <div class="col-md-3 text-center">
                                                <button
                                                    class="btn btn-lg square-btn m-1 fw-bolder btn-success d-flex flex-column align-items-center justify-content-center">
                                                    <i class="ti ti-devices-2 mb-1" style="font-size: 1.8rem"></i>
                                                    <span>ITEMS</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <button
                                                    class="btn btn-lg square-btn m-1 fw-bolder btn-secondary d-flex flex-column align-items-center justify-content-center">
                                                    <i class="ti ti-user mb-1" style="font-size: 1.8rem"></i>
                                                    <span>BORROW</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <button
                                                    class="btn btn-lg square-btn m-1 fw-bolder btn-danger d-flex flex-column align-items-center justify-content-center">
                                                    <i class="ti ti-category-2 mb-1" style="font-size: 1.8rem"></i>
                                                    <span>RETURN</span>
                                                </button>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <button
                                                    class="btn btn-lg square-btn m-1 fw-bolder btn-warning d-flex flex-column align-items-center justify-content-center">
                                                    <i class="ti ti-file-description mb-1"
                                                        style="font-size: 1.8rem"></i>
                                                    <span>LOANS</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/app.min.js"></script>
    <script src="libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="libs/simplebar/dist/simplebar.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>
