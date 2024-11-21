<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Outfit Blogs') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($blogs as $blog)
                        <div class="my-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-md shadow">
                            <a href="{{ route('user.blog.show', $blog->id) }}" class="block">
                                <h2 class="text-lg font-semibold">{{ $blog->title }}</h2>
                            </a>
                            <p><strong>Author:</strong> {{ $blog->user->name }}</p>
                            <p><strong>Theme:</strong> {{ $blog->theme->themeTitle }}</p>
                            <p>{{ $blog->description }}</p>
                            @if ($blog->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                         class="rounded-md shadow w-full h-auto">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


