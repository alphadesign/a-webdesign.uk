@section('title', $about?->meta_title)
@section('description', $about?->meta_description)
@section('keywords', $about?->meta_keyword)
{{--  show call to action on footer  --}}
<x-app-layout :callToAction='true'>

    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>{{ $about?->name }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>{{ $about?->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- case info begin -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-9">
                <div class="case-info pt-5">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <p>{{ $about?->short_description }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- case info end -->

    <!-- case details begin -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-xl-9">
                <div class="case-details pt-2">
                    @if ($about->main_image)
                        <div class="part-img">
                            <img src="{{ $about->mainImage() }}" alt="{{ $about->name }}">
                        </div>
                    @endif
                    <div class="part-text mt-4">
                        {!! $about->long_description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- case details end -->

</x-app-layout>
