<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Blog Form -->
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                        <input type="text" name="title" id="title"
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               value="{{ old('title') }}" required>
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
                        <textarea name="content" id="content" rows="6"
                                  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                  required>{{ old('content') }}</textarea>
                    </div>

                    <!-- Image (Optional) -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                        <input type="file" name="image" id="image" class="w-full">
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Add Blog
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
