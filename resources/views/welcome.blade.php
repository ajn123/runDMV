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
        <div>
            @livewire(App\Livewire\Map::class)
        </div>

        <div class="flex flex-wrap w-full flex-row divide-y flex-1 justify-between">
            @foreach($clubs as $club)
                @livewire(App\Livewire\ClubItem::class, ['club' => $club], key($club->id))
            @endforeach
        </div>
    </div>



    @livewireScripts
    </body>


</html>
