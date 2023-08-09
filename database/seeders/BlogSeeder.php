<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->deleteDirectory('blogs');
        Schema::disableForeignKeyConstraints();
        Blog::truncate();
        Schema::enableForeignKeyConstraints();
        Blog::factory(5)->create();
    }
}
