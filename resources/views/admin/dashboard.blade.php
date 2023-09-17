<x-admin.layout>
    <x-admin.breadcrumb
        title='Dashboard'
        :links="[
            ['text' => 'Dashboard' ],
        ]" />


    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4 font-white font-20">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Courses</h5>
                        <h4 class="font-weight-medium font-size-24">
                            {{ $count_data['course_count'] }}
                            <i class="fas fa-arrow-up text-success ml-2"></i>
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="{{ route('admin.courses.index') }}" class="text-white-50 stretched-link"><i class="fas fa-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Till Today</p>
                    </div>
                </div>
            </div>
        </div>

        @can('blog_posts_access')
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-secondary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4 font-white font-20">
                            <i class="fas fa-blog"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Blog Posts</h5>
                        <h4 class="font-weight-medium font-size-24">
                            {{ $count_data['blog_count'] }}
                            <i class="fas fa-arrow-up text-success ml-2"></i>
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="{{ route('admin.blogs.index') }}" class="text-white-50 stretched-link"><i class="fas fa-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Till Today</p>
                    </div>
                </div>
            </div>
        </div>
        @endcan


        @can('faqs_access')
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-info text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4 font-white font-20">
                            <i class="fas fa-question"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">FAQs</h5>
                        <h4 class="font-weight-medium font-size-24">
                            {{ $count_data['faq_count'] }}
                            <i class="fas fa-arrow-up text-success ml-2"></i>
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="{{ route('admin.faqs.index') }}" class="text-white-50 stretched-link"><i class="fas fa-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Till Today</p>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('pages_access')
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4 font-white font-20">
                            <i class="fas fa-file"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Pages</h5>
                        <h4 class="font-weight-medium font-size-24">
                            {{ $count_data['page_count'] }}
                            <i class="fas fa-arrow-up text-success ml-2"></i>
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="{{ route('admin.pages.index') }}" class="text-white-50 stretched-link"><i class="fas fa-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Till Today</p>
                    </div>
                </div>
            </div>
        </div>
        @endcan


        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-success text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4 font-white font-20">
                            <i class="fas fa-file"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Testimonial</h5>
                        <h4 class="font-weight-medium font-size-24">
                            {{ $count_data['testimonial_count'] }}
                            <i class="fas fa-arrow-up text-success ml-2"></i>
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="{{ route('admin.testimonials.index') }}" class="text-white-50 stretched-link"><i class="fas fa-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Till Today</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-left mini-stat-img mr-4 font-white font-20">
                            <i class="fas fa-file"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Services</h5>
                        <h4 class="font-weight-medium font-size-24">
                            {{ $count_data['service_count'] }}
                            <i class="fas fa-arrow-up text-success ml-2"></i>
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-right">
                            <a href="{{ route('admin.services.index') }}" class="text-white-50 stretched-link"><i class="fas fa-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Till Today</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-admin.layout>
