<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard - Blog Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold">Manage Blogs</h1>

                    @foreach($blogs as $blog)
                        <div class="my-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-md shadow">
                            <h2 class="text-lg font-semibold">{{ $blog->title }}</h2>
                            <p><strong>Author:</strong> {{ $blog->user->name }}</p>
                            <p>{{ $blog->description }}</p>
                            <p>
                                <strong>Status:</strong>
                                @if($blog->active)
                                    <span class="text-green-600">Active</span>
                                @else
                                    <span class="text-red-600">Inactive</span>
                                @endif
                            </p>
                            <form method="POST" action="{{ route('admin.blog.toggle', $blog->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    {{ $blog->active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
