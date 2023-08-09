<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->deleteDirectory('portfolios');
        Portfolio::truncate();
        Portfolio::factory()->count(10)->create();
    }
}
