@extends('main')

@section('title', '| Blog')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Blog</h2>
        </div>
    </div>
    <br>
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3>{{ $post->title }}</h3>
                <h5>Published: {{ date('M j, Y h:i a', strtotime($post->created_at)) }}</h5>
                <p>{{ str_limit($post->body, 15) }}</p>
                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                <hr>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>

@endsection
