<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;
use Takshak\Adash\Traits\Controllers\Admin\AdminTrait;

class AdminController extends Controller
{
    use AdminTrait;
    public function index($value = '')
    {
        Cache::forget('count_data');
        $count_data = Cache::remember('count_data', 60, function () {
            return [
                'blog_count'        => Blog::count(),
                'course_count'      => Course::count(),
                'service_count'     => Service::count(),
                'testimonial_count' => Testimonial::count(),
                'faq_count'         => Faq::count(),
                'page_count'        => Page::count(),
            ];
        });
        return view('admin.dashboard', compact('count_data'));
    }
}
