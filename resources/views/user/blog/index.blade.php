<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Outfit Blogs') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" mx-8 my-2	sm:px-6 lg:px-8">
                <a href="{{ route('user.blog.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Create Blog
                </a>
                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mx-8 my-2">
                        <form method="GET" action="{{ route('user.blog.index') }}" class="mb-4 flex flex-wrap gap-4">
                            <div>
                                <label for="theme" class="block text-sm font-medium text-gray-700">Filter by Theme</label>
                                <select id="theme" name="theme_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300">
                                    <option value="">All Themes</option>
{{--                    Filter on themes--}}
                                @foreach($themes as $theme)
                                        <option value="{{ $theme->id }}" {{ request('theme_id') == $theme->id ? 'selected' : '' }}>
                                            {{ $theme->themeTitle }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex-1">
                                <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                                <input
                                    type="text"
                                    id="search"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Search blogs"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                                >
                            </div>
                            <div class="self-end">
                                <button type="submit" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Apply
                                </button>
                            </div>
                        </form>
                    </div>


                </div>
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


