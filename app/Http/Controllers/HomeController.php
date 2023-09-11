<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->roles->contains('name', 'admin')) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    public function home()
    {
        $courses = Course::where('status', true)->limit(6)->get();
        return view('home')->with('courses', $courses);
    }
    public function about()
    {
        $about = About::first();
        return view('about')->with('about', $about);
    }
    public function testimonials()
    {
        $testimonials = Testimonial::where('status', true)->get();
        return view('testimonials')->with('testimonials', $testimonials);
    }
    public function faq()
    {
        $faqs = Faq::where('status', true)->orderBy('pref')->get();
        return view('faqs')->with('faqs', $faqs);
    }

    public function portfolios()
    {
        $portfolios = Portfolio::where('status', true)->get();
        return view('portfolios')->with('portfolios', $portfolios);
    }
    public function portfolio(Portfolio $portfolio)
    {
        return view('portfolio')->with('portfolio', $portfolio);
    }

    public function service(Service $service)
    {
        return view('service')->with('service', $service);
    }
    public function blogs()
    {
        $blogs = Blog::where('status', true)->with('category')->paginate();
        return view('blogs')->with('blogs', $blogs);
    }
    public function blog(Blog $blog)
    {
        $categories = BlogCategory::where('status', true)->get();
        $blogs = Blog::where('status', true)->where('id', '!=', $blog->id)->limit(5)->get();
        return view('blog')->with('blog', $blog)->with('blogs', $blogs)->with('categories', $categories);
    }


    public function courses()
    {
        $courses = Course::where('status', true)->get();
        return view('courses')->with('courses', $courses);
    }
    public function course(Course $course)
    {
        return view('course')->with('course', $course);
    }
}
