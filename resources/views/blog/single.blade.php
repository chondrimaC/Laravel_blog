@extends('main')

@section('title', "| $post->title")

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
        </div>
    </div>

@endsection
