<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->sentence(rand(10,40)),
            'user_id' => rand(1,10),
        ];
    }
}
