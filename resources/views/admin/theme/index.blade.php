<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard - Manage Themes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-6">Themes</h1>

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

                    <a href="{{ route('admin.theme.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add New Theme</a>

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full bg-gray-100 dark:bg-gray-700 rounded-md shadow">
                            <thead class="bg-gray-200 dark:bg-gray-600">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Theme Title</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($themes as $theme)
                                <tr class="border-t dark:border-gray-600">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $theme->themeTitle }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('admin.theme.edit', $theme->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">Edit</a>
                                        <form action="{{ route('admin.theme.destroy', $theme->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this theme?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">No themes available.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
