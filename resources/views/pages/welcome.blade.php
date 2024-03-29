@extends('main')

@section('title', '|Homepage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h1>Welcome to My Blog</h1>
                <p class="lead">Thank you so much for visiting. This is my testing website with laravel.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ str_limit($post->body, 15) }}</p>
                    {{-- <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a> --}}
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="col-md-3 offset-md-1">
            <h2>Sidebar</h2>
        </div>
    </div>

@endsection
