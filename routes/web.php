<?php

use App\Models\Race;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('livewire.list-clubs', [
        'clubs' => \App\Models\Club::enabled()->get(),
    ]);
})->name('clubs');

Route::get('/about', function () {
    return view('view.about');
})->name('about');

Route::get('/races', function () {
    return view('livewire.list-races',
        [
            'races' => \App\Models\Race::enabled()->orderBy('date')->get(),
        ]);
})->name('races');

Route::get('/races/{race}', function (Race $race) {
    return view('livewire.race-item', [
        'race' => $race,
    ]);
})->name('race-show');
