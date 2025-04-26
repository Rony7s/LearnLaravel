<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Simple Blog')</title>

    {{-- Bootstrap 5.3 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('posts.index') }}" class="navbar-brand">Simple Blog</a>
            <div class="d-flex">
                <a href="{{ route('posts.create') }}" class="btn btn-light text-primary fw-bold">
                    Create Post
                </a>
            </div>
        </div>
    </nav>

    <main class="container my-4 flex-grow-1">
        {{-- Session messages for success/error --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <h4 class="alert-heading">Oops! Something went wrong.</h4>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content') {{-- Page-specific content --}}
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        My Simple Blog &copy; {{ date('Y') }}
    </footer>

    {{-- Bootstrap Bundle with Popper --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
