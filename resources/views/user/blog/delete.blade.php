<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Delete Blog') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-semibold mb-4">Are you sure you want to delete this blog?</h1>
                    <form action="{{ route('user.blog.destroy', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium">Title</label>
                            <input type="text" id="title" name="title" value="{{ $blog->title }}" disabled
                                   class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium">Description</label>
                            <textarea id="description" name="description" disabled
                                      class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">{{ $blog->description }}</textarea>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md shadow">Delete Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
