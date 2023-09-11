<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();
        if ($request->get('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('search') . '%');
            });
        }
        $courses = $query->latest()->paginate(25)->withQueryString();
        return view('admin.courses.index')
            ->with('courses', $courses);
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'               =>  'required',
            'sub_title'           =>  'nullable',
            'description'         =>  'nullable',
            'status'              =>  'required',
            'popular'             =>  'required',
            'thumbnail'           =>  'nullable|image',
            'video_url'           =>  'required',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $course = new Course();
        $course->title                     =  $request->post('title');
        $course->sub_title                 =  $request->post('sub_title');
        $course->slug                      =  Str::slug($request->post('title'));
        $course->description               =  $request->post('description');
        $course->video_url                 =   $this->getYoutubeEmbedUrl($request->post('video_url'));
        $course->status                    =  $request->post('status');
        $course->popular                   =  $request->post('popular');
        $course->meta_title                =  $request->post('meta_title');
        $course->meta_keyword              =  $request->post('meta_keyword');
        $course->meta_description          =  $request->post('meta_description');

        if ($request->file('thumbnail')) {
            $course->thumbnail = 'courses/' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            Imager::init($request->file('thumbnail'))
                ->resizeFit(370, 212)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($course->thumbnail);
        }
        $course->save();

        return to_route('admin.courses.index')->withSuccess('SUCCESS !! New Course is successfully created');
    }


    public function show(Course $course)
    {
        return view('admin.courses.show')->with('course', $course);
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit')->with('course', $course);
    }


    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'               =>  'required',
            'sub_title'           =>  'nullable',
            'description'         =>  'nullable',
            'status'              =>  'required',
            'popular'             =>  'required',
            'thumbnail'           =>  'nullable|image',
            'video_url'           =>  'required',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $course->title                     =  $request->post('title');
        $course->sub_title                 =  $request->post('sub_title');
        $course->slug                      =  Str::slug($request->post('title'));
        $course->description               =  $request->post('description');
        $course->video_url                 =  $this->getYoutubeEmbedUrl($request->post('video_url'));
        $course->status                    =  $request->post('status');
        $course->popular                   =  $request->post('popular');
        $course->meta_title                =  $request->post('meta_title');
        $course->meta_keyword              =  $request->post('meta_keyword');
        $course->meta_description          =  $request->post('meta_description');

        if ($request->file('thumbnail')) {
            $image_thumb = public_path('storage/' . $course->thumbnail);
            if (File::exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $course->thumbnail = 'courses/' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            Imager::init($request->file('thumbnail'))
                ->resizeFit(370, 212)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($course->thumbnail);
        }
        $course->save();

        return to_route('admin.courses.index')->withSuccess('SUCCESS !! Course is successfully updated');
    }


    public function destroy(Course $course)
    {
        $image_thumb = public_path('storage/' . $course->thumbnail);
        if (File::exists($image_thumb)) {
            File::delete($image_thumb);
        }
        $course->delete();
        return to_route('admin.courses.index')->withErrors('Course has been successfully deleted.');
    }

    function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }
}
