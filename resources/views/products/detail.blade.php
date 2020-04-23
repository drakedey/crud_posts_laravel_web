@extends('layouts.app')
@section('content')
<h1>{{ $post->name }}</h1>
<small>posted at: {{ $post->created_at }}</small>
<p>{{ $post->description }}</p>
@endsection