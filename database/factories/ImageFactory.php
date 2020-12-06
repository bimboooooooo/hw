<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{

    protected $model = Image::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(1, 4)),
            'alt'   => $this->faker->sentence(rand(1, 4)),
            'path'  => $this->faker->image(storage_path().'/app/public/images'),//TODO images
        ];
    }
}
