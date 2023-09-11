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
    <meta name="author" content="config('app.name', 'a-webdesign')" />
    <meta property="og:image" content="@yield('image', asset('assets/frontend/img/logo-2.png'))" />
    <meta property="og:image:width" content="870" />
    <meta property="og:image:height" content="456" />
    <meta property="og:locale" content="en_GB" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title', config('app.name', 'a-webdesign'))" />
    <meta property="og:description" content="@yield('description', config('app.description', 'a-webdesign'))" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="fb:app_id" content="{{ config('app.facebook_app_id','AWebdesign.co.uk') }}"" />
    <meta name=" twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', config('app.name', 'a-webdesign'))" />
    <meta name="twitter:description" content="" @yield('description', config('app.description', 'a-webdesign' ))" />
    <meta name="twitter:image" content="@yield('image', asset('assets/frontend/img/logo-2.png'))" />
    <link rel="canonical" href="{{ request()->url() }}" />
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
                                <a href="{{ route('home') }}">
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
                                    <li @class(['nav-item', 'active'=> request()->routeIs('home')])>
                                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li @class(['nav-item', 'active'=> request()->routeIs('about')])>
                                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Services
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                            @foreach (\App\Models\Service::where('status',true)->get() ?? [] as $service)
                                            <a class="dropdown-item" href="{{ route('service',[$service]) }}">{{ $service?->name }}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li @class(['nav-item', 'active'=> request()->routeIs('portfolios') || request()->routeIs('portfolio')])>
                                        <a class="nav-link" href="{{ route('portfolios') }}">Portfolio</a>
                                    </li>
                                    <li @class(['nav-item', 'active'=> request()->routeIs('testimonials')])>
                                        <a class="nav-link" href="{{ route('testimonials') }}">Testimonials</a>
                                    </li>
                                    <li @class(['nav-item', 'active'=> request()->routeIs('contact')])>
                                        <a class="nav-link" href="{{ route('contact') }}">Contant Us</a>
                                    </li>
                                    <li @class(['nav-item', 'active'=> request()->routeIs('faq')])>
                                        <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
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
                                <a href="{{ route('contact') }}" class="quote-button">Get A Quote</a>
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
    {{-- footer-4 --}}
    <div @class(['footer', 'footer-2'=> !$callToAction])>
        <div class="container">
            @if($callToAction)
            <div class="call-to-action">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="cta-content">
                            <div class="part-text">
                                <h2>Have any project in your mind?</h2>
                                <p>All the Lorem Ipsum generators on the Intern tend to repeat<br />
                                    predefined chunks as necessa making.</p>
                            </div>
                            <div class="part-button">
                                <a href="{{ route('contact') }}">Contact now <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4">
                    <div class="about-widget">
                        <h3>About A-Webdesign</h3>
                        <p>Alpha-Design is based in Manchester. With over 11 years of experience in design and
                            programming, we combine our creative and technical expertise to provide a customised
                            solution for each individual client.</p>
                    </div>
                </div>
                @foreach (\App\Models\Page::where('status',true)->get()->split(2) ?? [] as $groups)
                <div class="col-xl-2 col-lg-2">
                    <div class="links-widget">
                        <h3>
                            @if ($loop->index==0)

                            Company
                            @else
                            &nbsp;
                            @endif
                        </h3>
                        <ul>
                            @foreach ($groups ?? [] as $page)
                            <li>
                                <a href="#">{{ $page->title }}</a>
                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
                @endforeach



                <div class="col-xl-2 col-lg-2">
                    <div class="links-widget">
                        <h3>Help Center</h3>
                        <ul>
                            <li>
                                <a href="{{ route('portfolios') }}">Portfolio</a>
                            </li>
                            <li>
                                <a href="{{ route('faq') }}">FAQ</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('blogs') }}">Blogs</a>
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
                        <p>Copyright © {{ now()->format('Y') }} {{ config('app.name') }}. All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="social-area">
                        <ul>
                            <li>
                                <a class="facebook" href="https://www.facebook.com/AWebdesign.co.uk" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a class="twitter" href="https://twitter.com/alpha_webdesign" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="youtube" href="https://www.youtube.com/@computingacademy" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
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
