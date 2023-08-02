<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'                =>  fake()->realText(50, 2),
            'status'              =>  fake()->boolean(50),
            'short_description'   =>  fake()->realText(200, 2),
            'long_description'    =>  fake()->realText(500, 2),
            // 'cover_image'         =>  fake()->imageUrl(400, 400),
            // 'main_image'          =>  fake()->imageUrl(1900, 1080),
            'meta_title'          =>  fake()->realText(200, 2),
            'meta_keyword'        =>  fake()->realText(200, 2),
            'meta_description'    =>  fake()->realText(200, 2),
        ];
    }
}
