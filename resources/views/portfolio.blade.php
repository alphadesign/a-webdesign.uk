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
                        <h2>{{ $portfolio?->title }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('portfolios') }}">Portfolios</a></li>
                            <li>{{ $portfolio?->title }}</li>
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
                            <img src="{{ $portfolio->image() }}" alt="">
                        </div>
                        <div class="part-body">
                            <div class="blog-head">
                                <h2>{{ $portfolio?->title }}</h2>
                            </div>
                            <p>{!! $portfolio?->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio end -->
</x-app-layout>
