<link href="{{ asset('css/post-create.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
    <div class="container">
    @include('post.alert')
        <div class="row justify-content-center">
            <div class="col-6">
                @if ($editMode == 'true')
                    <h1>Edit Post</h1>
                @else
                    <h1>Create Post</h1>
                @endif
                    {{ Form::open(['route' => $editMode == true && !empty($post) ? array('post.put.edit', $post->id) : 'post.post.create', 'method' => $editMode ? 'PUT' : 'POST']) }}
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        {{ Form::text('title', $post->name, ['class' => 'form-control', 'required' => true]) }}
                        {{-- <input required type="text"  name="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter a title to the post" value={{ $editMode == true ? $post->name : '' }}> --}}
                    </div>
                    <div class="form-group">
                        @trix(\App\Post::class, 'content', ['hideToolbar' => true, 'value' => 'algun contenido'])
                    </div>
                    <button class="btn btn-primary" formmethod="post" type="submit"> {{ $editMode == true ? 'Edit' : 'Create' }}</button>
                {{ Form::close() }}
                @if($editMode == 'true')
                    <span id="hidden-content">
                        {{ $post->content }}
                    </span>
                @endif
                
            </div>
        </div>
    </div>
@endsection