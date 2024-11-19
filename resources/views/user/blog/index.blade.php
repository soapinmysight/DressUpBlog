<x-app-layout>
    <h1>Blog</h1>
    @foreach($blogs as $blog)
        <div class="h-full flex flex-col justify-center bg-gray-500 w-40 h-100 rounded-md p-5">
        <div class="blog-item">
            <a href="{{ route('user.blog.show', $blog->id) }}"> {{-- Wrap blog title in route to detail page --}}
                <div class="bg-gray-50 flex justify-center rounded-md">
                <h2 class="text-black dark:hover:text-white">{{ $blog->title }}</h2> {{-- Display the blog title --}}
{{--                    display blog's theme--}}
                </div>
          </a>
            <p><strong>Author:</strong> {{ $blog->user->name }}</p> {{-- Display the blog author's name --}}
            <p><strong>Theme:</strong> {{ $blog->theme->themeTitle }}</p>
            <p>{{ $blog->description }}</p> {{-- Display the blog description --}}
            <div>
                @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
                @endif

            </div>

        </div>
        </div>
    @endforeach
</x-app-layout>


