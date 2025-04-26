@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <h1 class="mb-4 text-primary">Blog Posts</h1>

    @forelse ($posts as $post)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h2 class="card-title h5">
                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-primary">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="card-text text-muted">
                    {{ Str::limit($post->body, 150) }}
                </p>
                <p class="text-secondary small mb-3">
                    Posted on {{ $post->created_at->format('M d, Y') }}
                </p>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-link p-0 text-decoration-none">Read More &rarr;</a>
                    <div class="d-flex">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info" role="alert">
            No posts found.
        </div>
    @endforelse

    {{-- Pagination Links --}}
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endsection
