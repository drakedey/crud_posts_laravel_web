<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;


use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
        $user = Auth::user();
        return view('post.index');
    }

    public function createPost() {
        return view('post.create');
    }

    public function detail($id) {
        $post = Post::query()->findOrFail($id);
        return view('post.detail', ['post' => $post]);
    }
}
