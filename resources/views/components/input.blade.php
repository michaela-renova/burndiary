
    <input {{ $attributes->merge(['class'=>"flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 disabled:cursor-not-allowed disabled:opacity-50" ]) }} />

    @error($attributes['name'])
        <p class="text-red-500 font-semibold fixed top-1/2 -mt-18">{{$message}}</p>
    @enderror

    @error($attributes['email'])
        <p class="text-red-500 font-semibold fixed top-1/2 -mt-18">{{$message}}</p>
    @enderror

    @error($attributes['password'])
        <p class="text-red-500 font-semibold fixed top-1/2 -mt-18">{{$message}}</p>
    @enderror


    


