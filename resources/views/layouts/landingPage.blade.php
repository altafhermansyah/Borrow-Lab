<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Borrow Lab</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="/" class="navbar-brand p-0">
                    <h1 class="text-primary mb-0"><i class="fab fa-slack me-2"></i> BorrowLab</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-0 mx-lg-auto">
                        <a href="/"
                            class="nav-item nav-link @if (Request()->is('/')) active @endif">Home</a>
                        <a href="/about"
                            class="nav-item nav-link @if (Request()->is('about')) active @endif">About</a>
                        <a href="/services"
                            class="nav-item nav-link @if (Request()->is('services')) active @endif">Services</a>
                        <div class="nav-btn px-3">
                        </div>
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-shrink-0 ps-4 d-grid gap-2">

                </div>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <button class="btn btn-primary" type="button">
                            <a href="{{ route('login') }}"
                                class="d-none d-xl-flex flex-shrink-0 ps-4 py-2 px-4 flex-shrink-0"
                                style="color: white;">Sign In</a>
                        </button>
                    @endif

                    @if (Route::has('register'))
                        <div class="d-none d-xl-flex flex-shrink-0 ps-4 d-grid gap-2">
                            <button class="btn btn-primary" type="button">
                                <a href="{{ route('register') }}"
                                    class="d-none d-xl-flex flex-shrink-0 py-2 px-4 flex-shrink-0"
                                    style="color: white;">Sign Up</a>
                            </button>
                        </div>
                    @endif
                @else
                    <button class="btn btn-primary" type="button">
                        <a href="{{ route('home') }}" class="d-none d-xl-flex flex-shrink-0 py-2 px-4 flex-shrink-0"
                            style="color: white;">Back to Dashboard</a>
                    </button>
                @endguest


            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    {{-- Main Section --}}
    <main>
        @yield('content')
    </main>
    {{-- End Main Section --}}
    <!-- Footer Start -->
    <div class="container-fluid footer py-3 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-xl-9">
                    <div class="mb-5">
                        <div class="d-flex justify-content-between">
                            <div class="footer-item text-start">
                                <a href="index.html" class="p-0">
                                    <h3 class="text-white"><i class="fab fa-slack me-3"></i>BorrowLab</h3>
                                    <!-- <img src="img/logo.png" alt="Logo"> -->
                                </a>
                                <p class="text-white mb-3">Comprehensive equipment lending service offered by our
                                    school’s computer lab</p>
                                <div class="footer-btn d-flex justify-content-start">
                                    <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3" href="#"><i
                                            class="fab fa-instagram"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-0" href="#"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <div class="footer-item">
                                <h4 class="text-white mb-4">Useful Links</h4>
                                <a href="/"><i class="fas fa-angle-right me-2"></i> Home</a>
                                <a href="/about"><i class="fas fa-angle-right me-2"></i> About Us</a>
                                <a href="/services"><i class="fas fa-angle-right me-2"></i> Services</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-3">
        <div class="container">
            <div class="row g-4 ajustify-content-center align-items-center">
                <div class="col-md-12 text-center">
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i
                                class="fas fa-copyright text-light me-2"></i>BorrowLab</a>, All right reserved.</span>
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
