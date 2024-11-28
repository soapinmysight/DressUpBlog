<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Blog') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('user.blog.store') }}" enctype="multipart/form-data">
                        {{--Token to verify that the authenticated user is the person actually making the requests to the application.--}}
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium">Title</label>
                            <input type="text" id="title" name="title" required
                                   class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                        </div>
                        <div class="mb-4">
                            <label for="theme_id" class="block text-sm font-medium">Select Theme</label>
                            <select id="theme_id" name="theme_id"
                                    class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                                <option value="" >No Theme</option>
                                @foreach($themes as $theme)
                                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium">Description</label>
                            <input id="description" name="description"
                                      class="w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-gray-100">

                        </div>

                        @include('components.game_partial')

                        <script>
                            function convertToImage() {
                                console.log("script is running")
                                // Select the canvas element
                                const charField = document.querySelector('canvas');
                                // If canvas element exists
                                if (charField) {
                                    // Select the canvas element on the page
                                    const imageSrc = charField.toDataURL('image/png');
                                    console.log(imageSrc)
                                    // Store the Base64 image data in the hidden input field with id 'image_data'
                                    document.getElementById('image_data').value = imageSrc;
                                    console.log(imageSrc)
                                }
                            }
                        </script>

                        <!-- Hidden input field to store the base64-encoded image data -->
                        <input type="hidden" name="image_data" id="image_data">
{{--<script>--}}
{{--    function convertToImage() {--}}
{{--        const canvas = document.querySelector('canvas');--}}

{{--        // Convert the canvas content to a data URL--}}
{{--        const imageSrc = canvas.toDataURL('image/png');--}}

{{--        // Create a temporary link element to download the image--}}
{{--        const link = document.createElement('a');--}}
{{--        link.href = imageSrc;--}}
{{--        link.download = 'canvas_image.png';--}}

{{--        // Trigger the link programmatically to start the download--}}
{{--        link.click();--}}
{{--    }--}}
{{--</script>--}}

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow"onclick="convertToImage()">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
