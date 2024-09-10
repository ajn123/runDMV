@extends('components.app')

@section('content')

<div class="">
    @foreach($races as $race)
        <div class="grid justify-around grid-cols-3 bg-gray-100 hover:bg-gray-200 transition-all duration-150 ease-in border-2 shadow-2xl border-amber-500 mb-4 p-2 rounded-md">
            <div class="col-span-3">
                {{ $race->name }}
            </div>
            <div class="col-span-3">
                {{ $race->date }}
            </div>
            <div class="">
                <a href="{{ $race->website }}" class="flex">
                    <x-heroicon-s-magnifying-glass-circle class="h-6 w-6"/>
                    Website
                </a>
            </div>

            <div class=" justify-around ">
                <h1>
                    {{ $race->description }}
                </h1>
            </div>
        </div>
    @endforeach
</div>

@endsection
