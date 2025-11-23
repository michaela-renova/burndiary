<div>
<div id="textarea-wrapper" class="relative overflow-hidden">
<textarea {{ $attributes->merge(['name' => 'content', 'placeholder' => 'Sem napiš text...', 'class'=>"relative w-full bg-white/70 border border-gray-200 shadow-md rounded-xl focus:outline-none text-left text-lg text-orange-900 p-4 h-132 placeholder:text-gray-300 placeholder:italic placeholder:text-2xl mb-4" ]) }}>
</textarea>
<img id="{{ $attributes->get('gif-id', 'fire-gif') }}"
                 src="{{ asset('images/fire-gif.gif') }}"  
                 alt="Oheň" 
                 class="hidden absolute top-0 left-0 w-full h-full object-contain pointer-events-none">
    </div>

@error('content')
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror

</div>