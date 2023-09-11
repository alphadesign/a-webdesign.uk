@section('title', "Testimonial | ".config('site.site.title'))
@section('description', "Testimonial | ".config('site.site.description'))
@section('keywords', "Testimonial | ".config('site.site.keyword'))
{{--  show call to action on footer  --}}
<x-app-layout :callToAction='true' >
    @php($callToAction=true)
    @push('styles')
    <style>
        .more {
            position: relative;
            bottom: 22px;
            color: orange;
        }
        .single-testimonial .part-body p {
            height: 145px;
            overflow: hidden;
        }
    </style>

    @endpush

    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>Testimonial</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Testimonial</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- testimonial begin -->
    <div class="testimonial testimonial-page">
        <div class="container">
            <div class="row">
                @foreach ($testimonials ?? [] as $testimonial)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-testimonial">
                        <div class="part-body">
                            <div class="rate">
                                <ul>
                                    @for ($i=1;$i<=$testimonial?->rating ?? 5;$i++)
                                        <li><i class="fas fa-star"></i></li>
                                    @endfor
                                </ul>
                            </div>
                            <p>{{ $testimonial?->content }}</p>
                            <a class="more" href="javascript:void(0)">Read more </a>
                        </div>
                        <div class="part-user">
                            <div class="part-img">
                                <img src="{{ asset($testimonial->avatarUrl()) }}" alt="{{ $testimonial?->title }}">
                            </div>
                            <div class="part-info">
                                <span class="name">{{ $testimonial?->title }}</span>
                                <span class="position">{{ $testimonial?->subtitle }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- testimonial end -->

    <!-- testimonial begin -->
    {{-- <div class="testimonial-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="section-title-2 text-center">
                        <h2>See what our customers say
                            about us.</h2>
                        <p>All the Lorem Ipsum generators on the Internet tend to
                            generator on theuses latin words.</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-3-slide owl-carousel owl-theme">
                @foreach ($testimonials ?? [] as $testimonial)
                <div class="single-testimonial">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 offset-xl-1 offset-lg-1 offset-0">
                            <div class="part-img">
                                <img src="{{ asset($testimonial->avatarUrl()) }}" alt="{{ $testimonial?->title }}">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 offset-xl-1 offset-lg-1 offset-0">
                            <div class="part-text">
                                <div class="text-body">
                                    <div class="rate">
                                        <ul>
                                            @for ($i=1;$i<=$testimonial?->rating ?? 5;$i++)
                                                <li class="rated"><i class="fas fa-star"></i></li>
                                            @endfor
                                            @if($testimonial?->rating<5)
                                             @for ($i=$testimonial?->rating;$i<5;$i++)
                                             <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                             @endfor
                                            @endif
                                        </ul>
                                    </div>
                                    <p>{{ $testimonial?->content }}</p>
                                </div>
                                <div class="user-data">
                                    <span class="name">{{ $testimonial?->title }}</span>
                                    <span class="position">{{ $testimonial?->subtitle }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- testimonial end -->
    @push('scripts')
    <script>
        $('.more').click(function(e) {
                e.stopPropagation();
                $(this).parent().find('p').css({
                    'height': 'auto'
                })
            });

            $(document).click(function() {
                $('.single-testimonial .part-body p').css({
                    'height': '145px',
                    'overflow':'hidden'
                })
            })
    </script>
    @endpush
</x-app-layout>
