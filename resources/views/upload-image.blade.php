<x-layouts.app>

<div class="container mx-auto mt-40 w-96 border border-gray-300 rounded-md p-8">

<form action="/upload-image" method="POST" enctype="multipart/form-data">
    @csrf
    <x-input type="file" name="profile_image" accept="image/*" class="mb-4" />
    <x-button type="submit">Nahrát obrázek</x-button>
</form>

</div>

</x-layouts.app>



