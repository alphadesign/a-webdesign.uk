@section('title', 'Contact Alpha Design today | Alpha Webdesign')
@section('description', 'Contact Alpha Design | the No1 web design company in Manchester which provides customers with
web solutions. Tel: 0044 79 4323 5968 &#x2d; 079 4323 5968')
@section('keywords', 'Contact Alpha Design | the No1 web design company in Manchester which provides customers with web
solutions. Tel: 0044 79 4323 5968 &#x2d; 079 4323 5968')
<x-app-layout>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>CONTACT US</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- contact begin -->
    <div class="contact">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-xl-5 col-lg-6">
                    <div class="contact-address">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-4">
                                <div class="single-address">
                                    <div class="part-icon">
                                        <img src="{{ asset('assets/frontend/img/svg/notification.svg') }}" alt="email">
                                        <span class="title">Email</span>
                                    </div>
                                    <div class="part-text">
                                        <p>team@a-webdesign.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-4">
                                <div class="single-address">
                                    <div class="part-icon">
                                        <img src="{{ asset('assets/frontend/img/svg/hierarchy.svg') }}" alt="mobile">
                                        <span class="title">Tel</span>
                                    </div>
                                    <div class="part-text">
                                        <p>(+44) 01706 390331</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-4">
                                <div class="single-address">
                                    <div class="part-icon">
                                        <img src="{{ asset('assets/frontend/img/svg/start.svg') }}" alt="address">
                                        <span class="title">Add:</span>
                                    </div>
                                    <div class="part-text">
                                        <p>103 Rochdale Road, Milnrow
                                            Lancashire, United Kingdom
                                            Postcode: OL16 4DU</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="contact-form">
                        <span class="subtitle">GET IN TOUCH</span>
                        <h4>Need a better quote
                            for our service?</h4>
                        <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" placeholder="Ara Sompa" required>
                            <input type="text" name="mobile" placeholder="+00 568 468 864" required>
                            <input type="email" name="email" placeholder="Email here" required>
                            <textarea placeholder="Message...." name="message" required></textarea>
                            <button type="submit" class="btn-murtes-6">Submit Now <i
                                    class="fas fa-long-arrow-alt-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="map" id="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4733.746456667373!2d-2.118402!3d53.613564000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb9209bda9d8d%3A0x6d9895d2b6512297!2s103+Rochdale+Rd%2C+Milnrow%2C+Rochdale+OL16+3LL%2C+UK!5e0!3m2!1sen!2suk!4v1507502544819"
                width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <!-- contact end -->


</x-app-layout>
