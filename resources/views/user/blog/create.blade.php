<x-app-layout>
    <h1>Create Blog</h1>
    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description</label>
        <input type="text" id="description" name="description">

        @if (!empty($imageData))
            <div>
                <h3>Preview</h3>
                <img src="{{ request('image_data') }}" alt="Selected Outfit" />
                <input type="hidden" name="image_data" value="{{ request('image_data') }}">
            </div>
        @endif

        <button type="submit">Save</button>
    </form>
</x-app-layout>
