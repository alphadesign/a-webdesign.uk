<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Takshak\Imager\Facades\Imager;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $about = About::first();
        if ($about) {
            return to_route('admin.abouts.edit', [$about]);
        } else {
            return to_route('admin.abouts.create');
        }
    }

    public function create()
    {
        $about = About::first();
        if ($about) {
            return to_route('admin.abouts.edit', [$about]);
        }
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                =>  'required',
            'status'              =>  'required',
            'short_description'   =>  'nullable',
            'long_description'    =>  'nullable',
            'cover_image'         =>  'nullable|image',
            'main_image'          =>  'nullable|image',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $about = new About;
        $about->name                      =  $request->post('name');
        $about->status                    =  $request->post('status');
        $about->short_description         =  $request->post('short_description');
        $about->long_description          =  $request->post('long_description');
        $about->meta_title                =  $request->post('meta_title');
        $about->meta_keyword              =  $request->post('meta_keyword');
        $about->meta_description          =  $request->post('meta_description');

        // breadcrum photo should be 1600X800
        if ($request->file('cover_image')) {
            $about->cover_image = 'abouts/' . time() . '.' . $request->file('cover_image')->getClientOriginalExtension();
            Imager::init($request->file('cover_image'))
                ->resizeFit(400, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($about->cover_image);
        }

        // main photo should be 1000X400
        if ($request->file('main_image')) {
            $about->main_image = 'abouts/' . time() . '.' . $request->file('main_image')->getClientOriginalExtension();
            Imager::init($request->file('main_image'))
                ->resizeFit(1000, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($about->main_image);
        }

        $about->save();
        return to_route('admin.abouts.index')->withSuccess('SUCCESS !! About is successfully created');
    }

    public function show(About $about)
    {
        return view('admin.abouts.show')->with('about', $about);
    }

    public function edit(About $about)
    {
        return view('admin.abouts.edit')->with('about', $about);
    }


    public function update(Request $request, About $about)
    {
        $request->validate([
            'name'                =>  'required',
            'status'              =>  'required',
            'short_description'   =>  'nullable',
            'long_description'    =>  'nullable',
            'cover_image'         =>  'nullable|image',
            'main_image'          =>  'nullable|image',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $about->name                =  $request->post('name');
        $about->status              =  $request->post('status');
        $about->short_description   =  $request->post('short_description');
        $about->long_description    =  $request->post('long_description');
        $about->meta_title          =  $request->post('meta_title');
        $about->meta_keyword        =  $request->post('meta_keyword');
        $about->meta_description    =  $request->post('meta_description');

        if ($request->file('cover_image')) {
            $cover_imagePath = public_path('storage/' . $about->cover_image);
            if (File::exists($cover_imagePath)) {
                File::delete($cover_imagePath);
            }
            $about->cover_image = 'abouts/' . time() . '.' . $request->file('cover_image')->getClientOriginalExtension();
            Imager::init($request->file('cover_image'))
                ->resizeFit(400, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($about->cover_image);
        }

        if ($request->file('main_image')) {
            $main_imagePath = public_path('storage/' . $about->main_image);
            if (File::exists($main_imagePath)) {
                File::delete($main_imagePath);
            }
            $about->main_image = 'abouts/' . time() . '.' . $request->file('main_image')->getClientOriginalExtension();
            Imager::init($request->file('main_image'))
                ->resizeFit(1920, 1080)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($about->main_image);
        }

        $about->save();
        return to_route('admin.abouts.edit',[$about])->withSuccess('SUCCESS !! About is successfully updated');
    }

    public function statusToggle(About $about)
    {
        $about->update(['status' => $about->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }


    public function destroy(About $about)
    {
        $main_imagePath = public_path('storage/' . $about->main_image);
        if (File::exists($main_imagePath)) {
            File::delete($main_imagePath);
        }
        $cover_imagePath = public_path('storage/' . $about->cover_image);
        if (File::exists($cover_imagePath)) {
            File::delete($cover_imagePath);
        }
        $about->delete();
        return to_route('admin.services.index')->withErrors('About has been successfully deleted.');
    }
}
