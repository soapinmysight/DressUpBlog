{{--file for blog.show--}}
<x-app-layout>
    <h1>Blog</h1>
    @foreach($blogs as $blog)
        <div class="h-full flex flex-col justify-center bg-gray-500 w-40 h-100 rounded-md p-5">
        <div class="blog-item">
            <a href="{{ route('blog.show', $blog->id) }}">
                <div class="bg-gray-50 flex justify-center rounded-md">
                <h2 class="text-black dark:hover:text-white">{{ $blog->title }}</h2>
                </div>
          </a>
            <p>{{ $blog->description }}</p>
        </div>
        </div>
    @endforeach
</x-app-layout>


