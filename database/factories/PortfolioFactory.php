<?php

namespace Database\Factories;

use App\Models\Portfolio;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Placeholder;
use Illuminate\Support\Str;

class PortfolioFactory extends Factory
{
    protected $model = Portfolio::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title      = $this->faker->realText(rand(10, 20), 2);
        $avatar     = 'portfolios/' . Str::of(microtime())->slug('-') . '.jpg';
        Placeholder::dimensions(150, 150)
            ->background(rand(100, 999))
            ->text(substr($title, 0, 2), [
                'color' => '#fff',
                'size'  => 60
            ])
            ->save(Storage::disk('public')->path($avatar))
            ->destroy();

        return [
            'title'         =>  $title,
            'url'           =>  $this->faker->url(),
            'image'         =>  $avatar,
            'description'   =>  $this->faker->realText(rand(100, 300), 2),
            'status'        =>  $this->faker->boolean(50),
        ];
    }
}
