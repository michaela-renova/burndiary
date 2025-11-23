<div class="flex items-center mt-1">
<p class="font-bold text-md px-3 py-1 ">{{auth()->user()->name}}</p>
<div x-data="{
        dropdownOpen: false
    }"
    class="relative">

    <button x-on:click="dropdownOpen=true" class="inline-flex justify-center items-center transform transition duration-300 hover:scale-108 text-sm font-medium rounded-md text-neutral-700 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
        <img  src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('images/default_image2.jpg') }}"
        class="object-cover w-9 h-9 rounded-full" />
  
                
    </button>

    <div x-show="dropdownOpen" 
        x-on:click.away="dropdownOpen=false"
        x-transition:enter="ease-out duration-200"
        x-transition:enter-start="-translate-y-2"
        x-transition:enter-end="translate-y-0"
        class="absolute top-0 left-1/2 z-50 mt-12 w-56 -translate-x-1/2"
        x-cloak>
        <div class="p-1 mt-1 bg-white rounded-md border shadow-md border-neutral-200/70 text-neutral-700">
            
           
            <a href="/upload-image" class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                <i data-lucide="camera" class="h-4 mr-2"></i>
                <span>Nahrát profilovou fotku</span>
        
            </a>
                <form action="/delete-image" method="POST">
                @csrf
                @method('DELETE')
                <x-button class="flex gap-1 px-2 py-1.5 text-sm font-normal bg-white!  text-neutral-700!  hover:bg-neutral-100! items-center rounded ">
                <i data-lucide="trash-2" class="h-4"></i>
                Smazat profilovou fotku
                </x-button>
                </form>
   
             
            </a>

        </div>
    </div>
</div>
</div>