<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

    @livewireStyles
</head>
<body>

@include('components.navbar')

<div class="container mx-auto">
    <h1 class="justify-center text-center">
        Find all your run clubs and races.
    </h1>
    @yield('content')
</div>

@livewireScripts
</body>

</html>
