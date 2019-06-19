@extends('main')

@section('title', '|View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>{{ $post->title }}</h3>
            <p class="lead">{{ $post->body }}</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-6">URL:</dt>
                        <dd class="col-sm-6"><a href="{{ route('blog.single', $post->slug) }}"> {{ route('blog.single', $post->slug) }} </a></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-6">Created At: </dt>
                        <dd class="col-sm-6">{{ ' ' . date('M j, Y h:i a', strtotime($post->created_at)) }}</dd>

                        {{-- <dt class="col-sm-6">Created At: </dt>
                        <dd class="col-sm-6">{{ $post->created_at->timezone('Asia/Dhaka')->format('d-m-Y H:i a') }}</dd> --}}
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-6">Last Updated:</dt>
                        <dd class="col-sm-6">{{ date('M j, Y h:i a', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
                        </div>
                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="delete_form">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('posts.index')}}" class="btn btn-light btn-block"><< See All Posts</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection
