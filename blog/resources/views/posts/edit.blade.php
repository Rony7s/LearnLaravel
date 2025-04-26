@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="mb-4 text-primary">Edit Post: {{ $post->title }}</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" class="card shadow-sm p-4">
        @csrf {{-- CSRF Protection Token --}}
        @method('PUT') {{-- Method Spoofing for PUT request --}}

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror" required>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body:</label>
            <textarea id="body" name="body" rows="10" class="form-control @error('body') is-invalid @enderror" required>{{ old('body', $post->body) }}</textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
                Update Post
            </button>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>
    </form>
@endsection
