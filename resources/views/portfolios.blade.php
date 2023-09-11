@section('title', "Web Design and Software/App Portfolio | ".config('site.site.title'))
@section('description', "Web Design and Software/App Portfolio | ".config('site.site.description'))
@section('keywords', "Web Design and Software/App Portfolio | ".config('site.site.keyword'))
@push('styles')
<style>
    .items:hover {
        top: -7px;
        color: #FFCC00;
        box-shadow: 0 0 16px rgba(0, 0, 0, 0.25);
        color: #FFCC00;
    }
</style>
@endpush
{{-- show call to action on footer --}}
<x-app-layout :callToAction='true'>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>Portfolios</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Portfolios</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- portfolio begin -->
    <div class="blog blog-page">
        <div class="container">
            <div class="row">
                @foreach ($portfolios ?? [] as $portfolio)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    {{-- <a href="{{ route('portfolio',[$portfolio]) }}" class="items"> --}}
                        <a href="{{ $portfolio->url ?  $portfolio->url : route('portfolio',[$portfolio])  }}" class="items" target="{{ $portfolio->url ?  '_blank' : '_self' }}">
                            <div class="single-blog">
                                <div class="part-img">
                                    <img src="{{ asset($portfolio->image()) }}" alt="{{ $portfolio?->title }}">
                                </div>
                                <div class="part-meta">
                                    <ul>
                                        <li style="text-transform: uppercase">
                                            {{ $portfolio?->title }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- blog end -->
</x-app-layout>
