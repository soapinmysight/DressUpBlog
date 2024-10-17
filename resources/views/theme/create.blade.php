<x-app-layout>
    <h1>Create Theme</h1>
    <form method="POST" action="{{route('theme.store')}}">
        @csrf
        <label for="themeTitle">Theme Title</label>
        <input type="text" id="themeTitle" name="themeTitle">
        <button type="submit">Save</button>
    </form>
</x-app-layout>
