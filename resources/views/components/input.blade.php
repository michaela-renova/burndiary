
    <input {{ $attributes->merge(['class'=>"flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-gray-200 disabled:cursor-not-allowed disabled:opacity-50" ]) }} />

@error($attributes->get('name'))
    <p class="text-red-500 font-semibold -mt-4">{{ $message }}</p>
@enderror


    


