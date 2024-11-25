<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Blog') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium">Title</label>
                            <input type="text" id="title" name="title" required
                                   class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>
                        <div class="mb-4">
                            <label for="theme_id" class="block text-sm font-medium">Select Theme</label>
                            <select id="theme_id" name="theme_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                                <option value="" >No Theme</option>
                                @foreach($themes as $theme)
                                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium">Description</label>
                            <input id="description" name="description"
                                      class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>

                        @include('components.game_partial')
{{-- when clicking on the "Save", the canvas in the game_partial should be converted as an image via base64 and saved to the database, along with the rest of the blog--}}
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
