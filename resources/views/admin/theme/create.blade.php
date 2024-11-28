<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ ('Admin Dashboard - Add New Theme') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-6">Add New Theme</h1>

                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(auth()->user()->role === 'admin')
                    <form action="{{ route('admin.theme.store') }}" method="POST">
                        {{--Token to verify that the authenticated user is the person actually making the requests to the application.--}}
                        @csrf

                        <div class="mb-4">
                            <label for="themeTitle" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Theme Title</label>
                            <input type="text" name="themeTitle" id="themeTitle" class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('themeTitle') }}" required>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Create Theme</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
