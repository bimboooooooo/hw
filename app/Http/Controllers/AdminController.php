<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = $request -> user();
        return view('admin.index',compact('user'));
    }

    public function showUsers()
    {
        $users = User::paginate(10);
        return view('admin.user.index',compact('users'));
    }
    public function showPosts()
    {
        $posts = Post::paginate(10);
        return view('admin.post.index',compact('posts'));
    }
}
