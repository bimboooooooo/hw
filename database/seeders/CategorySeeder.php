<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{

    public function run()
    {
        Category::factory()
            ->count(50)
            ->has(Image::factory()
                ->count(1)
                ->create(
                    /*['imageable_type' => "App\Models\Category", 'imageable_id'=>Category::class->id]*/
                )
            )
            ->create();
    }
}
