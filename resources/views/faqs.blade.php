@section('title', "FAQ | ".config('site.site.title'))
@section('description', "FAQ | ".config('site.site.description'))
@section('keywords', "FAQ | ".config('site.site.keyword'))
{{--  show call to action on footer  --}}
<x-app-layout :callToAction='true'>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>FAQ</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>FAQ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- faq begin -->
    <div class="faq">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="single-faq">
                        <h3>Please find below the most common FAQ</h3>
                        <p>(Please note that if any of your questions cannot be found here, don’t hesitate to contact
                            us)</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around">
                @foreach($faqs ?? [] as $faq)
                <div class="col-xl-5 col-lg-5 col-md-8">
                    <div class="single-faq">
                        <h3>Q{{ $loop->iteration }}. {{ $faq?->question }}</h3>
                        <p>{!! $faq->answer !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- faq end -->
</x-app-layout>
