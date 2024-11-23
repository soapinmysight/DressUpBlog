<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('user.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium">Title</label>
                            <input type="text" id="title" name="title" value="{{ $blog->title }}" required
                                   class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium">Description</label>
                            <input id="description" name="description"  value="{{ $blog->description }}" required
                                      class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium">Image (optional)</label>
                            <input type="file" id="image" name="image"
                                   class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow">Update Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
