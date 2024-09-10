<div class="w-full sm:w-5/12 text m-3 bg-gray-100 rounded-md shadow flex flex-col justify-between">
    <h1 class="p-2">
        {{ $club->name }}
    </h1>
    <div class="p-2 grow">
        {!! html_entity_decode($club->description) !!}
    </div>
    @if($club->day_of_week && count($club->day_of_week) > 0)
        <div class="p-2 font-bold">
            Meets On: {{ join(', ',$club->day_of_week) }}
        </div>
    @endif
    <div class="flex flex-row gap-2 p-2 justify-center">
        @if(isset($club->instagram))
            @livewire(\App\Livewire\SocialButton::class, ['url' => $club->instagram])
        @endif
        @if(isset($club->website))
            @livewire(\App\Livewire\SocialButton::class, ['url' => $club->website])
        @endif
    </div>
</div>
