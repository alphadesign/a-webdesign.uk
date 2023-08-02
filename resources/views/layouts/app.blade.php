<!DOCTYPE html>
<html lang="eng">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'a-webdesign'))</title>
    <meta name="description" content="@yield('description', config('app.description', 'a-webdesign'))" />
    <meta name="keywords" content="@yield('keywords', config('app.keywords', 'a-webdesign'))" />
    <meta name="author" content="Akhilesh Gupta" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.html') }}" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.min.css') }}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/flaticon.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <!-- aos scoll animation css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">

    @stack('styles')
</head>

<body>
    <x-alertt-alert />
    <!-- preloader begin -->
    <div class="preloader">
        <div id="circle_square">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end -->

    <!-- header begin -->
    <div class="header-5">
        <div class="container this-container">
            <div class="row">
                <div class="col-xl-2 col-lg-3 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-7 d-xl-block d-lg-block d-flex align-items-center">
                            <div class="logo">
                                <a href="{{ route('root') }}">
                                    {{-- <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="logo"> --}}
                                    <img src="{{ asset('assets/image/logo-Alpha3-300x47.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-5 d-xl-none d-lg-none d-block">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-9">
                    <div class="mainmenu">
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About Us</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Services
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                            <a class="dropdown-item" href="#">Alpha Design Package’s Details</a>
                                            <a class="dropdown-item" href="#">Manchester Webdesign</a>
                                            <a class="dropdown-item" href="#">Heywood Webdesign and web design in Heywood</a>
                                            <a class="dropdown-item" href="#">Website Development</a>
                                            <a class="dropdown-item" href="#">Domain Registeration</a>
                                            <a class="dropdown-item" href="#">Web Maintenance</a>
                                            <a class="dropdown-item" href="#">Logo Design</a>
                                            <a class="dropdown-item" href="#">Social Media Marketing</a>
                                            <a class="dropdown-item" href="#">IOS App Development</a>
                                            <a class="dropdown-item" href="#">QR Codes</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Portfolio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('contact') }}">Contant Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="support-area">
                        <ul>
                            <li>
                                <a href="#" class="quote-button">Get A Quote</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->

    {{ $slot }}


    <!-- footer begin -->
    <div class="footer footer-2">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-xl-4 col-lg-4">
                    <div class="about-widget">
                        <h3>About murtes</h3>
                        <p>It uses a dictionary of over 200 Latin words
                            combined with a handful of model sentence
                            structures generate which looks reasonable
                            generated is therefore allow.</p>
                        <p>It uses a dictionary of over 200 Latin words
                            generated is therefore allow.</p>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2">
                    <div class="links-widget">
                        <h3>Company</h3>
                        <ul>
                            <li>
                                <a href="#">What's new</a>
                            </li>
                            <li>
                                <a href="#">Try Demo</a>
                            </li>
                            <li>
                                <a href="#">Terms of service</a>
                            </li>
                            <li>
                                <a href="#">Page Builder</a>
                            </li>
                            <li>
                                <a href="#">Privacy policy</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2">
                    <div class="links-widget">
                        <h3>Product</h3>
                        <ul>
                            <li>
                                <a href="#">Features</a>
                            </li>
                            <li>
                                <a href="#">Pricing</a>
                            </li>
                            <li>
                                <a href="#">Customers</a>
                            </li>
                            <li>
                                <a href="#">Page Builder</a>
                            </li>
                            <li>
                                <a href="#">What's new</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2">
                    <div class="links-widget">
                        <h3>Help Center</h3>
                        <ul>
                            <li>
                                <a href="#">Help centre</a>
                            </li>
                            <li>
                                <a href="#">Email Us</a>
                            </li>
                            <li>
                                <a href="#">Customers</a>
                            </li>
                            <li>
                                <a href="#">Message Us</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- footer end -->

    <!-- copyright begin -->
    <div class="copyright">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="cp-area">
                        <p>Copyright © 2019 murtes. All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="social-area">
                        <ul>
                            <li>
                                <a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a class="twitter" href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="skype" href="#"><i class="fab fa-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright end -->
    <!-- jquery -->
    <script src="{{ asset('assets/frontend/js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery/1.10.2/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/frontend/js/jquery.magnific-popup.js') }}"></script>
    <!-- counter up js -->
    <script src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/counter-us-activate.js') }}"></script>
    <!-- waypoints js-->
    <script src="{{ asset('assets/frontend/js/jquery.waypoints.js') }}"></script>
    <!-- wow js-->
    <script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
    <!-- aos js -->
    <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
    <!-- main -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
