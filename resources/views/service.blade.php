@section('title', $service?->meta_title)
@section('description', $service?->meta_description)
@section('keywords', $service?->meta_keyword)
{{-- show call to action on footer --}}
<x-app-layout :callToAction='true'>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>{{ $service?->name }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>{{ $service?->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- service details -->
    <div class="blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog-details-area">
                        <div class="part-img">
                            <img src="{{ $service->mainImage() }}" alt="">
                        </div>
                        <div class="part-body">
                            <div class="blog-head">
                                <h2>{{ $service?->name }}</h2>
                            </div>
                            <p>{!! $service?->short_description !!}</p>
                            <p>{!! $service?->long_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service end -->
</x-app-layout>
