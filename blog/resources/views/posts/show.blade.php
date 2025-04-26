@extends('layouts.app')

@section('title', $post->title)

@section('content')
    {{-- Post Content --}}
    <div class="card mb-5 shadow-sm">
        <div class="card-body">
            <h1 class="card-title display-5 mb-3">{{ $post->title }}</h1>
            <p class="text-muted small mb-4">
                Posted on {{ $post->created_at->format('F j, Y') }}
            </p>
            <p class="card-text">
                {!! nl2br(e($post->body)) !!}
            </p>

            <div class="d-flex justify-content-end mt-4 gap-2">
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit Post</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Comments Section --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h4 mb-4">Comments ({{ $post->comments->count() }})</h2>

            {{-- Add Comment Form --}}
            <form action="{{ route('comments.store', $post) }}" method="POST" class="mb-5">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name (Optional):</label>
                    <input type="text" id="name" name="name" value="{{ old('name', 'Anonymous') }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="comment_body" class="form-label">Your Comment:</label>
                    <textarea id="comment_body" name="body" rows="3" class="form-control @error('body', 'comment') is-invalid @enderror" required>{{ old('body') }}</textarea>
                    @error('body', 'comment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Add Comment</button>
            </form>

            {{-- List of Comments --}}
            @forelse ($post->comments as $comment)
                <div class="border-start border-4 border-primary ps-3 py-2 mb-4 bg-light rounded">
                    <p class="mb-1">{!! nl2br(e($comment->body)) !!}</p>
                    <small class="text-muted">
                        <strong>{{ $comment->name }}</strong> commented {{ $comment->created_at->diffForHumans() }}
                    </small>
                    <div class="mt-2">
                        <a href="{{ route('comments.edit', $comment) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this comment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">No comments yet. Be the first to comment!</div>
            @endforelse
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('posts.index') }}" class="btn btn-link text-decoration-none">&larr; Back to all posts</a>
    </div>
@endsection
