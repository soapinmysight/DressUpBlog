<x-app-layout>
    <h1>Blog</h1>
{{--    @if($blogs->isEmpty())--}}
{{--        <p>Er zijn momenteel geen blogs beschikbaar.</p>--}}
{{--    @else--}}
    @foreach($blogs as $blog)
        <div class="blog-item">
            <a href="/blog/">
            <h2>{{ $blog['title'] }}</h2>
            </a>
            <p>{{ $blog['description'] }}</p>
        </div>
    @endforeach
{{--    @endif--}}
</x-app-layout>
