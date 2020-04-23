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
        return view('products.index', ['user' => $user]);
    }

    public function createPost() {
        return view('products.create');
    }

    public function detail($id) {
        $post = Post::query()->findOrFail($id);
        return view('products.detail', ['post' => $post]);
    }
}
