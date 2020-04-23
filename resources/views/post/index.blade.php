<link href="{{ asset('css/posts.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="post-header-content">
            <div class="col-6">
                <h1>Posts</h1>
            </div>
            <div class="button-container">
                <button class="btn btn-success">create post</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                @if (count(Auth::user()->posts) > 0)
                    <table class="table">
                        <head>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Value</th>
                                <th scope="col">Created date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </head>
                        <tbody>
                            @foreach (Auth::user()->posts as $post)
                                <tr>
                                        <td>{{ $post->name }}</td>
                                        <td>${{ $post->value }}</td>
                                        <td>{{ $post->created_at }}</td>
                                    
                                    <td>
                                        <a class="btn btn-primary" href={{ 'posts/'.$post->id .'/detail' }}>Edit</a>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <div class="jumbotron">
                    <h1 class="display-4">You have no posts</h1>
                    <p class="lead">You dont have created any post, but you can create one right now.</p>
                    <p class="lead">
                      <a class="btn btn-success btn-lg" href="#" role="button">Create Post</a>
                    </p>
                  </div>
                @endif

            </div>

        </div>
    </div>
@endsection