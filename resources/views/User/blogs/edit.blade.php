<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <!-- Button to go back to listing -->
                <div class="mb-4">
                    <a href="{{ route('blogs.list') }}"
                       class="px-4 py-2 bg-green-600 rounded hover:bg-green-700">
                       Back to Blog Listing
                    </a>
                </div>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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

                <!-- Edit Blog Form -->
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block mb-2 font-bold text-gray-700">Title:</label>
                        <input type="text" name="title" id="title"
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               value="{{ old('title', $blog->title) }}" required>
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label for="content" class="block mb-2 font-bold text-gray-700">Content:</label>
                        <textarea name="content" id="content" rows="6"
                                  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  required>{{ old('content', $blog->content) }}</textarea>
                    </div>

                    <!-- Current Image -->
                    @if($blog->image)
                        <div class="mb-4">
                            <label class="block mb-2 font-bold text-gray-700">Current Image:</label>
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="w-48 h-auto rounded">
                        </div>
                    @endif

                    <!-- Upload New Image -->
                    <div class="mb-4">
                        <label for="image" class="block mb-2 font-bold text-gray-700">Change Image:</label>
                        <input type="file" name="image" id="image" class="w-full">
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 rounded hover:bg-indigo-700">
                            Update Blog
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
