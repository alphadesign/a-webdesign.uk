<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Imager;

class TestimonialAction
{
    public function save($request, $testimonial)
    {
        if ($request->file('avatar')) {
            $testimonial->avatar    = 'testimonials/' . Str::of(microtime())->slug('-') . '.';
            $testimonial->avatar    .= $request->file('avatar')->extension();

            Imager::init($request->file('avatar'))
                ->resizeFit(340, 440)
                ->inCanvas('#fff')
                ->save(Storage::disk('public')->path($testimonial->avatar));
        }

        $testimonial->title     = $request->post('title');
        $testimonial->subtitle  = $request->post('subtitle');
        $testimonial->rating    = $request->post('rating');
        $testimonial->content   = $request->post('content');
        $testimonial->status    = $request->post('status');
        $testimonial->save();

        return $testimonial;
    }
}
