<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;

class BlogCategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = BlogCategory::query()->withCount('blogs');
        if ($request->get('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('search') . '%');
            });
        }
         $blog_categories = $query->paginate(25)
            ->withQueryString();
        return view('admin.blog_categories.index')->with('blog_categories', $blog_categories);
    }

    public function create()
    {
        return view('admin.blog_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                =>  'required',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image_thumb'         =>  'nullable|image',
            'image'               =>  'nullable|image',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $blogCategory = new BlogCategory();
        $blogCategory->name                      =  $request->post('name');
        $blogCategory->status                    =  $request->post('status');
        $blogCategory->slug                      =  Str::slug($request->post('name'));
        $blogCategory->content                   =  $request->post('content');
        $blogCategory->meta_title                =  $request->post('meta_title');
        $blogCategory->meta_keyword              =  $request->post('meta_keyword');
        $blogCategory->meta_description          =  $request->post('meta_description');

        if ($request->file('image_thumb')) {
            $blogCategory->image_thumb = 'blog_categories/' . time() . '.' . $request->file('image_thumb')->getClientOriginalExtension();
            Imager::init($request->file('image_thumb'))
                ->resizeFit(600, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($blogCategory->image_thumb);
        }

        if ($request->file('image')) {
            $blogCategory->image = 'blog_categories/' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            Imager::init($request->file('image'))
                ->resizeFit(1920, 1080)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($blogCategory->image);
        }

        $blogCategory->save();
        return to_route('admin.blog_categories.index')->withSuccess('SUCCESS !! New Blog Category is successfully created');
    }


    public function show(BlogCategory $blogCategory)
    {
        return view('admin.blog_categories.show')->with('blogCategory', $blogCategory);
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog_categories.edit')->with('blogCategory', $blogCategory);
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name'                =>  'required',
            'content'             =>  'nullable',
            'status'              =>  'required',
            'image_thumb'         =>  'nullable|image',
            'image'               =>  'nullable|image',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $blogCategory->name                      =  $request->post('name');
        $blogCategory->status                    =  $request->post('status');
        $blogCategory->slug                      =  Str::slug($request->post('name'));
        $blogCategory->content                   =  $request->post('content');
        $blogCategory->meta_title                =  $request->post('meta_title');
        $blogCategory->meta_keyword              =  $request->post('meta_keyword');
        $blogCategory->meta_description          =  $request->post('meta_description');

        if ($request->file('image_thumb')) {
            $image_thumb = public_path('storage/' . $blogCategory->image_thumb);
            if (File::exists($image_thumb)) {
                File::delete($image_thumb);
            }
            $blogCategory->image_thumb = 'blog_categories/' . time() . '.' . $request->file('image_thumb')->getClientOriginalExtension();
            Imager::init($request->file('image_thumb'))
                ->resizeFit(600, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($blogCategory->image_thumb);
        }

        if ($request->file('image')) {
            $image = public_path('storage/' . $blogCategory->image);
            if (File::exists($image)) {
                File::delete($image);
            }
            $blogCategory->image = 'blog_categories/' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            Imager::init($request->file('image'))
                ->resizeFit(1920, 1080)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($blogCategory->image);
        }

        $blogCategory->save();
        return to_route('admin.blog_categories.index')->withSuccess('SUCCESS !! Blog Category is successfully updated');
    }


    public function destroy(BlogCategory $blogCategory)
    {
        $image_thumb = public_path('storage/' . $blogCategory->image_thumb);
        if (File::exists($image_thumb)) {
            File::delete($image_thumb);
        }
        $image = public_path('storage/' . $blogCategory->image);
        if (File::exists($image)) {
            File::delete($image);
        }
        $blogCategory->blogs()->delete();
        $blogCategory->delete();
        return to_route('admin.blog_categories.index')->withErrors('Blog Category has been successfully deleted.');
    }
}
