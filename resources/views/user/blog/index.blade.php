{{--file for blog.show--}}
<x-app-layout>
    <h1>Blog</h1>
    @foreach($blogs as $blog)
        <div class="h-full flex flex-col justify-center bg-gray-500 w-40 h-100 rounded-md p-5">
        <div class="blog-item">
            <a href="{{ route('user.blog.show', $blog->id) }}"> {{-- Wrap blog title in route to detail page --}}
                <div class="bg-gray-50 flex justify-center rounded-md">
                <h2 class="text-black dark:hover:text-white">{{ $blog->title }}</h2> {{-- Display the blog title --}}
                </div>
          </a>
            <p><strong>Author:</strong> {{ $blog->user->name }}</p> {{-- Display the blog author's name --}}
            <p>{{ $blog->description }}</p> {{-- Display the blog description --}}
            <div class="bg-gray-50 flex justify-center rounded-md">
{{--                <h3 class="text-black dark:hover:text-white"> edit </h3> --}}{{-- Display if user is authorized to edit (if logged in user is the same as the authors id) --}}
            </div>
        </div>
        </div>
    @endforeach
</x-app-layout>

