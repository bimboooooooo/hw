<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{

    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Post::class);
            $table->foreignIdFor(\App\Models\Tag::class);
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
