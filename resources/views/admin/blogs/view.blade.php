<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Back button -->
                <div class="mb-3">
                    <a href="{{ route('admin.blogs.list') }}" class="btn btn-secondary">
                        &laquo; Back to Blog List
                    </a>
                </div>

                <!-- Blog Details Card -->
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>Blog Details</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <strong>Title:</strong>
                            <p>{{ $blog->title }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Content:</strong>
                            <p>{{ $blog->content }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Image:</strong>
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" 
                                     alt="Blog Image" class="img-fluid rounded shadow">
                            @else
                                <p class="text-muted">No image uploaded.</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <strong>Author:</strong>
                            <p>{{ $blog->user->name ?? 'Unknown' }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Status:</strong>
                            <p>
                                @if($blog->status == 0)
                                    Pending
                                @elseif($blog->status == 1)
                                    Approved
                                @else
                                    Rejected
                                @endif
                            </p>
                        </div>

                        <div class="mb-3">
                            <strong>Created At:</strong>
                            <p>{{ $blog->created_at->format('d M, Y H:i') }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Updated At:</strong>
                            <p>{{ $blog->updated_at->format('d M, Y H:i') }}</p>
                        </div>

                        <!-- Optional Approve/Reject Buttons -->
                        @if($blog->status == 0)
                        <form action="{{ route('admin.blogs.approve', $blog->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('admin.blogs.reject', $blog->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
