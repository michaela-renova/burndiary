<x-layouts.app>

<div>
<h1 class="font-bold text-orange-500 text-3xl mb-6">Vytvoř nový příspěvek</h1>

@auth  
<form action="/create-post"
method="POST">



    @csrf
    <x-title />

    <x-textarea gif-id="fire-gif"></x-textarea>


    <x-button> Uložit </x-button>
    <x-button type="erase" id="erase" class="bg-yellow-500 hover:bg-orange-500 hover:text-yellow-500"> Zapálit </x-button>
</form>




    @else
    <form>
    <x-title />
    <x-textarea gif-id="fire-gif-guest"></x-textarea>

    <div x-data="{ modalOpen: false }"
    @keydown.escape.window="modalOpen = false"
    class="relative z-50 w-auto h-auto">
    <x-button type="button" @click="modalOpen=true" class="inline-flex justify-center items-center !bg-gray-400">
        Uložit</x-button>
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
            <div x-show="modalOpen" 
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black/40"></div>
            <div x-show="modalOpen"
                x-trap.inert.noscroll="modalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative px-7 py-6 w-full bg-white sm:max-w-lg sm:rounded-lg">
                <div class="flex justify-between items-center pb-2">
                    <h3 class="text-md font-semibold">Pro uložení příspěvku je nutné se <a href="/login" class="text-orange-500">přihlásit</a>.</h3>
                    <button @click="modalOpen=false" class="flex absolute top-0 right-0 justify-center items-center mt-5 mr-5 w-8 h-8 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>  
                    <button>
                </div>
                
            </div>
        </div>
    </template>
     <x-button type="erase" id="erase-guest" class="bg-yellow-500 hover:bg-orange-500 hover:text-yellow-500"> Zapálit </x-button>
    </form>
</div>

    @endauth
    



</div>


</x-layouts.app>
