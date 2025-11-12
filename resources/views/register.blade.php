<x-layouts.app>
<div class="container mx-auto mt-40 w-96 border border-gray-300 rounded-md p-8">

<h1 class="text-2xl font-bold mb-6">Registrace</h1>

<form action="/register" method="POST">
    @csrf
    <label for="name" class="font-bold">Jméno</label>

    <x-input type="text" placeholder="Honza Nový" name="name" value="" class="mb-4 focus:border-neutral-800 focus:outline-none" />

    <label for="email" class="font-bold" >Email</label>
    <x-input type="email" placeholder="jmeno@email.com" name="email" value="" class="mb-4 focus:border-neutral-800 focus:outline-none" />
        
    <label for="password" class="font-bold" >Heslo</label>
    <x-input type="password" placeholder="*****" name="password" value="" class="mb-8 focus:border-neutral-800 focus:outline-none" />

    <x-button type="submit" class="mb-4 w-full">Registrovat</x-button>

</form>

</div>

</x-layouts.app>
