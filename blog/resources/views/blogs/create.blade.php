@extends('layouts.app')

@section('title', 'Create Blog')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create New Blog</h4>
                    </div>

                    <div class="card-body">
                        {{-- Display validation errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Blog Create Form --}}
                        <form action="{{ route('blogs.store') }}" method="POST">
                            @csrf
                            
                            {{-- Title Field --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input 
                                    type="text" 
                                    name="title" 
                                    id="title" 
                                    class="form-control @error('title') is-invalid @enderror" 
                                    value="{{ old('title') }}" 
                                    required
                                >
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description Field --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea 
                                    name="description" 
                                    id="description" 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    rows="4" 
                                    required
                                >{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Create Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection