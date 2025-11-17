<x-layouts.app>
<div class="mx-auto">
    <h1 class="font-bold text-orange-500 text-3xl mb-6">Moje příspěvky</h1>
    <div class ="grid grid-cols-1 lg:grid-cols-2 gap-6">
    @foreach ($posts as $post)
            <div class="p-6 bg-white rounded-2xl shadow-md">
                <h2 class="text-xl font-semibold mb-2">{{ $post['title'] }}</h2>
                <div class="text-gray-700 mb-4">
                {{ $post ['content'] }}
                </div>
                
                <div class="flex justify-between gap-4">
                <div class="flex items-center gap-4">

                <form action="/edit-post/{{ $post->id }}" method="GET">
            <x-button type="submit" class="flex gap-2 items-center">
            <i data-lucide="pen-line" class="h-4" ></i>
            Upravit
            </x-button>
            </form>

                <form action="/delete-post/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <x-button class="flex gap-1 items-center">
                <i data-lucide="trash-2" class="h-4"></i>
                Smazat
                </x-button>
                </form>
                </div>
                
                <p class="text-sm text-gray-500 mb-4">
                    @if ($post->updated_at->ne($post->created_at))
                     Upraveno dne {{ $post->updated_at->format('d.m.Y H:i') }}
                    @else
                    Vytvořeno dne {{ $post->created_at->format('d.m.Y H:i') }}
                    @endif
                </p>
            </div>
        </div>


    @endforeach
    </div>
</div>
</x-layouts.app>