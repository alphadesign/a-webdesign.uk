<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Imager;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required',
            'url'           =>  'nullable',
            'image'         =>  'nullable|image',
            'status'        =>  'required',
            'description'   =>  'nullable',
        ]);

        $portfolio = new Portfolio();

        if ($request->file('image')) {
            $portfolio->image    = 'portfolios/' . Str::of(microtime())->slug('-') . '.';
            $portfolio->image   .= $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(370, 212)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($portfolio->image));
        }

        $portfolio->title         = $request->post('title');
        $portfolio->url           = $request->post('url');
        $portfolio->status        = $request->post('status');
        $portfolio->description   = $request->post('description');
        $portfolio->save();

        return to_route('admin.portfolios.index')->withSuccess('SUCCESS !! New Portfolio is successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show')->with('portfolio', $portfolio);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title'         =>  'required',
            'url'           =>  'nullable',
            'image'         =>  'nullable|image',
            'status'        =>  'required',
            'description'   =>  'nullable',
        ]);

        if ($request->file('image')) {
            $image_old = public_path('storage/' . $portfolio->image);
            if (File::exists($image_old)) {
                File::delete($image_old);
            }
            $portfolio->image    = 'portfolios/' . Str::of(microtime())->slug('-') . '.';
            $portfolio->image   .= $request->file('image')->extension();

            Imager::init($request->file('image'))
                ->resizeFit(400, 300)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')
                    ->path($portfolio->image));
        }
        $portfolio->title         = $request->post('title');
        $portfolio->url           = $request->post('url');
        $portfolio->status        = $request->post('status');
        $portfolio->description   = $request->post('description');
        $portfolio->save();
        return to_route('admin.portfolios.index')->withSuccess('SUCCESS !! Portfolio is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $main_imagePath = public_path('storage/' . $portfolio->image);
        if (File::exists($main_imagePath)) {
            File::delete($main_imagePath);
        }
        $portfolio->delete();
        return to_route('admin.portfolios.index')->withErrors('Portfolio has been successfully deleted.');
    }
    public function statusToggle(Portfolio $portfolio)
    {
        $portfolio->update(['status' => $portfolio->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }

}
