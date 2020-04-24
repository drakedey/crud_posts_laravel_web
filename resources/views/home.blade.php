@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h2>Welcome to post admin</h2>
            @if (!empty($lastPosts))
                <p>Here we have the latest posts, posted by our community</p>
            @else
                <p>Seems like there's no post so far go ahead an <a href="{{route('post.get.create')}}">create one!</a></p>
            @endif
        </div>
        @if(!empty($lastPosts))
        <div class="col-8" id="post-list-container">
            @foreach ($lastPosts as $post)
                <div class="post" onclick="handlePostClick({{ $post->id }})">
                    <div class="post_desc">
                        <h4>{{ $post->name }}</h4>
                        <small>created by: {{ $post->user->name }}</small>
                    </div>
                    <div class="post_created">
                        <p>{{ $post->created_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>

</div>
@endsection
