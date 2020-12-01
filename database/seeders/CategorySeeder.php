<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{

    public function run()
    {
        Category::factory(50)->create()->each(function ($category){
            Image::factory()->create(['imageable_type' => "App\Models\Category", 'imageable_id'=>$category->id]);
        });
    }
}
