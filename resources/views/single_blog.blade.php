
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('blogs.frontend.list') }}">My Blog Site</a>
        </div>
    </nav>

    <div class="container">
        <a href="{{ route('blogs.frontend.list') }}" class="btn btn-secondary mb-3">&laquo; Back to All Blogs</a>

        <div class="card mb-4">
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top w-50" alt="Blog Image">
            @endif
            <div class="card-body">
                <h2 class="card-title">{{ $blog->title }}</h2>
                <p class="card-text">{{ $blog->content }}</p>
            </div>
            <div class="card-footer text-muted">
                By {{ $blog->user->name ?? 'Unknown' }} | {{ $blog->created_at->format('d M, Y H:i') }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
