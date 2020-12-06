<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::with(['tags','image','categories','author'])->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $path =$post->image->path;
        $final_path = url(Storage::url(substr($path, 31))); // Todo fixx
        return view('posts.show', compact('post',"final_path"));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->action('App\Http\Controllers\PostController@index');
    }
}
