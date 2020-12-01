<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class PostSeeder extends Seeder
{

    public function run()
    {
        Post::factory()
            ->count(2000)
            ->has(Tag::factory()->count(rand(3,10)))
            ->has(Category::factory()->count(rand(1,3)))
            ->create();
    }
}
