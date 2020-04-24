@extends('layouts.app')
@section('content')
  <link href="{{ asset('css/post-read.css') }}" rel="stylesheet">
  <div class="container">
    <div class="row">
      <div class="col-12">
        @include('post.alert')

      </div>
    </div>
  </div>
  <div class="main_container">

    <div class="title_section">
      <h2>{{ $post->name }}</h2>
      <small>Created by: {{ $post->user->name }} at: {{ $post->created_at }}</small>
    </div>
    <div class="text_section">
      {!! $post->content !!}
      @php
          $comments = $post->comments;
      @endphp
      @include('post.comments')
    </div>
  </div>
@endsection