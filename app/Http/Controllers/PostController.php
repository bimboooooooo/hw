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
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        dd($post->image()->get());
        $path =$post->image()->get()->all()[0]->path;
        $final_path = url(Storage::url(substr($path, 31)));
        return view('posts.show', compact('post',"final_path"));
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->action('App\Http\Controllers\PostController@index');
    }
}
