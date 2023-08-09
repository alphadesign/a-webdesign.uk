<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->deleteDirectory('courses');
        Course::truncate();
        Course::factory(5)->create();
    }
}
