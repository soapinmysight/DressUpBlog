<x-app-layout>
    <h1>Edit Comment</h1>
    <form method="POST" action="{{ route('user.comment.update', $comment->id) }}">
        @csrf
        @method('PUT')
        <label for="content">Comment</label>
        <textarea id="content" name="content">{{ old('content', $comment->content) }}</textarea>
        <button type="submit">Save Changes</button>
    </form>
</x-app-layout>
