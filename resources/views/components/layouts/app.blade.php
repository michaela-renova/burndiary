<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>



<nav class="p-4 border border-gray-200 flex justify-between">
   <a href="/"> 
 <img 
    src="{{ asset('images/logo.png') }}"  
    alt="logo"
    class="h-12">
   </a>
                 
    
<div class="flex justify-between items-center space-x-4 mr-4">
@auth
<p class="font-bold rounded-lg px-3 py-1 ">{{auth()->user()->name}}</p>
<a href="/dashboard" class="inline-flex border-2 border-orange-500 hover:white hover:text-orange-600 hover:border-orange-600 text-orange-500 font-bold px-3 py-1 rounded-lg">Moje příspěvky</a>
<form action="/logout" method="POST">
    @csrf
    <x-button type="submit">Odhlášení</x-button>
</form>



@else


<div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50">

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
                    <h1 class="text-2xl font-bold mb-6 text-center">Přihlášení</h1>

                    <form action="/login" method="POST">
                        @csrf
                        <label for="email" class="font-bold">Email</label>
                        <x-input 
                            type="email" 
                            placeholder="jmeno@email.com" 
                            name="email" 
                            value="{{ old('email') }}" 
                            class="mb-4 w-full focus:border-neutral-800 focus:outline-none" 
                        />

                        <label for="password" class="font-bold">Heslo</label>    
                        <x-input 
                            type="password" 
                            placeholder="*****" 
                            name="password" 
                            value="{{ old('password') }}" 
                            class="mb-8 w-full focus:border-neutral-800 focus:outline-none"
                        />

                        <x-button type="submit" class="mb-4 w-full">Přihlásit se</x-button>
                    </form>

                    <p class="text-sm text-center">
                        Nemáš účet? 
                        <a href="/register" class="text-orange-500 hover:text-orange-600 font-bold">Zaregistruj se.</a>
                    </p>
                </div>
            </div>
        </div>
    </template>
</div>



</form> 


@endauth

</div>


</nav>
    
    

<main class="container mx-auto bg-white p-16 rounded-xl mt-16">
    
    {{ $slot }}
</main>

<div class="fixed bottom-0 w-full h-128 pointer-events-none -z-10 ">
    <img src="{{ asset('images/fire.png') }}" 
         class="absolute left-1/2 -translate-x-1/2 -bottom-110 lg:-bottom-120 w-full h-[200%] object-contain opacity-10">
</div>


<footer class="text-center py-4 fixed bottom-0 w-full z-10">
    <p>© 2025</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>