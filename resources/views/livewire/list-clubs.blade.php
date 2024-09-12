<x-layouts.app>

    <div>
        <div class="mt-1">
            @livewire(App\Livewire\Map::class)
        </div>

        <div class="flex flex-wrap w-full flex-row divide-y flex-1 justify-between">
            @foreach($clubs as $club)
                @livewire(App\Livewire\ClubItem::class, ['club' => $club], key($club->id))
            @endforeach
        </div>
    </div>
</x-layouts.app>

