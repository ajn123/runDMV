@extends('components.app')

@section('content')

<div class="">
    <div>
        @livewire('race-form')
    </div>

    <livewire:races-table />
</div>

@endsection
