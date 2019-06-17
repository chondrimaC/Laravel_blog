@extends('main')

@section('title', '|Edit Post')

@section('content')
<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-8">
            <h3>Edit Post</h3>
            <hr>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control"  value="{{$post->title}}" required>
                </div>
                <div class="form-group">
                    <label for="body">Post Body:</label>
                    <textarea id="body" name="body" rows="8" class="form-control" required>{{$post->body}}</textarea>
                </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
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
                        <div class="col-sm-5">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-7">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</form>


@endsection
