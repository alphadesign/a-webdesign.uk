@section('title', "Blog Alpha Design the No1 Webdesign | ".config('site.site.title'))
@section('description', "Latest posts: Blog on Alpha Design | ".config('site.site.description'))
@section('keywords', "Blog Alpha Design the No1 Webdesign | ".config('site.site.keyword'))
{{-- show call to action on footer --}}
<x-app-layout :callToAction='true'>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-murtes">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrumb-content">
                        <h2>Blogs</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Blogs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blogs begin -->
    <div class="blog blog-page">
        <div class="container">
            <div class="row">
                @foreach ($blogs ?? [] as $blog)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <a href="{{ route('blog',[$blog]) }}">
                        <div class="single-blog">
                            <div class="part-text">
                                <h3>{{ $blog?->title }}</h3>
                                <p>{{ $blog?->sub_title }}</p>
                            </div>
                            <div class="part-img">
                                <img src="{{ asset($blog->imageThumb()) }}" alt="">
                            </div>
                            <div class="part-meta">
                                <ul>
                                    <li>
                                        <strong>Posted Under :</strong> {{ $blog?->category?->name }}
                                    </li>
                                    <li>
                                        <strong>Posted At :</strong> {{ $blog->created_at->format('d F Y') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-xl-12 col-lg-12">
                    {!! $blogs->links('pagination.pagination') !!}
                </div>
            </div>
        </div>
    </div>
    <!-- blog end -->
</x-app-layout>
