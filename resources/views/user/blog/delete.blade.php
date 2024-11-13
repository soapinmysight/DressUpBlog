{{-- resources/views/user/blog/edit.blade.php --}}
<x-app-layout>
    <h1>Are you sure you want to delete?</h1>

    <form action="{{ route('user.blog.delete', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $blog->title }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ $blog->description }}</textarea>
        </div>

        <div>
            <label for="image">Image (optional)</label>
            <input type="file" id="image" name="image">
        </div>

        <button type="submit">Update Blog</button>
    </form>
</x-app-layout>
