@extends('layouts.app')
@section('content')
    <div class="container">
    @include('post.alert')
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Crear Post</h1>
                <form method="POST" action="{{route('post.post.create')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input required type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter a title to the post">
                    </div>
                    <div class="form-group">
                        @trix(\App\Post::class, 'content', ['hideToolbar' => true, 'required' => true])
                    </div>
                    <button class="btn btn-primary" type="submit"> Crear</button>
                </form>    
            </div>
        </div>
    </div>
@endsection