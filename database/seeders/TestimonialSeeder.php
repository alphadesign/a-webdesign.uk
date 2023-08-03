<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->deleteDirectory('testimonials');
        Testimonial::truncate();
        Testimonial::factory()->count(10)->create();
    }
}
