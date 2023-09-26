<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;

class ServiceController extends Controller
{

    public function index(Request $request)
    {
        $query = Service::query();
        if ($request->get('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->get('search') . '%');
            });
        }
        $services = $query->paginate(25)
            ->withQueryString();
        return view('admin.services.index')->with('services', $services);
    }

    public function create()
    {
        return view('admin.services.create');
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

        $service = new Service;
        $service->name                      =  $request->post('name');
        $service->breadcrumb_title          =  $request->post('breadcrumb_title');
        $service->breadcrumb_subtitle       =  $request->post('breadcrumb_subtitle');
        $service->slug                      =  Str::slug($request->post('name'));
        $service->status                    =  $request->post('status');
        $service->short_description         =  $request->post('short_description');
        $service->long_description          =  $request->post('long_description');
        $service->meta_title                =  $request->post('meta_title');
        $service->meta_keyword              =  $request->post('meta_keyword');
        $service->meta_description          =  $request->post('meta_description');

        $service->cover_image_title         =  $request->post('cover_image_title');
        $service->main_image_title          =  $request->post('main_image_title');

        if ($request->file('cover_image')) {
            $service->cover_image = 'services/' . time() . '.' . $request->file('cover_image')->getClientOriginalExtension();
            Imager::init($request->file('cover_image'))
                ->resizeFit(400, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($service->cover_image);
        }

        if ($request->file('main_image')) {
            $service->main_image = 'services/' . time() . '.' . $request->file('main_image')->getClientOriginalExtension();
            Imager::init($request->file('main_image'))
                ->resizeFit(1920, 1080)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($service->main_image);
        }

        $service->save();
        return to_route('admin.services.index')->withSuccess('SUCCESS !! New Service is successfully created');
    }

    public function show(Service $service)
    {
        return view('admin.services.show')->with('service', $service);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit')->with('service', $service);
    }


    public function update(Request $request, Service $service)
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

        $service->name                =  $request->post('name');
        $service->breadcrumb_title    =  $request->post('breadcrumb_title');
        $service->breadcrumb_subtitle =  $request->post('breadcrumb_subtitle');
        $service->slug                =  Str::slug($request->post('name'));
        $service->status              =  $request->post('status');
        $service->short_description   =  $request->post('short_description');
        $service->long_description    =  $request->post('long_description');
        $service->meta_title          =  $request->post('meta_title');
        $service->meta_keyword        =  $request->post('meta_keyword');
        $service->meta_description    =  $request->post('meta_description');

        $service->cover_image_title         =  $request->post('cover_image_title');
        $service->main_image_title    =  $request->post('main_image_title');

        if ($request->file('cover_image')) {
            $cover_imagePath = public_path('storage/' . $service->cover_image);
            if (File::exists($cover_imagePath)) {
                File::delete($cover_imagePath);
            }
            $service->cover_image = 'services/' . time() . '.' . $request->file('cover_image')->getClientOriginalExtension();
            Imager::init($request->file('cover_image'))
                ->resizeFit(400, 400)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($service->cover_image);
        }

        if ($request->file('main_image')) {
            $main_imagePath = public_path('storage/' . $service->main_image);
            if (File::exists($main_imagePath)) {
                File::delete($main_imagePath);
            }
            $service->main_image = 'services/' . time() . '.' . $request->file('main_image')->getClientOriginalExtension();
            Imager::init($request->file('main_image'))
                ->resizeFit(1920, 1080)->inCanvas('#fff')
                ->basePath(storage_path('app/public/'))
                ->save($service->main_image);
        }

        $service->save();
        return to_route('admin.services.index')->withSuccess('SUCCESS !! Service is successfully updated');
    }

    public function statusToggle(Service $service)
    {
        $service->update(['status' => $service->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }


    public function destroy(Service $service)
    {
        $main_imagePath = public_path('storage/' . $service->main_image);
        if (File::exists($main_imagePath)) {
            File::delete($main_imagePath);
        }
        $cover_imagePath = public_path('storage/' . $service->cover_image);
        if (File::exists($cover_imagePath)) {
            File::delete($cover_imagePath);
        }
        $service->delete();
        return to_route('admin.services.index')->withErrors('Service has been successfully deleted.');
    }
}
