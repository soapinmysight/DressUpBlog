<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $blog->title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="blog-item">
                        <p><strong>Author:</strong> {{ $blog->user->name }}</p>
                        <p><strong>Theme:</strong> {{ $blog->theme->themeTitle }}</p>
                        <p>{{ $blog->description }}</p>
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">

{{--                        Display edit button if user is allowed to--}}
                    @can('update', $blog)
                            <div class="mt-4">
                                <a href="{{ route('user.blog.edit', $blog->id) }}"
                                   class="px-4 py-2 bg-blue-600 text-white rounded-md shadow">Edit</a>
                            </div>
                        @endcan

{{--                        Display delete button if user is allowed to--}}
                        @can('delete', $blog)
                            <div class="mt-4">
                                <a href="{{ route('user.blog.delete', $blog->id) }}"
                                   class="px-4 py-2 bg-blue-600 text-white rounded-md shadow">Delete</a>
                            </div>
                        @endcan
                    </div>

{{--                     Display comments--}}
                    <div class="comments-section mt-5">
                        <h2 class="text-lg font-semibold mb-4">Comments</h2>
                        @foreach($blog->comments as $comment)
                            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md shadow mb-4">
                                <p>{{ $comment->content }}</p>
                                @can('update', $comment)
                                    <a href="{{ route('user.comment.edit', $comment->id) }}" class="text-blue-500">Edit</a>
                                @endcan
                                @can('delete', $comment)
                                    <form action="{{ route('user.comment.destroy', $comment->id) }}" method="POST"
                                          class="inline-block ml-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        @endforeach

{{--Count how many posts user has--}}
                        @php
                            $postCount = \App\Models\Blog::where('user_id', auth()->id())->count();
                        @endphp
{{--If user has 3 posts or more, allow user to post a comment--}}
                        @if($postCount >= 3)
                            <form method="POST" action="{{ route('user.comment.store', $blog->id) }}" class="mt-4">
                                @csrf
                                <label for="content" class="block text-sm font-medium">Add Comment:</label>
                                <textarea id="content" name="content"
                                          class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100"></textarea>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow mt-2">Post Comment</button>
                            </form>
{{--If user doesn't, display message--}}
                        @else
                            <p class="text-red-500 mt-5">
                                You need to have made at least 3 posts before you can comment.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
