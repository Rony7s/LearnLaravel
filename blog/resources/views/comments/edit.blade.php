@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')
    <div class="card shadow-sm p-4 mb-5">
        <div class="card-body">
            <h1 class="h3 mb-4 text-primary">Edit Comment</h1>

            <form action="{{ route('comments.update', $comment) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name (Optional):</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $comment->name) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Comment Body:</label>
                    <textarea id="body" name="body" rows="5" class="form-control @error('body') is-invalid @enderror" required>{{ old('body', $comment->body) }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">
                        Update Comment
                    </button>
                    <a href="{{ route('posts.show', $comment->post) }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
