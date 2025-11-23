<button {{ $attributes->merge(['class' => 'font-bold bg-orange-500 hover:bg-orange-600 transition text-white px-2 py-1 rounded-md transition duration-300 ease-in-out']) }} >
    {{ $slot }}
</button>