@extends('main')

@section('title', '|Create New Post')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Create New Post</h3>
            <hr>
            <form method="POST" action="{{ route('posts.store') }}" data-parsley-validate>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required maxlength="255">
                </div>
                <div class="form-group">
                    <label for="body">Post Body:</label>
                    <textarea id="body" name="body" rows="8" class="form-control" required></textarea>
                </div>
                <input type="submit" value="Create Post" class="btn btn-success btn-md btn-block">
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
@endsection
