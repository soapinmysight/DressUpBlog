{{--file for blog.show--}}
<x-app-layout>
    <h1>Blog</h1>
    @foreach($blogs as $blog)
        <div class="blog-item">
            <a href="{{ route('blog.show', $blog->id) }}">
                <h2>{{ $blog->title }}</h2>
            </a>
            <p>{{ $blog->description }}</p>
        </div>
    @endforeach
</x-app-layout>
