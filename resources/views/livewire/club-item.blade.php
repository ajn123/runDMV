<div class="w-full sm:w-5/12 text m-3 bg-gray-100 rounded-md shadow flex flex-col justify-between">
    <div class="flex flex-row justify-evenly text-balance">

        <div class="flex flex-col md:flex-row gap-2 p-2">
            <h1 class="p-2">
                {{ $club->name }}
            </h1>
            @if(isset($club->instagram))
                @livewire(\App\Livewire\SocialButton::class, ['url' => $club->instagram, 'website' => false, 'color' => 'bg-purple-400'])
            @endif
            @if(isset($club->website))
                @livewire(\App\Livewire\SocialButton::class, ['url' => $club->website, 'website' => true, 'color' => 'bg-blue-400'])
            @endif
        </div>
    </div>

    @if($club->day_of_week && count($club->day_of_week) > 0)
        <div class="p-2 font-bold">
            Meets On: {{ join(', ',$club->day_of_week) }}
        </div>
    @endif
    <div class="p-2 grow">
        {!! html_entity_decode($club->description) !!}
    </div>


</div>
