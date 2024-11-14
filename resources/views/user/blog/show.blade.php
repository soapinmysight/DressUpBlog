<x-app-layout>
    <h1>{{ $blog->title }}</h1>

    <div class="h-full flex flex-col justify-center bg-gray-500 w-40 h-100 rounded-md p-5">
        <div class="blog-item">
            <p><strong>Author:</strong> {{ $blog->user->name }}</p>
            <p>{{ $blog->description }}</p>

            @can('update', $blog)
                <div class="bg-gray-50 flex justify-center rounded-md">
                    <a href="{{ route('user.blog.edit', $blog->id) }}" class="text-black dark:hover:text-white">
                        Edit
                    </a>
                </div>
            @endcan

            @can('delete', $blog)
                <div class="bg-gray-50 flex justify-center rounded-md">
                    <form action="{{ route('user.blog.destroy', $blog->id) }}" method="POST">
                    @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
                </div>
            @endcan

        </div>

{{--        --}}{{-- Display the comments --}}
{{--        <div class="comments-section mt-5">--}}
{{--            <h2>Comments</h2>--}}
{{--            @foreach($blog->comments as $comment)--}}
{{--                <p>{{ $comment->content }}</p>--}}
{{--            @endforeach--}}
{{--        </div>--}}

        <div class="comments-section mt-5">
            <h2>Comments</h2>
            @foreach($blog->comments as $comment)
                <div>
                    <p>{{ $comment->content }}</p>
                    @can('update', $comment)
                        <a href="{{ route('user.comment.edit', $comment->id) }}">Edit</a>
                    @endcan
                    @can('delete', $comment)
                        <form action="{{ route('user.comment.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endcan
                </div>
            @endforeach
        </div>

        {{-- Add new comment --}}
        <form method="POST" action="{{ route('user.comment.store', $blog->id) }}">
            @csrf
            <label for="content">Add Comment:</label>
            <textarea id="content" name="content"></textarea>
            <button type="submit">Post Comment</button>
        </form>



    </div>
</x-app-layout>
{{--<x-app-layout>--}}
{{--    <div class="blog-item">--}}
{{--        <h1>{{ $blog->title }}</h1>--}}
{{--        <p>{{ $blog->description }}</p>--}}
{{--    </div>--}}
{{--    <form method="POST" action="{{route('comment.store')}}">--}}
{{--        @csrf--}}
{{--        <label for="content">comment</label>--}}
{{--        <input type="text" id="content" name="content">--}}
{{--        <button type="submit">Save</button>--}}
{{--    </form>--}}

{{--    @foreach($blog->comments as $comment)--}}
{{--            <p>{{ $comment->content }}</p>--}}
{{--    @endforeach--}}
{{--</x-app-layout>--}}
