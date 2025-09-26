<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">My Blog Site</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4">All Blogs</h2>
        <div class="row">
            @forelse ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($blog->title, 50) }}</h5>
                            <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                            <a href="{{ route('blogs.frontend.view', $blog->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                        <div class="card-footer text-muted">
                            By {{ $blog->user->name ?? 'Unknown' }} | {{ $blog->created_at->format('d M, Y') }}
                        </div>
                    </div>
                </div>
            @empty
                <p>No blogs available.</p>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
