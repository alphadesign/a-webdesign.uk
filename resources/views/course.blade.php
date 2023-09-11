@section('title', "Web Design and Software/App Portfolio | ".config('site.site.title'))
@section('description', "Web Design and Software/App Portfolio | ".config('site.site.description'))
@section('keywords', "Web Design and Software/App Portfolio | ".config('site.site.keyword'))
{{-- show call to action on footer --}}
<x-app-layout :callToAction='true'>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>{{ $course?->title }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('portfolios') }}">Courses</a></li>
                            <li>{{ $course?->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- portfolio details -->
    <div class="blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog-details-area">
                        <div class="part-img">
                            <iframe width="100%" height="415" src="https://www.youtube.com/embed/QuPSn1ZLovA?si=oQkl5oD1dCC5fh-a" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            {{-- <img src="{{ $course->thumbnail() }}" alt=""> --}}
                        </div>
                        <div class="part-body">
                            <div class="blog-head">
                                <h2>{{ $course?->title }}</h2>
                            </div>
                            <p>{!! $course?->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio end -->
</x-app-layout>
