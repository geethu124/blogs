<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('All Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="mb-4">
                    <a href="{{ route('user.dashboard') }}"
                    class="px-4 py-2 bg-green-600 rounded hover:bg-green-700">
                    Create Blog
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <table id="blogs-table" class="min-w-full border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Content</th>
                            <th class="px-4 py-2 border">Image</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td class="px-4 py-2 border">{{ $blog->id }}</td>
                                <td class="px-4 py-2 border">{{ $blog->title }}</td>
                                <td class="px-4 py-2 border">{{ Str::limit($blog->content, 50) }}</td>
                                <td class="px-4 py-2 border">
                                    @if($blog->image)
                                        <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" class="object-cover w-20 h-20">
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">
                                    @if($blog->status == 0 || $blog->status == 2 )
                                     <a href="{{ route('blogs.edit', $blog->id) }}" class="px-2 py-1 bg-indigo-500 rounded">Edit</a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" class="px-2 py-1 bg-red-500 rounded">Delete</button>
                                    </form>
                                    @else
                                    Approved
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Include jQuery and DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#blogs-table').DataTable();
        });
    </script>
</x-app-layout>
