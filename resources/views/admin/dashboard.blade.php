<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Congrats, you hacked into the main frame") }}
                    {{-- Button to admin blog management --}}
                    <a href="{{ route('admin.blog.index') }}"
                       class="mt-4 inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Manage Blogs
                    </a>
                    <a href="{{ route('admin.theme.index') }}"
                       class="mt-4 inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                        Manage Themes
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
