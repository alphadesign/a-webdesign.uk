<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(QuerySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CourseSeeder::class);
    }
}
