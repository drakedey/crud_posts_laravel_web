@extends('layouts.app')
@section('content')
  <link href="{{ asset('css/post-read.css') }}" rel="stylesheet">
  <div class="main_container">
    <div class="title_section">
      <h2>{{ $post->name }}</h2>
      <small>Created by: {{ $post->user->name }} at: {{ $post->created_at }}</small>
    </div>
    <div class="text_section">
      {!! $post->content !!}
    </div>
  </div>
@endsection