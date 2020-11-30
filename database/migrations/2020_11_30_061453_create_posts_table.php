<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('slug');
            $table->foreignIdFor(\App\Models\User::class,'author');
            $table->timestamps();
            $table->softDeletes('deleted at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
