<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

    public function storePost(Request $request) {
        $rules = [
            'content' => 'required|max:400',
            'name' => 'required|max:40'
        ];
        $data = [
            'content' => $request->input('post-trixFields')['content'],
            'name' => $request->input('title')
        ];

        $dataValidator = Validator::make($data, $rules);
        if($dataValidator->fails()) {
            return redirect()->route('post.get.create', ['createdSucess' => false]);
        } else {
            $data['user_id'] = Auth::user()->id;
            $post = Post::create($data);
            return redirect()->route('posts', ['createdSucess' => true]);
        }
    }
}
