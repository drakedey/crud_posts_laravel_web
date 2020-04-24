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
        return view('post.index');
    }

    public function createPost() {
        return view('post.create', ['editMode' => false]);
    }

    public function editPost($id) {
        $post = Post::query()->findOrFail($id);
        if(!$this->postBelongToUser($post))
            return redirect()->route('posts', $this->sendAlertMessage('danger', 'You\'re not the owner of this post!'));
        return view('post.create', ['editMode' => true, 'post' => $post]);
    }

    public function storeEditedPost(Request $request, $id) {
        $post = Post::query()->findOrFail($id);
        $rules = [
            'content' => 'required',
            'name' => 'required|max:40'
        ];

        if(!$this->postBelongToUser($post))
            return redirect()->route('posts', $this->sendAlertMessage('danger', 'You\'re not the owner of this post!'));
        
        $data = [
            'content' => $request->input('post-trixFields')['content'],
            'name' => $request->input('title')
        ];

    

        $dataValidator = Validator::make($data, $rules);
        if($dataValidator->fails()) {
            return redirect()->route('post.get.edit', array_merge($this->sendAlertMessage('danger', 'Post edited error!'), ['id' => $post->id]));
        }

        $post->content = $data['content'];
        $post->name = $data['name'];

        if(!$post->isDirty()) {
            return redirect()->route('post.get.edit', array_merge($this->sendAlertMessage('danger', 'Post edited error!'), ['id' => $post->id]));
        }

        $post->save();

        return redirect()->route('posts', $this->sendAlertMessage('success', 'Post edited succesfully!'));
    }

    public function detail($id) {
        $post = Post::query()->findOrFail($id);
        return view('post.detail', ['post' => $post]);
    }

    public function storePost(Request $request) {
        $rules = [
            'content' => 'required',
            'name' => 'required|max:40'
        ];
        $data = [
            'content' => $request->input('post-trixFields')['content'],
            'name' => $request->input('title')
        ];

        $dataValidator = Validator::make($data, $rules);
        if($dataValidator->fails()) {
            return redirect()->route('post.get.create', $this->sendAlertMessage('danger', 'Post created failed!'));
        } else {
            $data['user_id'] = Auth::user()->id;
            $post = Post::create($data);
            return redirect()->route('posts', $this->sendAlertMessage('success', 'Post created successfully!'));
        }
    }

    public function softDelete(Request $request) {
        $post = Post::destroy($request->input('id'));
        if($post) {
            return redirect()->route('posts', $this->sendAlertMessage('success', 'Post deleted successfully'));
        }
        if(!$this->postBelongToUser($post))
            return redirect()->route('posts', $this->sendAlertMessage('danger', 'You\'re not the owner of this post!'));

        return redirect()->route('posts', $this->sendAlertMessage('danger', 'Post deleted error'));
    }

    public function read($id) {
        $post = Post::query()->findOrFail($id);
        if(!$post)
            return redirect()->route('posts', $this->sendAlertMessage('danger', 'Post not found!'));
        return view('post.read', ['post' => $post]);
    }

    private function postBelongToUser($post) {
        return $post->user->id == Auth::user()->id;
    }
}
