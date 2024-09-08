<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome', [
        'races' => \App\Models\Race::all(),
        'clubs' => \App\Models\Club::all()
    ]);
});
