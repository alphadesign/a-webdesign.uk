<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Imager;
use Illuminate\Support\Str;

class PageAction
{
    public function save($request, $page)
    {
        $page->title               =   $request->post('title');
        $page->breadcrumb_title    =   $request->post('breadcrumb_title');
        $page->breadcrumb_subtitle =   $request->post('breadcrumb_subtitle');
        $page->slug                =   Str::of($page->title)->slug('-');
        $page->content             =   $request->post('content');
        $page->status              =   $request->post('status');
        $page->is_main_menu        =   $request->post('is_main_menu');
        $page->is_footer_menu      =   $request->post('is_footer_menu');
        $page->meta_title          =   $request->post('meta_title');
        $page->meta_keyword        =   $request->post('meta_keyword');
        $page->meta_description    =   $request->post('meta_description');
        $page->banner_title        =   $request->post('banner_title');

        if ($request->file('thumbnail')) {
            $page->banner   =   'pages/' . $page->slug . '.';
            $page->banner   .=  $request->file('thumbnail')->extension();

            Imager::init($request->file('thumbnail'))
                ->resizeFit(900, 500)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($page->banner));
        }

        $page->save();

        return $page;
    }
}
