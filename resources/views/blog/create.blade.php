<x-app-layout>
    <h1>Create Blog</h1>
    <form method="POST" action="{{route('blog.store')}}">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
        <label for="description">Description</label>
        <input type="text" id="description" name="description">
        <button type="submit">Save</button>
    </form>
</x-app-layout>
