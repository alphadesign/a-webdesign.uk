@section('title', "Web Design and Software/App Courses | ".config('site.site.title'))
@section('description', "Web Design and Software/App Courses | ".config('site.site.description'))
@section('keywords', "Web Design and Software/App Courses | ".config('site.site.keyword'))

{{-- show call to action on footer --}}
<x-app-layout :callToAction='true'>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>Courses</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Courses</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- course begin -->
    <div class="blog blog-page">
        <div class="container">
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
                            <a href="#" class="service-details-button">Discover now <i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- course end -->
</x-app-layout>
