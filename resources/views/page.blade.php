@section('title', $page?->meta_title, config('site.site.title'))
@section('description', $page?->meta_description,config('site.site.description'))
@section('keywords', $page?->meta_keyword,config('site.site.keyword'))
{{-- show call to action on footer --}}
<x-app-layout :callToAction='true'>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>{{ $page?->title }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>{{ $page?->title }}</li>
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
                            <img src="{{ $page->banner() }}" alt="{{ $page?->title }}">
                        </div>
                        <div class="part-body">
                            <div class="blog-head">
                                <h2>{{ $page?->title }}</h2>
                            </div>
                            <p>{!! $page?->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio end -->
</x-app-layout>
