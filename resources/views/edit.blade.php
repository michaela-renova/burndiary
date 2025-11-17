<x-layouts.app>
<h1 class="font-bold text-orange-500 text-3xl mb-6">Upravení příspěvku</h1>

<div class="p-6 bg-white rounded-2xl shadow-md">

<form action="/edit-post/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT')
    <x-input class="mb-2" placeholder="Sem napiš nadpis" type="text" name="title" value="{{ $post->title }}" />
    <textarea class="w-full border border-gray-300 rounded-lg p-2" name="content">{{$post->content}}</textarea>
    <x-button class="mt-4">Ulož změny</x-button>

</form>

</div>

</x-layouts.app>
