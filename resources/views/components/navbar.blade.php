<nav class="p-4 border border-gray-200 flex justify-between">
   <a href="/"> 
 <img 
    src="{{ asset('images/logo3.png') }}"  
    alt="logo"
    class="hidden md:block h-12 transform transition duration-300 hover:scale-103">

      <img
    src="{{ asset('images/logo_small.png') }}"
    alt="small logo"
    class="block md:hidden h-12 transform transition duration-300 hover:scale-105">
   </a>
                 
    
<div class="flex justify-between items-center space-x-4 mr-4">
@auth
<x-profile-info />


<a href="/dashboard" class="inline-flex whitespace-nowrap border border-orange-500 hover:text-white! hover:bg-orange-500 text-orange-500 font-bold px-3 py-1 rounded-lg transition duration-300 ease-in-out">Moje příspěvky</a>
<form action="/logout" method="POST">
    @csrf
    <x-button type="submit">Odhlášení</x-button>
</form>



@else


<div x-data="{ modalOpen: @json($errors->register->any()) }"
 @keydown.escape.window="modalOpen = false" class="relative z-50">

    <x-button 
        @click="modalOpen = true" 
        class="bg-orange-500 text-white px-3 py-1 rounded-md hover:bg-orange-600 transition mr-4">
        Přihlášení
    </x-button>

    
    <template x-teleport="body">
        <div 
            x-show="modalOpen" 
            x-cloak
            class="fixed inset-0 z-[99] flex items-center justify-center w-screen h-screen">

           
            <div 
                @click="modalOpen = false" 
                class="absolute inset-0 bg-black/40"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
            </div>

           
            <div 
                x-show="modalOpen"
                x-trap.inert.noscroll="modalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative px-8 py-6 bg-white w-full sm:max-w-lg sm:rounded-lg shadow-lg">

                
                <button 
                    @click="modalOpen = false" 
                    class="absolute top-4 right-4 text-gray-600 hover:text-gray-800 rounded-full p-1 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

              
                <div class="container mx-auto w-full">
                   <x-login-form />
                </div>
            </div>
        </div>
    </template>
</div>



</form> 


@endauth

</div>


</nav>