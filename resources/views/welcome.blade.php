<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')

        @livewireStyles
        @bukStyles
    </head>
    <body>


    <div class="w-full bg-gray-300 h-10 p-3 text-balance hidden sm:block">
        runDMV
        <button class="ml-5 rounded-md underline hover:bg-gray-400 hover:scale-110">
            Clubs
        </button>
        <button class="ml-5 rounded-md underline hover:bg-gray-400 hover:scale-110">
            Races
        </button>
    </div>


    <div class="container mx-auto">
        <div class="flex flex-wrap w-full flex-row divide-y flex-1 justify-between">
            @foreach($clubs as $club)

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
                        @livewire(\App\Livewire\SocialButton::class, ['url' => $club->instagram])
                        @livewire(\App\Livewire\SocialButton::class, ['url' => $club->website])
                    </div>


                </div>
            @endforeach


        </div>
    </div>



    @livewireScripts
    </body>
</html>
