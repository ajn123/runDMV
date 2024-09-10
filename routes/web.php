<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('livewire.list-clubs', [
        'clubs' => \App\Models\Club::all()
    ]);
});

Route::get('/races', function () {
    return view('livewire.list-races',
    [
        'races' => \App\Models\Race::orderBy('date')->get()
    ]);
});
