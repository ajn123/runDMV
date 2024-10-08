
<x-layouts.app>
    <div>
        <div class="grid grid-rows-3 grid-flow-col gap-6 bg-gray-100 hover:bg-gray-200 transition-all duration-150 ease-in border-2 shadow-2xl border-amber-500 mb-4 mt-8 p-2 rounded-md">
            <div class="row-span-1 font-bold italic">
                {{ $race->name }}
            </div>
            <div class="row-span-1">
                {{ $race->date }}
            </div>
            <div class="row-span-1 hover:bg-blue-300 transition-all ease-in rounded-lg">
                <a href="https://{{ $race->website }}" class="flex">
                    <x-heroicon-s-magnifying-glass-circle class="h-6 w-6"/>
                    Website
                </a>
            </div>

            <div class="row-span-2 col-span-3">
                {!! html_entity_decode($race->description) !!}
            </div>

            <div class="row-span-1">
                @isset($race->distances)
                    <h1 class="font-bold inline-block"> Distances:</h1> {{ join(', ',$race->distances) }}
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>

