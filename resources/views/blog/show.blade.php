<x-app-layout>
    <div class="blog-item">
        <h1>{{ $blog->title }}</h1>
        <p>{{ $blog->description }}</p>
    </div>
    <form method="POST" action="{{route('Comment.store')}}">
        @csrf
        <label for="content">comment</label>
        <input type="text" id="content" name="content">
        <button type="submit">Save</button>
    </form>
</x-app-layout>
