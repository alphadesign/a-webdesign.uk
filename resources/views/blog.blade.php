@section('title', $blog?->meta_title)
@section('description', $blog?->meta_description)
@section('keywords', $blog?->meta_keyword)
{{-- show call to action on footer --}}
<x-app-layout :callToAction='true'>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>{{ $blog?->title }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>{{ $blog?->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog details -->
    <div class="blog-details">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <div class="category">
                                <h4 class="title">Post Catageory</h4>
                                <ul>
                                    @foreach ($categories ?? [] as $category)
                                    <li>
                                        <a href="{{ route('blogs',[$category]) }}">{{ $category?->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="recent-blog">
                                <h4 class="title">Recent Post</h4>
                                @foreach ($blogs ?? [] as $blog)
                                <a href="{{ route('blog',[$blog]) }}">
                                    <div class="single-blog">
                                        <div class="part-img">
                                            <img src="{{ $blog->imageThumb() }}" alt="{{ $blog?->title }}"
                                                width="100px">
                                        </div>
                                        <div class="part-text">
                                            <span class="date">{{ $blog->created_at->format('d.m.Y') }}</span>
                                            <p>{{ $blog?->title }}</p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="blog-details-area">
                        <div class="part-img">
                            <img src="{{ asset($blog->image()) }}" alt="{{ $blog?->title }}">
                        </div>
                        <div class="part-body">
                            <div class="blog-head">
                                <h2>{{ $blog?->title }}</h2>
                            </div>
                            <p>{{ $blog?->sub_title }}</p>

                            {!! $blog?->content !!}

                        </div>
                        <div class="blog-bottom">
                            <div class="right-side">
                                <ul>
                                    <li><strong>Share:</strong></li>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-dribbble"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog end -->
</x-app-layout>
