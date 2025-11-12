<x-layouts.app>
<h1>Upravit</h1>

<form action="/edit-post/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT')
    <x-input type="text" name="title" value="{{ $post->title }}" />
    <textarea name="content">{{$post->content}}</textarea>
    <x-button>Ulož změny</x-button>

</form>

</x-layouts.app>
