@extends('main')

@section('title', '|All Posts')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h3>All Posts</h3>
        </div>
        <div class="col-md-3" id="new-post-button" >
            <a href="{{ route('posts.create')}}" class="btn btn-primary">Create New Post</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Created At</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ str_limit($post->body, 15) }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('posts.show', $post->id )}}" class="btn btn-primary">View</a> <a href="{{ route('posts.edit', $post->id )}}" class="btn btn-primary">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>
@endsection
