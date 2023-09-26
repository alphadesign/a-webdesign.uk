<x-app-layout>

    <!-- banner begin -->
    <div class="banner-5"
        style="background-image: url({{ asset('storage/'.setting('general_settings')?->option_value['banner']) }})">
        <div class="circle">
            <img src="{{ asset('assets/frontend/img/home-circle.png') }}" alt="circle">
        </div>
        <div class="container">
            <div class="row justify-content-xl-end justify-content-lg-center  justify-content-center">
                <div class="col-xl-5 col-lg-8 col-md-8">
                    <div class="banner-content">
                        <div class="banner-content-background">
                            <h1>{{ setting('general_settings')?->option_value['banner_heading'] }}</h1>
                            <p>{{ setting('general_settings')?->option_value['banner_subheading'] }}</p>
                            <div class="buttons">
                                @if (setting('general_settings')?->option_value['banner_action_name1'])
                                <a href="{{ setting('general_settings')?->option_value['banner_action_url1'] }}"
                                    class="banner-button btn-murtes">{{
                                    setting('general_settings')?->option_value['banner_action_name1'] }} <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                                @endif
                                @if (setting('general_settings')?->option_value['banner_action_name2'])
                                <a href="{{ setting('general_settings')?->option_value['banner_action_url2'] }}"
                                    class="banner-button btn-murtes-2">{{
                                    setting('general_settings')?->option_value['banner_action_name2'] }} <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->


    <!-- about begin -->
    <div class="about-5">
        <div class="container">
            <div class="row justify-content-xl-between justify-content-lg-between justify-content-center">
                <div class="col-xl-6 col-lg-10 col-md-10">
                    <div class="part-text">
                        <h2>
                            <span class="special">
                                {{ setting('general_settings')?->option_value['about']['title'] }}
                            </span>
                            {{ setting('general_settings')?->option_value['about']['subtitle'] }}
                        </h2>
                        {!! setting('general_settings')?->option_value['about']['content'] !!}
                        {{-- <p>Lorem Ipsum is simply dummy text of them printing typesetting
                            has been the industry's standard dummy text ever since the and
                            specimen book five centuries.</p>
                        <p>Lorem Ipsum is simply dummy text of them printing typesetting
                            has been the industry's standard dummy text ever since the and
                            specimen book five centuries.</p> --}}
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="part-img">
                        <img class="main-img"
                            src="{{ asset('storage/'.setting('general_settings')?->option_value['about']['main_image']) }}"
                            alt="about title" data-aos="fade" data-aos-offset="300" data-aos-duration="1000"
                            data-aos-easing="ease-in-sine">
                        <img class="overlap-img"
                            src="{{ asset('storage/'.setting('general_settings')?->option_value['about']['thumbnail']) }}"
                            alt="" data-aos="fade-left" data-aos-offset="300" data-aos-duration="1200"
                            data-aos-easing="ease-in-sine">
                        <a href="{{ setting('general_settings')?->option_value['about']['video_link']}}"
                            class="play-button mfp-iframe"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about end -->

    <!-- statics begin -->
    <div class="statics statics-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3" data-aos="new-animation" data-aos-delay="100" data-aos-duration="500">
                    <div class="single-statics">
                        <span class="number"><span class="counter">{{
                                setting('general_settings')?->option_value['years_of_experience'] }}</span>+</span>
                        <span class="title">Years of experience</span>
                        <div class="bg-icon">
                            <img src="{{ asset('assets/frontend/img/svg/timetable.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3" data-aos="new-animation" data-aos-delay="100" data-aos-duration="1000">
                    <div class="single-statics">
                        <span class="number"><span class="counter">{{
                                setting('general_settings')?->option_value['number_of_projects'] }}</span>+</span>
                        <span class="title">Total project</span>
                        <div class="bg-icon">
                            <img src="{{ asset('assets/frontend/img/svg/contract.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3" data-aos="new-animation" data-aos-delay="100" data-aos-duration="1500">
                    <div class="single-statics">
                        <span class="number"><span class="counter">{{
                                setting('general_settings')?->option_value['winning_awards'] }}</span>+</span>
                        <span class="title">Winning awards</span>
                        <div class="bg-icon">
                            <img src="{{ asset('assets/frontend/img/svg/trophy.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3" data-aos="new-animation" data-aos-delay="100" data-aos-duration="2000">
                    <div class="single-statics">
                        <span class="number"><span class="counter">{{
                                setting('general_settings')?->option_value['happy_clients'] }}</span>+</span>
                        <span class="title">Happy clients</span>
                        <div class="bg-icon">
                            <img src="{{ asset('assets/frontend/img/svg/happiness.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- statics end -->

    <!-- service begin -->
    <div class="service-2 service-4">
        <div class="container">
            <div class="this-section-title">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6">
                        <h2>This is our <br> company’s ethos</h2>
                    </div>
                    <div class="col-xl-5 col-lg-5 d-xl-flex d-lg-flex d-block align-items-center">
                        <p>We believe that your success is our success and as a result, we always work hard for our
                            customers to gain more business.</p>
                    </div>
                </div>
            </div>

            <div class="service-2-slider owl-carousel owl-theme">
                <div class="single-servcie">
                    <h3 class="service-title">Warranty<br /> managment it
                        <span class="bg-number">01</span>
                    </h3>
                    <p class="service-content">must explain to you how all this mistaken idea of denouncing of a
                        pleasure and praising pain was born</p>
                    {{-- <a href="#" class="service-details-button">details <i
                            class="fas fa-long-arrow-alt-right"></i></a> --}}
                </div>
                <div class="single-servcie">
                    <h3 class="service-title">Product<br /> control services
                        <span class="bg-number">02</span>
                    </h3>
                    <p class="service-content">must explain to you how all this mistaken idea of denouncing of a
                        pleasure and praising pain was born</p>
                    {{-- <a href="#" class="service-details-button">details <i
                            class="fas fa-long-arrow-alt-right"></i></a> --}}
                </div>
                <div class="single-servcie">
                    <h3 class="service-title">Quality <br />control system
                        <span class="bg-number">03</span>
                    </h3>
                    <p class="service-content">must explain to you how all this mistaken idea of denouncing of a
                        pleasure and praising pain was born</p>
                    {{-- <a href="#" class="service-details-button">details <i
                            class="fas fa-long-arrow-alt-right"></i></a> --}}
                </div>
                <div class="single-servcie">
                    <h3 class="service-title">Software<br /> Engineering
                        <span class="bg-number">04</span>
                    </h3>
                    <p class="service-content">must explain to you how all this mistaken idea of denouncing of a
                        pleasure and praising pain was born</p>
                    {{-- <a href="#" class="service-details-button">details <i
                            class="fas fa-long-arrow-alt-right"></i></a> --}}
                </div>
                <div class="single-servcie">
                    <h3 class="service-title">Desktop<br /> Computing
                        <span class="bg-number">05</span>
                    </h3>
                    <p class="service-content">must explain to you how all this mistaken idea of denouncing of a
                        pleasure and praising pain was born</p>
                    {{-- <a href="#" class="service-details-button">details <i
                            class="fas fa-long-arrow-alt-right"></i></a> --}}
                </div>
                <div class="single-servcie">
                    <h3 class="service-title">UI/UX<br /> Strategy
                        <span class="bg-number">06</span>
                    </h3>
                    <p class="service-content">must explain to you how all this mistaken idea of denouncing of a
                        pleasure and praising pain was born</p>
                    {{-- <a href="#" class="service-details-button">details <i
                            class="fas fa-long-arrow-alt-right"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- service end -->

    <!-- team begin -->
    {{-- <div class="team-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-8">
                    <div class="section-title-2 text-center">
                        <h2>Meet our awesome
                            team members</h2>
                        <p>But I must explain to you how all this mistaken denouncing
                            praising pain was born and I will give you</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6" data-aos="murtes-animation" data-aos-offset="300"
                    data-aos-duration="500" data-aos-easing="ease-in-sine">
                    <div class="single-member">
                        <div class="part-img">
                            <img src="{{ asset('assets/frontend/img/team-member-4.jpg') }}" alt="">
                            <div class="content-on-img">
                                <span class="name">Francis Cortez</span>
                                <span class="position">Marketing Officer</span>
                                <div class="social">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-skype"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6" data-aos="murtes-animation" data-aos-offset="300"
                    data-aos-duration="1000" data-aos-easing="ease-in-sine">
                    <div class="single-member">
                        <div class="part-img">
                            <img src="{{ asset('assets/frontend/img/team-member-5.jpg') }}" alt="">
                            <div class="content-on-img">
                                <span class="name">Francis Cortez</span>
                                <span class="position">Marketing Officer</span>
                                <div class="social">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-skype"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6" data-aos="murtes-animation" data-aos-offset="300"
                    data-aos-duration="1500" data-aos-easing="ease-in-sine">
                    <div class="single-member">
                        <div class="part-img">
                            <img src="{{ asset('assets/frontend/img/team-member-6.jpg') }}" alt="">
                            <div class="content-on-img">
                                <span class="name">Francis Cortez</span>
                                <span class="position">Marketing Officer</span>
                                <div class="social">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-skype"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6" data-aos="murtes-animation" data-aos-offset="300"
                    data-aos-duration="2000" data-aos-easing="ease-in-sine">
                    <div class="single-member">
                        <div class="part-img">
                            <img src="{{ asset('assets/frontend/img/team-member-10.jpg') }}" alt="">
                            <div class="content-on-img">
                                <span class="name">Francis Cortez</span>
                                <span class="position">Marketing Officer</span>
                                <div class="social">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-skype"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="team-bouttons">
                        <a href="#" class="btn-murtes-3">Join our team</a>
                        <a href="#" class="btn-murtes-4">Join our team</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- team end -->

    <!-- service begin -->
    <div class="service service-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-8">
                    <div class="section-title-2 text-center">
                        <span class="subtitle">Popular Classes</span>
                        <h2>We do work smartly
                            & proved truly solution</h2>
                        <p>But I must explain to you how all this mistaken denouncing
                            praising pain was born and I will give you</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($courses ?? [] as $course)
                <div class="col-xl-4 col-lg-4 col-md-6" data-aos="murtes-animation" data-aos-offset="300"
                    data-aos-duration="500" data-aos-easing="ease-in-sine">
                    <div class="single-servcie">
                        <div class="part-img">
                            <img src="{{ asset($course->thumbnail()) }}" alt="{{ $course?->title }}" width="370px">
                        </div>
                        <div class="part-text">
                            <h3 class="service-title">{{ $course?->title }}
                                <span class="bg-number">{{ $loop->iteration }}</span>
                            </h3>
                            <p class="service-content">{{ Str::limit($course?->sub_title,100) }}</p>
                            <a href="{{ route('course',[$course]) }}" class="service-details-button">Discover now <i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- service end -->

    <!-- project begin -->
    {{-- <div class="project project-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-10 col-md-8">
                    <div class="section-title-2 text-center">
                        <span class="subtitle">OUR PORTFOLIO</span>
                        <h2>We do awesome work
                            some of our work</h2>
                        <p>But I must explain to you how all this mistaken denouncing
                            praising pain was born and I will give you</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid this-container">
            <div class="part-project">
                <div class="project-2-slider owl-carousel owl-theme">
                    <div class="single-project">
                        <div class="part-img">
                            <img src="{{ asset('assets/frontend/img/project-3.jpg') }}" alt="">
                            <div class="content-on-img">
                                <h4>Firewall<br />
                                    Advance</h4>
                                <span class="category">Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-project">
                        <div class="part-img">
                            <img src="{{ asset('assets/frontend/img/project-4.jpg') }}" alt="">
                            <div class="content-on-img">
                                <h4>Firewall<br />
                                    Advance</h4>
                                <span class="category">Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-project">
                        <div class="part-img">
                            <img src="{{ asset('assets/frontend/img/project-5.jpg') }}" alt="">
                            <div class="content-on-img">
                                <h4>Firewall<br />
                                    Advance</h4>
                                <span class="category">Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-project">
                        <div class="part-img">
                            <img src="{{ asset('assets/frontend/img/project-6.jpg') }}" alt="">
                            <div class="content-on-img">
                                <h4>Data<br />
                                    Management</h4>
                                <span class="category">Networking</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div> --}}
    <!-- project end -->

    <!-- support begin -->
    {{-- <div class="support">
        <div class="container">
            <div class="row justify-content-xl-between justify-content-lg-center justify-content-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="part-img">
                        <div class="shape-1">
                            <img src="{{ asset('assets/frontend/img/about-shape-1.png') }}" alt="">
                        </div>
                        <div class="shape-2">
                            <img src="{{ asset('assets/frontend/img/team-shape.png') }}" alt="">
                        </div>
                        <img src="{{ asset('assets/frontend/img/support.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-9">
                    <div class="part-text">
                        <h2>Alpha Design <span class="special">is a webdesign </span>
                            specialist.
                        </h2>
                        <p>But I must explain to you how all this mistaken denouncing
                            praising pain was born and I will give you</p>
                        <span class="phone-number">(+44) 01706 659682</span>
                        <a href="#" class="support-button">Contact now <i class="fas fa-long-arrow-alt-right"></i></a>
                        <div class="support-guide">
                            <div class="img">
                                <img src="{{ asset('assets/frontend/img/support-guide.jpg') }}" alt="">
                            </div>
                            <div class="text">
                                <p>All the Lorem Ipsum generators on the Intern
                                    tend to repeat predefined chunks as necessa
                                    making this the first true generator on the
                                    model sentence <a href="#">structures</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="support">
        <div class="container">
            <div class="row justify-content-xl-between justify-content-lg-center justify-content-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="part-img">
                        <div class="shape-1">
                            {{-- <img src="{{ asset('assets/frontend/img/about-shape-1.png') }}" alt=""> --}}
                            <img src="{{ asset('assets/frontend/img/about-shape-111.png') }}" alt="">
                        </div>
                        <div class="shape-2">
                            <img src="{{ asset('assets/frontend/img/team-shape.png') }}" alt="">
                        </div>
                        <img src="https://a-webdesign.com/wp-content/uploads/2013/12/Ioannis-Ntizoglou.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-9">
                    <div class="part-text">
                        <h2>Alpha Design <span class="special">is a webdesign </span>
                            specialist.
                        </h2>
                        <p>But I must explain to you how all this mistaken denouncing
                            praising pain was born and I will give you</p>
                        <span class="phone-number">(+44) 01706 659682</span>
                        <a href="#" class="support-button">Contact now <i class="fas fa-long-arrow-alt-right"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- support end -->

    <!-- support begin -->
    {{-- <div class="support support-3">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-xl-5 col-lg-5 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="part-text">
                        <span class="phone-number">+00 856 434 862</span>
                        <p>But I must explain to you how all this mistaken
                            denouncing praising pain was born and via us
                            passing pain was born give you.</p>

                        <a href="#" class="support-button">Contact now <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="part-cta">
                        <a href="#" class="cta-button">CALL FOR ADVICE NOW</a>
                        <h2>To make requests
                            for further information,
                            contact us via our social
                            channels.</h2>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- support end -->



</x-app-layout>
