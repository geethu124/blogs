<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('All Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                @if(session('success'))
                    <div class="mb-4 font-semibold text-green-600">
                        {{ session('success') }}
                    </div>
                @endif
                 @if(session('error'))
                    <div class="mb-4 font-semibold text-red-600">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="min-w-full border" id="blogs-table">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Content</th>
                            <th class="px-4 py-2 border">Image</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td class="px-4 py-2 border">{{ $blog->id }}</td>
                            <td class="px-4 py-2 border">{{ $blog->title }}</td>
                            <td class="px-4 py-2 border">{{ Str::limit($blog->content, 50) }}</td>
                            <td class="px-4 py-2 border">
                                @if($blog->image)
                                    <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" width="100">
                                @endif
                            </td>
                            <td class="px-4 py-2 border">
                                @if($blog->status == 0)
                                 Pending
                                 @elseif($blog->status == 1)
                                 Approved
                                 @else
                                 Rejected
                                 @endif
                                {{-- {{ ucfirst($blog->status) }} --}}
                            </td>
                            <td class="px-4 py-2 space-x-2 border">
                                @if($blog->status == 0)
                                    <form action="{{ route('admin.blogs.approve', $blog->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-2 py-1 bg-green-500 rounded">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.blogs.reject', $blog->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-2 py-1 bg-red-500 rounded">Reject</button>
                                    </form>
                                @else
                                    <span class="text-gray-600"></span>
                                @endif
                                <a href="{{ route('admin.blogs.view', $blog->id) }}"
                                class="inline-block px-2 py-1 bg-blue-500 rounded">
                                View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Include jQuery and DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#blogs-table').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10
            });
        });
    </script>
</x-app-layout>
