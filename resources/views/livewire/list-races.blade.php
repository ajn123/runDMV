@extends('components.app')

@section('content')

<div class="">
    @foreach($races as $race)
        <div class="grid grid-rows-3 grid-flow-col gap-6 bg-gray-100 hover:bg-gray-200 transition-all duration-150 ease-in border-2 shadow-2xl border-amber-500 mb-4 p-2 rounded-md">
            <div class="row-span-1">
                {{ $race->name }}
            </div>
            <div class="row-span-1">
                {{ $race->date }}
            </div>
            <div class="row-span-1">
                <a href="{{ $race->website }}" class="flex">
                    <x-heroicon-s-magnifying-glass-circle class="h-6 w-6"/>
                    Website
                </a>
            </div>

            <div class="row-span-2 col-span-3">

                    <h3>
                        {{ $race->description }}
                    </h3>
            </div>

            <div class="row-span-1">
                Distances:
            </div>


        </div>
    @endforeach
</div>

@endsection
