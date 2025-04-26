@extends('layouts.app')
@section('title','Create Blog')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-4 text-center text-primary">Blog Posts</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h5 class="alert-heading">Please fix the following errors:</h5>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($blogs->isEmpty())
                <div class="alert alert-info text-center">
                    No blog posts available at the moment.
                </div>
            @else
                @foreach ($blogs as $blog)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->title }}</h4>
                            <p class="card-text">{{ $blog->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="text-center mt-4">
                <a href="{{ route('blogs.create') }}" class="btn btn-success btn-lg">Create New Blog</a>
            </div>

        </div>
    </div>
</div>
@endsection