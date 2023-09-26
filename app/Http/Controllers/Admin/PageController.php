<?php

namespace App\Http\Controllers\Admin;

use App\Actions\PageAction;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Takshak\Adash\Traits\ImageTrait;

class PageController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $this->authorize('pages_access');
        $pages = Page::select('id', 'title', 'slug', 'status', 'banner', 'created_at')->orderBy('title')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $this->authorize('pages_create');
        return view('admin.pages.create');
    }

    public function store(Request $request, PageAction $action)
    {
        $this->authorize('pages_create');
        $request->validate([
            'title'               =>  'required|unique:pages,title',
            'content'             =>  'required',
            'status'              =>  'nullable|boolean',
            'is_main_menu'        =>  'nullable|boolean',
            'is_footer_menu'      =>  'nullable|boolean',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $page = new Page;
        $page = $action->save($request, $page);
        return to_route('admin.pages.index')->withSuccess('SUCCESS !! New page has been successfully created');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        $this->authorize('pages_update');
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page, PageAction $action)
    {
        $this->authorize('pages_update');
        $request->validate([
            'title'               =>  'required|unique:pages,title,' . $page->id,
            'content'             =>  'required',
            'status'              =>  'nullable|boolean',
            'is_main_menu'        =>  'nullable|boolean',
            'is_footer_menu'      =>  'nullable|boolean',
            'meta_title'          =>  'nullable',
            'meta_keyword'        =>  'nullable',
            'meta_description'    =>  'nullable',
        ]);

        $page = $action->save($request, $page);
        return to_route('admin.pages.index')->withSuccess('SUCCESS !! New page has been successfully updated');
    }

    public function destroy(Page $page)
    {
        $this->authorize('pages_delete');
        $banner = public_path("storage/") . $page->banner;
        if (File::exists($banner)) {
            File::delete($banner);
        }
        $page->delete();
        return to_route('admin.pages.index')->withSuccess('SUCCESS !! Page has been successfully deleted');
    }

    public function statusToggle(Page $page)
    {
        $page->update(['status' => $page->status ? false : true]);
        return back()->withSuccess('Status successfully updated');
    }
}
