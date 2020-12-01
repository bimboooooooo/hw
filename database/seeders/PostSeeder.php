<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Image;

class PostSeeder extends Seeder
{

    public function run()
    {
        $tags = Tag::all();
        $categories = Category::all();
        Post::factory(2000)->create()->each(function ($post) use ($tags, $categories) {
            $post->tags()->attach($tags->random(rand(3, 10)));
            $post->categories()->attach($categories->random(rand(1, 3)));
            Image::factory()->create(['imageable_type' => "App\Models\Post", 'imageable_id'=>$post->id]);
        });
    }
}
