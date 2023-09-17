<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogCategories = BlogCategory::where('status', true)->get();
        $query = Blog::query()->with('category');
        if ($request->get('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('search') . '%');
            });
        }
        if ($request->get('blog_category_id')) {
            $query->where(function ($query) use ($request) {
                $query->where('blog_category_id', $request->get('blog_category_id'));
            });
        }
        $blogs = $query->paginate(25)
            ->withQueryString();
        return view('admin.blogs.index')
            ->with('blogs', $blogs)
            ->with('blogCategories', $blogCategories);
    }

    public function create()
    {
        $blogCategories = BlogCategory::where('status', true)->get();
        return view('admin.blogs.create')->with('blogCategories', $blogCategories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_category_id'    =>  'required',
            'title'               =>  'required',
            'sub_title'           =>  'nullable',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image_thumb'         =>  'nullable|image',
            'image'               =>  'nullable|image',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $blog = new Blog();
        $blog->blog_category_id          =  $request->post('blog_category_id');
        $blog->title                     =  $request->post('title');
        $blog->sub_title                 =  $request->post('sub_title');
        $blog->slug                      =  Str::slug($request->post('title'));
        $blog->content                   =  $request->post('content');
        $blog->status                    =  $request->post('status');
        $blog->meta_title                =  $request->post('meta_title');
        $blog->meta_keyword              =  $request->post('meta_keyword');
        $blog->meta_description          =  $request->post('meta_description');

        if ($request->file('image_thumb')) {
            $blog->image_thumb = 'blogs/' . time() . '.' . $request->file('image_thumb')->getClientOriginalExtension();
            Imager::init($request->file('image_thumb'))
                ->resizeFit(370, 212)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($blog->image_thumb);
        }

        if ($request->file('image')) {
            $blog->image = 'blogs/' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            Imager::init($request->file('image'))
                ->resizeFit(800, 390)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($blog->image);
        }

        $blog->save();
        return to_route('admin.blogs.index')->withSuccess('SUCCESS !! New Blog is successfully created');
    }


    public function show(Blog $blog)
    {
        return view('admin.blogs.show')->with('blog', $blog);
    }

    public function edit(Blog $blog)
    {
        $blogCategories = BlogCategory::where('status', true)->get();
        return view('admin.blogs.edit')->with('blog', $blog)->with('blogCategories', $blogCategories);
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'blog_category_id'    =>  'required',
            'title'               =>  'required',
            'sub_title'           =>  'nullable',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image_thumb'         =>  'nullable|image',
            'image'               =>  'nullable|image',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $blog->blog_category_id          =  $request->post('blog_category_id');
        $blog->title                     =  $request->post('title');
        $blog->sub_title                 =  $request->post('sub_title');
        $blog->slug                      =  Str::slug($request->post('title'));
        $blog->content                   =  $request->post('content');
        $blog->status                    =  $request->post('status');
        $blog->meta_title                =  $request->post('meta_title');
        $blog->meta_keyword              =  $request->post('meta_keyword');
        $blog->meta_description          =  $request->post('meta_description');

        if ($request->file('image_thumb')) {
            $image_thumb = public_path('storage/' . $blog->image_thumb);
            if (File::exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $blog->image_thumb = 'blogs/' . time() . '.' . $request->file('image_thumb')->getClientOriginalExtension();
            Imager::init($request->file('image_thumb'))
                ->resizeFit(370, 212)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($blog->image_thumb);
        }

        if ($request->file('image')) {
            $image = public_path('storage/' . $blog->image);
            if (File::exists($image)) {
                File::delete($image);
            }
            $blog->image = 'blogs/' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            Imager::init($request->file('image'))
                ->resizeFit(800, 390)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($blog->image);
        }

        $blog->save();
        return to_route('admin.blogs.index')->withSuccess('SUCCESS !! Blog is successfully updated');
    }


    public function destroy(Blog $blog)
    {
        $image_thumb = public_path('storage/' . $blog->image_thumb);
        if (File::exists($image_thumb)) {
            File::delete($image_thumb);
        }
        $image = public_path('storage/' . $blog->image);
        if (File::exists($image)) {
            File::delete($image);
        }

        $blog->delete();
        return to_route('admin.blogs.index')->withErrors('Blog has been successfully deleted.');
    }

    public function statusToggle(Blog $blog)
    {
        $blog->update(['status' => $blog->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }
}
