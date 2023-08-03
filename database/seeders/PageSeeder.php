<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PageSeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->deleteDirectory('pages');
        Page::truncate();
        Page::factory(5)->create();
    }
}
