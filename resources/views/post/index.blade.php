<link href="{{ asset('css/posts.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')
    <div class="container">
        @include('post.alert')
        @include('post.delete_modal')
       
        <div class="post-header-content">
            <div class="col-6">
                <h1>Posts</h1>
            </div>
            <div class="button-container">
                <a href="/posts/create" class="btn btn-success">create post</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                @if (count(Auth::user()->posts) > 0)
                    <table id="table" class="table">
                        <head>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Created date</th>
                                <th scope="col">Updated date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </head>
                        <tbody>
                            @foreach (Auth::user()->posts as $post)
                                <tr>
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-primary" href={{ '/posts/create/'.$post->id }}>Edit</a>
                                        <a class="btn btn-secondary" href={{ '/posts/read/'.$post->id }} >View</a>
                                        <button type="button" class="btn btn-danger" onclick="performDeleteClick({{$post->id}})">Delete</button>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <div class="jumbotron">
                    <h1 class="display-4">You have no posts</h1>
                    <p class="lead">You dont have created any post, but you can create one right now.</p>
                    <p class="lead">
                      <a class="btn btn-success btn-lg" href="/posts/create" role="button">Create Post</a>
                    </p>
                  </div>
                @endif

            </div>

        </div>
    </div>
@endsection