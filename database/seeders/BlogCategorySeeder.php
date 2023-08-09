<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->deleteDirectory('blog_categories');
        Schema::disableForeignKeyConstraints();
        BlogCategory::truncate();
        Schema::enableForeignKeyConstraints();
        BlogCategory::factory(5)->create();
    }
}
