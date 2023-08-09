<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Takshak\Imager\Facades\Placeholder;

class BlogFactory extends Factory
{
    protected $model = Blog::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title      = $this->faker->realText(rand(30, 60), 2);
        $slug       = Str::of($title)->slug('-');
        $image     = 'blogs/' . Str::of(microtime())->slug('-') . '.jpg';
        Placeholder::dimensions(150, 150)
            ->background(rand(100, 999))
            ->text(substr($title, 0, 2), [
                'color' => '#fff',
                'size'  => 60
            ])
            ->save(Storage::disk('public')->path($image))
            ->destroy();

        return [
            'blog_category_id'    =>  BlogCategory::inRandomOrder()->first()->id,
            'title'               =>  $title,
            'sub_title'           =>  $this->faker->realText(100, 2),
            'slug'                =>  $slug,
            'image_thumb'         =>  $image,
            'image'               =>  $image,
            'content'             =>  $this->faker->realText(rand(1000, 2500), 2),
            'status'              =>  true,
            'meta_title'          =>  $this->faker->realText(255, 2),
            'meta_keyword'        =>  $this->faker->realText(255, 2),
            'meta_description'    =>  $this->faker->realText(255, 2),
        ];
    }
}
